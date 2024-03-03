<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("patients.index", ["patients" => Patient::search()->latest()->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("patients.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            "name" => "required",
            "phone" => ["required", "digits:10"],
            "document_id" => "",
            "notes" => "",
            "first_visit" => ""
        ]);
        Patient::create($fields);
        return redirect("/patients")->with("message", "patient added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return view("patients.show", ["patient" => $patient]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {

        return view("patients.edit", ["patient" => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        $fields = $request->validate([
            "name" => "required",
            "phone" => ["required", "digits:10"],
            "document_id" => ["required", "numeric"],
            "notes" => "",
            "first_visit" => ""
        ]);
        $patient->update($fields);
        return redirect("/patients")->with("message", "patient updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect("/patients")->with("message", "patient deleted successfully");
    }
    public function showapps(Patient $patient)
    {
        return view("patients.showapps", ["patient" => $patient]);
    }
}