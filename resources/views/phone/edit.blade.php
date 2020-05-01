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
    {!!Form::model($phone,['route'=>['phone.update',$phone],'method'=>'put'])!!}
        <div class="form-group">
        {!! Form::text('number', null, ['class'=>'form-control col-4']) !!}
        {{-- <input id="title" name="phone" type="number" class="input-group col-4 @error('title') is-invalid @enderror"> --}}
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
@endsection

