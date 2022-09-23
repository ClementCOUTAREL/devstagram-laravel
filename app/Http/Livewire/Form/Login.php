<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules =[
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function submit()
    {
        $this->validate();

        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            return back()->with('message','Incorrect credentials provided, please try again');
        }
        
        return redirect()->route('home', auth()->user()->name);

    }

    public function render()
    {
        return view('livewire.form.login');
    }
}