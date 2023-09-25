@extends('templates.master')

@section('content')
    <h1 class="text-center">Cadastro do Autor</h1><hr>

    <div class="text-center mt-3 mb-4">
      <a href="{{url('authors/create')}}">
        <button class="btn btn-success">Cadastrar novo Autor</button>
      </a>
    </div>

    <div class='col-8 m-auto' >  
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
              {{-- <td>{{$user->name}}</td> --}}
              <td>{{$book->relUser->name}}</td>
              <td>{{$book->price}}</td>
              <td>
                <a href="{{url("books/$book->id")}}">
                  <button class="btn btn-dark">Visualizar</button></a>

                <a href="{{route('books.edit', ['book' => $book])}}">
                  <button class="btn btn-primary">Editar</button></a>

                <a href="">
                  <button class="btn btn-danger">Deletar</button></a>
              <td>
            </tr>
            @endforeach
             
            </tbody>
          </table>
    </div>
@endsection
