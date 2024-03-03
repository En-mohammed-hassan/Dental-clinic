
@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between w-100">
        <h1>   {{$patient->name}}  </h1>
        <a class="btn btn-secondary mb-2" href="/patients/{{$patient->id}}">Back</a>
    </div>
    <div class="table-responsive">
    <table class="table table-stripped table-bordered    table-hover">
        <thead>
            <tr class="table-primary">
                <th class="text-center ">Appointment Date </th>
                <th class="text-center ">Appointment Time</th>

            </tr>
        </thead>
        <tbody>

                    @php
                       $appointments = blank ($patient->appointments()->get()) ? "no Appointments" :   $patient->appointments()->orderBy("app_date","desc")->get();
                       @endphp
                    @if ($appointments == "no Appointments")
                <tr>

                    <td class="text-center">{{$appointments}}</td>
                    <td class="text-center">{{$appointments}}</td>
                </tr>
                    @else

                    @foreach ($appointments as $appointment )
                     <tr>
                        <td  class="text-center">
                            @php
                            $date = strtotime($appointment->app_date);
                            $day=date("D",$date);
                            @endphp

                         {{ $day }} : {{$appointment->app_date}}

                        </td>
                        <td  class="text-center">
                            {{     date("g:i a", strtotime($appointment->app_time))}}
                        </td>
                     </tr>
                    @endforeach
                     @endif

            </tbody>
        </table>
</div>
@endsection
