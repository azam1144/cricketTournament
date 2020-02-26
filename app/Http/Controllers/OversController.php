<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OverCreateRequest;
use App\Http\Requests\OverUpdateRequest;
use App\Repositories\OverRepository;
use App\Validators\OverValidator;

/**
 * Class OversController.
 *
 * @package namespace App\Http\Controllers;
 */
class OversController extends Controller
{
    /**
     * @var OverRepository
     */
    protected $repository;

    /**
     * @var OverValidator
     */
    protected $validator;

    /**
     * OversController constructor.
     *
     * @param OverRepository $repository
     * @param OverValidator $validator
     */
    public function __construct(OverRepository $repository, OverValidator $validator)
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
        $overs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $overs,
            ]);
        }

        return view('overs.index', compact('overs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OverCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(OverCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $over = $this->repository->create($request->all());

            $response = [
                'message' => 'Over created.',
                'data'    => $over->toArray(),
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
        $over = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $over,
            ]);
        }

        return view('overs.show', compact('over'));
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
        $over = $this->repository->find($id);

        return view('overs.edit', compact('over'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OverUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OverUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $over = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Over updated.',
                'data'    => $over->toArray(),
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
                'message' => 'Over deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Over deleted.');
    }
}
