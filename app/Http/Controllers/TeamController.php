<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamService;

class TeamController extends Controller
{
    public function __construct(TeamService $teamService)
	{
		$this->teamService = $teamService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = $this->teamService->index();
        return response()->json([
            'success' => true,
            'data' => $team
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
        $teamRequest = $request->all();
        $team = $this->teamService->create($teamRequest);
        if ($team) {
            return response()->json([
                'success' => true,
                'data' => $team
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
        $team = $this->teamService->read($id);
        if($team) {
            return response()->json([
                'success' => true,
                'data' => $team
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
        $teamRequest = $request->all();
        $team = $this->teamService->update($teamRequest, $id);
        if($team) {
            return response()->json([
                'success' => true,
                'data' => $team
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
        $team = $this->teamService->delete($id);
        if($team) {
            return response()->json([
                'success' => true,
                'data' => $team
            ]);
        }
    }
}
