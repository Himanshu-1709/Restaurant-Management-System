<?php

namespace App\Http\Livewire\User\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use App\Mail\User\VerificationMail;
use Mail;
class Register extends Component
{
    public $name;
    public $slug;
    public $email;
    public $password;
    protected $listeners = ['generateSlug'];

    public function render()
    {
        return view('livewire.user.auth.register');
    }

    public function generateSlug()
    {
        $this->slug = strtolower(str_replace(' ', '-', $this->name));
    }

    public function register(Request $request)
    {
        $this->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);


        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'slug' => Str::slug($this->name , "-"),
        ]);

        $data = [
            'url' => url('/').'/mail/verify?email='.base64_encode($this->email).'&key='.base64_encode($this->password),
            'name' => $this->name,
        ];

        Mail::to($this->email)->send(new VerificationMail($data));
        session()->flash('message', 'Please check your email to verify your account.');

        return redirect()->route('user.login'); // Change the redirect path as needed
    }
}
