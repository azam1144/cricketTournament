<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BatsmanCreateRequest;
use App\Http\Requests\BatsmanUpdateRequest;
use App\Repositories\BatsmanRepository;
use App\Validators\BatsmanValidator;

/**
 * Class BatsmenController.
 *
 * @package namespace App\Http\Controllers;
 */
class BatsmenController extends Controller
{
    /**
     * @var BatsmanRepository
     */
    protected $repository;

    /**
     * @var BatsmanValidator
     */
    protected $validator;

    /**
     * BatsmenController constructor.
     *
     * @param BatsmanRepository $repository
     * @param BatsmanValidator $validator
     */
    public function __construct(BatsmanRepository $repository, BatsmanValidator $validator)
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
        $batsmen = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $batsmen,
            ]);
        }

        return view('batsmen.index', compact('batsmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BatsmanCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BatsmanCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $batsman = $this->repository->create($request->all());

            $response = [
                'message' => 'Batsman created.',
                'data'    => $batsman->toArray(),
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
        $batsman = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $batsman,
            ]);
        }

        return view('batsmen.show', compact('batsman'));
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
        $batsman = $this->repository->find($id);

        return view('batsmen.edit', compact('batsman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BatsmanUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BatsmanUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $batsman = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Batsman updated.',
                'data'    => $batsman->toArray(),
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
                'message' => 'Batsman deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Batsman deleted.');
    }
}
