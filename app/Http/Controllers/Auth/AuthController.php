<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $username = 'useremail';

	protected $redirectPath = '/profile'; //todo yönlendirme işlemiburada

	protected $loginPath = '/auth/login';//todo if user not authenticated redirect to that

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{

		return Validator::make($data, [
			'username' => 'required|max:255',
			'useremail' => 'required|email|max:255',
			'password' => 'required|confirmed|min:6',
		]);
	}




	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'username' => $data['username'],
			'useremail' => $data['useremail'],
			'password' => bcrypt($data['password']),
		]);
	}
}
