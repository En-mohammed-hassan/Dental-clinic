<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("appointments.index", ["apps" => Appointment::orderBy("app_date", "desc")->orderBy("app_time", "desc")->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("appointments.create", ["patients" => Patient::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $patient = Patient::where('name', "Like", $request->patient_name)->first();
        if (isset($patient)) {
            $fields = $request->validate([

                "app_date" => ["date", "required"],
                "app_time" => "required",
                "periode" => "required"


            ]);
            $fields["patient_id"] = $patient->id;

            Appointment::create($fields);
            return redirect("/Appointments")->with("message", "Appointment created successfully ");

        } else
            return redirect("/Appointments")->with("message", "the patient is not exsist");



    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $Appointment)
    {
        $app = Appointment::whereDate("app_date", "=", $Appointment->app_date)->orderBy("app_time", "asc")->get();
        if (isset($app)) {
            return view("appointments.showapps", ["apps" => $app]);
        } else
            return redirect("/Appointments")->with("message", "no appointments in this  day ");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $Appointment)
    {
        return view("appointments.edit", ["patients" => Patient::all(), "apps", "Appointment" => $Appointment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $Appointment)
    {

        $patient = Patient::where('name', "Like", $request->patient_name)->first();
        if (isset($patient)) {
            $fields = $request->validate([

                "app_date" => ["date", "required"],
                "app_time" => "required"


            ]);
            $fields["patient_id"] = $patient->id;

            $Appointment->update($fields);
            return redirect("/Appointments")->with("message", "Appointment updated successfully ");

        } else
            return redirect("/Appointments")->with("message", "the patient is not exsist");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $Appointment)
    {
        $Appointment->delete();
        return redirect("/Appointments")->with("message", "Appointment deleted successfully ");

    }
    public function showapps(Request $request)
    {

        $app = Appointment::whereDate("app_date", "=", $request->app_date)->orderBy("app_time", "asc")->get();

        if (isset($app[0])) {
            return view("appointments.showapps", ["apps" => $app]);
        } else
            return redirect("/Appointments")->with("message", "no appointments in this  day ");
    }
}