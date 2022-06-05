<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //

    public function store(Request $request,$id){

        // $data=$request->validate([
        //     'textAreaComment'=>'required|max:150',
        // ]);

         $textAreaComment = $request->input('textAreaComment');
         //dd($id);
         //dd($textAreaComment);
        /*$request->input() :: Can work with any HTTP verb( Ex. GET,POST,..)
        $request->query() :: Can only retrieve data passed from query string( GET method )

        in native PHP coding.
        $request->input() is the equivalent of $_REQUEST  //this is either querystring or form-data submission.
        $request->query() is just a straight forward $_GET   //this is querystring

        $textAreaComment = $request->'textAreaComment'; //this works as well!
        */
            $comment = new Comment();

            /*this works as welll
                $comment = Comment::create([
                'comment' =>  $textAreaComment ,
                ]);
                //However, before using the create method, you will need to specify either a fillable or guarded property on your model class , cause  of the mass assignment ERROR
                //REFRENCEs: https://laravel.com/docs/8.x/eloquent#inserts
            */
            $comment->comment = $textAreaComment; //$comment->comment = $request->textAreaComment
            $comment->post_id = $id; // $id refers to post id present in the route /p/$id
            $comment->user_id = auth()->user()->id;

                //dd($comment);

                //dd($request->path());
            $comment->save();

            return back();


    }
}
