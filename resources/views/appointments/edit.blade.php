@extends('layouts.app')
@section('content')
    <form action="/Appointments" method="post">
        @csrf
        <div class="mb-3">



            <label for="pat" class="form-label">Select a patient :</label>


            <input list="pat" name="patient_name" class="form-control" value="{{$Appointment->patient()->get()[0]->name}}">
            @error("patient_name")
                {{$message}}
            @enderror

            <datalist id="pat">
                @foreach ($patients as $patient )

                <option value="{{$patient->name}}"  >
                @endforeach

            </datalist>




            <label for="date" class="form-label">Select a date :</label>
            <input type="date" id="date" name="app_date" class="form-control" value="{{$Appointment->app_date}}">
            @error("app_date")
            {{$message}}
        @enderror
            <label for="appt">Select a time :</label>
            <input type="time" id="appt" name="app_time" class="form-control " value={{$Appointment->app_time}}>
            @error("app_time")
            {{$message}}
        @enderror
        </div>
        <button class="btn btn-secondary">Add Appointment</button>
        <a class="btn btn-outline-secondary" href="/Appointments">back</a>
    </form>

@endsection
