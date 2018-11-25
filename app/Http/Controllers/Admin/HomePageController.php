<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller {

	public function index()
    {
        $launchContent = Content::where('field_name', 'launch-content')->first();
        $instagramContent = Content::where('field_name', 'instagram-content')->first();
        $stages = DB::table('content')
            ->leftJoin('storage', 'content.file_id', '=', 'storage.file_id')
            ->where('section', 'stages')->get();
        $startupList = Content::where('section', 'startup')->orderBy('order', 'ASC')->get();
        echo "<pre>"; print_r($startupList); echo "</pre>"; die;
        $data = array(
            'launchContent' => $launchContent,
            'instagramContent' => $instagramContent,
            'stages' => $stages,
            'startupList' => $startupList
        );
		return view('admin.homepage.index', $data);
	}
	
	public function updateLaunchContent(Request $request){
	    $this->validate($request,array(
	        'launch-content' => 'string'
        ));

        Content::updateOrCreate(array('field_name' => 'launch-content'), array(
            'value' => $request->input('launch-content')
        ));

        return redirect()->route('admin.homepage.index');
    }

    public function updateInstagramContent(Request $request){
        $this->validate($request,array(
            'instagram-content' => 'string'
        ));

        Content::updateOrCreate(array('field_name' => 'instagram-content'), array(
            'value' => $request->input('instagram-content')
        ));

        return redirect()->route('admin.homepage.index');
    }

}