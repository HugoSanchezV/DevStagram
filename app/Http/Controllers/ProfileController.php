<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
 
       
        $request->request->add([
            'username' =>  Str::slug($request->username),
        ]);

        

        $request->validate([
            'username' => ['required','unique:users,username,' . auth()->user()->id, 'min:3', 'max:20'],
            'email' => ['required','unique:users,email,' . auth()->user()->id,  'max:60'],
            'password' => ['nullable',  'confirmed', 'min:6']
        ]);


        if ($request->img) {
            $image = $request->file('img');

            $name = Str::Uuid() . "." . $image->extension();
    
            $manager = new ImageManager(new Driver());
    
            $imageServer = $manager::gd()->read($image);
            $imageServer->cover(1000, 1000);
    
            $imagePath = public_path('profiles') . '/' . $name;
    
            $imageServer->save($imagePath);
        } 


        $user = User::find(auth()->user()->id);


        if ($request->password && !Hash::check($request->current_password, auth()->user()->password)) {
            //dd('emtre m');
            return back()->withErrors(['current_password' => 'La Contraseña Actual no Coincide']);
        }


        $user->username = $request->username;
        $user->img = $name ?? auth()->user()->img ?? '';
        $user->email = $request->email ?? $user->email;
        
        if ($request->password) {
            $user->password = Hash::make($request->password) ?? $user->password;
        }

        $user->save();
        return redirect()->route('posts.index', $user->username);
    }
}
