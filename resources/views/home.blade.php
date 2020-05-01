@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('success'))
            <div class="alert alert-success">
            <strong>{{Session::get("success")}}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>
                @forelse ($phones as $phone)

                    <div class="card-body row">
                            <strong class="ml-5">
                                {{$phone['number']}}
                            </strong>
                        <a href="{{route('phone.edit',$phone)}}" class="btn btn-info text-light ml-2">Update</a>
                        {!! Form::open(['route'=>['phone.destroy',$phone],'method'=>'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>"btn btn-danger text-light ml-2"]) !!}
                        {!! Form::close() !!}
                    </div>
                    @empty
                    <div class="card-body">
                    <strong> You have no phone numbers yet! </strong>
                    </div>
                    @endforelse

            </div>
        </div>
    </div>
</div>
@endsection
