<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;

class StartUpController extends Controller
{
    public function create(Request $request){
        if ($request->isMethod('post'))
        {
            $this->validate($request, [
                'value' => 'required|string'
            ]);

            Content::insert([
                'value' => $request->input('value'),
                'order' => $request->input('order'),
                'section' => 'startup'
            ]);
            return redirect()->route('admin.homepage.index');
        }
        return view('admin.homepage.create');
    }

    public function edit($id){
        $row = Content::find($id);

        return view('admin.homepage.edit', compact('row'));
    }

    public function update($id, Request $request){
        $requestArray = $request->all();

        if(Content::findOrFail($id)){
            Content::where('id', $id)->update(array_splice($requestArray,2));
        }

        return redirect()->route('admin.homepage.index');
    }

    public function destroy($id){
        $row = Content::findOrFail($id);

        Content::destroy($id);

        return redirect()->route('admin.homepage.index');
    }
}
