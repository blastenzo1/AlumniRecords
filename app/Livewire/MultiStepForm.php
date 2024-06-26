<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use App\Models\Alumni;
use App\Models\Address;
use App\Models\EducationAttainment;
use App\Models\Country;
use App\Models\Nationality;
use Illuminate\Contracts\View\View;

class MultiStepForm extends Component
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
        return view('livewire.multi-step-form', compact('countries', 'courses', 'nationalities'));
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
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

    public function add(){
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
            "created_at"=> now(),
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
            "created_at"=> now(),
        );

        $education_values = array(
            "info_id" => $alumni_id,
            "course"=> $this->course,
            "year_attended"=>$this->year_attended,
            "created_at"=> now(),
        );

        Address::insert($address_values);
        EducationAttainment::insert($education_values);

        $this->reset();
        $this->currentStep = 1;

        $alumni = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'birthdate' => $this->birthdate,
            'sex' => $this->sex,
            'nationality' => $this->nationality,
            'status' => $this->status,
            'spouse' => $this->spouse,
            'number' => $this->number,
            'email' => $this->email,

            'current_street' => $this->current_street,
            'current_city' => $this->current_city,
            'current_country' => $this->current_country,
            'current_zip_code' => $this->current_zip_code,
            'home_street' => $this->home_street,
            'home_city' => $this->home_city,
            'home_country' => $this->home_country,
            'home_zip_code' => $this->home_zip_code,

            'course' => $this->course,
            'year_attended' => $this->year_attended,
        ];

        return redirect('results')->with(compact('alumni'));
    }
}
