<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelVideo;
use App\ModelUploadVideo;

use App\ModelKomentar;
use App\Like;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class VideoController extends Controller
{

public function __construct(ModelUploadVideo $upload, ModelVideo $video){
    $this->upload = $upload;
    $this->video = $video;
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //$vid = ModelVideo::findOrFail($id)->first();
        
       $vid = ModelVideo::where('id',$id)->first();
       $komen = ModelKomentar::select('id','nama_user','nomorinduk','body','avatar')->where('video_id', $id)->get();
        $session = Session::get('name');

         //  $Key = 'video' . $id;
           //  if (!Session::has($Key)) {
            ModelVideo::where('id', $id)->increment('views',1);
    //Session::put($Key, 1);
             //}
        return view('templates.tontonvideo')->with(compact('vid', $vid, 'komen', $komen,'session',$session));
    }

    
    public function showAdmin($id)
    {
        //
        //$vid = ModelVideo::findOrFail($id)->first();
        
       $vid = ModelVideo::where('id',$id)->first();
       $komen = ModelKomentar::select('id','nama_user','nomorinduk','body','avatar')->where('video_id', $id)->get();


         //  $Key = 'video' . $id;
           //  if (!Session::has($Key)) {
            ModelVideo::where('id', $id)->increment('views',1);
    //Session::put($Key, 1);
             //}
        return view('admin.tontonvideoAdmin')->with(compact('vid', $vid, 'komen', $komen));
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
    public function destroy($id)
    {
    ModelVideo::where('id',$id)->delete();
        return redirect()->back();
    }
    public function gallery(){
        $vid = ModelVideo::get()->where('nomorinduk', Session::get('nomorinduk'));
        return view('templates.gallery')->with(compact('vid'));
    }
    
    public function agama(Request $request){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','agama')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','agama')->where('status','Guru')->paginate(10);
        
        $cari = $request->cari;
        $Carivideo = ModelVideo::where('judulvideo', 'like', "%".$cari."%")->paginate();
        
         return view('templates.mapel.agama')->with(compact('vidSiswa', 'vidGuru', 'Carivideo'));
     }
     
    public function antropologi(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','antropologi')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','antropologi')->where('status','Guru')->paginate(10);

         $cari = $request->cari;
         $Carivideo = ModelVideo::where('judulvideo', 'like', "%".$cari."%")->paginate();

         return view('templates.mapel.antropologi')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function indonesia(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','indonesia')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','indonesia')->where('status','Guru')->paginate(10);
         return view('templates.mapel.indo')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function inggris(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','inggris')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','inggris')->where('status','Guru')->paginate(10);
         return view('templates.mapel.inggris')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function bk(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','bk')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','bk')->where('status','Guru')->paginate(10);
         return view('templates.mapel.bk')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function biologi(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','biologi')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','biologi')->where('status','Guru')->paginate(10);
         return view('templates.mapel.biologi')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function ekonomi(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','ekonomi')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','ekonomi')->where('status','Guru')->paginate(10);
         return view('templates.mapel.ekonomi')->with(compact('vidSiswa', 'vidGuru'));
     }
     
    public function fisika(){
        // $vid=  ModelVideo::get();
         $vidSiswa = ModelVideo::where('mapel','fisika')->where('status','Siswa')->paginate(10);       
         $vidGuru = ModelVideo::where('mapel','fisika')->where('status','Guru')->paginate(10);
         return view('templates.mapel.fisika')->with(compact('vidSiswa', 'vidGuru'));
     }

     public function like(request $request, $id){
        $video = ModelVideo::where('id',$id)->get();
        $likecheck = like::where(['nomorinduk'=>Session::get('nomorinduk'),'video_id'=>$request->id])->first();
        if ($likecheck){
            like::where(['nomorinduk'=>Session::get('nomorinduk'), 'video_id'=>$request->id])->delete();
            return 'deleted';
        }else{
        $like = new like;
        $lke->nomorinduk = Session::get('id');
        $like->video_id = $request->id;
        $like ->save();
        }
     }

}