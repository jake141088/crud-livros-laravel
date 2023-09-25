@extends('templates.master')

@section('content')
    <h1 class="text-center">Cadastrar Autor</h1><hr>

    <div class='col-8 m-auto'>
        <form name="formCadAuthor" id="formCadAuthor" method="post" action="{{ route('authors.store') }}">
            @csrf

            <input class="form-control" type="text" name="name" id="name" placeholder="Nome do Autor" required><br>
            <input class="form-control" type="text" name="email" id="email" placeholder="Email do Autor" required><br>
            <input class="form-control" type="text" name="password" id="password" placeholder="Senha do Autor" required><br>
            <!-- Outros campos do autor, se necessário -->

            <input class="btn btn-primary" type="submit" value="Cadastrar Autor"><br>
        </form>
    </div>
@endsection
