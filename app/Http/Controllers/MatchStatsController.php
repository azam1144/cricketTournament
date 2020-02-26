<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MatchStatsCreateRequest;
use App\Http\Requests\MatchStatsUpdateRequest;
use App\Repositories\MatchStatsRepository;
use App\Validators\MatchStatsValidator;

/**
 * Class MatchStatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MatchStatsController extends Controller
{
    /**
     * @var MatchStatsRepository
     */
    protected $repository;

    /**
     * @var MatchStatsValidator
     */
    protected $validator;

    /**
     * MatchStatsController constructor.
     *
     * @param MatchStatsRepository $repository
     * @param MatchStatsValidator $validator
     */
    public function __construct(MatchStatsRepository $repository, MatchStatsValidator $validator)
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
        $matchStats = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matchStats,
            ]);
        }

        return view('matchStats.index', compact('matchStats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatchStatsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MatchStatsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $matchStat = $this->repository->create($request->all());

            $response = [
                'message' => 'MatchStats created.',
                'data'    => $matchStat->toArray(),
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
        $matchStat = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matchStat,
            ]);
        }

        return view('matchStats.show', compact('matchStat'));
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
        $matchStat = $this->repository->find($id);

        return view('matchStats.edit', compact('matchStat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatchStatsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MatchStatsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $matchStat = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MatchStats updated.',
                'data'    => $matchStat->toArray(),
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
                'message' => 'MatchStats deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MatchStats deleted.');
    }
}
