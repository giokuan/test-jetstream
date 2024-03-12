<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

use App\Models\Brod;
use App\Models\User;
use Livewire\WithFileUploads;



class Brods extends Component
{
    use WithFileUploads;

    #[Rule ("required")]
    public $last_name ="";

    #[Rule ("required")]
    public $first_name ="";

    #[Rule ("required")]
    public $middle_name ="";

    #[Rule ("nullable")]
    public $photo = 'storage/default.jpg';

    public $user;


    public function save()

{
    
    $validatedData = $this->validate([
        'last_name' => 'required',
        'first_name'=> 'required',
        'middle_name'=> 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


   
     

        Brod::create($validatedData);

        if ($this->photo !== null) {
            // If a photo is uploaded, store it
            $validatedData['photo'] = $this->photo->store('uploads', 'public');
        } else {
            // If no photo is uploaded, use the default photo path
            $validatedData['photo'] = 'storage/default.jpg';
        }
        

        $this->reset();

        session()->flash('success', 'Profile saved successfully!');
        return redirect()->back()->with('success', 'Profile saved successfully!');

        
    }
    public function mount()
    {
        $this->user = Auth::user(); // Retrieve the authenticated user
    }


    public function render()
    {
        return view('livewire.brods');
    }
}
