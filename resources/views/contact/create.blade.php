@extends('layouts.app')

@section('content')

    @if (session()->has('error'))
    <div class="alert alert-danger">
    <strong>{{Session::get("error")}}</strong>
    </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}<li>
                @endforeach
            </ul>
        </div>
    @endif
    {!!Form::open(['route'=>'contact.store'])!!}
        <label for="email">Contact Email</label>
        <input id="email" name="email" type="text" class="input-group col-4 @error('email') is-invalid @enderror">

        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection
