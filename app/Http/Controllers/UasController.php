<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uas;
use RealRashid\SweetAlert\Facades\Alert;


class UasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $uas = uas::all();
       return view('uas.index',compact('uas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Uas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uas = new Uas;

        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $uas->nama = $request->nama;
        $uas->umur = $request->umur;
        $uas->bio = $request->bio;

        $simpan = $uas->save();

        if($simpan){
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/uas');
        }else{
            Alert::error('Failed', 'Data Gagal ditambah');
        }

        
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
        $uas = Uas::where('id',$id)->first();
        
        return view('uas.edit', compact('uas'));

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
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $uas = uas::find($id);
        $uas->nama = $request->nama;
        $uas->umur = $request->umur;
        $uas->bio = $request->bio;
        
        $ubah = $uas->save();
        
        if($ubah ){
            Alert::success('Success', 'Data Berhasil diubah');
            return redirect('/uas');
        }else{
            Alert::error('Failed', 'Data Gagal diubah');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uas = Uas::find($id);
        $hapus = $uas ->delete();

        if($hapus ){
            Alert::success('Success', 'Data Berhasil di Hapus');
            return redirect('/uas');
        }else{
            Alert::error('Failed', 'Data Gagal di Hapus');
        }
        return redirect('/uas');
    }
}
