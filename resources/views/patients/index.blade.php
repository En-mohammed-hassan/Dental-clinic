@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between w-100">
        <h1>All Patients</h1>

        <a class="btn btn-secondary mb-2" href="/patients/create">Add Patienet </a>

        </div>
        <div class="table-responsive">
    <table class="table table-stripped table-bordered">
        <thead>
            <tr class="table-primary">
                <th class="text-center">Name</th>
                <th class="text-center">Document_id</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td class="text-center">{{ $patient->name }}</td>
                    <td class="text-center">{{ $patient->document_id }}</td>
                    <td class="text-center">{{ $patient->phone }}</td>
                    <td class="text-center d-flex justify-content-around " >
                        <a class="btn btn-sm btn-outline-primary m-2 " href="/patients/{{ $patient->id }}/edit"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-outline-success m-2   " href="/patients/{{ $patient->id }}"><i class="fas fa-eye"></i></a>
                        <form action="/patients/{{ $patient->id }}" method="post" class="d-inline-block">
                            @csrf
                            @method("delete")
                            <button class="btn btn-sm btn-outline-danger m-2"> <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="w-100">
        {{$patients->links()}}
    </div>
@endsection
