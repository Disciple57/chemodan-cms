<?php

namespace App\Http\Controllers\Admin;

use App\Constants\NotificationCode as Code;
use App\Constants\NotificationMsg;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User as UserResource;
use App\Http\Requests\UsersRequest;
use App\Model\Admin\User;
use App\Constants\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = (Auth::user()->role == Role::SUPERADMIN) ? [Role::USER, Role::ADMIN, Role::SUPERADMIN] : [Role::USER];
        return view('admin.users.index', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UsersRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        switch (Auth::user()->role) {
            case Role::SUPERADMIN:
                $role = $request->role;
                break;
            default:
                $role = Role::USER;
        }

        $user = new User();
        $user->name = $request->name;
        $user->role = $role;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return response(['notification' => NotificationMsg::USERS[Code::STORE]]);
        }
        return response(['error'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        switch (Auth::user()->role) {
            case Role::SUPERADMIN:
                $users = User::all();
                break;
            case Role::ADMIN:
                $users = User::where('role', '=', Role::USER)->orWhere('id', '=', Auth::id())->get();
                break;
            default:
                $users = User::all()->where('id', '=', Auth::id());
        }

        return response([
            'data' => UserResource::collection($users),
            'current_user' => Auth::user(),
            'roles' => [Role::USER, Role::ADMIN, Role::SUPERADMIN],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UsersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        switch (Auth::user()->role) {
            case Role::SUPERADMIN:
                $role = $request->role;
                break;
            case Role::ADMIN:
                $role = Role::USER;

                if ($id != Auth::id() && $user->role != Role::USER) {
                    return response(['error'], 401);
                }

                if ($id == Auth::id()) {
                    $role = Role::ADMIN;
                }
                break;
            default:
                if ($id != Auth::id()) {
                    return response(['error'], 401);
                }
                $role = Role::USER;
        }

        if ($user->name != $request->name) {
            $user->name = $request->name;
        }
        $user->role = $role;
        $user->remember_token = null;
        $user->password = Hash::make($request->password);
        if ($user->update()) {
            if ($id == Auth::id()) {
                Auth::logout();
                return response(['logout' => true]);
            }
            return response(['notification' => NotificationMsg::USERS[Code::UPDATE]]);
        }
        return response(['error'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == Auth::id()) {
            return response(['error'], 401);
        }
        $user = User::findOrFail($id);

        switch (Auth::user()->role) {
            case Role::ADMIN:
                if ($user->role != Role::USER) {
                    return response(['error'], 401);
                }
                break;
            case Role::USER:
                return response(['error'], 401);
        }

        if ($user->delete()) {
            if ($id == Auth::id()) {
                Auth::logout();
                return response(['logout' => true]);
            }
            return response(['notification' => NotificationMsg::USERS[Code::DELETE]]);
        }
        return response(['error'], 401);
    }
}
