<?php

namespace App\Http\Controllers;

use App\Karbar;
use App\Post;
use Illuminate\Http\Request;

class karbarsController extends Controller
{

    public function store($name){
        $karbar = new Karbar();

        $karbar->name = $name;

        $karbar->save();
    }

    public function show(){
        $karbars = Karbar::all();

        foreach ($karbars as $karbar){
            echo $karbar->name.' ';
            echo $karbar->id.'  ';
        }

    }

    public function deleteKarbar($name){
        $karbar = Karbar::where('name','=',$name)->firstOrFail();

        $karbar->delete();
    }


    public function forceDeleteKarbar($name){
        $karbar = Karbar::onlyTrashed()->where('name','=',$name)->firstOrFail();

        $karbar->forceDelete();
    }

    public function addPost($name,$namePost,$captionPost){
        $post = new Post();
            $post->name = $namePost;
            $post->caption = $captionPost;


        $karbar = Karbar::where('name','=',$name)->firstOrFail();

        $karbar->posts()->save($post);
    }





}
