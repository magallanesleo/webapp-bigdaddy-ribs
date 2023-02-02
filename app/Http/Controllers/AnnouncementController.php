<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Validation\Rules;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\File;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcement.announcement', [
            'header' => 'Announcements',
            'announcements' => Announcement::all()
        ]);
        // return Announcement::all();
    }

    public function form1()
    {
        return view('announcement.form1', [
            'header' => 'Announcement',
        ]);
    }

    
    public function store(Request $request)
    {
        //For Validation
        
        // $request->validate([
        //     'header' => ['required', 'string', 'max:255'],
        //     'sub_header' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'max:255'],
        //     'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
        // ]);

        // $input = $request->all();

        // if($image = $request->file('image')){
        //     $destinationPath = 'images/';
        //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";
        // }

        // $requestData = $request->all();
        // $filename = time().$request->file('photo')->getClientOriginalName();
        // $path = $request->file('photo')->storeAs('images', $filename, 'public');
        // $requestData["photo"] = '/storage/'.$path;
        // Announcement::create($requestData);

        // Announcement::create($input);
        //For Validation after restoring
        Announcement::create([
            'header' => $request->header,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        // if($image => $request->file('image')){
        //     $destinationPath = 'images/',

        // }

        session()->flash('status', 'Added Announcement Successfully!');

        // Redirect to the List of Announcement
        return redirect('/announcement');
    }

    // DELETE USER

    public function show2($id)
    {
        $announcement = Announcement::all();

        return redirect('/announcement');
    }

    public function destroy($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();

        session()->flash('status', 'Delete Announcement Successfully!');

        return redirect('/announcement');
    }

    
        // Update 
        public function show($id)
        {
            $announcement = Announcement::find($id);
    
            return view('announcement.form1',[
                'header'    => 'Update Announcement',
                'announcement'      => $announcement
            ]);
        }
    
        public function update(Request $request, $id)
        {
            
            //For Validation
            // $request->validate([
            //     'name' => ['required', 'string', 'max:255'],
            //     'email' => ['required', 'string', 'email', 'max:255'],
            //     'password' => [Rules\Password::defaults()],
            // ]);
    
            $announcement = Announcement::find($id);
    
            $announcement->update($request->all());
    
            session()->flash('status', 'Updated Announcement Successfully!');
    
            return redirect('/announcement/update/' . $announcement->id);
        }
        /* ------------------------------------- */

}
