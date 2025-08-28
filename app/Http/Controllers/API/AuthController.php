<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Repositories\User\UserRepositoryInterface;

class AuthController extends BaseController
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function login(Request $request)
    {
        try{
            $credentils = $request->only(['email', 'password']);

            if(!JWTAuth::attempt($credentils)) {
                return $this->error("Your Email & Password is worng!", null, 401);
            }

            $user = User::where('email', $credentils['email'])->first();

            $payload = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'status' => $user->status === 1 ? "ACTIVE" : "SUSPEND",
                'phone' => $user->phone,
                'address' => $user->address,
            ];

            $token = JWTAuth::customClaims($payload)->attempt(['email' => $user->email, 'password' => $credentils['password']]);

            return $this->success($token, "User Login Successfully", 200);

        } catch(Exception $e) {
            return $this->error("Something went wrong!", null, 500);
        }
    }

    public function register(Request $request)
    {
        try{
            $validation = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users,email,except,id',
                'password' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'gender' => 'required',
            ]);
            if($validation->fails()) {
                return $this->error("Validation Error", $validation->errors(), 422);
            }

            $user = $this->userRepository->store($request->all());

            return $this->success($user, "User Created Successfully", 201);


        } catch(Exception $e) {
            return $this->error("Something went wrong!", null, 500);
        }
    }
}
