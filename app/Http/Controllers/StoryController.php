<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('id','DESC')->paginate(10);
        return view('admin.stories.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stories.create');
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
            "title" => 'nullable|min:3|unique:stories',
            "description" => 'nullable|min:3',
            "story_type" => 'required',
            "story" => 'required',
            "priority" => 'required'
        ]);

        $stories = new Story();
        $stories->title = $request->input('title');
        $stories->description = $request->input('description');
        $stories->story_type = $request->input('story_type');
        $stories->priority = $request->input('priority');
        if($request->has('story')){
            $stories->story = $request->file('story')->store('uploads/stories','local');
        }

        if($stories->save()){
            return redirect()->route('stories.index')->with('success','Story Added Successfully !!');
        }else{
            return redirect()->route('stories.index')->with('danger','Some Error Occured, Please Try Again Later !!');
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
     * @param  Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $request->validate([
            "title" => 'nullable|min:3|unique:stories,id,'.$story->id,
            "description" => 'nullable|min:3',
            "story_type" => 'required',
            "priority" => 'required',
        ]);

        $story->title = $request->input('title');
        $story->description = $request->input('description');
        $story->story_type = $request->input('story_type');
        $story->priority = $request->input('priority');
        if($request->has('story')){
            unlink($story->story);
            $story->story = $request->file('story')->store('uploads/stories','local');
        }

        if($story->update()){
            return redirect()->route('stories.index')->with('success','Story Update Successfully !!');
        }else{
            return redirect()->route('stories.index')->with('danger','Some Error Occured, Please Try Again Later !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        if(!empty($story->story)){
            unlink($story->story);
        }

        if($story->delete()){
            return redirect()->route('stories.index')->with('success','Story Deleted Successfully !!');
        }else{
            return redirect()->route('stories.index')->with('danger','Some Error Occured, Please Try Again Later !!');
        }
    }
}
