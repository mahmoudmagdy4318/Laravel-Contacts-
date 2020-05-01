@extends('layouts.app')

@section('content')
<a href="{{route('contact.create')}}" class="btn btn-info text-light ml-2">Add Contact</a>

<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">phones</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @forelse ($contacts as $contact)
        <tr>
        <th scope="row">{{$contact->id}}</th>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>
            <ul>
                @forelse ($contact->phones as $phone)
                    <li>{{$phone->number}}</li>
                @empty
                    <strong>He has no phones on the system.</strong>
                @endforelse
            </ul>
        </td>
        <td>
            {!! Form::open(['route'=>['contact.destroy',$contact],'method'=>'delete']) !!}
                {!! Form::submit('X', ['class'=>"btn btn-danger text-light ml-2"]) !!}
            {!! Form::close() !!}
        </td>
        </tr>
        @empty
        <tr>
            <div class="card-body">
                <strong>You have no contacts yet!</strong>
            </div>
        </tr>
        @endforelse

    </tbody>
  </table>

@endsection
