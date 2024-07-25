<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Homeabout;
use App\Models\Homecorporate;

class FrontendController extends Controller
{
    //Show Blade file method written here..
    function homePage(){
        $bannersData = Banner::where('status',1)->get();
        $homeCorporate = Homecorporate::where('status',1)->first();
        $homeAbout = Homeabout::where('status',1)->first();
        return view('MICL-clone.welcome',compact('bannersData','homeCorporate','homeAbout'));
    }

    function mdProfile(){
        return view('MICL-clone.md');
    }

    function aboutUs(){
        $bannersData = Banner::where('status',1)->get();
        return view('MICL-clone.about',compact('bannersData'));
    }

    function corporateVision(){
        $bannersData = Banner::where('status',1)->get();
        return view('MICL-clone.corporate',compact('bannersData'));
    }

    function storageTank(){
        return view('MICL-clone.tank-terminal');
    }

    function vitumenPlant(){
        return view('MICL-clone.bitumin-plant');
    }

    function physicalRefinery(){
        return view('MICL-clone.physical-unit');
    }

    function dryFractionation(){
        return view('MICL-clone.dry-friction');
    }

    function edibleOil(){
        return view('MICL-clone.oil-filling');
    }

    function bottleMaking(){
        return view('MICL-clone.bottle-making');
    }

    function area(){
        $bannersData = Banner::where('status',1)->get();
        return view('MICL-clone.area',compact('bannersData'));
    }

    function contactUs(){
        return view('MICL-clone.contact');
    }

   
}
