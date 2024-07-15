<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:8',
        ]);
    }

    protected function create(array $data)
    {
        $this->validator($data)->validate();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verify_token' => base64_encode($data['email']),
        ]);

        $email = new EmailVerification($user);
        Mail::to($user->email)->send($email);

        return $user;
    }

    public function postRegister(RegisterRequest $request)
    {
        event(new Registered($user = $this->create( $request->all() )));

        return view('auth.registered');
    }

    public function verify($email_token)
    {
        $user = '';
        
        if(User::where('email_verify_token', $email_token)->exists())
        {
            $user = User::where('email_verify_token', $email_token)->first();
            $dt_now = new Carbon();
            $dt_create = new Carbon($user->created_at);
            $dt_limit = $dt_create->addHour();
        }

        if(!$user)
        {
            Session::put('verify_error', '無効なトークンです');
            return view('thanks');
        }elseif($dt_now->gt($dt_limit)){
            Session::put('verify_error', 'メール認証の発行から一時間以上経過しています。新規アカウントを作成してください。');
            return view('thanks');
        }elseif($user->email_verified){
            Session::put('verify_message', 'すでに本登録されています。ログインして利用してください。');
            return view('thanks');
        }else{
            $user->verified();
            Session::put('verify_message', 'ご登録ありがとうございました。ログインして利用してください。');
            return view('thanks');
        }
           
    }
}
