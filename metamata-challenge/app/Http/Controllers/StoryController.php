<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    public function index(){
        $stories = Story::all();
        $likes = Like::all();
        return view ('home', compact('stories', 'likes'));
    }

    public function create(){
        return view ('story.create');
    }

    public function store(Request $request){
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required'
        ]);
        Story::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
        ]);
        return redirect('/story');
    }

    public function show($slug){
        $story = Story::where('slug', $slug)->first();
        $story_id = $story->id;
        $likesCount = count(Like::where('story_id', $story_id)->get());
        if (Like::where('user_id', auth()->user()->id)->first()) {
            $isLikeByMe = 1;
        } else {
            $isLikeByMe = 0;
        }
        return view('story.show', compact('story', 'likesCount', 'isLikeByMe'));
    }

    public function like($id) {
        $likes = Like::all();
        $user = auth()->user()->id;
        Like::updateOrCreate([
            'user_id' => $user,
            'story_id' => $id
        ]);
        return back();
    }

    public function dislike($id) {
        $like = Like::where('story_id', $id)
                ->where('user_id', auth()->user()->id)
                ->first();
        $like->delete();
        return back();
    }

    public function showMine() {
        $stories = Story::where('author', auth()->user()->name)->get();
        $likes = Like::all();
        return view('story.mine', compact('stories', 'likes'));
    }

    public function edit($slug) {
        $story = Story::where('slug', $slug)->first();
        return view('story.edit', compact('story'));
    }

    public function update($id, Request $request) {
        $story = Story::find($id);
        Validator::make($request->all(), [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'content' => 'required'
        ]);
        $story->update([
            'title' => $request->title,
            'author' => $request->author,
            'slug' => Str::slug($request->title),
            'content' => $request->content
        ]);
        return redirect('/story/mine');
    }

    public function destroy($slug) {
        $story = Story::where('slug', $slug)->first();
        $story->delete();
        return back();
    }
}
