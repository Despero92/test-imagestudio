<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Storages extends Model
{
    protected $table    = 'storage';
    protected $fillable = ['user_id', 'name', 'storage_path', 'extension', 'type', 'size', 'created_at', 'updated_at'];

    public function uploadFile($file, $path = null){

        $fileName = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        $fileStorageDir = $path ? 'public/'.$path : 'public/upload-files';
        $file_id = '';
        $imagePath = '';

        DB::beginTransaction();
        try{
            $imagePath = $file->store($fileStorageDir);
            $file_id = DB::table('storage')->insertGetId(array(
                'user_id' => Auth::user()->id,
                'file_name' => $fileName,
                'storage_path' => $imagePath,
                'extension' => $file->getClientMimeType(),
                'type' => null,
                'size' => $file->getClientSize()
            ));

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            Storage::delete($imagePath);
            echo 'Message: ' .$e->getMessage();
        }

        return (int) $file_id;
    }

    public function updateFile($file_id, $file, $path = null){

        $fileName = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        $fileStorageDir = $path ? 'public/'.$path : 'public/upload-files';
        $row = DB::table('storage')->where('file_id', $file_id);
        $file_path = $row->first()->storage_path;

        DB::beginTransaction();
        try{
            $imagePath = $file->store($fileStorageDir);
            $row->update([
                'user_id' => Auth::user()->id,
                'file_name' => $fileName,
                'storage_path' => $imagePath,
                'extension' => $file->getClientMimeType(),
                'type' => null,
                'size' => $file->getClientSize()
            ]);

            if(file_exists(storage_path('app/'.$file_path))){

                /*
                * Storage::delete (storage/app)
                 * File Path (public/stages/images/)
                */
                Storage::delete($file_path);
            }else{
                return false;
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            echo 'Message: ' .$e->getMessage();
        }

        return true;
    }

    public function deleteFile($file_id){
        $file_path = DB::table('storage')
            ->select(['storage_path'])
            ->where('file_id', $file_id)
            ->get()->toArray()[0]->storage_path;

        try{
            DB::table('storage')
                ->where('file_id', $file_id)->delete();

            Storage::delete($file_path);
        }catch(\Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
        return true;
    }
}
