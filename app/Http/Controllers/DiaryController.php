<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Dairy;
use Toastr;


class DiaryController extends Controller
{
    public function index(){

        date_default_timezone_set('Asia/Tokyo');
        // upcomming scheduled dairy 
        $date = date('Y-m-d');
        $time = date('H:i');
        $upcommingDairy = Dairy::where('date', '>=', $date)
                        ->orderBy('time', 'asc')
                        ->get();
    

        $existingDiary = Dairy::where('date', '<', date('Y-m-d'))
                        ->orderByRaw('date + time desc')
                        ->get();



        return view('pages.diary.index', compact('upcommingDairy', 'existingDiary'));
    }

    public function create(){

        return view('pages.diary.create');
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'person' => 'required',
            'place' => 'required',
        ]);

        //check existing entry
        if(Dairy::where('date', $request->date)->where('time', $request->time)->exists()){
            Toastr::error('Same Date and Time already exists', 'Success');
            return redirect()->back();
        }

        Dairy::create([
            'date' => $request->date,
            'time' => $request->time,
            'person' => $request->person,
            'place' => $request->place,
            'description' => $request->description

        ]);

        Toastr::success('Diary entry created successfully', 'Success');
        return redirect()->route('diary');

       


    }


    public function edit($dairy){

        $dairy = Dairy::find($dairy);

        return view('pages.diary.edit', compact('dairy'));
    }


    public function update(Request $request, $dairy){

        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'person' => 'required',
            'place' => 'required',

        ]);

        //check existing entry without id

        if(Dairy::where('date', $request->date)->where('time', $request->time)->where('id', '!=', $dairy)->exists()){
            Toastr::error('Same Date and Time already exists', 'Success');
            return redirect()->back();
        }

        $dairy = Dairy::find($dairy);

        $dairy->update([
            'date' => $request->date,
            'time' => $request->time,
            'person' => $request->person,
            'place' => $request->place,
            'description' => $request->description

        ]);

        Toastr::success('Diary entry updated successfully', 'Success');
        return redirect()->route('diary');

    }


    public function destroy($dairy){

        $dairy = Dairy::find($dairy);

        $dairy->delete();

        Toastr::success('Diary entry deleted successfully', 'Success');
        return redirect()->route('diary');

    }

}
