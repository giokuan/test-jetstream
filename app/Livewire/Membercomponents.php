<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Membercomponents extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $last_name= '';

    #[Validate('required')]
    public $first_name='';

    #[Validate('required')]
    public $middle_name='';
    public $email="";
    public $phone="";
    public $aka="";
    public $batch_name="";
    public $t_birt="";
    public $gt="";
    public $current_chapter="";
    public $root_chapter="";
    public $status="";
    public $address="";
    public $photo="";
    public $region="";
    public $province="";
    public $municipality="";
    public $barangay="";

    public $user = Auth::user();

    public function save()
    {
        $user = Auth::user();

        $lastNameInitial = strtoupper(substr($this->last_name, 0, 1));
        $firstNameInitial = strtoupper(substr($this->first_name, 0, 1));
        $middleNameInitial = strtoupper(substr($this->middle_name ?? '', 0, 1)); // Use middle_name if provided
        $birthday = date('Ymd', strtotime($this->t_birt));
        $randomNumber = rand(100000, 999999); // Generate a random 6-digit number
        $memberId = $lastNameInitial . $firstNameInitial . $middleNameInitial . $birthday . $randomNumber;

        $validatedData = $this->validate([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            // Add other form fields here...
            'user_id' => $user->id,
            'member_id' => $memberId,
            't_birth'=>$this->t_birth,
            'email'=>$this->email,
            'aka'=>$this->aka,
            'gt'=>$this->gt,
            'phone'=>$this->phone,
            'batch_name'=>$this->batch_name,
            'current_chapter'=>$this->current_chapter,
            'root_chapter'=>$this->root_chapter,
            'status'=>$this->status,
            'photo'=>$this->photo,
            'user_type'=>$user->role,
            'region'=>$this->region,
            'province'=>$this->province,
            'municipality'=>$this->municiplaity,
            'barangay'=>$this->barangay,
            'address'=>$this->address,
        ]);

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('photos', 'public'); // Store the photo in the 'public/photos' directory
        }

   
        $member = new Member($validatedData);
        $member->user_id = $user->id;
        $member->member_id = $memberId;
        $member->last_name = $this->last_name;
        $member->first_name = $this->first_name;
        $member->middle_name = $this->middle_name;
        $member->email = $this->email;    
        $member->phone = $this->phone;
        $member->aka = $this->aka;
        $member->t_birth = $this->t_birth;                                              
        $member->batch_name = $this->batch_name;

        $member->current_chapter = $this->current_chapter;
        $member->root_chapter = $this->root_chapter;
        $member->status = $this->status;
        $member->photo = $this->photo;
        $member->region = $this->region;
        $member->province = $this->province;
        $member->city = $this->city;
        $member->barangay = $this->barangay;
        $member->address = $this->address;



        $member->save();

        $this->reset();

        // Optionally, you can emit an event or perform any other actions after saving

        // For demonstration purposes, let's redirect back to the form
        return redirect()->back()->with('success', 'Profile saved successfully!');
        
        

    }
    public function render()
    {
        return view('livewire.member');
    }
}
