<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    //Modificar para que simplemente retorne el listado de documentos!
    public function inicio()
    {
        $documento = Document::all();
        return view('welcome', compact('documento'));
    }

    public function index()
    {
        $documentos = Document::all();
        return $documentos;
    }
    public function guardarDocumento(Request $request)
    {
        $this->validate($request, [
            'documento' => 'required|mimes:pdf|max:4096',
        ]);

        $file = $request->file('documento');
        $fileName = $file->getClientOriginalName();

        $docTemp = Document::where('titulo', $fileName)->get();
        if (!$docTemp->isEmpty()) {
            return 'ya existe un archivo con el mismo nombre';
        }
        $documento = new Document;
        $documento->titulo = $fileName;
        $documento->descripcion = 'vacio';
        //Despues se asignara a un modulo en particular!!!
        $documento->module_id = 1;
        $documento->save();

        $file->storeAs('logos', $fileName);
        return  redirect()->route('inicio');
    }

    public function descargarDocumento($id_documento)
    {
        
        $documento = Document::where('id', $id_documento)->get();
        if ($documento->isEmpty()) {
            return 'No existe archivo solicitado';
        }
        $documento = $documento->first();
        return response()->download(storage_path("app/logos/{$documento->titulo}"));
        //PDF file is stored under project/public/download/info.pdf
        // $file= public_path(). "/download/info.pdf";

    }

    public function borrarDocumento($id_documento){
        
        $documento = Document::where('id', $id_documento)->first();
        if ($documento==NULL) {
            return 'No existe archivo ';
        }        
        
        Storage::delete('logos'.'/'.$documento->titulo);
        $documento->delete();
    }
}
