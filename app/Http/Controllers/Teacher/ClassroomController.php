<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Strand;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Class_;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $classrooms = Classroom::latest()->paginate(10);

        return view('users.teacher.classroom.index', compact(['classrooms']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $subjects = Subject::get();

        $strands = Strand::get();

        return view('users.teacher.classroom.create', compact(['subjects', 'strands']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'subject' => 'required',
            'strand' => 'required'
        ]);



        $classroom_code = 'CLSSRM'.uniqid();

       Classroom::create([
        'name' => $request->name,
        'class_code' => $classroom_code,
        'description' => $request->description,
        'subject_id' => $request->subject,
        'strand_id' => $request->strand,
        'teacher_id' => Auth::user()->id
       ]);


       return  back()->with(['message' => 'Classroom Added']);
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
