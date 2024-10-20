<?php

namespace App\Http\Requests;

use App\Models\RoadStaff;
use App\Models\User;
use App\Notifications\EmployeeCreateNotification;
use App\Notifications\LeaveRequestStatusNotification;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\SaveProfilePhotoTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffStoreRequest extends FormRequest
{
    use SaveProfilePhotoTrait;

    public function rules()
    {
        return [
            'name'               => 'required',
            'email'              => 'required|unique:users,email',
            'password'           => 'required|confirmed|min:6',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roads' => 'required|array',
            'roads.*' => 'integer|distinct|min:1|max:20',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function store()
    {
        DB::beginTransaction();
        try {

            $staff = new User();
            $staff->name = $this->name;
            $staff->email = $this->email;
            $staff->type = 'user';
            $staff->status = 'pending';
            $staff->password = Hash::make($this->password);

            $staff = $this->saveProfilePhoto($this, $staff);

            $staff->save();

           // Assign roads to the staff member
            foreach ($this->roads as $roadId) {
                // Check if the road is already assigned to any staff
                $existingRoad = RoadStaff::where('road_id', $roadId)->first();

                // If the road is not already assigned to anyone, create a new entry
                if (!$existingRoad) {
                    RoadStaff::create([
                        'staff_id' => $staff->id,
                        'road_id' => $roadId,
                    ]);
                }
            }

            $staff->notify(new EmployeeCreateNotification($staff));
            DB::commit();
            return redirect()->route('staff.index')->with('success', 'Staff Created Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            return redirect()->back()->with('fail', __('language.data_save_error'));
        }
    }
}
