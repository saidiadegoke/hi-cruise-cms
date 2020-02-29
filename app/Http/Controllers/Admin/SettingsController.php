<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CruiseAvailableDay;
use App\Models\CruiseDateSetting;
use App\Common\CruiseDate;
use App\Models\CustomDay;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $availableDays = CruiseAvailableDay::all();
        $cruiseDateSettings = CruiseDateSetting::all();

        return view('settings.index', compact('availableDays', 'cruiseDateSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $allDays = CruiseAvailableDay::all();
        //dd($request->days);
        $days = $request->days;
        foreach($allDays as $day) {
            $exists = array_key_exists($day->id, $days); 

            if($exists) {
                $day->available = 1;
            } else {
                $day->available = 0;
            }

            $day->save();
        }
        

        foreach($request->settings as $id=>$value) {
            $setting = CruiseDateSetting::find($id);
            $setting->value = $value;
            $setting->save();
        }

        return redirect()->route('admin.settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cruise(Request $request)
    {
        $setting = new CruiseDateSetting();
        $startDate = $setting->getItem("cruise_start_date")? : date('Y-m-d');
        $date = new CruiseDate($startDate);
        
        $days = CruiseAvailableDay::all();
        $customDates = CustomDay::all();
        $activeDays = [];
        foreach($days as $d) {
            if($d->available == 1)
                $activeDays[] = strtolower($d->short);
        }

        $dates = $date->cruiseDateItems($setting->getItem("days_per_page"), $activeDays, $customDates);

        return view('settings.cruise', compact('dates'));
    }

    public function cruiseUpdate(Request $request) {
        $days = $request->days;
        $nights = $request->nights;
        foreach($request->dates as $date=>$value) {            
            $isDay = array_key_exists($date, $days)? intval($days[$date]): null;
            $isNight = array_key_exists($date, $nights)? intval($nights[$date]): null;
            $isAvailable = intval($value);

            if(!($isDay == 1 && $isNight == 1 && $isAvailable == 1)) {
                $customDate = CustomDay::updateorCreate(['date' => $date], ['day' => $isDay, 'night' => $isNight, 'available' => $isAvailable]); 
            } else {
                CustomDay::where('date', $date)->delete();
            }
        }
        return redirect()->route('admin.settings.cruise');
    }
}
