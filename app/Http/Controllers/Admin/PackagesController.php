<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Packages;

class PackagesController extends Controller {

	/**
	 * Index page
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index()
    {
        $packages = DB::table('packages')->get();

        $data = [
            'packages' => $packages
        ];

		return view('admin.packages.index', $data);
	}
	
	public function createPackage(Request $request){

	    if ($request->isMethod('post')) {

            $this->validate($request, [
                'title' => 'required|max:255|string',
                'price' => 'required|integer'
            ]);

                Packages::insert([
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'order' => $request->input('order')
            ]);
            return redirect()->route('admin.packages.index');
        }
        return view('admin.packages.create');
    }

    public function editPackage($id){

        $row = Packages::find($id);
        //echo "<pre>"; print_r($row); echo "</pre>"; die;

        return view('admin.packages.edit', compact('row'));
    }

    public function updatePackage($id, Request $request){
        $requestArray = array_slice($request->all(), 2);

        if(Packages::findOrFail($id)){
            DB::table('packages')->where('id', $id)->update($requestArray);
        }

        return redirect()->route('admin.packages.index');
    }

    public function destroyPackage($id)
    {
        $row = Packages::findOrFail($id);

        Packages::destroy($id);

        return redirect()->route('admin.packages.index');
    }
}