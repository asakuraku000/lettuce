<?php

namespace App\Livewire;

use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class AccountsManagement extends Component
{

    public $email;
    public $lastname;
    public $firstname;

    public $password;

    public function newAccount()
    {
        // dd('asdf');
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'password' => 'required|min:5'
        ]);

        User::create([
            'email' => $this->email,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'password' => $this->password
        ]);
    }

    public function deleteAccount($id)
    {
        LivewireAlert::title('Are you sure you want to delete this account?')
            ->withConfirmButton() // Enables button with default text
            ->confirmButtonText('Yes')
            ->confirmButtonColor('Red')
            ->onConfirm('delete', ['id' => $id])
            ->denyButtonText('No')
            ->withCancelButton()  // Enables button with default text
            ->show();
    }
    public function delete($data)
    {
        $id = $data['id'];
        User::find($id)->delete();
        
        LivewireAlert::title('Success')
            ->text('User Account Deleted!')
            ->success()
            ->show();
    }   

    public function render()
    {
        return view('livewire.accounts-management')->with([
            'users' => User::all(),

        ]);
    }
}
