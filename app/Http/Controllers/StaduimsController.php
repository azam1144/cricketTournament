<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StaduimCreateRequest;
use App\Http\Requests\StaduimUpdateRequest;
use App\Repositories\StaduimRepository;
use App\Validators\StaduimValidator;

/**
 * Class StaduimsController.
 *
 * @package namespace App\Http\Controllers;
 */
class StaduimsController extends Controller
{
    /**
     * @var StaduimRepository
     */
    protected $repository;

    /**
     * @var StaduimValidator
     */
    protected $validator;

    /**
     * StaduimsController constructor.
     *
     * @param StaduimRepository $repository
     * @param StaduimValidator $validator
     */
    public function __construct(StaduimRepository $repository, StaduimValidator $validator)
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
        $staduims = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $staduims,
            ]);
        }

        return view('staduims.index', compact('staduims'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StaduimCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StaduimCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $staduim = $this->repository->create($request->all());

            $response = [
                'message' => 'Staduim created.',
                'data'    => $staduim->toArray(),
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
        $staduim = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $staduim,
            ]);
        }

        return view('staduims.show', compact('staduim'));
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
        $staduim = $this->repository->find($id);

        return view('staduims.edit', compact('staduim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StaduimUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(StaduimUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $staduim = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Staduim updated.',
                'data'    => $staduim->toArray(),
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
                'message' => 'Staduim deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Staduim deleted.');
    }
}
