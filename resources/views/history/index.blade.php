@extends('layouts.app')

@section('content')
<h5 class="bg-success text-white p-2">История</h5>
<a href="{{route('export')}}" class="btn btn-primary">Експорт</a>
<table class="table">
      <thead>
        <tr>
          <th scope="col">Дата</th>
          <th scope="col">Действие</th>
          <th scope="col">Результат</th>
        </tr>
      </thead>
      <tbody>
        @foreach($history as $h)
        <tr>
          <td>{{$h->created_at}}</td>
          <td>{{$h->action}}</td>
          <td>{{$h->result?'Успешно':'Ошибка'}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $history->links() }}
@endsection
