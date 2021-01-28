<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\NomorIndukModel;
use App\ModelUser;

class NomorIndukController extends Controller
{
    //
    public function cekNIS(request $request){
        $nomorinduk = $request->NIS;

        $data = NomorIndukModel::where('NIS', $nomorinduk)->first();
        if($data){
            Session::put('NIS', $data->NIS);
            return redirect('/register');
        }else{
            return redirect()->back();
        }
    }

    public function cekNIP(request $request){
        $nomorinduk = $request->NIP;

        $data = NomorIndukModel::where('NIP', $nomorinduk)->first();
        if($data){
            Session::put('NIP', $data->NIP);
            return redirect('/registerguru');
        }else{
            return redirect()->back();
        }
    }

     public function show($id)
    {
        $newpass = ModelUser::findOrFail($id);
        return view('templates.editpass')->with(compact('newpass', $newpass));
    }
    
     public function update(Request $request, $id)
    {
        
       $passbaru=$request->password;
      $passnew=ModelUser::where('id', $id)->update(['password' => $passbaru]);
      
       return redirect('/edit')->with('success-password', 'Password Berhasil diubah!');
    }

    public function store(request $request){
        $nama = $request->nama;
        $noinduk = $request->noinduk;
        $status = $request->status;
        $password = $request->password;
        $avatar = "default.png";

        $user = new ModelUser();
        $user->name=$nama;
        $user->nomorinduk= $noinduk;
        $user->status= $status;
        $user->avatar = $avatar;
        $user->password = $password;
        $user->save();

        return redirect('/edit')->with('success', 'User Added Successfully');
    }
     
}