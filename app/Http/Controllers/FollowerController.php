<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    public function store (User $user) {
        // aqui usamos attach en lugat del create del metodo followrs
        // por que el metodo followers fue una realacion distinta a las demas
        $user->followers()->attach(auth()->user()->id);
        return back();
    }

    public function destroy(User $user) {
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
