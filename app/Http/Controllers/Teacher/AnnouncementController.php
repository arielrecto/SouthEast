<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $classroom_id = $request->classroom_id;

        $announcements = Announcement::where('classroom_id', $classroom_id)->latest()->paginate(10);

        return view('users.teacher.classroom.announcement.index', compact(['announcements', 'classroom_id']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $classroom_id = $request->classroom_id;



        return view('users.teacher.classroom.announcement.create', compact('classroom_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'description' => 'required']);


        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'classroom_id' => $request->classroom_id
        ]);


        return back()->with(['message' => 'announcement posted']);
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
