<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    public function get_all_contato() {
        $contatos = Contato::all();
        return response()->json([
            'contatos' => $contatos
        ],200);
    }
}
