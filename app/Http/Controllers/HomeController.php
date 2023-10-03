<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;

class HomeController extends Controller
{
    private $objBook;
    
    public function __construct()
    {
        $this->objBook=new ModelBook();
    }
    
    public function index(){
        $books=$this->objBook->paginate(5);
        return view('home.index', compact('books'));
    }

    public function show($book)
    {
        $book=ModelBook::find($book);
        return view ('home.show', compact('book'));
    }

}
