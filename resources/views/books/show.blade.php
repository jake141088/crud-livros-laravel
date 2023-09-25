@extends('templates.master')

@section('content')
    <h1 class="text-center">Visualizar</h1><hr>

    <div class='col-8 m-auto' >  
        @php
            $user=$book->find($book->id)->relUser;
        @endphp
          Título: {{$book->title}}<br>
          Páginas: {{$book->pages}}<br>
          Preço: R$ {{$book->price}}<br>
          Autor: {{$user->name}}<br>
          Email do autor: {{$user->email}}<br>
    </div>
@endsection
