<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User;

use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        // dd($user);
        $user=User::findOrFail($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($follows);
        return view
        ('profiles.index',[

            'user'=>$user,
            'follows'=>$follows,
        ]);
    }

    public function edit(User $user){

        $this->authorize('update',$user->profile);

        return view('profiles.edit',[
            'user'=>$user,
        ]);
    }

    public function update(User $user,Request $request){ ////////////

        // $data=request()->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'url'=>'url'
        // ]);
        $this->authorize('update',$user->profile);

        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'image'
        ]);

        if($request->has('image')){

            $imagePath = request('image')->store('profile','public');

            // $image = Image::make(public_path("{$imagePath}"))->fit(1000, 1000);
       $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
         // ERROR in the above code line 59 : Intervention / Image Upload Error {{ Image source not readable }}
         // SOLUTION : php artisan storage:link
         // REFRENCE  https://stackoverflow.com/questions/36157824/intervention-image-upload-error-image-source-not-readable
         
        //testing new comment
        $image->save();
            $imageArray=['image'=>$imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
            // ['image'=>$imagePath],
        ));

        // auth()->$user->profile->update($data);

        // dd($data);





        return redirect("/profile/{$user->id}");
        // return view
        // ('profiles.index',[

        //     'user'=>$user,

        // ]);
    }
}
