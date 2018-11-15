<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Telephone;
use App\Http\Requests\CreateTelephoneRequest;
use App\Http\Requests\UpdateTelephoneRequest;
use Illuminate\Http\Request;



class TelephoneController extends Controller {

	/**
	 * Display a listing of telephone
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $telephone = Telephone::all();
		return view('admin.telephone.index', compact('telephone'));
	}

	/**
	 * Show the form for creating a new telephone
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.telephone.create');
	}

	/**
	 * Store a newly created telephone in storage.
	 *
     * @param CreateTelephoneRequest|Request $request
	 */
	public function store(CreateTelephoneRequest $request)
	{
	    
		Telephone::create($request->all());

		return redirect()->route(config('quickadmin.route').'.telephone.index');
	}

	/**
	 * Show the form for editing the specified telephone.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$telephone = Telephone::find($id);
	    
	    
		return view('admin.telephone.edit', compact('telephone'));
	}

	/**
	 * Update the specified telephone in storage.
     * @param UpdateTelephoneRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateTelephoneRequest $request)
	{
		$telephone = Telephone::findOrFail($id);

        

		$telephone->update($request->all());

		return redirect()->route(config('quickadmin.route').'.telephone.index');
	}

	/**
	 * Remove the specified telephone from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Telephone::destroy($id);

		return redirect()->route(config('quickadmin.route').'.telephone.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Telephone::destroy($toDelete);
        } else {
            Telephone::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.telephone.index');
    }

}
