<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use  Livewire\Attributes\Validate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
#[Validate('required|min:3')]
    public string $name="";
    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:8|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';
    public function render()
    {
        return view('livewire.auth.⚡register')->layout('layouts.app');
    }

    public function register()
    {
        // $this->validate(
        //     [
        //         'name' => ['required', 'string', 'min:3'],
        //         'email' => ['required', 'email'],
        //         'password' => ['required', 'min:8', 'confirmed'],
        //     ],
        //     [
        //         'name.required' => 'Please enter your name.',
        //         'email.required' => 'Please enter your email.',
        //         'email.email' => 'Please enter a valid email.',
        //         'password.required' => 'Please enter your password.',
        //         'password.min' => 'Password must be at least 8 characters.',
        //         'password.confirmed' => 'Passwords do not match.',
        //     ]
        // );

    $this->validate();
       $user= User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password),

        ]);

       Auth::login($user);

       return redirect()->to('/')->with('success','welcome ');
    }
}
