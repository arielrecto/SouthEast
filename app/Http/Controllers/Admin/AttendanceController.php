<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Classroom $classroom)
    {
        $attendance_code = 'ATT' . uniqid();

        return view('users.teacher.classroom.attendance.create', compact(['classroom', 'attendance_code']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required'
        ]);


        Attendance::create([
            'attendance_code' => $request->attendance_code,
            'classroom_id' => $request->classroom_id,
            'date' => now(),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ]);


        return to_route('teacher.classrooms.show', ['classroom' => $request->classroom_id])->with(['message' => 'Attendance QR Generated']);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
