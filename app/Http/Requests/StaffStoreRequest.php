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
            // Create a new staff member
            $staff = new User();
            $staff->name = $this->name;
            $staff->email = $this->email;
            $staff->type = 'user';
            $staff->status = 'pending';
            $staff->password = Hash::make($this->password);

            // Save profile photo
            $staff = $this->saveProfilePhoto($this, $staff);
            $staff->save();

            // Get selected road IDs from the request
            $selectedRoads = $this->roads; // Assuming this contains the selected road IDs

            // Initialize an array to hold existing road assignments
            $existingRoads = [];

            // Check for existing road assignments for the user
            foreach ($selectedRoads as $roadId) {
                
                $roadAssignment = RoadStaff::where('road_id', $roadId)
                    ->with('staff') 
                    ->first();

                if ($roadAssignment) {
                    $existingRoads[] = [
                        'road' => $roadAssignment->road->road_no . ($roadAssignment->road->block ? '/' . $roadAssignment->road->block : ''),
                        'assigned_to' => $roadAssignment->staff->name,
                    ];
                }
            }

            if (!empty($existingRoads)) {

                DB::rollback();
            
                // Initialize an array to hold road assignments by staff
                $roadAssignments = [];
            
                foreach ($existingRoads as $existingRoad) {
                    // Group roads by assigned staff's name
                    $roadAssignments[$existingRoad['assigned_to']][] = $existingRoad['road'];
                }
            
                // Prepare error messages
                $errorMessages = [];
                foreach ($roadAssignments as $staffName => $roads) {
                    // Join the roads for this staff member
                    $roadList = implode(', ', $roads);
                    $errorMessages[] = $roadList . ' already assigned to ' . $staffName;
                }
            
                // Combine all error messages into one
                $errorMessage = implode('<br>', $errorMessages);
                
                // return redirect()->back()->with('error', $errorMessage);
                return redirect()->back()
                    ->withErrors(['roads' => $errorMessage]) // Pass the error messages
                    ->withInput();
            }
           
            // Store new road assignments
            foreach ($selectedRoads as $roadId) {
                RoadStaff::create([
                    'staff_id' => $staff->id,
                    'road_id' => $roadId,
                ]);
            }

            // Send notification
            $staff->notify(new EmployeeCreateNotification($staff));
            DB::commit();
            
            return redirect()->route('staff.index')->with('success', 'Staff Created Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('fail', __('language.data_save_error') . ' ' . $e->getMessage());
        }
    }




}
