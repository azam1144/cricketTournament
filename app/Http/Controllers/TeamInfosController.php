<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TeamInfoCreateRequest;
use App\Http\Requests\TeamInfoUpdateRequest;
use App\Repositories\TeamInfoRepository;
use App\Validators\TeamInfoValidator;

/**
 * Class TeamInfosController.
 *
 * @package namespace App\Http\Controllers;
 */
class TeamInfosController extends Controller
{
    /**
     * @var TeamInfoRepository
     */
    protected $repository;

    /**
     * @var TeamInfoValidator
     */
    protected $validator;

    /**
     * TeamInfosController constructor.
     *
     * @param TeamInfoRepository $repository
     * @param TeamInfoValidator $validator
     */
    public function __construct(TeamInfoRepository $repository, TeamInfoValidator $validator)
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
        $teamInfos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $teamInfos,
            ]);
        }

        return view('teamInfos.index', compact('teamInfos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamInfoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TeamInfoCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $teamInfo = $this->repository->create($request->all());

            $response = [
                'message' => 'TeamInfo created.',
                'data'    => $teamInfo->toArray(),
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
        $teamInfo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $teamInfo,
            ]);
        }

        return view('teamInfos.show', compact('teamInfo'));
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
        $teamInfo = $this->repository->find($id);

        return view('teamInfos.edit', compact('teamInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TeamInfoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TeamInfoUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $teamInfo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TeamInfo updated.',
                'data'    => $teamInfo->toArray(),
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
                'message' => 'TeamInfo deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TeamInfo deleted.');
    }
}
