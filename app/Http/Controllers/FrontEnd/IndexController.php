<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class IndexController extends Controller
{
    public function index(){
        $launchContent = Content::where('field_name', 'launch-content')->first();

        $data = array(
            'launchContent' => $launchContent
        );

        return view('frontend.layouts.index', $data);
    }
}
