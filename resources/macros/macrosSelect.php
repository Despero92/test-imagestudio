<?php
use Illuminate\Support\Facades\DB;

Form::macro('selectRangeWithDefault', function($name, $start, $end, $selected = null, $default = null, $attributes = [])
{
    if($start > $end) {
        $interval = -1;
        $startValue = $end;
        $endValue = $start;
    }  else {
        $interval = 1;
        $startValue = $start;
        $endValue = $end;
    }
    if(Route::currentRouteName() == 'admin.stage.create'){

        $results = DB::table('content')->select('order')->where('section', 'stages')->get();

        if(!$results->count()){
            for ($i=$startValue; $i<$endValue; $i+=$interval) {
                $items[$i . ""] = $i;
            }
            $items[$endValue] = $endValue;
            return Form::select($name, $items);
        }

        $orderArray = array();
        foreach ($results as $result){
            $orderArray[] = $result->order;
        }

        for ($i=$startValue; $i<$endValue; $i+=$interval) {
            if(in_array($i, $orderArray)) continue;
            $items[$i . ""] = $i;
        }
    }

    if(Route::currentRouteName() == 'admin.stage.edit'){
        $request = Request();
        $results = DB::table('content')->select('order')->where(
            [
                ['section', 'stages'],
                ['id', '!=', $request->id]
            ])
            ->get();

        $orderArray = array();
        foreach ($results as $result){
            $orderArray[] = $result->order;
        }

        for ($i=$startValue; $i<$endValue; $i+=$interval) {
            if(in_array($i, $orderArray)) continue;
            $items[$i . ""] = $i;
        }
    }

    if(Route::currentRouteName() == 'admin.startup.create'){

        $results = DB::table('content')->select('order')->where('section', 'startup')->get();

        if(!$results->count()){
            for ($i=$startValue; $i<$endValue; $i+=$interval) {
                $items[$i . ""] = $i;
            }
            $items[$endValue] = $endValue;
            return Form::select($name, $items);
        }

        $orderArray = array();
        foreach ($results as $result){
            $orderArray[] = $result->order;
        }

        for ($i=$startValue; $i<$endValue; $i+=$interval) {
            if(in_array($i, $orderArray)) continue;
            $items[$i . ""] = $i;
        }
    }

    if(Route::currentRouteName() == 'admin.startup.edit'){
        $request = Request();
        $results = DB::table('content')->select('order')->where(
            [
                ['section', 'startup'],
                ['id', '!=', $request->id]
            ])
            ->get();

        $orderArray = array();
        foreach ($results as $result){
            $orderArray[] = $result->order;
        }

        for ($i=$startValue; $i<$endValue; $i+=$interval) {
            if(in_array($i, $orderArray)) continue;
            $items[$i . ""] = $i;
        }
    }
    $items[$endValue] = $endValue;
    return Form::select($name, $items);
});