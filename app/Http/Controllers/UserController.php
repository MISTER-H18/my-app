<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Pagination\CursorPaginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = $request->get('perPage');

        if (empty($perPage)) {
            $perPage = 5;
        }

        if (!empty($keyword)) {
            $users = User::whereNot(function (Builder $query) {
                $query->where('user_rol_id', '=', 1)
                    ->orWhereNull('user_rol_id');
            })->where('name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('identity_card', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage); //CursorPaginator
        } else {
            $users = User::whereNot(function (Builder $query) {
                $query->where('user_rol_id', '=', 1)
                    ->orWhereNull('user_rol_id');
            })->paginate($perPage); //CursorPaginator
        }
        return view('members.index', ['users' => $users, 'perPage' => $perPage])->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("members.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identity_card' => 'required|numeric|unique:users,identity_card',
            'name' => 'required|string|alpha|max:40|min:3',
            'last_name' => 'required|string|alpha|max:40|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required|string|max:255|min:10',
            'occupation' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|min:10|unique:users,email',
            'marital_status_id' => 'required',
            'password' => 'required',
        ]);

        $user = new User;

        $user->identity_card = $request->identity_card;
        $user->name = Str::lower($request->name);
        $user->last_name = Str::lower($request->last_name);
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->phone_number = $request->phone_number;
        $user->address = Str::lower($request->address);
        $user->occupation = Str::lower($request->occupation);
        $user->marital_status_id = $request->marital_status_id;
        $user->user_rol_id = 2;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return to_route('members.show', ['member' => $user->id]);
        // ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("members.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("members.edit", ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'identity_card' => 'required|numeric',
            'name' => 'required|string|alpha|max:40|min:3',
            'last_name' => 'required|string|alpha|max:40|min:3',
            'date_of_birth' => 'required|date',
            'phone_number' => 'required|numeric|digits:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required|string|max:255|min:10',
            'occupation' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|min:10',
            'marital_status_id' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->identity_card = $request->identity_card;
        $user->name = Str::lower($request->name);
        $user->last_name = Str::lower($request->last_name);
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->phone_number = $request->phone_number;
        $user->address = Str::lower($request->address);
        $user->occupation = Str::lower($request->occupation);
        $user->email = $request->email;
        $user->marital_status_id = $request->marital_status_id;

        $user->save();

        return to_route('members.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $profile_photo = $user->profile_photo_url;

        if (file_exists($profile_photo)) {
            unlink($profile_photo);
        }

        $user = User::destroy($id);

        return to_route('members')->with('success', 'User deleted!');
    }
}
