<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VocabularyController extends Controller
{
    public function show(){
        $vocabulary = DB::table('vocabularies')->simplePaginate(25);
        return view('vocabulary.show' , compact('vocabulary'));
    }

    public function create(){
        $data = request()->validate([
            'es' => ['required', 'unique:vocabularies', 'max:255'],
            'lt' => ['required'],
            'lesson_id' => ['required'],
        ]);
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('vocabularies')->insert($data);
        return back();
    }

    public function search(){
        $data = request()->validate(['search'=>['required']]);
        $search = $data['search'];
        $vocabulary = DB::table('vocabularies')
            ->where('es', 'like', '%'.$search.'%')
            ->orWhere('lt', 'like', '%'.$search.'%')
            ->orWhere('lesson_id', 'like', '%'.$search.'%')->simplePaginate(25);
        $search = $data['search'];
        return view('vocabulary.show' , compact('vocabulary', 'search'));
    }

    public function delete(){
        $id = request('id');
        DB::table('vocabularies')->where('id', $id)->delete();
        return back();
    }

    public function edit(){
        $data = request()->validate([
            'id' => ['required'],
            'es'=>['required'],
            'lt'=>['required'],
            'lesson_id'=>['required']
        ]);
        DB::table('vocabularies')->where('id', $data['id'])->update($data);
        return back();
    }
}
