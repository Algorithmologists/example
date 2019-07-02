<?php

namespace App\Http\Controllers;

use App\Moodle;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MoodlesController extends Controller
{
    public function showCreateTime(){
        /*
        $fake_data = collect(
            ['collection' => [
                                ['name'=>'ali' , 'created_at' => 5],
                                ['name'=>'hossein' , 'created_at'=>25]
                            ]
        ]);*/

//        $data = ['collection' => [['created_at'=>1],['created_at'=>2],['created_at'=>3]] ];

        //$collection = collect([['created_at'=>'1'],['created_at'=>'2'],['created_at'=>'3']]);
        $collection = Moodle::FindORFAIL([3]);

        $data['collection'] = $collection;

        return view('moodles',$data);
    }

    public function store($name,$phone){
        $moodle = new Moodle();
        $moodle->name = $name;
        $moodle->phone = $phone;
        $moodle->save();
    }

    public function update($id){
        $moodle = Moodle::findOrFail($id);
        $moodle->created_at = '1999-04-15 05:05:05';
        $moodle->save();
    }

    public function updateAll(){
        Moodle::where('created_at','1999-04-15 05:05:04')
            ->update(['created_at'=>'1999-04-15 05:05:06']);
    }

    public function delete($id){
        $moodle = Moodle::findOrFail($id);
        $moodle->delete();

    }

    public function forceDelete($id){
        $moodle = Moodle::onlyTrashed()->findOrFail($id);

        $moodle->forceDelete();


    }

    public function restore($id){
        $moodle = Moodle::onlyTrashed()->findOrFail($id);

        $moodle->restore();

    }

    public function showNames(){
        $names = DB::table('moodles')->pluck('name');

        foreach ($names as $name){
            echo $name.'   ';
        }

    }

    public function searchPhone($name){
        $phone = DB::table('moodles')
            ->where('name',$name)
            ->value('phone');

        echo $phone;
    }

    private function processUser($id){
        $user = Moodle::findOrFail($id);
        $user->phone = '+'.$user->phone;
        $user->save();
    }

    public function chunkChunk(){
        DB::table('moodles')
            ->orderBy('id')
            ->chunk(6,function ($users){
                foreach ($users as $user) {
                    $this->processUser($user->id);
                }
            });



    }

}
