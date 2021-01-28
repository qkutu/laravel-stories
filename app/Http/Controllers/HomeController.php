<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $stories = Story::orderBy('priority','DESC')->get();
        $setting = Setting::findOrFail(1);
        return view('welcome', compact('stories','setting'));
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function settings(){
        $setting = Setting::findOrFail(1);
        return view('admin.settings', compact('setting'));
    }

    public function settingsUpdate(Request $request){
        $request->validate([
            "title" => 'required|min:3',
            "publisher" => 'required|min:3',
            "logo" => 'nullable|mimes:png,jpg',
            "cover" => 'nullable|mimes:png,jpg',
        ]);

        $setting = Setting::findOrFail(1);
        $setting->title = $request->input('title');
        $setting->publisher = $request->input('publisher');
        if($request->has('logo')){
            $setting->logo = $request->file('logo')->store('uploads/logos','local');
        }
        if($request->has('cover')){
            $setting->cover = $request->file('cover')->store('uploads/covers','local');
        }

        if($setting->update()){
            return redirect()->route('settings')->with('success','Setting Updated Successfully !!');
        }else{
            return redirect()->route('settings')->with('danger','Some Error Occured, Please Try Again Later !!');
        }
    }
}
