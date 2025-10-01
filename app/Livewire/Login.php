<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $remember = false;

    public function login()
    {
        // dd("asdf");
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            return redirect()->intended('/dashboard');
        }

        session()->flash('error', 'Invalid credentials. Please try again.');
    }


    #[Layout('components.layouts.login')]
    public function render()
    {
        return view('livewire.login');
    }
}
