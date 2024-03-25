<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function createForm()
    {
        return view('form.create');
    }

    public function storeForm(Request $request)
    {

        $validatedData = $request->validate([

            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'sex'=> 'required',
            'status'=> 'required',
            'nationality'=> 'required',
            'occupation'=> 'required',
            'email'=> 'required',
            'living_status'=> 'required',
            'birthdate'=> 'required',
            'address'=> 'required',
            'education'=> 'required',
            'awards'=> 'required'

        ]);

        // Create a new instance of the model
        $formData = new FormData();

        // Assign form data to the model's properties
        $formData->first_name = $request->input('first_name');
        $formData->middle_name = $request->input('middle_name');
        $formData->last_name = $request->input('last_name');
        $formData->sex = $request->input('sex');
        $formData->status = $request->input('status');
        $formData->nationality = $request->input('nationality');
        $formData->occupation =  $request->input('occupation');
        $formData->email = $request->input('email');
        $formData->living_status = $request->input('living_status');
        $formData->birthdate =  date("M-d-y", strtotime($request->input('birthdate')));
        $formData->address = $request->input('address');
        $formData->education = $request->input('education');
        $formData->awards = $request->input('awards');
        // Assign other form fields similarly

        // Save the data to the database
        $formData->save();

        // Redirect back or to a success page
        return redirect()->route('form.create')->with('success', 'Form submitted successfully!');
    }
}
