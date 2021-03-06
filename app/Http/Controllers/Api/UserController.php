<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 返回用户列表
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        return $this->resource(UserResource::collection(User::latest()->paginate(
            request('limit') ?? config('app.page_size')
        ))->hide([]));
    }

    /**
     * 返回单一用户信息
     *
     * @param User $user
     * @return mixed
     */
    public function show(int $id)
    {
        return $this->success(UserResource::make(User::findOrFail($id))->hide([]));
    }

    /**
     * 用户注册
     *
     * @param UserRequest $request
     * @return mixed
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

        return $this->setStatusCode(201)->success('用户注册成功');
    }

    /**
     * 用户登录
     *
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request)
    {
        $token = Auth::guard('api')->attempt(['name' => $request->name, 'password' => $request->password]);
        if ($token) {
            return $this->setStatusCode(201)->success(['token' => 'bearer ' . $token]);
        }

        return $this->failed('账号或密码错误', 400);
    }

    /**
     * 用户退出登录
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return $this->success('退出成功...');
    }

    /**
     * 返回当前登录用户信息
     *
     * @return mixed
     */
    public function info()
    {
        $user = Auth::guard('api')->user();

        return $this->success(new UserResource($user));
    }
}
