<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Area;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Contact;
use App\Models\Manager;
use App\Models\Homeabout;
use Illuminate\Http\Request;
use App\Models\Homecorporate;
use App\Http\Controllers\Controller;
use App\Models\Bitumenplant;
use App\Models\Bottlemaking;
use App\Models\Edibleoil;
use App\Models\Physicalrefinery;
use App\Models\Storagetank;
use App\Models\Superoil;

class FrontendController extends Controller
{
    //Show Blade file method written here coded by udayan285#..
    function homePage()
    {
        $footer = Footer::where('status',1)->get();
        $bannersData = Banner::where('status',1)->get();
        $homeCorporate = Homecorporate::where('status',1)->first();
        $homeAbout = Homeabout::where('status',1)->first();
        return view('MICL-clone.welcome',compact('bannersData','homeCorporate','homeAbout','footer'));
    }

    function mdProfile()
    {
        $footer = Footer::where('status',1)->get();
        $mdData = Manager::where('status',1)->get();
        return view('MICL-clone.md',compact('mdData','footer'));
    }

    function aboutUs()
    {
        $footer = Footer::where('status',1)->get();
        $bannersData = Banner::where('status',1)->get();
        return view('MICL-clone.about',compact('bannersData','footer'));
    }

    function corporateVision()
    {
        $footer = Footer::where('status',1)->get();
        $bannersData = Banner::where('status',1)->get();
        return view('MICL-clone.corporate',compact('bannersData','footer'));
    }

    function storageTank()
    {
        $storages = Storagetank::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.tank-terminal',compact('footer','storages'));
    }

    function vitumenPlant()
    {
        $bitumen = Bitumenplant::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.bitumin-plant',compact('footer','bitumen'));
    }

    function physicalRefinery()
    {
        $physical = Physicalrefinery::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.physical-unit',compact('footer','physical'));
    }

    function dryFractionation()
    {
        $superOil = Superoil::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.dry-friction',compact('footer','superOil'));
    }

    function edibleOil()
    {
        $edible = Edibleoil::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.oil-filling',compact('footer','edible'));
    }

    function bottleMaking()
    {
        $bottle = Bottlemaking::where('status',1)->get();
        $footer = Footer::where('status',1)->get();
        return view('MICL-clone.bottle-making',compact('footer','bottle'));
    }

    function area()
    {
        $footer = Footer::where('status',1)->get();
        $bannersData = Banner::where('status',1)->get();
        $areaData = Area::where('status',1)->get();
        return view('MICL-clone.area',compact('bannersData','areaData','footer'));
    }

    function contactUs()
    {
        $footer = Footer::where('status',1)->get();
        $contact = Contact::where('status',1)->get();
        return view('MICL-clone.contact',compact('contact','footer'));
    }

   
}
