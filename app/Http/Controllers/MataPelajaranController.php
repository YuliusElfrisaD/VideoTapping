<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelVideo;
use Image;
use App\ModelMataPelajaran;
use App\ModelUploadVideo;
class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        
      $mapel = ModelMataPelajaran::orderBy('namamatapelajaran', 'asc')->get();
       
       
        return view('admin.defaultadmin')->with(compact('mapel', $mapel));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

      $mapel= $request->mapel;
      $cover=$request->file('cover');

      if(is_null($cover)){
          return redirect()->back()->with('alert', 'Cover kosong');
      }else{
      $covername = $cover->getClientOriginalName();

      
    $image_resize = Image::make($cover->getRealPath());   
    $image_resize->resize(1280, 720);
    $image_resize->save(public_path('assets/cover' .$covername));
      
      $pelajaran = new ModelMataPelajaran();
      $pelajaran->cover = $covername;
    
      if(is_null($mapel)){
          return redirect()->back()->with('alert-nama', 'Isi nama matapelajaran');
      }else{
           $pelajaran->namamatapelajaran=$mapel;
           $pelajaran->save();
      }

      
        return redirect('/defaultadmin')->with('success', 'Add Course Successfully');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($namamatapelajaran)
    {
        $mata=ModelMataPelajaran::select('namamatapelajaran')->where('namamatapelajaran',$namamatapelajaran)->first();
         $vidSiswa = ModelVideo::where('mapel',$namamatapelajaran)->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel',$namamatapelajaran)->where('status','Guru')->paginate(10);
        //$cari = $request->cari;
        //$Carivideo = ModelVideo::where('judulvideo', 'like', "%".$cari."%")->paginate();
         return view('templates.mapel.agama')->with(compact('mata','vidSiswa', 'vidGuru',$mata));
     }
     
     public function showAdmin($namamatapelajaran)
    {
        $mata=ModelMataPelajaran::select('namamatapelajaran')->where('namamatapelajaran',$namamatapelajaran)->first();
         $vidSiswa = ModelVideo::where('mapel',$namamatapelajaran)->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel',$namamatapelajaran)->where('status','Guru')->paginate(10);
        //$cari = $request->cari;
        //$Carivideo = ModelVideo::where('judulvideo', 'like', "%".$cari."%")->paginate();
         return view('admin.mapelAdmin')->with(compact('mata','vidSiswa', 'vidGuru',$mata));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($namamatapelajaran)
    {
        //
        ModelUploadVideo::where('mapel',$namamatapelajaran)->delete();
        ModelMataPelajaran::where('namamatapelajaran',$namamatapelajaran)->delete();
         ModelVideo::where('mapel',$namamatapelajaran)->delete();
        return redirect()->back();
    }

    public function showmapel (){       
       $mapel = ModelMataPelajaran::orderBy('namamatapelajaran', 'asc')->get();
       
        return view('templates.upload')->with(compact('mapel', $mapel));
    
    }
}