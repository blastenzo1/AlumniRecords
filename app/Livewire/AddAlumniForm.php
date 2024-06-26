<?php

namespace App\Livewire;

use App\Models\Country;
use App\Models\Course;
use App\Models\Nationality;
use Livewire\Component;
use App\Models\Alumni;
use App\Models\Address;
use App\Models\EducationAttainment;

class AddAlumniForm extends Component
{
    public $last_name;
    public $first_name;
    public $middle_name;
    public $birthdate;
    public $sex;
    public $nationality;
    public $status;
    public $spouse;
    public $number;
    public $email;

    public $current_street;
    public $current_city;
    public $current_country;
    public $current_zip_code;
    public $home_street;
    public $home_city;
    public $home_country;
    public $home_zip_code;

    public $course;
    public $year_attended;

    public $totalSteps = 3;
    public $currentStep = 1;


    public function mount(){
        $this->currentStep = 1;
    }

    public function render()
    {
        $countries = Country::all();
        $courses = Course::all();
        $nationalities = Nationality::all();
        return view('livewire.add-alumni-form', compact('countries', 'courses', 'nationalities'));
    }
    public function increaseStep(){
        dd('increaseStep() function called. Current step: ' . $this->currentStep);
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        dd('decreaseStep() function called. Current step: ' . $this->currentStep);
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'middle_name' => 'required',
                'birthdate' => 'required',
                'sex' => 'required',
                'nationality' => 'required',
                'status' => 'required',
                'spouse' => 'required',
                'number' => 'required|numeric',
                'email' => 'required|email',
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'current_street' => 'required',
                'current_city' => 'required',
                'current_country' => 'required',
                'current_zip_code' => 'required|numeric',
                'home_street' => 'required',
                'home_city' => 'required',
                'home_country' => 'required',
                'home_zip_code' => 'required|numeric',
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'course' => 'required|string',
                'year_attended' => 'required|string',
            ]);
        }
    }

    public function add_alumni(){
        dd('add_alumni() function called. Current step: ');
        $this->resetErrorBag();
        $alumni_values = array(
            "last_name"=>$this->last_name,
            "middle_name"=>$this->middle_name,
            "first_name"=>$this->first_name,
            "birthdate"=>$this->birthdate,
            "sex"=>$this->sex,
            "nationality"=>$this->nationality,
            "status"=>$this->status,
            "spouse"=>$this->spouse,
            "number"=>$this->number,
            "email"=>$this->email,
        );
        $alumni_id = Alumni::insertGetId($alumni_values);

        $address_values = array(
            "info_id" => $alumni_id,
            "current_street"=>$this->current_street,
            "current_city"=>$this->current_city,
            "current_country"=>$this->current_country,
            "current_zip_code"=>$this->current_zip_code,
            "home_street"=>$this->home_street,
            "home_city"=>$this->home_city,
            "home_country"=>$this->home_country,
            "home_zip_code"=>$this->home_zip_code,
        );

        $education_values = array(
            "info_id" => $alumni_id,
            "course"=>$this->course,
            "year_attended"=>$this->year_attended,
        );

        Address::insert($address_values);
        EducationAttainment::insert($education_values);

        $this->reset();
        $this->currentStep = 1;
        $data = ['name' => $this->first_name . ' ' . $this->last_name, 'email' => $this->email];
        $message = 'Alumni was successfully added!';
        return redirect()->back()->with('success', $message)->with('data', $data);
    }
}
