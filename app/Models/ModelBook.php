<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBook extends Model
{
    //use HasFactory;
    protected $table='books';
//medida de segunca para ser possivel cadastrar esses campos:
    protected $fillable = [
        'id',
        'title',
        'id_user',
        'pages',
        'price'
    ];

    public function relUser()
    {
        return $this->hasOne(User::class, 'id', 'id_user');//1 livro-> 1 autor
    }
}