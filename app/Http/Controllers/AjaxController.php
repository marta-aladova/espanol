<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AjaxController extends Controller
{
    public function showEditWord(){
        $id = request('id');
        $word = DB::table('vocabularies')->where('id', $id)->first();
        return view('vocabulary.edit', compact('word'))->render();
    }
}
