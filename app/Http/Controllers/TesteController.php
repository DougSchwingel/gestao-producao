<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index()
    {
        $nome = 'Douglas';

        return view('teste', [
            'nome' => $nome
        ]);
    }
}
