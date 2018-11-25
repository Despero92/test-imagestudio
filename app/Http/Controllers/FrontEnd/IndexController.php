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
        $startupList = Content::where('section', 'startup')->orderBy('order', 'ASC')->get();
        //echo "<pre>"; print_r($startupList); echo "</pre>"; die;

        $data = array(
            'launchContent' => $launchContent,
            'instagramContent' => $instagramContent,
            'stages' => $stages,
            'startupList' => $startupList
        );

        return view('frontend.layouts.index', $data);
    }
}
