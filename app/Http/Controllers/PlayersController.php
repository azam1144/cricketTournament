<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PlayerCreateRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Repositories\PlayerRepository;
use App\Validators\PlayerValidator;

/**
 * Class PlayersController.
 *
 * @package namespace App\Http\Controllers;
 */
class PlayersController extends Controller
{
    /**
     * @var PlayerRepository
     */
    protected $repository;

    /**
     * @var PlayerValidator
     */
    protected $validator;

    /**
     * PlayersController constructor.
     *
     * @param PlayerRepository $repository
     * @param PlayerValidator $validator
     */
    public function __construct(PlayerRepository $repository, PlayerValidator $validator)
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
        $players = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $players,
            ]);
        }

        return view('players.index', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlayerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PlayerCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $player = $this->repository->create($request->all());

            $response = [
                'message' => 'Player created.',
                'data'    => $player->toArray(),
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
        $player = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $player,
            ]);
        }

        return view('players.show', compact('player'));
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
        $player = $this->repository->find($id);

        return view('players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlayerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PlayerUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $player = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Player updated.',
                'data'    => $player->toArray(),
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
                'message' => 'Player deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Player deleted.');
    }
}
