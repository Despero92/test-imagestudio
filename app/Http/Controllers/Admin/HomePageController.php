<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;

class HomePageController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
        $launchContent = Content::where('field_name', 'launch-content')->first();
        $instagramContent = Content::where('field_name', 'instagram-content')->first();

        $data = array(
            'launchContent' => $launchContent,
            'instagramContent' => $instagramContent
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