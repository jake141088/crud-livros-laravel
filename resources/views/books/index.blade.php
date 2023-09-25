@extends('templates.master')

@section('content')
    <h1 class="text-center">Cadastro</h1><hr>

    <div class="text-center mt-3 mb-4">
      <a href="{{url('books/create')}}">
        <button class="btn btn-success">Cadastrar Livro</button>
      </a>
    </div>

    <div class="text-center mt-3 mb-4">
      <a href="{{route('authors.create')}}">
        <button class="btn btn-primary">Cadastrar Autor</button>
      </a>
    </div>

    <div class='col-8 m-auto' >  
        @csrf  
        <table class="table text-center table-striped" >
            <!-- Use a classe "thead-dark" para fazer a primeira linha ter fundo escuro -->
            <thead class="table-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Preço</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
            <tr>
              <th scope="row">{{$book->id}}</th>
              <td>{{$book->title}}</td>
              <td>{{$book->relUser->name}}</td>
              <td>{{$book->price}}</td>
              <td>
                <a href="{{url("books/$book->id")}}">
                  <button class="btn btn-dark">Visualizar</button></a>

                <a href="{{route('books.edit', ['book' => $book])}}">
                  <button class="btn btn-primary">Editar</button></a>

                <button class="btn btn-danger js-del" ref="btn-del" id="btn" value="{{$book->id}}">Deletar</button>
              </td>
            </tr>
            @endforeach
            
            </tbody>
          </table>
      {{$books->links()}}
    </div>

    @push('scripts')
      <script>
        (function(win, doc) {
    'use strict';
        function confirmDel(event){
          event.preventDefault();
          let token = doc.querySelector('input[name="_token"]').value;

          if (confirm("Deseja mesmo apagar?")) {
            let ajax = new XMLHttpRequest();
            console.log(event.target.parentElement.baseURI)
            ajax.open("DELETE", event.target.parentElement.baseURI+"/" + event.target.value); // Correção: era parentNote e deve ser parentElement

            ajax.setRequestHeader('X-CSRF-TOKEN', token);

            ajax.onreadystatechange = function() {
                if (ajax.readyState === 4) {
                    if (ajax.status === 200) {
                        win.location.href="books";
                    } else {
                        alert('houve um erro ao tentar deletar!')
                    }
                }
            };
            ajax.send();
        } else {
            return false;
        }
          
        }

        if (doc.querySelector('.js-del')) {
        let btn = doc.querySelectorAll('.js-del'); // Seleciona todos os botões de deletar
        for (let i = 0; i < btn.length; i++) {
            btn[i].addEventListener('click', confirmDel, false);
        } // Coloca todos em loop e quando um na posição i for clicado chama confirmDel
    }
    })(window, document);

      </script>
      {{-- <script src="{{ asset('assets/js/delete.js') }}"></script> --}}
    @endpush
@endsection
