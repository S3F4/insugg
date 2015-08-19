<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class Tag extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = \App\Tag::paginate(15);
        return view('tags')->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $tag = \App\Tag::where('tagid',$id)->first();
        $insuggs = $tag->insuggsOfTag()->paginate(20);
        return view('tag.tag')->with('insuggs',$insuggs);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tag = \App\Tag::where('tagid',$id);
        $tag->tag = $request->tag;
        if($tag->save()){
            return "tag updated";
        }else{
            return "tag didnt update";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tagmaps = DB::select('select * from tagmap where tagid=?',$id);
        $tagmaps->destroy();
        $tag = \App\Tag::where('tagid',$id)-first();
        $tag->destroy();
    }
}
