<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelUploadVideo;
use Illuminate\Support\Facades\Hash;
use App\ModelUser;
use App\ModelVideo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use VideoThumbnail;
use Image;


class UploadVideoController extends Controller
{
    //
    
public function upload_vid(){
  
return view('templates.upload')->with(compact('video'));
}

public function search(Request $request){
   
        $cari = $request->cari;
        $cariVideo = ModelVideo::where('title', 'like', "%".$cari."%")->get();
        
         return view('templates.cari')->with(compact('cariVideo'));  
}

public function searchAdmin(Request $request){
   
        $cari = $request->cari;
        $cariVideo = ModelVideo::where('title', 'like', "%".$cari."%")->get();
        
         return view('admin.cariAdmin')->with(compact('cariVideo'));  
}

public function proses(Request $request){
  
      $mapel= $request->mapel;
      $title=$request->input('title');
      $deskripsi=$request->input('deskripsi');
      $noinduk = Session::get('nomorinduk');
      $username = Session::get('name');
      $status = Session::get('status');

      $video = $request->file('input_video');
     
      $thumb = $request->file('thumbnail');

      $test = new ModelUploadVideo();
      $test->mapel=$mapel;
      $test->nomorinduk=$noinduk;
      $test->videoname=$title;
      $test->deskripsi=$deskripsi;
    
      $coba = new ModelVideo();
      $coba->nomorinduk=$noinduk;
      $coba->username=$username;
      $coba->status=$status;
      $coba->mapel=$mapel;

      if(is_null($mapel)|| is_null($title) || is_null($video)|| is_null($thumb)){
        return redirect()->back()->with('alert-title', "Lengkapi Data");
      }else{
      $size=$video->getSize();
      $videoname = $video->getClientOriginalName();
      $extension = $video->getClientOriginalExtension();
      $judul = $title.'.'.$extension;
      $video->move(public_path('/assets/videos'), $judul);
      
      
      $thumbname = $thumb->getClientOriginalName();
      $thumbext = $thumb->getClientOriginalExtension();
      $thumbjudul= $thumbname.'.'.$thumbext;
      
      $image_resize = Image::make($thumb->getRealPath());   
      $image_resize->resize(1280, 720);
      $image_resize->save(public_path('assets/thumbnail' .$thumbname));
      $image_resize = Image::make($thumb->getRealPath());   
      $image_resize->resize(1280, 720);
      $image_resize->save(public_path('assets/thumbnail' .$thumbname));

      
      $test->video=$videoname;
       $coba->judulvideo=$judul;    
      $coba->format=$extension;
      $coba->deskripsi=$deskripsi;
      $coba->sizevideo=$size;
      $coba->thumbnail=$thumbname;
         $coba->title=$title;
         $test->save();
      $coba->save();
      }


      //$video->username = $request->name;
       //$username=Auth::User()->username;
      //$test->video=$videoname;
      // $test->video=$video;
    //}
    //$video = ModelUploadVideo::get();
    //return view('upload',['video' => $video]);
    return redirect('/gallery')->with('success', 'Videos Video Successfully');
  }

}