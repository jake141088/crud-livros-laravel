@extends('templates.master')

@section('content')
    <h1 class="text-center">Visualizar</h1><hr>

    <div class='col-8 m-auto' >  
          Título: {{$book->title}}<br>
          Páginas: {{$book->pages}}<br>
          Preço: R$ {{$book->price}}<br>
          Autor: {{$book->relUser->name}}<br>
    </div>
@endsection
