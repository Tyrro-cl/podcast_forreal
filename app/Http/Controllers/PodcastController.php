<?php

namespace App\Http\Controllers;


use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
class PodcastController extends Controller
{
    /* public function __construct()
    {
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $podcasts = Podcast::all();
        return view('podcasts.index', ['podcasts' => $podcasts]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('podcasts.create', ['podcasts' => new Podcast]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg',
            'audio' => 'required|mimes:mpga,mp3,wav,ogg,wma,mid',
        ]);

        $audioPath = Storage::disk('public')->put('audios', $request->audio);
        $imagePath = Storage::disk('public')->put('images', $request->image);

        auth()->user()->podcasts()->create([...$validated, 'audio' => $audioPath, 'image' => $imagePath]);
        return redirect()->route('podcasts.the_podcasts')->with('message', 'Created post');
        //
    }

    /**
     * Display the specified resource.
     */

    public function thePodcasts(){
        $podcasts = Podcast::where('user_id', auth()->user()->id)->get();
        return view('podcasts.the_podcasts',['podcasts' => $podcasts]);
    }
    public function show(Podcast $podcast)
    {
        Gate::authorize('podcast', $podcast);
        return view('podcasts.show', ['podcast' => $podcast]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Podcast $podcast)
    {
        Gate::authorize('podcast', $podcast);

        $podcast->podcast_id;
        return view('podcasts.edit', ['podcast' =>$podcast]);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Podcast $podcast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Podcast::destroy($id);
        return redirect()->route('podcasts.the_podcasts')->with('message', 'Deleted podcast');
        //
    }
}
