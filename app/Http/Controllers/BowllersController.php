<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BowllerCreateRequest;
use App\Http\Requests\BowllerUpdateRequest;
use App\Repositories\BowllerRepository;
use App\Validators\BowllerValidator;

/**
 * Class BowllersController.
 *
 * @package namespace App\Http\Controllers;
 */
class BowllersController extends Controller
{
    /**
     * @var BowllerRepository
     */
    protected $repository;

    /**
     * @var BowllerValidator
     */
    protected $validator;

    /**
     * BowllersController constructor.
     *
     * @param BowllerRepository $repository
     * @param BowllerValidator $validator
     */
    public function __construct(BowllerRepository $repository, BowllerValidator $validator)
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
        $bowllers = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bowllers,
            ]);
        }

        return view('bowllers.index', compact('bowllers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BowllerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BowllerCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $bowller = $this->repository->create($request->all());

            $response = [
                'message' => 'Bowller created.',
                'data'    => $bowller->toArray(),
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
        $bowller = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $bowller,
            ]);
        }

        return view('bowllers.show', compact('bowller'));
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
        $bowller = $this->repository->find($id);

        return view('bowllers.edit', compact('bowller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BowllerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BowllerUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $bowller = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Bowller updated.',
                'data'    => $bowller->toArray(),
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
                'message' => 'Bowller deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Bowller deleted.');
    }
}
