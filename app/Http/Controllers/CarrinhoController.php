<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;
use Illuminate\Support\Facades\Session;


class CarrinhoController extends Controller
{
    private $objBook;
    
    public function __construct()
    {
        $this->objBook=new ModelBook();
    }


    
    public function index()
    {
        $carrinho = Session::get('carrinho', []);
        $produtos = [];

    foreach ($carrinho as $produtoId => $quantidade) {
        $book = $this->objBook->find($produtoId);

        if ($book) {
            $book->quantidade = $quantidade;
            $produtos[] = $book;
        }
    }
    
    return view('carrinho.index', compact('produtos', 'carrinho'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCart(Request $request)
    {
        $produtoId = (string) $request->input('produto_id'); // Converta para string
        $quantidade = $request->input('quantidade');

    // Recupere o carrinho atual da sessão (ou crie um novo)
        $carrinho = Session::get('carrinho', []);

        if (array_key_exists($produtoId, $carrinho)) {
        // Atualize a quantidade do livro existente
            $carrinho[$produtoId] += $quantidade;
        } else {
        // Adicione o item ao carrinho
            $carrinho[$produtoId] = $quantidade;
    }

    // Atualize a sessão com o carrinho atualizado
    Session::put('carrinho', $carrinho);

    return redirect()->route('carrinho.index')->with('mensagem', 'Produto adicionado ao carrinho com sucesso!');
    }

}
