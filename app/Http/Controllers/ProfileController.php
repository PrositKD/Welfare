<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function profilePageShow()
    {
        $user = Auth::user();
        return view('pages.profile', compact('user'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function profileUpdate(ProfileUpdateRequest $request, $id)
    {
        return $request->update($id);
    }
}
