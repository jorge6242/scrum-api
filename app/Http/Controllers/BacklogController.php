<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BacklogService;

class BacklogController extends Controller
{
    public function __construct(BacklogService $backlogService)
	{
		$this->backlogService = $backlogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backlog = $this->backlogService->index();
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMainBacklog()
    {
        $backlog = $this->backlogService->getMainBacklog();
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBacklogsSprint($project)
    {
        $backlog = $this->backlogService->getBacklogsSprint($project);
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBacklogsFromSprint($sprint)
    {
        $backlog = $this->backlogService->getBacklogsFromSprint($sprint);
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkTasksFromSprint(Request $request)
    {
        $backlog = $this->backlogService->checkTasksFromSprint($request);
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBoardFromSprint($sprint)
    {
        $backlog = $this->backlogService->getBoardFromSprint($sprint);
        return response()->json([
            'success' => true,
            'data' => $backlog
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $backlogRequest = $request->all();
        $backlog = $this->backlogService->create($backlogRequest);
        if ($backlog) {
            return response()->json([
                'success' => true,
                'data' => $backlog
            ]);
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
        $backlog = $this->backlogService->read($id);
        if($backlog) {
            return response()->json([
                'success' => true,
                'data' => $backlog
            ]);
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
        $backlogRequest = $request->all();
        $backlog = $this->backlogService->update($backlogRequest, $id);
        if($backlog) {
            return response()->json([
                'success' => true,
                'data' => $backlog
            ]);
        }
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