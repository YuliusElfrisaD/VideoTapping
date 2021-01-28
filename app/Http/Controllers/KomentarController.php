<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\ModelUser;
use App\ModelVideo;
use App\ModelKomentar;

class KomentarController extends Controller
{
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
    public function store(Request $request,$id)
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
        ModelKomentar::where('id',$id)->delete();
      
    return redirect()->back();
    }

    public function deleteKomen($id){
        ModelKomentar::where('id',$id)->delete();
        return redirect()->back();
    }

    public function simpanKomentar(Request $request, $id)
    {
          
       $noinduk = Session::get('nomorinduk');
      $vid = ModelVideo::where('id',$id)->first();
      $komen = ModelKomentar::where('video_id', $id)->get();
$user_id=Session::get('id');
       $nama=Session::get('name');
       $komentar=$request->input('komentar');
        
       ModelVideo::where('id', $id)->decrement('views',1);
       $avatar=ModelUser::where('nomorinduk',$noinduk)->value('avatar');
      

      $masuk = new ModelKomentar();
      $masuk->video_id=$id;
      $masuk->user_id=$user_id;
      $masuk->nama_user=$nama;
      $masuk->nomorinduk=$noinduk;
      $masuk->body=$komentar;
      $masuk->avatar=$avatar;
      $masuk->save();
return redirect()->back()->with(compact('vid', $vid,'komen',$komen));
        //return redirect()->back();
    }
}