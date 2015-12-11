<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Song;
use App\Http\Requests\CreateSongRequest;

class SongsController extends Controller
{
    public function __construct(Song $song)
    {
        $this->song = $song;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$songs = Song::get();
        $songs = $this->song->get();
        return view('songs.index', compact('songs'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)//$id $slug
    {
        //$song = Song::find($id);
        //$song = $this->song->whereSlug($slug)->first();//$song = Song::whereSlug($slug)->first();
        return view('songs.show', compact('song'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSongRequest $request, Song $song)
    {
        $song->create($request->all());
        return redirect()->route('songs_path');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)//$slug
    {
        //$song = $this->song->whereSlug($slug)->first();//bind
        return view('songs.edit', compact('song'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Song $song, Request $request)//, $slug
    {
        //$song = $this->song->whereSlug($slug)->first();//bind
        //$song->title = $request->get('title');
        //$song->save();
        //$song->fill(['title' => $request->get('title')])->save();
        $song->fill($request->input())->save();
        return redirect('songs');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)//$id
    {
        $song->delete();
        return redirect('songs');
    }
}