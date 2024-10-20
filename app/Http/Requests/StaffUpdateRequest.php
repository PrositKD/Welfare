<?php

namespace App\Http\Requests;

use App\Models\RoadStaff;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\SaveProfilePhotoTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffUpdateRequest extends FormRequest
{
    use SaveProfilePhotoTrait;

    public function rules()
    {
        return [
            'name'               => 'required',
            'email'              => 'email|required|unique:users,email,' . $this->id,
            'password'           => 'nullable|confirmed|min:6',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'roads'              => 'required|array',
            'roads.*'           => 'integer|distinct|min:1|max:20',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function update($id)
    {
        DB::beginTransaction();
        try {
            $staff = User::find($id);
            $staff->name = $this->name;
            $staff->email = $this->email;
            $staff->type = $this->type;

            if ($this->filled('password')) {
                $staff->password = Hash::make($this->password);
            }

            $staff = $this->saveProfilePhoto($this, $staff);
            $staff->save();

            // Get currently assigned roads
        $assignedRoads = RoadStaff::where('staff_id', $staff->id)->pluck('road_id')->toArray();

        // Assign new roads that are not already assigned
        foreach ($this->roads as $roadId) {
            // Check if the road is already assigned to anyone
            $existingRoad = RoadStaff::where('road_id', $roadId)->first();

            // If the road is not already assigned to anyone, create a new entry
            if (!$existingRoad) {
                RoadStaff::create([
                    'staff_id' => $staff->id,
                    'road_id' => $roadId,
                ]);
            }
        }

        // Remove roads that are no longer assigned
        RoadStaff::where('staff_id', $staff->id)
            ->whereNotIn('road_id', $this->roads)
            ->delete();



            DB::commit();
            return redirect()->route('staff.index')->with('success', 'Staff Updated Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            return redirect()->back()->with('fail', __('language.data_save_error'));
        }
    }
}
