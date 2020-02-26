<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TotalTeamsCreateRequest;
use App\Http\Requests\TotalTeamsUpdateRequest;
use App\Repositories\TotalTeamsRepository;
use App\Validators\TotalTeamsValidator;

/**
 * Class TotalTeamsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TotalTeamsController extends Controller
{
    /**
     * @var TotalTeamsRepository
     */
    protected $repository;

    /**
     * @var TotalTeamsValidator
     */
    protected $validator;

    /**
     * TotalTeamsController constructor.
     *
     * @param TotalTeamsRepository $repository
     * @param TotalTeamsValidator $validator
     */
    public function __construct(TotalTeamsRepository $repository, TotalTeamsValidator $validator)
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
        $totalTeams = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $totalTeams,
            ]);
        }

        return view('totalTeams.index', compact('totalTeams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TotalTeamsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TotalTeamsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $totalTeam = $this->repository->create($request->all());

            $response = [
                'message' => 'TotalTeams created.',
                'data'    => $totalTeam->toArray(),
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
        $totalTeam = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $totalTeam,
            ]);
        }

        return view('totalTeams.show', compact('totalTeam'));
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
        $totalTeam = $this->repository->find($id);

        return view('totalTeams.edit', compact('totalTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TotalTeamsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TotalTeamsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $totalTeam = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TotalTeams updated.',
                'data'    => $totalTeam->toArray(),
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
                'message' => 'TotalTeams deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TotalTeams deleted.');
    }
}
