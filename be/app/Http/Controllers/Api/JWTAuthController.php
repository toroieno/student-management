<?php

namespace App\Http\Controllers\API;

use JWTAuth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class JWTAuthController extends Controller
{
    public $token = true;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {

         $validator = Validator::make($request->all(),
                      [
                      'username' => 'required',
                      'email' => 'required|email',
                      'password' => 'required',
                      'c_password' => 'required|same:password',
                     ]);

         if ($validator->fails()) {

               return response()->json(['error'=>$validator->errors()], 401);

            }


        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->token) {
            return $this->login($request);
        }

        return response()->json([
            'success' => true,
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function webauthenticate(Request $request)
    {
        $input = $request->only('username', 'password');
        $input['username'] = strtolower($input['username']);
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'code' => 'invalid_credentials',
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::query()->where('username', $input['username'])->first();
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $input = $request->only('username', 'password');
        $input['username'] = strtolower($input['username']);
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'code' => 'invalid_credentials',
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::query()->where('username', $input['username'])->first();
        if ($user->role != 0) {
            return response()->json([
                'status_code' => 403,
                'message' => 'You do not have permission to login system'
            ], 403);
        }
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getUser(Request $request)
    {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json([
                'code' => 'user_not_found',
                'status_code' => 404,
                'message' => 'User not found'
            ], 404);
        }
        // $this->validate($request, [
        //     'token' => 'required'
        // ]);
        // $user = JWTAuth::authenticate($request->token);
        // if (!$user) {
        //     return response()->json([
        //         'code' => 'user_not_found',
        //         'status_code' => 404,
        //         'message' => 'User not found'
        //     ]);
        // }
        $user->role;
        $user->email;

        return response()->json($user);
    }
}
