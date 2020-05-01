@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{$err}}<li>
                @endforeach
            </ul>
        </div>
    @endif
    {!!Form::open(['route'=>'phone.store'])!!}
        <label for="number">Phone number</label>
        <input id="number" name="number" type="number" class="input-group col-4 @error('number') is-invalid @enderror">


        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection

