<?php

namespace App\Traits;

trait SaveProfilePhotoTrait
{
    public function saveProfilePhoto($request, $staff)
    {
        if ($request->hasFile('profile_photo_path')) {
            $request_file = $request->file('profile_photo_path');
            $extension    = $request_file->extension();
            $filename     = time() . rand(10, 1000) . '.' . $extension;
            $request_file->move(public_path('upload/staffs'), $filename);
            $staff->profile_photo_path = $filename;
        }

        return $staff;
    }

    public function updateProfilePhoto($request, $profileUpdate)
    {
        if ($request->hasFile('profile_photo_path')) {
            $destination = public_path('upload/staffs/' . $profileUpdate->profile_photo_path);

            if ($profileUpdate->profile_photo_path != null && file_exists($destination)) {
                unlink($destination);
            }

            $request_file = $request->file('profile_photo_path');
            $extension    = $request_file->extension();
            $filename     = time() . rand(10, 1000) . '.' . $extension;
            $request_file->move(public_path('upload/staffs'), $filename);
            $profileUpdate->profile_photo_path = $filename;
        }

        return $profileUpdate;
    }
}
