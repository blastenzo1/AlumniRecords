<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataFormRequest;
use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function createForm()
    {
        return view('form.create');
    }

    public function storeForm(DataFormRequest $request)
    {

        // Create a new instance of the model
        $formData = new FormData();

        // Assign form data to the model's properties
        $formData->first_name = $request->input('first_name');
        $formData->middle_name = $request->input('middle_name');
        $formData->last_name = $request->input('last_name');
        $formData->birthdate = date("M-d-y", strtotime($request->input('birthdate')));
        $formData->sex = $request->input('sex');
        $formData->nationality = $request->input('nationality');
        $formData->status = $request->input('status');
        $formData->spouse = $request->input('spouse');
        $formData->number = $request->input('number');
        $formData->email = $request->input('email');
        $formData->occupation = $request->input('occupation');

        // Save the data to the database
        $formData->save();

        // Redirect back or to a success page
        return redirect()->route('welcome')->with('success', 'Form submitted successfully!');
    }
}
