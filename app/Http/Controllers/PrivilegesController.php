<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRoles;
use App\Models\Privileges;

class PrivilegesController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = $request->get('perPage');
        $user_roles = UserRoles::all();

        if (empty($perPage)) {
            $perPage = 5;
        }

        if (!empty($keyword)) {
            $users = User::where('identity_card', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
        }
        return view('privileges.index', ['users' => $users, 'perPage' => $perPage, 'user_roles' => $user_roles])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function update(Request $request, $id)
    {
        $user_new_rol = User::findOrFail($id);
        $user_new_rol->user_rol_id = $request->user_rol_id;
        $user_new_rol->save();

        return to_route('privileges.index');
    }
}
