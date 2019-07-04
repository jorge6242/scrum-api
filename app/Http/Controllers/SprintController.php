<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SprintService;

class SprintController extends Controller
{
    public function __construct(SprintService $sprintService) {
		$this->sprintService = $sprintService ;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprint = $this->sprintService->index();
        return response()->json([
            'success' => true,
            'data' => $sprint
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
        $sprintRequest = $request->all();
        if ($this->sprintService->checkSprint($sprintRequest['name'])) {
            return response()->json([
                'success' => false,
                'message' => 'Sprint already exist'
            ])->setStatusCode(400);
        }
        $sprint = $this->sprintService->create($sprintRequest);
        if ($sprint) {
            return response()->json([
                'success' => true,
                'data' => $sprint
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
        $sprint = $this->sprintService->read($id);
        if($sprint) {
            return response()->json([
                'success' => true,
                'data' => $sprint
            ]);
        }
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSprintsProject($project)
    {
        $sprint = $this->sprintService->getSprintsProject($project);
        if($sprint) {
            return response()->json([
                'success' => true,
                'data' => $sprint
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
        $sprintRequest = $request->all();
        $sprint = $this->sprintService->update($sprintRequest, $id);
        if($sprint) {
            return response()->json([
                'success' => true,
                'data' => $sprint
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
