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
        $users = User::paginate(10);
        return view('staff.users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('first_name', 'like', '%' . $query . '%')
            ->orWhere('middle_name', 'like', '%' . $query . '%')
            ->orWhere('last_name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->orWhere('user_type', 'like', '%' . $query . '%')
            ->paginate(10);

        return view('staff.users.index', compact('users'));
    }

    public function store(UserRequest $request)
    {
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
