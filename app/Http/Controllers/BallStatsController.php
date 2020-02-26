<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BallStatsCreateRequest;
use App\Http\Requests\BallStatsUpdateRequest;
use App\Repositories\BallStatsRepository;
use App\Validators\BallStatsValidator;

/**
 * Class BallStatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BallStatsController extends Controller
{
    /**
     * @var BallStatsRepository
     */
    protected $repository;

    /**
     * @var BallStatsValidator
     */
    protected $validator;

    /**
     * BallStatsController constructor.
     *
     * @param BallStatsRepository $repository
     * @param BallStatsValidator $validator
     */
    public function __construct(BallStatsRepository $repository, BallStatsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $ballStats = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ballStats,
            ]);
        }

        return view('ballStats.index', compact('ballStats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BallStatsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BallStatsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ballStat = $this->repository->create($request->all());

            $response = [
                'message' => 'BallStats created.',
                'data'    => $ballStat->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ballStat = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ballStat,
            ]);
        }

        return view('ballStats.show', compact('ballStat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ballStat = $this->repository->find($id);

        return view('ballStats.edit', compact('ballStat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BallStatsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BallStatsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ballStat = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BallStats updated.',
                'data'    => $ballStat->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'BallStats deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BallStats deleted.');
    }
}
