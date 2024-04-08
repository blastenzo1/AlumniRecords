<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressFormRequest;
use Illuminate\Http\Request;
use App\Models\FormData;
use App\Models\Alumni;
use App\Models\Address;
use App\Models\EducationAttainment;
use App\Http\Requests\DataFormRequest;
use App\Http\Requests\EducationFormRequest;
use Illuminate\Validation\ValidationException;


class FormController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(DataFormRequest $data_request, AddressFormRequest $address_request, EducationFormRequest $education_request)
    {
        try {
            $validated_data = $data_request->validated();
            $validated_address = $address_request->validated();
            $validated_education = $education_request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        Alumni::create($validated_data);
        Address::create($validated_address);
        EducationAttainment::create($validated_education);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function storeEducationForm(EducationFormRequest $request)
    {
        // Create a new instance of the EducationAttainment model
        // $educationAttainment = new EducationAttainment();

        // Assign education form data to the model's properties
        // $educationAttainment->info_id = $request->input('info_id');
        // $educationAttainment->course_degree = $request->input('course_degree');
        // $educationAttainment->year_graduated_attended = $request->input('year_graduated_attended');

        // // Save the education data to the database
        // $educationAttainment->save();

        // Create or update person details
        $Alumni = Alumni::Create(
            ['id' => $request->alumni_id],
            $request->only(['first_name', 'middle_name', 'last_name', 'birthdate', 'sex', 'status', 'nationality', 'occupation', 'email'])
        );

        // Create or update current address
        $Alumni->addresses()->Create(
            ['type' => 'current'],
            $request->only(['current_street', 'current_city_province', 'current_country', 'current_zipcode'])
        );

        // Create or update home address
        $Alumni->addresses()->Create(
            ['type' => 'home'],
            $request->only(['home_street', 'home_city', 'home_country', 'home_zipcode'])
        );

        // Redirect back or to a success page
        return redirect()->route('welcome')->with('success', 'Education form submitted successfully!');
    }
}
