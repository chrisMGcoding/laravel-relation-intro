<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('pages.video', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.videocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "img"=>["required"],
            "duration"=>["required"],
            "title"=>["required"],
            "description"=>["required"],
            "url"=>["required"]
        ]);

        $video = new Video;

        $video->img = $request->file("img")->hashName();
        $video->duration = $request->duration;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;

        $video->save();

        $request->file("img")->storePublicly("image", "public");
        return redirect()->route("videos.index")->with("message", "vidéo créée");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('crud.videoshow', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('crud.videoedit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'img'=>['required'],
            'duration'=>['required'],
            'title'=>['required'],
            'description'=>['required'],
            'url'=>['required']
        ]);

        Storage::disk('public')->delete('image/' . $video->img);

        $video->img = $request->file('img')->hashName();
        $video->duration = $request->duration;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->url = $request->url;

        $video -> save();

        $request->file('img')->storePublicly('image', 'public');

        return redirect()->route('videos.index')->with('message', 'Vidéo mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Storage::disk('public')->delete('image/' . $video->img);

        $video->delete();

        return redirect()->route('videos.index')->with('message', 'Vidéo supprimée');
    }
}
