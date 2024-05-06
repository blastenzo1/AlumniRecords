<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressFormRequest;
use App\Http\Requests\DataFormRequest;
use App\Http\Requests\EducationFormRequest;
use App\Models\Address;
use App\Models\Alumni;
use App\Models\Country;
use App\Models\Course;
use App\Models\EducationAttainment;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::paginate(10);
        return view('staff.records.index', compact('alumnis'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $alumnis = Alumni::where('first_name', 'like', '%' . $query . '%')
                    ->orWhere('middle_name', 'like', '%' . $query . '%')
                    ->orWhere('last_name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('number', 'like', '%' . $query . '%')
                    ->orWhere('sex', 'like', '%' . $query . '%')
                    ->orWhere('nationality', 'like', '%' . $query . '%')
                    ->paginate(10);

        return view('staff.records.index', compact('alumnis'));
    }

    public function add_page()
    {
        $countries = Country::all();
        $courses = Course::all();
        $nationalities = Nationality::all();
        return view('Staff.Records.add-page', compact('countries', 'courses', 'nationalities'));
    }

    public function add_alumni(DataFormRequest $data_request, AddressFormRequest $address_request, EducationFormRequest $education_request) {
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

        return redirect()->back()->with('success', 'Alumni submitted successfully!');
    }

    public function edit_page($id)
    {
        $alumni = Alumni::find($id);
        $address = Address::where('info_id', $id)->first();
        $education = EducationAttainment::where('info_id', $id)->first();

        $countries = Country::all();
        $courses = Course::all();
        $nationalities = Nationality::all();
        return view('Staff.Records.edit-page', compact('alumni', 'address', 'education', 'countries', 'courses', 'nationalities'));
    }

    public function update_alumni(DataFormRequest $data_request, AddressFormRequest $address_request, EducationFormRequest $education_request, $id) {
        try {
            $validated_data = $data_request->validated();
            $validated_address = $address_request->validated();
            $validated_education = $education_request->validated();
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }

        $alumni = Alumni::findOrFail($id);
        $address = Address::where('info_id', $id)->first();
        $education = EducationAttainment::where('info_id', $id)->first();


        $alumni->update($validated_data);
        $address->update($validated_address);
        $education->update($validated_education);

        return redirect()->back()->with('success', 'Alumni updated successfully!');
    }

    public function view($id) {
        $alumni = Alumni::where('id', '=', $id)->first();
        $address = Address::where('info_id', '=', $id)->first();
        $educationAttainment = EducationAttainment::where('info_id', '=', $id)->first();
        return view('staff.records.view', compact('alumni', 'address', 'educationAttainment'));
    }

    public function destroy($id)
    {
        try {
            $alumni = Alumni::findOrFail($id);
            EducationAttainment::where('info_id', $id)->delete();
            Address::where('info_id', $id)->delete();
            $alumni->delete();

            return redirect()->back()->with('success', 'Alumni record and associated data successfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the alumni record: ' . $e->getMessage());
        }
    }
}



