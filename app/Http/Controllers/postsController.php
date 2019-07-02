<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use App\Karbar;
use App\Post;
use Validator;
use Illuminate\Http\Request;

class postsController extends Controller
{

    public function show(){
        $posts = Post::all();

        foreach ($posts as $post){
            echo $post->karbar->name.' ==> '
                .$post->name.' : '
                .$post->caption.' ';
        }

    }



    public function deletePost($name){
        $post = Post::where('name','=',$name)->firstOrFail();

        $post->delete();
    }


    public function forceDeletePost($name){
        $post = Post::onlyTrashed()->where('name','=',$name)->firstOrFail();

        $post->forceDelete();
    }

    public function dissociate($namePost){
        $post = Post::where('name' , $namePost)->FirstOrFail();

        $post->karbar()->dissociate();

        $post->save();

    }

    public function associate($name,$namePost){

        $post = Post::where('name' , $namePost)->FirstOrFail();

        $karbar = Karbar::where('name',$name)->FirstOrFail();

        $post->karbar()->associate($karbar);

        $post->save();


    }

    public function store(Request $request){
        $messages = [
            'username.required' => 'Khare!, Ma bayad bedonim to ki hasti ya na???!!',
            'password.required' => 'Oskol! har khari miad to alan!',
            'email.required' => 'Azizam! aval bro email besaz bad mesl gav bia enja! affarin',
        ];

        $rules = [
            'username' => 'bail|required|min:2',
            'email' => 'required',
            'password' => 'required',
        ];

      $validator = Validator::make($request->all() , $rules , $messages);


        if ($validator->fails()){
            return redirect('/form/error')
                ->withErrors($validator)
                ->withInput();
        }
       // $request->validated();

        echo('OK');
    }




}
