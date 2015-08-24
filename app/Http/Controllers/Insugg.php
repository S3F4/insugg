<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Insugg as InsuggModel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class Insugg extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$insuggs = InsuggModel::where('is_active', '0')
			->orderBy('insuggid', 'DESC')
			->paginate(20);
		return view("insugg.insuggs")->with("insuggs", $insuggs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check())
			return view("insugg.createInsugg");
		else
			return Redirect::to("http://insugg.com");
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
			$insugg = new InsuggModel();
			$insugg->insuggtitle = $request->insuggTitle;
			$insugg->insuggcontent = $request->insuggContent;
			$insugg->requestIp = $request->getClientIp();
			$insuggid = 0;
			if($insugg->save()){
				$insuggid = $insugg->insuggid;
			}
			$tags = $request->tags;
			$tags = explode(' ',$tags);
			foreach($tags as $tag){
				$tagOnTagMap = \App\Tag::where('tag',$tag)->first();
				if(($tagOnTagMap) != null){
					\App\Tagmap::insert([
						'tagid' => $tagOnTagMap->tagid,
						'insuggid' => $insuggid
					]);
				}else{
					$tagNew = new \App\Tag();
					$tagNew->tag = $tag;
					if($tagNew->save()){
						\App\Tagmap::insert([
							'tagid' => $tagNew->tagid,
							'insuggid' => $insuggid
						]);
					}
				}
			}
			return Redirect::to('http://insugg.com');
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
		$insugg = InsuggModel::where('insuggid', $id)->first();
		$suggestions = $insugg->suggestions()->get();
		return view('insugg.insugg')->with(['insugg' => $insugg , 'suggestions' => $suggestions]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit($id, Request $request)
	{
		return view('insugg.editInsugg')->with('id', $id);
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
			$insugg = \App\Insugg::where('insuggid', $id)
				//->where('userid',Auth::user()->userid)
				->first();
			if ($insugg) {
				$insugg->insuggtitle = $request->insuggTitle;
				$insugg->insuggcontent = $request->insuggContent;
				$insugg->requestIp = $request->getClientIp();
				$insugg->save();
				return Redirect::to('http://insugg.com');
			} else {
				return "update gerçekleşmedi";
			}

		} else {
			return "get out here";
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
		DB::delete("DELETE FROM insugg WHERE insuggid = ?",[$id]);
		//$query = DB::statement("CALL delete_insugg()");
		//var_dump($query);die;
		return Redirect::to('http://insugg.com');
	}
}
