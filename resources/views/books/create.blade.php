@extends('templates.master')

@section('content')
    
    <h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1><hr>
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mb-4 mt-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($book))
            <form name="formEdit" id="formEdit" method="post" action="{{url("books/$book->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
        @endif

    <div class='col-8 m-auto' >

    </div>
    
    <div class='col-8 m-auto' >  
        <form name="formCad" id="formCad" method="post" action="{{url('books')}}">
        @csrf

        <input class="form-control" type="text" name="title" id="title" placeholder="Título:" value="{{$book->title ?? ''}}" required><br>
        
        <select class="form-control" name="id_user" id="id_user">
            <option value="{{$book->relUser->id ?? ''}}">{{$book->relUser->name ?? 'Autor'}}</option>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach 
        </select><br>
        
        <input class="form-control" type="text" name="pages" id="pages" placeholder="Páginas:" value="{{$book->pages ?? ''}}" required><br> 
        <input class="form-control" type="text" name="price" id="price" placeholder="Preço:" value="{{$book->price ?? ''}}" required> <br>
        <input class="btn btn-primary" type="submit" value="@if(isset($book))Editar @else Cadastrar @endif"><br> 
        </form>
    </div>
@endsection
