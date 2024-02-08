<?php

namespace App\Http\Controllers;

use App\ZBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = ZBlog::all();
        $cont = 0;
        $band = 0;

        return view('configs.blogs.index', compact('blogs', 'cont', 'band'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configs.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new ZBlog;
        // dd($request);

        $contenido = $request->contenido;
        
        /*
        $file_blog = $request->file('portada');
        $extension_blog = $file_blog->getClientOriginalExtension();
        $namefile_blog = Str::random(30) . '.' . $extension_blog;
    
        \Storage::disk('local')->put("img/photos/blog/" . $namefile_blog, \File::get($file_blog));
        */
        
        if ($imagen = $request->file('portada')) {
            $destinationPath = 'img/photos/blog/';
            $profileImage = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($destinationPath, $profileImage);
            
            $blog->portada = "$profileImage";
        }
        
        $blog->titulo = $request->titulo;
        $blog->resumen = $request->descripcion;
        $blog->color = $request->colorPicker;
        $blog->post = $request->contenido;

        $blog->save();

        return redirect()->route('config.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = ZBlog::find($id);

        return view('configs.blogs.edit', compact('post'));
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
        // dd($request);
        $blogu = ZBlog::find($id);
        /*
        if($request->file('portada') != null) {
            $file_blog = $request->file('portada');
            $oldFile = $blogu->portada;
            $extension_blog = $file_blog->getClientOriginalExtension();
            $namefile_blog = Str::random(30) . '.' . $extension_blog;
        
            \Storage::disk('local')->put("/img/photos/blog/" . $namefile_blog, \File::get($file_blog));
    
            \Storage::disk('local')->delete("/img/photos/blog/" . $oldFile);
    
            $blogu->portada = $namefile_blog;
        }
        */
        
        if ($imagen = $request->file('portada')) {
            $destinationPath = 'img/photos/blog/';
            $oldFile = "img/photos/blog/".$blogu->portada;
            $profileImage = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($destinationPath, $profileImage);
            unlink($oldFile);
            $blogu->portada = "$profileImage";
        }

        $blogu->titulo = $request->titulo;
        $blogu->resumen = $request->descripcion;
        $blogu->color = $request->colorPicker;
        $blogu->post = $request->contenido;

        $blogu->update();

        return redirect()->route('config.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = ZBlog::find($id);

        $img = 'img/photos/blog/'.$blog->portada;
        unlink($img);

        $blog->delete();

        return redirect()->back();
    }

    public function guardar_imagen(Request $request) {
        
        if ($request->file('imagen') != null) {
            $imagen = $request->file('imagen');

            // Directorio donde se guardarán las imágenes
            $directorio = 'img/photos/blog';

            // Obtener un nombre único para la imagen
            $nombreImagen = uniqid() . '_' . $imagen['name'];

            // Ruta completa del archivo
            $rutaCompleta = $directorio . $nombreImagen;

            // Mover la imagen al directorio especificado
            move_uploaded_file($imagen['tmp_name'], $rutaCompleta);

            // Devolver la URL de la imagen
            echo json_encode(array('imagenURL' => $rutaCompleta));
        } else {
            // No se recibió ninguna imagen
            echo json_encode(array('error' => 'No se recibió ninguna imagen.'));
        }
    }
}
