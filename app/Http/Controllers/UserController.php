<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    public function index() {
        $users = User::all();
        return view('staff.users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
        dd('htest');
        try {
            $validated_data = $request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        User::create($validated_data);

        return redirect()->back()->with('success', 'User successfully added!');
    }

    public function update(UserRequest $request, $id)
    {
        dd('htest');
        try {
            $validated_data = $request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $User = User::findOrFail($id);
        $User->update($validated_data);

        return redirect()->back()->with('success', 'User successfully updated!');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return redirect()->back()->with('success', 'User successfully deleted!');
    }
}
