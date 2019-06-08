<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(ProjectService $projectService)
	{
		$this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = $this->projectService->index();
        return response()->json([
            'success' => true,
            'data' => $project
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
        $projectRequest = $request->all();
        $project = $this->projectService->create($projectRequest);
        if ($project) {
            return response()->json([
                'success' => true,
                'data' => $project
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
        $project = $this->projectService->read($id);
        if($project) {
            return response()->json([
                'success' => true,
                'data' => $project
            ]);
        }
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
        $projectRequest = $request->all();
        $project = $this->projectService->update($projectRequest, $id);
        if($project) {
            return response()->json([
                'success' => true,
                'data' => $project
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
        $project = $this->projectService->delete($id);
        if($project) {
            return response()->json([
                'success' => true,
                'data' => $project
            ]);
        }
    }
}
