<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
//use Intervention\Image\Facades\Image;
use Image;

class ContatoController extends Controller
{
    public function get_all_contato() {
        $contatos = Contato::all();
        return response()->json([
            'contatos' => $contatos
        ],200);
    }

    public function add_contato(Request $request) {
        
        $contato = new Contato();
        $contato->name = $request->name;
        $contato->email = $request->email;
        if ($request->photo != "") {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo,0,$strpos);
            $ex = explode('/', $sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->file('photo'))->resize(200, 200);
            $upload_path = public_path(). "/upload";
            $img->save($upload_path.$name);
            $contato->photo = $name;
        } else {
            $contato->photo = "image.png";
        }

        $contato->photo = $name;
        $contato->password = $request->password;
        $contato->save();
        
    }

   
    
}
