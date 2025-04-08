<?php

namespace App\Http\Livewire\User\Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Session;
use Auth;
use App\Models\User;
use App\Mail\User\VerificationMail;
use Mail;

class Login extends Component
{
    public $email;
    public $password;
    public $resendmail = false;
    public $style = 'warning';

    public function render()
    {
        return view('livewire.user.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            $userName = $user->name;

            if($user->email_verified_at == null){
                // $data = [
                //     'url' => url('/').'/mail/verify?email='.base64_encode($this->email).'&key='.base64_encode($this->password),
                //     'name' => $user->name,
                // ];
        
                // Mail::to($this->email)->send(new VerificationMail($data));
                $this->style="warning";
                $this->resendmail = true;
                $this->addError('message', 'Please check your email to verify your account.');
            }else{
                $request->session()->put('USER_LOGIN', true);
                $request->session()->put('USER_NAME', $userName);
    
                session()->flash('success', 'Login success.');
                return redirect()->route('user.dashboard'); // Change the redirect path as needed
            }
        } else {
            // Authentication failed
            // session()->flash('error', 'Invalid credentials.');
            $this->addError('message', 'Invalid credentials.');
        }
    }

    public function verification(Request $request){

        $email = base64_decode($request->get('email'));
        $password = base64_decode($request->get('key'));
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $user->email_verified_at = now();
            $user->save();

            $userName = $user->name;
    
            $request->session()->put('USER_LOGIN', true);
            $request->session()->put('USER_NAME', $userName);

            session()->flash('success', 'Login success.');
            return redirect()->route('user.dashboard');
        } else {
            $this->addError('error', 'Invalid credentials.');
        }
    }

    public function resend_verification(){
        $user = Auth::user();

        $data = [
            'url' => url('/').'/mail/verify?email='.base64_encode($this->email).'&key='.base64_encode($this->password),
            'name' => $user->name,
        ];
        $this->resendmail = false;
        $this->style="success";
        Mail::to($this->email)->send(new VerificationMail($data));
        $this->addError('message', 'Email sent.');
    }
}
