<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Validator;
use \App\User;

class UsersController extends Controller
{
    public function add($id)
    {
        User::find(auth()->user()->id)->contacts()->syncWithoutDetaching([$id]);
        session()->flash('success', 'Your Phone Number Has Been Added Successfully');
        return back()->with('success', 'Your Phone Number Has Been Added Successfully');
    }

    public function destroy($id)
    {
        User::find(auth()->user()->id)->contacts()->detach([$id]);
        return redirect("/home");
    }
}
