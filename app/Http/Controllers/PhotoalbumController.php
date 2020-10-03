<?php

namespace App\Http\Controllers;
use App\Photoalbum;

use Illuminate\Http\Request;

class PhotoalbumController extends Controller
{
    public function index()
    {
    $albums = Photoalbum::orderBy('created_at', 'DESC')->get();
    
    setlocale(LC_ALL, 'nl_NL');

     return view('photoalbums.albums', compact('albums'));

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    }

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
        $album = Photoalbum::findOrFail($id);

        return view('photoalbums.album', compact('album'));
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
        //
    }
}
