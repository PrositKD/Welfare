<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStoreRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = [];
        User::where('type', '!=', 'admin')->chunk(100, function ($users) use (&$staffs) {
            foreach ($users as $user) {
                $staffs[] = $user;
            }
        });
        return view('pages.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roads = range(1, 20);
        return view('pages.staff.create', compact('roads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffStoreRequest $request)
    {
        return $request->store();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = User::find($id);
        return view('pages.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffUpdateRequest $request, string $id)
    {
        return $request->update($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $staff = User::find($id);
        $staff->delete();
        return response()->json(['success' => 'success']);
    }

    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function statusChange($id)
    {
        $staff = User::findOrFail($id);
        $staff->status = $staff->status == 'active' || $staff->status == 'pending' ? 'block' : 'active';
        $staff->save();

        return response()->json(['success' => 'success']);
    }

     /**
     * Approve Subscription Entry
     */
    public function approve(string $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'active';
        $user->save();
        return response()->json(['success' => 'success']);
    }

    public function profile(){
        return view('profile');
    }
}
