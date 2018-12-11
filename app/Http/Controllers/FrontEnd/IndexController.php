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

        $descriptions = DB::table('packages_description')
            ->select(array(
                'description',
                'package_id'
            ))
            ->groupBy('package_id', 'description')
            ->orderBy('order', 'ASC')
            ->get();

        $packages = DB::table('packages')->select()->get()->toArray();

        foreach ($packages as $package){
            $descriptionArray = array();
            foreach ($descriptions as $description){
                if($package->id === $description->package_id){
                    $descriptionArray[] = $description->description;
                    continue;
                }
            }
            $package->description = (object)$descriptionArray;
        }

//        $packages = DB::table("packages")
//            ->select([
//                'packages.*',
//                DB::raw("GROUP_CONCAT(packages_description.description) as description")
//            ])
//            ->leftJoin('packages_description',
//                'packages.id', '=', 'packages_description.package_id')
//            ->groupBy("id")
//            ->get()
//            ->map(function ($item) {
//                $descriptionArray = explode(',', $item->description);
//                $item->description = $descriptionArray;
//                return  $item;
//            })
//        ->toArray();
        $data = array(
            'launchContent' => $launchContent,
            'instagramContent' => $instagramContent,
            'stages' => $stages,
            'startupList' => $startupList,
            'packages' => $packages
        );

        return view('frontend.layouts.index', $data);
    }
    
    public function buyPackageAction(Request $request){
        $validate =  $this->validate($request, [
            'client_name' => 'required|string',
            'client_phone' => 'required|digits_between:6,12|numeric'
        ]);

        $package_id = DB::table('packages')
            ->select('id')
            ->where('title', '=', $request->input('package_title'))
            ->first()->id;

        DB::table('customer_orders')
            ->insert(array(
                'package_id' => $package_id,
                'name' => $request->input('client_name'),
                'phone' => $request->input('client_phone')
            ));

        return redirect()->route("index")->with('message','Заявка принята');
    }
}
