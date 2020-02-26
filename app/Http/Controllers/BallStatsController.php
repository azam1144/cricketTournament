<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BallStatCreateRequest;
use App\Http\Requests\BallStatUpdateRequest;
use App\Repositories\BallStatRepository;
use App\Validators\BallStatValidator;

/**
 * Class BallStatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BallStatsController extends Controller
{
    /**
     * @var BallStatRepository
     */
    protected $repository;

    /**
     * @var BallStatValidator
     */
    protected $validator;

    /**
     * BallStatsController constructor.
     *
     * @param BallStatRepository $repository
     * @param BallStatValidator $validator
     */
    public function __construct(BallStatRepository $repository, BallStatValidator $validator)
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
     * @param  BallStatCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BallStatCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ballStat = $this->repository->create($request->all());

            $response = [
                'message' => 'BallStat created.',
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
     * @param  BallStatUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BallStatUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ballStat = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'BallStat updated.',
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
                'message' => 'BallStat deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'BallStat deleted.');
    }
}
