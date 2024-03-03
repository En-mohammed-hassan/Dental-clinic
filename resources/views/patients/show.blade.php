
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between w-100">
        <h1> Patient : {{$patient->name}} </h1>
        <a class="btn btn-secondary mb-2" href="/patients">Back</a>
    </div>
    <div class="table-responsive">
    <table class="table table-stripped table-bordered    table-hover">
        <thead>
            <tr class="table-primary">
                <th class="text-center">Name</th>
                <th class="text-center ">Last  appointment Date </th>
                <th class="text-center ">Last  appointment Time</th>
                <th class="text-center">Document_id</th>
                <th class="text-center">Phone</th>
                <th class="text-center ">Notes</th>
                <th class="text-center ">Show all Appointments</th>
            </tr>
        </thead>
        <tbody>

                <tr>
                    <td class="text-center">{{ $patient->name }}</td>
                    @php
                       $appointments = blank ($patient->appointments()->get()) ? "no Appointments" :   $patient->appointments()->get();
                       @endphp
                    @if ($appointments == "no Appointments")

                    <td class="text-center">{{$appointments}}</td>
                    <td class="text-center">{{$appointments}}</td>

                    @else
                    <td  class="text-center">
                        @php
                        $date = strtotime($appointments[ $appointments->count()-1]->app_date);
                        $day=date("D",$date);
                        @endphp

                        {{   $day }} : {{ $appointments[ $appointments->count()-1]->app_date}}
                    </td>
                    <td  class="text-center">
                        {{     date("g:i a", strtotime($appointments[ $appointments->count()-1]->app_time))}}

                    </td>
                    @endif
                    <td class="text-center">{{ $patient->document_id }}</td>

                    <td class="text-center">{{ $patient->phone }}</td>

                    <td class="text-center">{{ empty ($patient->notes) ? "no notes" : $patient->notes }}</td>

                    <td class="text-center" >
                        <a class="btn btn-sm btn-outline-primary mx-2 " href="/patients/show/{{ $patient->id }}"> show all </a>
                    </td>

                </tr>

            </tbody>
        </table>
</div>
@endsection
