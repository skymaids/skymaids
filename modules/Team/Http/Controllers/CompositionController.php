<?php

namespace Modules\Team\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Team\Repositories\CompositionRepository;
use Carbon\Carbon;

class CompositionController extends BaseController
{
    protected $repository,
              $repositorySchedule;

    /**
     * CompositionController constructor.
     * @param CompositionRepository $repository
     */
    public function __construct(CompositionRepository $repository)
    {
        $this->repository  = $repository;
    }

    /**
     * Store a newly created resource in storage
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $composition = $this->repository->create(
            [
                'team_id' => $request->team['id'],
                'user_id' => $request->member['id'],
                'day' => Carbon::parse($request->team['date'])->format('Y-m-d')
            ]
        );
        return response()->json($composition, 201);
    }


    /**
     * Remove the specified resource from storage
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Request $request)
    {
        $compositions = $this->repository->findWhere(
            [
                'team_id' => $request->team['id'],
                'user_id' => $request->member['id'],
                'day' => Carbon::parse($request->team['date'])->format('Y-m-d')
            ],['id']
        );

        foreach ($compositions as $composition){
            $this->repository->delete($composition->id);
        }
        return response()->json([],204);
    }

    /**
     * Get
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function members(Request $request)
    {
        $compositions = $this->repository->findWhere(
            [
                'team_id' => $request->team->id,
                'day' => $this->getDate('00:00:00','Y-m-d')
            ]
        );
        return response()->json($compositions, 200);
    }
}
