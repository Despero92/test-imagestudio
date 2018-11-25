<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Content;
use App\Storages;
use Illuminate\Support\Facades\DB;

class StagesController extends Controller
{
    public function create(Request $request){
        $storages = new Storages;

        if ($request->isMethod('post'))
        {
            $uploadFileId = '';
            $this->validate($request, [
                'title' => 'required|max:255|string',
                'value' => 'required|string',
                'image' => 'required|file'
            ]);

            if($request->hasFile('image')) {
                $uploadFileId = $storages->uploadFile($request->file('image'), 'stages/images');
            }

            Content::insert([
                'title' => $request->input('title'),
                'value' => $request->input('value'),
                'order' => $request->input('order'),
                'file_id' => $uploadFileId,
                'section' => 'stages'
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
        $storages = new Storages;
        $requestArray = $request->all();

        if(Content::findOrFail($id)){
            $row = DB::table('content')
                ->leftJoin('storage', 'content.file_id', '=', 'storage.file_id')
                ->where('id', $id);

            $file_id = $row->first()->file_id;

            if($request->hasFile('image') and !empty($file_id)) {
                $storages->updateFile($file_id, $request->file('image'), 'stages/images');
            }
            unset($requestArray['image']);

            Content::where('id', $id)->update(array_splice($requestArray,2));
        }

        return redirect()->route('admin.homepage.index');
    }

    public function destroy($id)
    {
        $storages = new Storages;
        $row = Content::findOrFail($id);

        try{
            Content::destroy($id);
            $storages->deleteFile($row->file_id);
        }catch(\Exception $e){
            echo 'Message: ' .$e->getMessage();
        }

        return redirect()->route('admin.homepage.index');
    }

    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Content::destroy($toDelete);
        } else {
            Content::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.homepage.index');
    }
}
