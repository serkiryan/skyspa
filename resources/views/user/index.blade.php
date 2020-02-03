@extends('layouts.app')

@section('content')
<h5 class="bg-success text-white p-2">Мои контакты</h5>
<table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{$contact->name}}</td>
          <td>{{$contact->phone}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $contacts->links() }}
@endsection
