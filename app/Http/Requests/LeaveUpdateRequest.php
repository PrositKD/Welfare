<?php

namespace App\Http\Requests;

use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class LeaveUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'leave_date_range' => 'required',
            'leave_type' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function update($id)
    {
        list($startDate, $endDate) = explode(' - ', $this->leave_date_range);
        $startDate = Carbon::createFromFormat('m/d/Y', $startDate)->format('Y-m-d');
        $endDate = Carbon::createFromFormat('m/d/Y', $endDate)->format('Y-m-d');
        
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->leave_type = $this->leave_type;
        $leaveRequest->start_date = $startDate;
        $leaveRequest->end_date = $endDate;
        $leaveRequest->reason = $this->reason;
        $leaveRequest->save();

        return redirect()->route('leave_request.index')->with('success', 'Leave Request Updated Successfully');
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'leave_date_range.required'     => 'The Start Date and End Date must be fill up.',
        ];
    }
}
