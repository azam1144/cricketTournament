<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MatchCreateRequest;
use App\Http\Requests\MatchUpdateRequest;
use App\Repositories\MatchRepository;
use App\Validators\MatchValidator;

/**
 * Class MatchesController.
 *
 * @package namespace App\Http\Controllers;
 */
class MatchesController extends Controller
{
    /**
     * @var MatchRepository
     */
    protected $repository;

    /**
     * @var MatchValidator
     */
    protected $validator;

    /**
     * MatchesController constructor.
     *
     * @param MatchRepository $repository
     * @param MatchValidator $validator
     */
    public function __construct(MatchRepository $repository, MatchValidator $validator)
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
        $matches = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $matches,
            ]);
        }

        return view('matches.index', compact('matches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MatchCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MatchCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $match = $this->repository->create($request->all());

            $response = [
                'message' => 'Match created.',
                'data'    => $match->toArray(),
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
        $match = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $match,
            ]);
        }

        return view('matches.show', compact('match'));
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
        $match = $this->repository->find($id);

        return view('matches.edit', compact('match'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatchUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MatchUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $match = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Match updated.',
                'data'    => $match->toArray(),
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
                'message' => 'Match deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Match deleted.');
    }
}
