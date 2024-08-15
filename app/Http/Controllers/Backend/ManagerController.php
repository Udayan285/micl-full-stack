<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //Managing Director page all function here..(#udayan285#)
                
    function storeMD(Request $request){

        $request->validate([
            'name' => 'required',
            'description' => 'required', 
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $manager = new Manager();

        $manager->name = $request->name;
        $manager->description = $request->description;
        //image upload related task written here...
        $imgName = time().'.'.$request->image->extension();
        $request->image->move(public_path('md'), $imgName);
        $manager->image_url = $imgName;
        $manager->save();

        // Manager::create($request->all());

        return redirect()->back()->with('status', 'Manager information added successfully.');
    }

    function removeMD($id){
        $contact = Manager::where('id',$id)->first();
        $contact->delete();
        return redirect()->back()->with('status',"Selected MD info. deleted successfully.");
    }
            
    function editMD($id){
        $mdEdit = Manager::where('id',$id)->first();
        return view('backend.md.editMd',compact('mdEdit'));
    }
        
    function updateMD(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required', 
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $mdUpdate = Manager::where('id',$id)->first();

        $mdUpdate->name = $request->name;
        $mdUpdate->description = $request->description;

        //this part is for delete file from public folder while delete from database
        $delete = public_path('md/'.$mdUpdate->image_url);
        if(file_exists($delete)){
            unlink($delete);
        }
        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('md'), $imageName);
        $mdUpdate->image_url = $imageName;
        $mdUpdate->save();
    
        return redirect()->route('dashboard.mdPage')
            ->with('status', "MD information updated successfully.");
    }

    function activeMD($id) {
        $contact = Manager::findOrFail($id);
    
        // Deactivate other contacts
        Manager::where('id', '!=', $id)->update(['status' => 0]);
    
        // Activate the current contact
        $contact->update(['status' => 1]);
    
        return redirect()->back()->with('status', 'Status updated successfully.');
    }
}
