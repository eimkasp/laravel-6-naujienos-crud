<?php

namespace App\Http\Controllers;

use App\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class NewsController extends Controller {



	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
		$newsItems = NewsItem::with( 'comments' )->paginate( 10 )->sortBy( function ( $item ) {
			return $item->comments->count() * - 1;
		} );


		return view( 'news.index', compact( 'newsItems' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//

		return view('news.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//

		$request->validate([
			'title' => 'required',
			'content' => 'required|min:10',
		]);

		$newsItem = new NewsItem();
		$newsItem->title = $request->input('title');
		$newsItem->content = $request->input('content');
		$newsItem->image = "";
		// sita eilute grazina prisijungusio vartotojo ID
		// jei naudoju Auth::user(), tai Failo Viršuje nepamirsti parasyti: use Auth
		$newsItem->user_id = Auth::user()->id;

		$newsItem->save();


		// Failo Viršuje butinai prideti:
	    // use Illuminate\Support\Facades\Session;
		Session::flash('status', 'Sekmingai sukurta naujiena!');
		Session::flash('status_class', 'alert-success');

		// nukreipiame vartotoja i musu sukurta naujiena
		return redirect()->route('news.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		//
		$newsItem = NewsItem::findOrFail( $id );

		return view( 'news.show', compact( 'newsItem' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
		$newsItem = NewsItem::findOrFail( $id );

		foreach ($newsItem->comments as $comment) {
			$comment->delete();
		}

		$newsItem->delete();

		Session::flash('status', 'Sekmingai istrinta naujiena!');
		Session::flash('status_class', 'alert-danger');

		return redirect()->route( 'news.index' );
	}
}
