<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MatchStatCreateRequest;
use App\Http\Requests\MatchStatUpdateRequest;
use App\Repositories\MatchStatRepository;
use App\Validators\MatchStatValidator;

/**
 * Class MatchStatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MatchStatsController extends Controller
{
    /**
     * @var MatchStatRepository
     */
    protected $repository;

    /**
     * @var MatchStatValidator
     */
    protected $validator;

    /**
     * MatchStatsController constructor.
     *
     * @param MatchStatRepository $repository
     * @param MatchStatValidator $validator
     */
    public function __construct(MatchStatRepository $repository, MatchStatValidator $validator)
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
     * @param  MatchStatCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MatchStatCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $matchStat = $this->repository->create($request->all());

            $response = [
                'message' => 'MatchStat created.',
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
     * @param  MatchStatUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MatchStatUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $matchStat = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'MatchStat updated.',
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
                'message' => 'MatchStat deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'MatchStat deleted.');
    }
}
