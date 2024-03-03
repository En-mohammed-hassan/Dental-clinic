

@extends('layouts.app')
@section('content')
    <form action="/patients/{{ $patient->id }}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control"  value="{{ $patient->name }}">
            @error("name")
                {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">phone</label>
            <input type="text" id="phone" name="phone" class="form-control"  value="{{ $patient->phone }}">
            @error("phone")
            {{$message}}
        @enderror
        </div>
        <div class="mb-3">
            <label for="document_id" class="form-label">document_id</label>
            <input type="text" id="document_id" name="document_id" class="form-control"  value="{{ $patient->document_id }}">
            @error("document_id")
            {{$message}}
        @enderror
        </div>
        <div class="mb-3">

            <label for="date" class="form-label">first_visit</label>
            <input type="date" id="date" name="first_visit" class="form-control" value="{{date("Y-m-d",strtotime("tomorrow"))}}">
            @error("app_date")
            {{$message}}
        @enderror
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">notes</label>

                <textarea name="notes" id="notes" cols="30" class="form-control" rows="10"  >{{ $patient->notes }}</textarea>
        </div>
        <button class="btn btn-secondary">Save patient</button>
        <a class="btn btn-outline-secondary" href="/patients">back</a>
    </form>
@endsection

