<?php

namespace App\Http\Livewire\User\Setting;

use Livewire\Component;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use File;

class Account extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $logo;

    public function mount()
    {
        // Initialize your properties with user data
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function render()
    {
        // $user = Auth::user();
        // $this->username = $user->name;
        // $this->email = $user->email;
        return view('livewire.user.setting.account');
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|unique:users,name,' . auth()->user()->id,
        ]);

        if ($this->logo) {
            $name = time() . rand(1, 100) . '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('logos', $name, 'public');

            $image_path = "user/assets/logos/" . auth()->user()->logo;

            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        DB::table('users')->where('id',auth()->user()->id)->update([
            'name' => $this->name,
            'logo' => $this->logo == '' ? auth()->user()->logo : $name,
            'password' => $this->password == '' ? auth()->user()->password : hash::make($this->password), // Remember to hash the password
        ]);

        // Handle logo update
        

        session()->flash('success', 'Profile updated successfully!');

    }
}
