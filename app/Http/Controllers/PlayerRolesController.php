<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PlayerRoleCreateRequest;
use App\Http\Requests\PlayerRoleUpdateRequest;
use App\Repositories\PlayerRoleRepository;
use App\Validators\PlayerRoleValidator;

/**
 * Class PlayerRolesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PlayerRolesController extends Controller
{
    /**
     * @var PlayerRoleRepository
     */
    protected $repository;

    /**
     * @var PlayerRoleValidator
     */
    protected $validator;

    /**
     * PlayerRolesController constructor.
     *
     * @param PlayerRoleRepository $repository
     * @param PlayerRoleValidator $validator
     */
    public function __construct(PlayerRoleRepository $repository, PlayerRoleValidator $validator)
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
        $playerRoles = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $playerRoles,
            ]);
        }

        return view('playerRoles.index', compact('playerRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlayerRoleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PlayerRoleCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $playerRole = $this->repository->create($request->all());

            $response = [
                'message' => 'PlayerRole created.',
                'data'    => $playerRole->toArray(),
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
        $playerRole = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $playerRole,
            ]);
        }

        return view('playerRoles.show', compact('playerRole'));
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
        $playerRole = $this->repository->find($id);

        return view('playerRoles.edit', compact('playerRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlayerRoleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PlayerRoleUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $playerRole = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'PlayerRole updated.',
                'data'    => $playerRole->toArray(),
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
                'message' => 'PlayerRole deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PlayerRole deleted.');
    }
}
