<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Response;



class CommentController extends Controller
{
    /**
     * Send back all comments as JSON
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Comment::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        Comment::create(array(
            'namefilm' => Input::get('namefilm'),
            'year' => Input::get('year'),
            'totalpeople' => Input::get('totalpeople'),
            'rating' => Input::get('rating')
        ));

        return Response::json(array('success' => true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);

        return Response::json(array('success' => true));
    }
}
