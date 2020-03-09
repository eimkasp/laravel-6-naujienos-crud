<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
// Jei naudojame Auth klase, reikai parasyti:

use Auth;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$comment = new Comment();

		$comment->content = $request->input('content');

		// gauname dabartiinio prisijungusio varototjo objekta
		$comment->user_id = Auth::user()->id;
		$comment->news_id = $request->input('news_id');
//		$comment->user_id = Auth::id();

		$comment->save();



		// avaizduoti sesijos zinute viena karta galime taip:
		//$request->session()->flash('status', 'Komentaras sekmingai pridetas!');

		// arba taip:
		Session::flash('status', 'Komentaras sekmingai pridetas!');


		// graziname i pries tai aplankyta puslapi
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
