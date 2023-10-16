@extends('templates.master')

@section('content')
<div class=" text-center mt-8">
    <div class="row">
        <h2>Meu Carrinho</h2>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
            <a href="{{ route('home.index') }}" class="btn btn-primary">Voltar para a Página Inicial</a>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  
  @foreach($produtos as $key => $produto)
  <tr>
      <th scope="row">{{$key+1}}</th>
      @if ($produto)
          <td>{{$produto->title}}</td>
          <td>@if (is_numeric(intval($produto->price))) R$ {{$produto->price}} @else N/A @endif</td>
          <td>
              @if (is_numeric($carrinho[$produto->id]))
                  {{ $carrinho[$produto->id] }}
              @else
                  N/A
              @endif
          </td>
          <td>
              @if (is_numeric(intval($produto->price)) && is_numeric($carrinho[$produto->id]))
                  R$ {{ intval($produto->price) * $carrinho[$produto->id] }}
              @else
                  N/A
              @endif
          </td>
      @else
          <td>Produto não encontrado</td>
          <td>N/A</td>
          <td>N/A</td>
          <td>N/A</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection