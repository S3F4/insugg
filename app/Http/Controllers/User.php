<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = new \App\User();
		$users = $users->orderBy('userid', 'DESC')
			->paginate(20);
		return view('user.users')->with('users', $users);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id,$get=null)
	{
		$user = \App\User::find($id);
		if($get == "insuggs"){
			$insuggs = $user->insuggs()->paginate(20);
			return view('user.profile')
				->with('user', $user)
				->with('insuggs', $insuggs);
		}else if($get=="suggestions"){
			$suggestions = $user->suggestions()->paginate(20);
			return view('user.profile')
				->with('user', $user)
				->with('suggestions', $suggestions);
		}else{
			$insuggs = $user->insuggs()->paginate(20);
			return view('user.profile')
				->with('user', $user)
				->with('insuggs', $insuggs);
		}
	}

	/**
	 *
	 */
	public function profile($get=null)
	{
		if (Auth::check()) {
			$user = \App\User::find(Auth::user()->userid);
			if($get == "insuggs"){
				$insuggs = $user->insuggs()->paginate(20);
				return view('user.profile')
					->with('user', $user)
					->with('insuggs', $insuggs);
			}else if($get=="suggestions"){
				$suggestions = $user->suggestions()->paginate(20);
				return view('user.profile')
					->with('user', $user)
					->with('suggestions', $suggestions);
			}else{
				$insuggs = $user->insuggs()->paginate(20);
				return view('user.profile')
					->with('user', $user)
					->with('insuggs', $insuggs);
			}
		} else {
			return view('auth.login');
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request $request
	 * @param  int $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
