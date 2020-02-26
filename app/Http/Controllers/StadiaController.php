<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StadiumCreateRequest;
use App\Http\Requests\StadiumUpdateRequest;
use App\Repositories\StadiumRepository;
use App\Validators\StadiumValidator;

/**
 * Class StadiaController.
 *
 * @package namespace App\Http\Controllers;
 */
class StadiaController extends Controller
{
    /**
     * @var StadiumRepository
     */
    protected $repository;

    /**
     * @var StadiumValidator
     */
    protected $validator;

    /**
     * StadiaController constructor.
     *
     * @param StadiumRepository $repository
     * @param StadiumValidator $validator
     */
    public function __construct(StadiumRepository $repository, StadiumValidator $validator)
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
        $stadia = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $stadia,
            ]);
        }

        return view('stadia.index', compact('stadia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StadiumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StadiumCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $stadium = $this->repository->create($request->all());

            $response = [
                'message' => 'Stadium created.',
                'data'    => $stadium->toArray(),
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
        $stadium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $stadium,
            ]);
        }

        return view('stadia.show', compact('stadium'));
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
        $stadium = $this->repository->find($id);

        return view('stadia.edit', compact('stadium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StadiumUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StadiumUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $stadium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Stadium updated.',
                'data'    => $stadium->toArray(),
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
                'message' => 'Stadium deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Stadium deleted.');
    }
}
