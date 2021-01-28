<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Image;
use App\ModelMataPelajaran;

use App\ModelKomentar;
use App\Imports\UserImport;

use Maatwebsite\Excel\Facades\Excel;

class User extends Controller
{
    //
    public function index()
    {
         $mapel = ModelMataPelajaran::orderBy('namamatapelajaran', 'asc')->get();
       
       
        return view('templates.default')->with(compact('mapel', $mapel));
   
    }
    public function loginUser()
    {
        return redirect('/defaultUser');
    }

    public function loginAdmin(){
        return view('admin.loginAdmin');
    }

    public function loginAdminPost(Request $request) {
       
        $nomorinduk = $request->nomorinduk;
        $password = $request->password;
        $name = $request->name;
        $status = $request->status;
        $avatar = $request->avatar;
         
        $admin="admin";
          $dataadmin = ModelUser::where('nomorinduk', $admin)->first();
        if ($dataadmin) { //apakah Nomor Induk admin tersebut ada atau tidak
            if ($password===$dataadmin->password) {
                Session::put('id', $dataadmin->id);
                Session::put('name', $dataadmin->name);
                
                Session::put('status', $dataadmin->status);
                Session::put('nomorinduk', $dataadmin->nomorinduk);
                Session::put('avatar', $dataadmin->avatar);
                Session::put('login', TRUE);
                return redirect('/defaultadmin');
            } else {
                return redirect()->back()->with('alert', 'Password Salah !');
            }
        } else {
            return redirect()->back()->with('alert', 'Nomor Induk Salah !');
        }
    }
    
    public function loginUserPost(Request $request)
    {

        $nomorinduk = $request->nomorinduk;
        $password = $request->password;
        $name = $request->name;
        $status = $request->status;
        $avatar = $request->avatar;

        $data = ModelUser::where('nomorinduk', $nomorinduk)->first();
          if ($data) { //apakah Nomor Induk tersebut ada atau tidak
            if ($password=== $data->password) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                
                Session::put('status', $data->status);
                Session::put('nomorinduk', $data->nomorinduk);
                Session::put('avatar', $data->avatar);
                Session::put('login', TRUE);
                return redirect('/defaultUser');
            } else {
                return redirect()->back()->with('alert', 'Password Salah !');
            }
        } else {
            return redirect()->back()->with('alert', 'Nomor Induk Salah !');
        }
    
        
    
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert', 'Kamu sudah logout');
    }

    public function Register(Request $request)
    {
        return view('templates.register');
   }

   public function RegisterGuru(Request $request)
   {
       return view('templates.registerguru');
  }

    public function RegisterPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'nomorinduk' => 'required|min:5|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new ModelUser();
        $data->name = $request->name;
        $data->nomorinduk = $request->nomorinduk;
        $data->status = $request->status;
        $data->password = bcrypt($request->password);
        $data->save();
        return view('templates.login')->with('alert-success', 'Kamu berhasil Register');
    }


    

    public function edit($id)
    {
        $avatar = ModelUser::findOrFail($id);
        return view('templates.foto')->with(compact('avatar', $avatar));
    }



    public function uploads_pic($id)
    {
        $avatar = ModelUser::findOrFail($id);
        return view('templates.foto')->with(compact('avatar', $avatar));

        //$avatar = DB::table('users')->where('id', '=', $id)->first();
        // $avatar = ModelUser::get();
        //$avatar = ModelUser::where('avatar',$data)->get();
        // return view('templates.foto')->with(compact('avatar', $avatar));
    }

    public function update(Request $request, $id)
    {
        $usrs = ModelUser::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $this->validate($request, [
                'avatar' => 'required|file|image|mimes:jpeg,png,jpg',
            ]);
            $avatar = $request->file('avatar');
            $filename = time() . "_" . $avatar->getClientOriginalName();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars' . $filename));
            $avatar->move(public_path('/uploads/avatars'), $filename);
            $usrs->avatar = $filename;

            $usrs->save();
            
            ModelKomentar::where('user_id', $id)->update(['avatar' => $filename]);
            Session::put('avatar', $usrs->avatar);
        }

        return redirect('/profile');
    }
    public function showData()
    {
        
      $user=ModelUser::select('id','name','nomorinduk','status','password')->get();
        return view('templates.edit')->with(compact('user', $user));
    }
    
     public function destroy($id)
    {
        ModelUser::where('id',$id)->delete();
        return redirect()->back();
    }

    public function destroyAll()
    {
        ModelUser::query()->delete();
        return redirect()->back();
    }

    public function show($id)
    {
      $pass = ModelUser::findOrFail($id);
        return view('templates.editpassuser')->with(compact('pass', $pass));
    }

     public function passUser(Request $request,$id)
    {
       $passbaru=$request->password;

      $passnew=ModelUser::where('id', $id)->update(['password' => $passbaru]);
      
       return redirect('/profile')->with('success-password', 'Password Berhasil diubah!');;
    }

    public function import_view(){
        $data = ModelUser::all();
        return view('templates.import')->with(compact('data'));
    }
    
public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
        $file = $request->file('file');
        $data = ModelUser::select('*');
        
        if($file == $data){
            return redirect()->back()->with('alert-aq', 'data sudah ada');
        }else{
// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
        $file->move(public_path('/file_user'), $nama_file);
 
		// import data
       Excel::import(new UserImport, public_path('/file_user/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/edit');
        }
 
		
	}

public function home(){

        return view('templates.default');
} 

public function addcourse(){

        return view('admin.addcourse');
} 

public function tontonvideoadmin(){
    return view('admin.tontonvideoAdmin');
}
}