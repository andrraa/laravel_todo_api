<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Classes\ResponseClass;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\UserInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function userRegister(UserRegisterRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        DB::beginTransaction();

        try {
            $userRegister = $this->userInterface->userRegister($validatedData);

            DB::commit();

            $userData = new UserResource($userRegister);

            return ResponseClass::response(result: $userData, message: 'REGISTER_SUCCESSFULL', code: 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return ResponseClass::response(result: null, message: $e->getMessage(), code: 500);
        }
    }
}
