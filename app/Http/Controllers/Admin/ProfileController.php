<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\Renewal;
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
        $this ->validate($request, Profile::$rules);
        
        $profile = new Profile;
        
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        
        unset($profile_form['_token']);
        
        $profile->fill($profile_form)->save();
        
        $renewal = new Renewal();
        $renewal->profile_id = $profile->id;
        $renewal->update_at = Carbon::now();
        $renewal->save();
        
        // admin/profile/editにリダイレクトする
        return redirect('admin/profile/edit');
    }

    
}
