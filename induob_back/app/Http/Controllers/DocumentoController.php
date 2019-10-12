<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documento;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
    public function inicio()
    {

        $documento = Documento::all();

        return view('welcome', compact('documento'));
    }

    public function guardarDocumento(Request $request)
    {
        $this->validate($request, [
            'documento' => 'required|mimes:pdf|max:4096',
        ]);

        $file = $request->file('documento');
        $fileName = $file->getClientOriginalName();

        $docTemp = Documento::where('titulo', $fileName)->get();
        if (!$docTemp->isEmpty()) {
            return 'ya existe un archivo con el mismo nombre';
        }
        $documento = new Documento;
        $documento->titulo = $fileName;
        $documento->descripcion = 'vacio';
        $documento->save();

        $file->storeAs('logos', $fileName);
        return  redirect()->route('inicio');
    }

    public function descargarDocumento($titulo)
    {
        $tituloDoc = $titulo.'.pdf';
        $documento = Documento::where('titulo', $tituloDoc)->first();
        if ($documento->isEmpty()) {
            return 'No existe archivo '.$tituloDoc;
        }

        return response()->download(storage_path("app/logos/{$tituloDoc}"));
        //PDF file is stored under project/public/download/info.pdf
        // $file= public_path(). "/download/info.pdf";

    }

    public function borrarDocumento($titulo){
        $tituloDoc = $titulo.'.pdf';
        $documento = Documento::where('titulo', $tituloDoc)->first();
        if ($documento==NULL) {
            return 'No existe archivo '.$tituloDoc;
        }        
        $documento->delete();
        Storage::delete('logos'.'/'.$tituloDoc);
    }
}
