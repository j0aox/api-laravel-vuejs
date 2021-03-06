<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Image;


class ContatoController extends Controller
{
    public function get_all_contato()
    {
        $contatos = Contato::all();
        return response()->json([
            'contatos' => $contatos
        ], 200);
    }

    public function add_contato(Request $request)
    {
        $contato = new Contato();
        $contato->name = $request->name;
        $contato->email = $request->email;

        if ($request->photo != "") {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path() . "/upload/";
            $img->save($upload_path . $name);
            $contato->photo = $name;
        } else {
            $contato->photo = "image.png";
        }

        $contato->photo = $name;
        $contato->password = $request->password;
        $contato->save();
    }

    public function get_edit_contato($id)
    {
        $contatos = Contato::find($id);
        return response()->json([
            'contatos' => $contatos
        ], 200);
    }

    public function update_contato(Request $request, $id)
    {
        $contato = Contato::find($id);
        $contato->name = $request->name;
        $contato->email = $request->email;

        if ($request->photo != $request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path() . "/upload/";
            $image = $upload_path. $contato->photo;
            $img->save($upload_path . $name);
            if (file_exists($image)) {
                @unlink($image);
            }
        } else {
            $name = $contato->photo;
        }

        $contato->photo = $name;
        $contato->password = $request->password;
        $contato->save();
    }

    public function delete_contato($id)
    {
        $contato = Contato::findOrFail($id);
        $image_path = public_path()."/upload/";
        $image = $image_path . $contato->photo;

        if (file_exists($image)) {
            @unlink($image);
        }

        $contato->delete();
    }
}
