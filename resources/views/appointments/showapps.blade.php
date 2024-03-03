@extends('layouts.app')
@section('content')
@php
    // $date= new DateTime($apps[0]->app_date);
    // $day=$date->format("D");

    $date = strtotime($apps[0]->app_date);
    $day=date("D",$date);
@endphp
<h1>  {{$day}} : {{    $apps[0]->app_date }}   </h1>
        <div class="d-flex justify-content-between w-100">
            <form action="/Appointments/showapps" method="POST">
                @csrf
                <button class="btn btn-secondary">show</button>
                <label for="date" class="form-label"></label>
                <input type="date" id="date" name="app_date" class="" value="{{$apps[0]->app_date}}">
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
                    <tr>
                        <td class="text-center">{{ $app->patient()->get()[0]->name }}</td>
                        <td class="text-center">{{$day}} : {{    $apps[0]->app_date }} </td>
                        <td class="text-center">{{  date("g:i a", strtotime($app->app_time))  }}</td>
                        <td class="text-center">{{ $app->periode }} min</td>

                        <td class="text-center d-flex justify-content-around">
                            <a class="btn btn-sm btn-outline-primary m-2 " href="/Appointments/{{ $app->id }}/edit"><i
                                    class="align-middle" data-feather="edit"></i></a>
                            <a class="btn btn-sm btn-outline-success m-2   " href="/Appointments/{{ $app->id }}"><i
                                    class="align-middle" data-feather="eye"></i></a>

                            <form action="/Appointments/{{ $app->id }}" method="post" class="d-inline-block">
                                @csrf
                                @method("delete")
                                <button class="btn btn-sm btn-outline-danger m-2"><i class="align-middle"
                                        data-feather="trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
@endsection
