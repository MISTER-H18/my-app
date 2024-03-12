<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            $users = User::where('name', 'LIKE', "%$keyword%")->orWhere('last_name', 'LIKE', "%$keyword%")->orWhere('identity_card', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $users = User::paginate($perPage);
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
        //must validate first
        $user = new User;

        $user->identity_card = $request->identity_card;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->date_of_birth = $request->date_of_birth;
        $user->sex = $request->sex;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->marital_status_id = $request->marital_status_id;
        $user->occupation = $request->occupation;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('members.index')->with('success', 'New User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("members.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
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
