<?php

namespace App\Http\Controllers\Admin;

use App\Models\Strand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $strands = Strand::latest()->paginate(10);

        return view('users.admin.strand.index', compact(['strands']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.admin.strand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'acronym' => 'required',
            'description' => 'required'
        ]);


        Strand::create([
            'name' => $request->name,
            'acronym' => $request->acronym,
            'descriptions' => $request->description
        ]);


        return back()->with([
            'message' => 'Strand Added'
        ]);
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
