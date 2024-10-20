<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\SaveProfilePhotoTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileUpdateRequest extends FormRequest
{
    use SaveProfilePhotoTrait;

    public function rules()
    {
        return [
            'name'               => 'required',
            'email'              => 'email|required|unique:users,email,' . $this->id,
            'password'           => 'nullable|confirmed|min:6',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function update($id)
    {
        $profileUpdate = User::find($id);
        $profileUpdate->name = $this->name;
        $profileUpdate->email = $this->email;

        if ($this->filled('password')) {
            $profileUpdate->password = Hash::make($this->password);
        }

        $profileUpdate = $this->updateProfilePhoto($this, $profileUpdate);

        $profileUpdate->save();

        return redirect()->back()->with('success', 'Your Profile Updated Successfully..!!');

    }
}
