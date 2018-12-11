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
        $packages_description = DB::table('packages_description')->select(array('packages_description.*', 'packages.title','packages.order as orders'))->leftJoin('packages', 'packages_description.package_id','=', 'packages.id')->orderBy('order', 'ASC')->get();

        $data = [
            'packages' => $packages,
            'descriptions' => $packages_description
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
                'order' => $request->input('order'),
                'addition' => $request->input('addition')
            ]);
            return redirect()->route('admin.packages.index');
        }
        return view('admin.packages.create');
    }

    public function editPackage($id){

        $row = Packages::find($id);

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

    public function createDescription(Request $request){

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'description' => 'required|max:255|string'
            ]);

            foreach ($request->all() as $key => $value){
                if(strpos($key, 'package-') === 0){
                    DB::table('packages_description')->insert(array(
                        'package_id' => $value,
                        'order' => $request->input('order'),
                        'description' => $request->input('description')
                    ));
                }
            }

            return redirect()->route('admin.packages.index');
        }
        $packages = Packages::all();
        return view('admin.packages.create', ['packages' => $packages]);
    }

    public function editDescription($id){

        $row = DB::table('packages_description')->where('id',$id)->first();

        return view('admin.packages.edit', compact('row'));
    }

    public function updateDescription($id, Request $request){
        $requestArray = array_slice($request->all(), 2);

        if(DB::table('packages_description')->where('id', $id)->count()){
            DB::table('packages_description')->where('id', $id)->update($requestArray);
        }

        return redirect()->route('admin.packages.index');
    }

    public function destroyDescription($id)
    {
        DB::table('packages_description')->delete($id);
//        $row = Packages::findOrFail($id);
//
//        Packages::destroy($id);

        return redirect()->route('admin.packages.index');
    }
}