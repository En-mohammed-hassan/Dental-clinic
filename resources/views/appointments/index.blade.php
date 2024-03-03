@extends('layouts.app')
@section('content')


<h1 class=" ">All Appointments</h1>
        <div class="d-flex justify-content-between w-100">
            <form action="/Appointments/showapps" method="POST">
                @csrf

                <div class="d-flex justify-content-between w-100">
                <button class="btn btn-secondary  me-2 ">show</button>

                <label for="date" class="form-label"></label>
                <input type="date" id="date" name="app_date" class=" rounded-2" value="{{date("Y-m-d")}}">
               </div>
            </form>
            <a class="btn btn-secondary mb-2" href="/Appointments/create">Add </a>

        </div>
        <div class="table-responsive">

        <table class="table table-stripped table-bordered">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">Name</th>
                    <th class="text-center">Appointment date</th>
                    <th class="text-center">Appointment time</th>
                    <th class="text-center">periode</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                @php
                $date = strtotime($app->app_date);
                $day=date("D",$date);
                @endphp
                    <tr>
                        <td class="text-center">{{ $app->patient()->get()[0]->name }}</td>
                        <td class="text-center">{{$day}} : {{    $app->app_date }} </td>
                        <td class="text-center">{{  date("g:i a", strtotime($app->app_time))  }}</td>
                        <td class="text-center">{{ $app->periode }} min</td>

                        <td class="text-center d-flex justify-content-around">
                            <a class="btn btn-sm btn-outline-primary m-2 " href="/Appointments/{{ $app->id }}/edit"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-outline-success m-2   " href="/patients/{{ $app->patient()->get()[0]->id }}"><i class="fas fa-eye"></i></a>

                            <form action="/Appointments/{{ $app->id }}" method="post" class="d-inline-block" >
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-outline-danger m-2"><i class="fas fa-trash-alt" ></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        <div class="w-100">


            {{$apps->links()}}

        </div>

@endsection
