<?php

namespace App\Http\Controllers;

use App\DiscussionGroup;
use App\Discussion;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DiscussionGroupResource;
use Illuminate\Http\Request;
use App\Http\Requests\DiscussionGroup as DiscussionGroupRequest;
use App\Http\Controllers\API\BaseController as BaseController;

class DiscussionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Discussion $discussion)
    {
        return DiscussionGroupResource::collection($discussion->discussion_group);
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
    public function store(DiscussionGroupRequest $request, Discussion $discussion)
    {
        $discussion_group = new DiscussionGroup($request->all());
       
        $discussion->discussion_group()->save($discussion_group);
       
        return response([
          'data' => new DiscussionGroupResource($discussion_group)
        ], Response::HTTP_CREATED);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscussionGroup  $discussionGroup
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionGroup $discussionGroup)
    {
        return new DiscussionGroupResource($discussion_group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscussionGroup  $discussionGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionGroup $discussionGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscussionGroup  $discussionGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionGroup $discussionGroup)
    {
        $discussion_group->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscussionGroup  $discussionGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionGroup $discussionGroup)
    {
        $discussion_group->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
