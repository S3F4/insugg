<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Suggestion extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$suggestions = \App\Suggestion::paginate(15);
		return view('suggestions')->with("suggestions", $suggestions);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		if (Auth::check()) {
			$suggestion = new \App\Suggestion();
			$suggestion->suggestion = $request->suggestion;
			$suggestion->userid = $request->user()->userid;
			$suggestion->requestip = $request->getClientIp();
			$suggestion->save();
		} else {
			return "get out here";
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show($id)
	{
		$suggestion = \App\Suggestion::where('suggestionid', $id)->first();
		return $suggestion;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('suggestion.edit');
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
		if (Auth::check()) {
			$suggestion = \App\Suggestion::where('suggestionid', $id)
				->where('userid', Auth::user()->userid);
			if ($suggestion) {
				$suggestion->suggestion = $request->suggestion;
				if ($suggestion->save()) {
					return Redirect::to('http://insugg.com');
				} else {
					return Redirect::to('http://insugg.com/fail');
				}
			}
		} else {
			return "get out";
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::check()) {
			$suggestion = \App\Suggestion::where('suggestionid', $id);
			if ($suggestion) {
				if ($suggestion->destroy()) {
					return Redirect::to('http://insugg.com');
				} else {
					return 0;
				}
			}
		}else{
			return "get out";
		}

	}
}
