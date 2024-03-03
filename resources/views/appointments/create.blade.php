@extends('layouts.app')
@section('content')
    <form action="/Appointments" method="post">
        <div class="mb-3">

        @csrf
        <div class="mb-3">
            <label for="pat" class="form-label">Select a patient :</label>
            <input list="pat" name="patient_name" class="form-control">
            @error("patient_name")
                {{$message}}
            @enderror
            <datalist id="pat">
            @foreach ($patients as $patient )

            <option value="{{$patient->name}}"  >
            @endforeach

            </datalist>
        </div>

        <div class="mb-3">

            <label for="date" class="form-label">Select a date :</label>
            <input type="date" id="date" name="app_date" class="form-control" value="{{date("Y-m-d",strtotime("tomorrow"))}}">
            @error("app_date")
            {{$message}}
        @enderror
        </div>

        <div class="mb-3">

            <label for="appt" class="form-label">Select a time :</label>
            <input type="time" id="appt" name="app_time" class="form-control " value="16:00">
            @error("app_time")
            {{$message}}
        @enderror
        </div>

        <div class="mb-3">
            <label for="periode" class="form-label">Select a Periode :</label>
            <select class="form-control"  name="periode" id="periode">
                <option value="15" >15</option>
                <option value="30" selected >30</option>
                <option value="45"  >45</option>
                <option value="60">60</option>
                <option value="75">75</option>
                <option value="90">90</option>
                <option value="105">105</option>
                <option value="120">120</option>
            </select>

            {{-- <input type="text" id="name" name="name" class="form-control" value={{old("name")}}> --}}
            @error("name")
                {{$message}}
            @enderror
        </div>
        </div>

        <button class="btn btn-secondary">Add Appointment</button>
        <a class="btn btn-outline-secondary" href="/Appointments">back</a>
    </form>


@endsection
