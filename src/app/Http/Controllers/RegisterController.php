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
        $user = User::where('email_verify_token', $email_token)->first();

        if(!$user)
        {
            Session::put('error', '無効なトークンです');
            return view('thanks');
        }elseif($user->email_verified){
            Session::put('message', 'すでに本登録されています。ログインして利用してください。');
            return view('thanks');
        }else{
            $user->verified();
            Session::put('message', 'ご登録ありがとうございました。ログインして利用してください。');
            return view('thanks');
        }   
    }

    public function thanks()
    {
        return view('thanks');
    }
}
