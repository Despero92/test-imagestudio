<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $launchContent = Content::where('field_name', 'launch-content')->first();
        $instagramContent = Content::where('field_name', 'instagram-content')->first();
        $stages = DB::table('content')
            ->leftJoin('storage', 'content.file_id', '=', 'storage.file_id')
            ->where('section', 'stages')->orderBy('order', 'asc')->get();

        $data = array(
            'launchContent' => $launchContent,
            'instagramContent' => $instagramContent,
            'stages' => $stages
        );

        return view('frontend.layouts.index', $data);
    }
}
