<?php

namespace App\Http\Controllers;
use App\Photoalbum;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PhotoalbumController extends Controller
{
    public function index()
    {
    $photoalbums = Photoalbum::orderBy('created_at', 'DESC')->paginate(20);
    
    setlocale(LC_ALL, 'nl_NL');
    
    if (Auth::check() && Route::currentRouteName() == 'admin.photoalbums.index')
        return view('admin.photoalbums.index', compact('photoalbums'));    
    else    
        return view('photoalbums.albums', compact('photoalbums'));    
    }

       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */    

    public function create()
    {
        return view('admin.photoalbums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6',        
        ]);


        $photoalbum = new photoalbum();
        $photoalbum->name = $request->input('name');
        $photoalbum->description = $request->input('description');
        $photoalbum->status = $request->input('status');
        $photoalbum->author = Auth::user()->name;          

        $photoalbum->save();

        Session::flash('stored_message', 'Fotoalbum toegevoegd!');
        Session::flash('alert-class', 'alert-success'); 

        return redirect()->route('admin.photoalbums.index');
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

        if (Auth::check() && Route::currentRouteName() == 'admin.photoalbums.index'){
            return view('admin.photoalbums.index', compact('albums'));
        }else{
            return view('photoalbums.album', compact('album'));
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photoalbum = Photoalbum::findOrFail($id);

        return view('admin.photoalbums.edit', compact('photoalbum'));
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
        $this->validate($request, [
            'name' => 'required|min:6',            
        ]);


        $photoalbum = new photoalbum();
        $photoalbum->name = $request->input('name');
        $photoalbum->description = $request->input('description');        

        Photoalbum::where('id', $id)
                ->update(['name' => $photoalbum->name,
                         'description'=>$photoalbum->description,
                         'status'=>$photoalbum->status]
                        );      

        Session::flash('stored_message', 'Fotoalbum aangepast!');
        Session::flash('alert-class', 'alert-success'); 
    
        return redirect()->route('admin.photoalbums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photoalbum = Photoalbum::findOrFail($id);

        if(Photoalbum::countAlbumPhotos($photoalbum->id)==0)
        {
        $photoalbum->delete();

        Session::flash('stored_message','Fotoalbum is succesvol verwijderd');
        Session::flash('alert-class', 'alert-success'); 

        }
        else
        {
        Session::flash("stored_message","Fotoalbum '{$photoalbum->name}' bevat nog foto's, verwijder deze eerst!");
        Session::flash('alert-class', 'alert-danger'); 
        }
        return back();
    }
}
