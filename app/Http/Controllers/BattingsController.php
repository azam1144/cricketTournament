<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BattingCreateRequest;
use App\Http\Requests\BattingUpdateRequest;
use App\Repositories\BattingRepository;
use App\Validators\BattingValidator;

/**
 * Class BattingsController.
 *
 * @package namespace App\Http\Controllers;
 */
class BattingsController extends Controller
{
    /**
     * @var BattingRepository
     */
    protected $repository;

    /**
     * @var BattingValidator
     */
    protected $validator;

    /**
     * BattingsController constructor.
     *
     * @param BattingRepository $repository
     * @param BattingValidator $validator
     */
    public function __construct(BattingRepository $repository, BattingValidator $validator)
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
        $battings = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $battings,
            ]);
        }

        return view('battings.index', compact('battings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BattingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BattingCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $batting = $this->repository->create($request->all());

            $response = [
                'message' => 'Batting created.',
                'data'    => $batting->toArray(),
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
        $batting = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $batting,
            ]);
        }

        return view('battings.show', compact('batting'));
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
        $batting = $this->repository->find($id);

        return view('battings.edit', compact('batting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BattingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BattingUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $batting = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Batting updated.',
                'data'    => $batting->toArray(),
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
                'message' => 'Batting deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Batting deleted.');
    }
}
