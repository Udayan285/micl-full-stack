<?php

namespace App\Http\Controllers\Backend;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaDeleteTrait;
use App\Http\Helpers\BusinessMediaUploadTrait;

class BusinessActivitiesController extends Controller
{
    use BusinessMediaUploadTrait,MediaDeleteTrait;
    //coded by udayan285#
    function storeBusinessActivity(Request $request)
    {
        $activity = new Activity();
        $this->validations($request,$activity);
        $oldSlug = Activity::where('slug','LIKE','%'.str($request->activity_title)->slug().'%')->count();
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->activity_title)->slug().'-'.$oldSlug;
            $activity->slug = $slug;
        }else{
            $slug = str($request->activity_title)->slug();
            $activity->slug = $slug;
        }
        $imgage = $this->activityUpload($request,"activities/");
        $activity->create([
            'title' => $request->activity_title,
            'description' => $request->activity_description,
            'image_url' => $imgage,
            'slug' => $slug,
        ]);
        return redirect()->back()->with('status','Business Activity information added successfully.');
    }

    function editBusinessActivity($slug)
    {
        $activityEdit = Activity::where('slug',$slug)->first();
        return view('backend.business-activity.editActivity',compact('activityEdit'));
    }

    function updateBusinessActivity(Request $request,$slug)
    {
        $activity = Activity::where('slug',$slug)->first();
        $this->validations($request,$activity);

        $oldSlug = Activity::where('slug','LIKE','%'.str($request->activity_title)->slug().'%')->count();
        if($oldSlug > 0){
            $oldSlug +=1;
            $slug = str($request->activity_title)->slug().'-'.$oldSlug;
            $activity->slug = $slug;
        }else{
            $slug = str($request->activity_title)->slug();
            $activity->slug = $slug;
        }

        if($request->activity_image)
        {
            $this->updateDeleteMedia($activity);
            $image = $this->activityUpload($request,"activities/");
        }
        else{
            $image = $activity->image_url;
        }
        $activity->update([
            'title' => $request->activity_title,
            'description' => $request->activity_description,
            'image_url' => $image,
            'slug' => $slug,
        ]);
        return redirect()->route('dashboard.activity')->with('status','Business Activity information updated successfully.');

    }

    function activeBusinessActivity($slug)
    {
        $activity = Activity::where('slug',$slug)->first();
        Activity::where('slug', '!=', $slug)->update(['status' => 0]);
        $activity->update(['status' => 1]);

        return redirect()->back()->with('status', 'Status updated successfully.');
    }

    function removeBusinessActivity($slug)
    {
        $activity = Activity::where('slug',$slug)->first();
        $this->updateDeleteMedia($activity);
        $activity->delete();
        return redirect()->back()->with('status','Business Activity information removed successfully.');
    }

    function validations($request,$model)
    {
        $request->validate([
            "activity_title" => "required",
            "activity_description" => "required",
            "activity_image" => $model->image_url ? "nullable|mimes:png,jpg,jpeg,svg" : "required|mimes:png,jpg,jpeg,svg",
        ]);
    }
}
