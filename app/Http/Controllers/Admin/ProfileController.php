<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\his;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add() 
    {
        return view('admin.profile.create');
    }
   
    public function create(Request $request) 
    { 
        
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        if(isset($form['image'])){
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        }else {
            $profile->image_path = null;
        }
        
        unset($form['token']);
        unset($form['image']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function index(Request $request)
    {
    $cond_title = $request->cond_title;
    if($cond_title != ''){
        $posts = Profile::where('title', $cond_title)->get();
    }else{
        $posts = profile::all();
    }
    return view('admin.profile.index', ['posts' => $posts, 'cond_title => $cond_title']);
    }
    
    public function edit (Request $request) 
    {
        $profile = Profile::find($request->id);
        if(empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request) 
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        if(isset($profile_form['image'])){
            $path = $request->file('image')->store('public/image');
            $profile->image_path = base64_decode($path);
            unset($profile_form['image']);
        }elseif(isset($request->remove)){
            $profile->image_path = null;
            unset($profile_form['remote']);
        }
        
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $history = new his;
        $history->profile_id = $profile->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
        return redirect('admin/profile');
       
    }
    public function delete(Request $request)
    {
        $profile = Profile::find($request->id);
        $profile = delete();
        return redirect('admin/profile/');
    }
}

