<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use App\Photoalbumphotos;
use Illuminate\Http\Request;

class PhotoalbumphotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photoalbumphotos::orderBy('created_at', 'DESC')->get();
                        
        return view('admin.photoalbumsphotos.index', compact('photos'));
                
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
     * @param  \App\Photoalbumphotos  $photoalbumphotos
     * @return \Illuminate\Http\Response
     */
    public function show(Photoalbumphotos $photoalbumphotos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photoalbumphotos  $photoalbumphotos
     * @return \Illuminate\Http\Response
     */
    public function edit(Photoalbumphotos $photoalbumphotos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photoalbumphotos  $photoalbumphotos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photoalbumphotos $photoalbumphotos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photoalbumphotos  $photoalbumphotos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photoalbumphotos $photoalbumphotos)
    {
        //
    }
}
