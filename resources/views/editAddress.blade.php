@extends('layouts.app')

@section('content')
    {!!Form::open(['route'=>['home.updateAddress'],'method'=>'put'])!!}
        <div class="form-group">
        {!! Form::text('address', $address, ['class'=>'form-control col-4']) !!}
        {{-- <input id="title" name="phone" type="number" class="input-group col-4 @error('title') is-invalid @enderror"> --}}
        </div>
        @error('address')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection
