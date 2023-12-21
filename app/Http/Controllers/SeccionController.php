<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\Elemento;
use App\services;
use App\herramientas;
use App\equipo;
use App\Configuracion;
use App\logoequipos;
use App\Carrusel;
use App\Categoria;
use App\Producto;
use App\colores;
use App\ProductosPhoto;
use App\PFCategoriaProducto;
use App\PFNecesidades;
use App\PFProducto;
use App\PFProyecto;
use App\PFPuntoVenta;
use App\PFSliderPrincipal;
use App\PFSolucion;
use App\PFGaleria;
use App\PFSubdistribuidor;
use App\PFPresentacionProducto;
use App\ZSliderPrincipal;
use App\ZCliente;
use App\ZServicio;
use App\ZProyecto;
use App\ZVacante;
use App\Estado;
use App\Municipio;
use App\ZBeneficio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeccionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        

			$seccion = Seccion::all();
            
			foreach ($seccion as $sec) {
				$sec->elements = $sec->elementos()->count();  
			}
          
			return view('configs.secciones.index',compact('seccion'));
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

    public function sucursalCreate(Request $request){

        $sucursal = new services;

        $sucursal->icono = $request->iframe;
        $sucursal->descripcion = $request->descripcion;

        if($sucursal->save()){
            \Toastr::success('Guardado');
            return redirect()->back();
        }else{
            \Toastr::error('Error al crear sucursal');
            return redirect()->back();
        }


    }

    public function sucursalDelete(Request $request){
        $id_suc = $request->id_suc;

        $sucursal = services::find($id_suc);

        if($sucursal->delete()){
            \Toastr::success('Eliminado');
            return redirect()->back();
        }else{
            \Toastr::error('Error al Eliminar sucursal');
            return redirect()->back();
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show($seccion) {
        $config = Configuracion::all();
      
        $seccion_nom = $seccion;
            
		$seccion = Seccion::where('slug',$seccion)->first();

        $elem_general = Elemento::all();

		$elements = $seccion->elementos()->get();
            
        $slider_principal = ZSliderPrincipal::all();
        $servicios = ZServicio::orderBy('orden', 'asc')->get();
        $proyectos = ZProyecto::all();
        $clientes = ZCliente::all();
        $vacantes = ZVacante::all();
        $estados = Estado::all();
        $municipios = Municipio::all();
        $beneficios = ZBeneficio::all();

        $ruta = 'configs.secciones.'.$seccion->seccion;

		return view($ruta,compact('elements', 'config', 'elem_general', 'slider_principal', 'servicios', 'proyectos', 'clientes', 'vacantes', 'estados', 'municipios', 'beneficios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $seccion) {

		if (empty($seccion)) {
			\Toastr::error('Error, intentalo mas tarde');
			return redirect()->back();
		}

		$seccion = Seccion::find($seccion);

		$file = $request->file('portada');
		$oldFile = $seccion->portada;
		$extension = $file->getClientOriginalExtension();
		$namefile = Str::random(30) . '.' . $extension;

		\Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

		\Storage::disk('local')->delete("/img/photos/seccions/" . $oldFile);

		$seccion->portada = $namefile;

		$seccion->save();
		\Toastr::success('Guardado');
		return redirect()->back();
    }
///////////////////////////////////////////////// GLOBALES SECCIONES //////////////////////////////////////////////
    public function imgPortadaGlobal(Request $request){

        if(!empty($request->file('archivo'))){

            if(empty($request->id_element)){
                \Toastr::error('Error al subir imagen');
                return redirect()->back();
            }

            $portada = Elemento::find($request->id_element);

            if(!empty($portada->imagen)){
                \Storage::disk('local')->delete("/img/photos/seccions/" .$portada->imagen);
            }


            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

            $portada->imagen =  $namefile;

            if($portada->save()){
                \Toastr::success('Guardado');
                return redirect()->back();
            }else{
                \Toastr::error('Error al subir imagen');
                return redirect()->back();
            }

        }
    
    }

    public function image_input_ejemplo(Request $request){
        if(!empty($request->file('archivo'))){//si es diferente de vacio el archivo entonces

            if($request->tipo) {
                if($request->tipo == 'proyecto') {
                    $uproyecto = PFProyecto::find($request->id_elemento);
                    
                    $file_proyecto = $request->file('archivo');
                    $oldFilePoryectos = 'img/photos/proyectos/'.$uproyecto->imagen;
                    $extension_proyecto = $file_proyecto->getClientOriginalExtension();
                    $namefile_proyecto = Str::random(30) . '.' . $extension_proyecto;
    
                    \Storage::disk('local')->put("/img/photos/proyectos/" . $namefile_proyecto, \File::get($file_proyecto));
                    unlink($oldFilePoryectos);

                    $uproyecto->imagen = $namefile_proyecto;

                    $uproyecto->update();

                    \Toastr::success('Guardado');
                    return redirect()->back();
                } else if($request->tipo == 'vacante') {
                    $uvacante = ZVacante::find($request->id_elemento);
                    
                    $file_vacante = $request->file('archivo');
                    $oldFileVacante = 'img/photos/vacantes/'.$uvacante->portada;
                    $extension_vacante = $file_vacante->getClientOriginalExtension();
                    $namefile_vacante = Str::random(30) . '.' . $extension_vacante;
    
                    \Storage::disk('local')->put("/img/photos/vacantes/" . $namefile_vacante, \File::get($file_vacante));
                    unlink($oldFileVacante);

                    $uvacante->portada = $namefile_vacante;

                    $uvacante->update();

                    \Toastr::success('Guardado');
                    return redirect()->back();
                } else if($request->tipo == 'servicio_imagen') {
                    $serv = ZServicio::find($request->id_elemento);
                    
                    $file_solucion = $request->file('archivo');
                    $oldFilesolucion = 'img/photos/servicios/'.$serv->imagen;
                    $extension_serv = $file_solucion->getClientOriginalExtension();
                    $namefile_serv = Str::random(30) . '.' . $extension_serv;
    
                    \Storage::disk('local')->put("/img/photos/servicios/" . $namefile_serv, \File::get($file_solucion));
                    unlink($oldFilesolucion);

                    $serv->imagen = $namefile_serv;

                    $serv->update();

                    \Toastr::success('Guardado');
                    return redirect()->back();
                } else if($request->tipo == 'solucion_icono') {
                    $usolucion = PFSolucion::find($request->id_elemento);
                    
                    $file_solucion = $request->file('archivo');
                    $oldFilesolucion = 'img/photos/soluciones/'.$usolucion->icono;
                    $extension_solucion = $file_solucion->getClientOriginalExtension();
                    $namefile_solucion = Str::random(30) . '.' . $extension_solucion;
    
                    \Storage::disk('local')->put("/img/photos/soluciones/" . $namefile_solucion, \File::get($file_solucion));
                    unlink($oldFilesolucion);

                    $usolucion->icono = $namefile_solucion;

                    $usolucion->update();

                    \Toastr::success('Guardado');
                    return redirect()->back();
                } else if($request->tipo == 'categoria') {
                    $ucategoria = PFCategoriaProducto::find($request->id_elemento);
                    
                    $file_categoria = $request->file('archivo');
                    $oldFileCategoria = 'img/photos/categorias/'.$ucategoria->icono;
                    $extension_categoria = $file_categoria->getClientOriginalExtension();
                    $namefile_categoria = Str::random(30) . '.' . $extension_categoria;
    
                    \Storage::disk('local')->put("/img/photos/categorias/" . $namefile_categoria, \File::get($file_categoria));
                    unlink($oldFileCategoria);

                    $ucategoria->icono = $namefile_categoria;

                    $ucategoria->update();

                    \Toastr::success('Guardado');
                    return redirect()->back();
                }
            } else {
                if(empty($request->id_elemento)){
                    \Toastr::error('Error al subir imagen');
                    return redirect()->back();
                }
    
                $elemento = Elemento::find($request->id_elemento);
    
                if(!empty($elemento->imagen)){
                    \Storage::disk('local')->delete("/img/photos/imagenes_estaticas/" .$elemento->imagen);
                }
    
                $file = $request->file('archivo');
                $extension = $file->getClientOriginalExtension();
                $namefile = Str::random(30) . '.' . $extension;
    
                \Storage::disk('local')->put("/img/photos/imagenes_estaticas/" . $namefile, \File::get($file));
    
                $elemento->imagen = $namefile;
    
                if($elemento->save()){
                    \Toastr::success('Guardado');
                    return redirect()->back();
                }else{
                    \Toastr::error('Error al subir imagen');
                    return redirect()->back();
                }
            }

           

        }else{
            \Toastr::error('Error al subir imagen');
            return redirect()->back();
        }
    }

    public function textglobalseccion(Request $request){
        if (empty($request->tabla)) {
            return response()->json(['success'=>false, 'mensaje'=>'Cambio Exitoso']);
        }

        $nameSpace = '\\App\\';
        $model = $nameSpace . ucfirst($request->tabla);

        $field = $request->campo;
        $val = $request->valor;

        $send = $model::find($request->id);
        $send->$field = $val;

        if ($send->save()) {
            if(isset($request->form)){
                \Toastr::success('Guardado');
                return redirect()->back();
            }else{
                return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
            }
            
        }else {
            if(isset($request->form)){
                \Toastr::error('Error al guardar');
                return redirect()->back();
            }else{
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
            }
        }
    }

    public function portadaseccion(Request $request){

        
        $carrusel =new Carrusel;

        // if(!empty($carrusel->imagen)){
        //     \Storage::disk('local')->delete("/img/photos/seccions/" .$carrusel->imagen);
        // }

        if(!empty($request->file('archivo'))){

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/sliders/" . $namefile, \File::get($file));

            $carrusel->image =  $namefile;
            $carrusel->save();

            \Toastr::success('Guardado');
            return redirect()->back();

        }

    }

    public function upelementimg(Request $request, $id){

        $element = Elemento::find($id);

        if(!empty($element->imagen)){
            \Storage::disk('local')->delete("/img/photos/seccions/" .$element->imagen);
        }

        if(!empty($request->file('archivo'))){

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

            $element->imagen =  $namefile;
            $element->save();

            \Toastr::success('Guardado');
            return redirect()->back();

        }

    }

    public function deletesslider(Request $request){
        
        $carrusel = Carrusel::find($request->producto);

        
        \Storage::disk('local')->delete("/img/photos/sliders/" .$carrusel->image);

        if($carrusel->delete()){
            \Toastr::success('Eliminado exitoso');
            return redirect()->back();
        }else{
            \Toastr::error('Error al eliminar el servicio');
            return redirect()->back();
        }

    }

    public function textareaup(Request $request,$id){
        $element = Elemento::find($id);

        $element->texto = $request->textareaup;

        if($element->save()){
            \Toastr::success('Guardado');
            return redirect()->back();
        }else{
            \Toastr::error('Error al autualizar');
            return redirect()->back();
        }
    }


    ///////////////////////////////////////////////// funciones de categoria /////////////////////////////////////////////////

    public function newcat(Request $request){

        if(!empty($request->nuevo)){
            $categoria =new Categoria;

            $categoria->save();

            return redirect()->back();
        }

        return redirect()->back();

    }

    public function cattext(Request $request){

        $cat = Categoria::find($request->id);

        $campo = $request->campo;

        $cat->$campo = $request->valor;

        if($cat->save()){
            
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);

        }else{
            
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }

    }

    public function catimg(Request $request, $id){

        
        
        $cat = Categoria::find($request->id);

        if(!empty($cat->image)){
            if($cat->image != 'categoría01.png'){
                \Storage::disk('local')->delete("/img/design/" .$cat->image);
            }
        }

        if(!empty($request->file('archivo'))){

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/design/" . $namefile, \File::get($file));

            $cat->image =  $namefile;
            $cat->save();

            \Toastr::success('Guardado');
            return redirect()->back();

        }

    }

    public function del_cat(Request $request){

        $cat = Categoria::find($request->id_cat);

        if($cat->image !='categoría01.png'){
            \Storage::disk('local')->delete("/img/design/" .$cat->image);
        }

        $productos = Producto::where('categoria',$request->id_cat)->get();

        foreach($productos as $prod){
            $prod->categoria = null;
        }

        if($cat->delete()){
            \Toastr::success('Eliminado exitoso');
            return redirect()->back();
        }else{
            \Toastr::error('Error al eliminar la cetegoria');
            return redirect()->back();
        }

    }

    ///////////////////////////////////////////////// end funciones de categoria /////////////////////////////////////////////////

    public function secciontexts(Request $request){

        $servicio = services::find($request->id);

        $campo = $request->campo;

        $servicio->$campo = $request->valor;

        if($servicio->save()){
            
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);

        }else{
            
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }


        

    }

    public function agrserv(){
        $servicios =new services;

        if($servicios->save()){
            return response()->json(['success'=>true, 'mensaje'=>'Agregado']);
        }else{
            return response()->json(['success'=>false, 'mensaje'=>'Error al agregar']);
        }

        

    }

    public function agrher(){
        $herramienta =new herramientas;

        if($herramienta->save()){
            return response()->json(['success'=>true, 'mensaje'=>'Agregado']);
        }else{
            return response()->json(['success'=>false, 'mensaje'=>'Error al agregar']);
        }

        

    }

    public function checkb(Request $request){
        

        $servicio = services::find($request->id);

        $servicios_des = services::where('inicio',1)->count();

        if($servicios_des == 4){
            if($request->valor == 'true'){
                return response()->json(['success'=>false, 'mensaje'=>'No puedes agregar mas de 4 servicios destacados']);
            }
            
        }

        if($request->valor == "true"){
            $servicio->inicio = 1;
            if($servicio->save()){
                return response()->json(['success'=>true, 'mensaje'=>'Se agrego a destacados']);
            }else{
                return response()->json(['success'=>false, 'mensaje'=>'Error al agregar']);
            }
        }else{
            $servicio->inicio = 0;
            if($servicio->save()){
                return response()->json(['success'=>true, 'mensaje'=>'Se removio de destacados']);
            }else{
                return response()->json(['success'=>false, 'mensaje'=>'Error al remover']);
            }
        }



        
    }

    public function selecticon(Request $request){

        $servicio = services::find($request->id);

        $servicio->icono = 'icono'.$request->valor.'.png';

        if($servicio->save()){
            return response()->json(['success'=>true, 'mensaje'=>'Actualizacion de icono exitoso']);
        }else{
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar icono']);
        }

        
    }

    public function portadaservicio(Request $request, $id){

        $servicio = services::find($id);

        if(!empty($servicio->image)){
            if($servicio->image !='servicio_1.png'){
                \Storage::disk('local')->delete("/img/photos/seccions/" .$servicio->image);
            }
        }

        if(!empty($request->file('image_service'))){

            $file = $request->file('image_service');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;
           

            \Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

            $servicio->image =  $namefile;
            $servicio->save();

            \Toastr::success('Guardado');
            return redirect()->back();

        }

    }

    public function deletes(Request $request){
        
        $servicio = services::find($request->elimins);

        if($servicio->image !='servicio_1.png'){
            \Storage::disk('local')->delete("/img/photos/seccions/" .$servicio->image);
        }

        if($servicio->delete()){
            \Toastr::success('Eliminado exitoso');
            return redirect()->back();
        }else{
            \Toastr::error('Error al eliminar el servicio');
            return redirect()->back();
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }


    /////////////////////////////////// funciones de categoria /////////////////////////////////// 



    public function agcategoria(Request $request){


        if(!empty($request->file('archivo'))){

            $categoria = new PFCategoriaProducto;
            $categoria->categoria = $request->nom_cat;

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/categorias/" . $namefile, \File::get($file));

            $categoria->icono = $namefile;

            if($categoria->save()){
                \Toastr::success('Categoria agregada');
            }else{
                \Toastr::error('Error al algregar categoria');
            }
        }else{
            \Toastr::error('Error al algregar categoria');
        }
        
        return redirect()->back();

    }

    public function elimCat(Request $request){

        $categoria = PFCategoriaProducto::find($request->id_cat);

        $producto_elim = PFProducto::all();
        $prodcuto_presentacion_elim = PFPresentacionProducto::all();
        $producto_galeria_elim = PFGaleria::all();

        $cont = 0;
        foreach($producto_elim as $pe) {
            $cont++;
        }

        $arr = [];
        if($cont != 0) {
            foreach($producto_elim as $pe) {
                if($pe->categoria == $categoria->id) {
                    foreach($prodcuto_presentacion_elim as $ppe) {
                        if($ppe->producto == $pe->id) {
                           $ppe->delete();
                        }
                    }
        
                    foreach($producto_galeria_elim as $gale) {
                        if($gale->producto == $pe->id) {
                            $aux_img = 'img/photos/productos/'.$gale->galeria;
                            unlink($aux_img);
                            $gale->delete();
                        }
                    }

                    $aux_pd = 'img/photos/productos/'.$pe->imagen;
                    unlink($aux_pd);
                    $pe->delete();
                } 
            }
        }

       
       $img_cat = 'img/photos/categorias/'.$categoria->icono;
       unlink($img_cat);
       $categoria->delete();

       \Toastr::success('categoria Eliminada');
        return redirect()->back();

    }

    /////////////////////////////////// funciones de categoria /////////////////////////////////// 

    /////////////////////////////////// funciones de prooyectos /////////////////////////////////// 

    public function agproyect(Request $request){

        if(!empty($request->file('archivo'))){
            $proyecto = new ZProyecto;

            $proyecto->titulo = $request->nom_proy;
            $proyecto->descripcion = $request->desc_proy;
            $proyecto->color = $request->colorPicker;
            $proyecto->servicio = $request->servicio;

            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/proyectos/" . $namefile, \File::get($file));

            $proyecto->portado = $namefile;

            if($proyecto->save()){
                \Toastr::success('Proyecto agregada');
            }else{
                \Toastr::error('Error al algregar proyecto');
            }
        }else{
            \Toastr::error('Error al algregar proyecto');
        }
        
        return redirect()->back();

    }

    public function elimProy(ZProyecto $proyecto){
        
        if(!empty($proyecto->portado)){
            \Storage::disk('local')->delete("/img/photos/proyectos/" .$proyecto->portado);
        }

        if($proyecto->delete()){
            \Toastr::success('Proyecto Eliminado');
        }else{
            \Toastr::error('Error al eliminar proyecto');
        }

        return redirect()->back();

    }

    /////////////////////////////////// funciones de prooyectos /////////////////////////////////// 
    

    public function agservicio(Request $request){
        $solucion = new ZServicio;

        if(!empty($request->file('archivo'))){
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/servicios/" . $namefile, \File::get($file));

            $solucion->portada = $namefile;
        }

        if(!empty($request->file('archivo2'))){
            $file2 = $request->file('archivo2');
            $extension2 = $file2->getClientOriginalExtension();
            $namefile2 = Str::random(30) . '.' . $extension2;

            \Storage::disk('local')->put("/img/photos/servicios/" . $namefile2, \File::get($file2));

            $solucion->imagen = $namefile2;
        }

        $solucion->titulo = $request->nom_sol;
        $solucion->orden = $request->orden;
        $solucion->descripcion = $request->desc_der;
        $solucion->descripcion2 = $request->desc_izq;
        $solucion->color = $request->colorPicker;

        if($solucion->save()){
            \Toastr::success('Servicio agregado');
        }else{
            \Toastr::error('Error al algregar el servicio');
        }
        
        return redirect()->back();

    }

    public function elimserv(ZServicio $servicio) {
        $proyectos = ZProyecto::all();

        if(!empty($servicio->portada)){
            \Storage::disk('local')->delete("/img/photos/servicios/" .$servicio->portada);
        }

        if(!empty($servicio->imagen)){
            \Storage::disk('local')->delete("/img/photos/servicios/" .$servicio->imagen);
        }

        foreach($proyectos as $py) {
            if($py->servicio == $servicio->id) {
                if(!empty($proyecto->portado)){
                    \Storage::disk('local')->delete("/img/photos/proyectos/" .$py->portado);
                }

                $py->delete();
            }
        }

        if($servicio->delete()){
            \Toastr::success('Servicio eliminado');
        }else{
            \Toastr::error('Error al eliminar el servicio');
        }
        
        return redirect()->back();
    }

    public function agVacante(Request $request){
        $vacante = new ZVacante;

        if(!empty($request->file('archivo'))){
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30) . '.' . $extension;

            \Storage::disk('local')->put("/img/photos/vacantes/" . $namefile, \File::get($file));

            $vacante->portada = $namefile;
        }

        $vacante->titulo = $request->titulov;
        $vacante->orden = $request->orden;
        $vacante->descripcion = $request->descripcionv;
        $vacante->color = $request->colorPicker;

        if($vacante->save()){
            \Toastr::success('Servicio agregado');
        }else{
            \Toastr::error('Error al algregar el servicio');
        }
        
        return redirect()->back();

    }

    public function elimVacante(ZVacante $vacante) {
        
        if(!empty($vacante->portada)){
            \Storage::disk('local')->delete("/img/photos/vacantes/" .$vacante->portada);
        }

        if($vacante->delete()){
            \Toastr::success('Vacante Eliminada');
        }else{
            \Toastr::error('Error al eliminar la vacante');
        }

        return redirect()->back();
    }

    public function imgSider(Request $request) {
        $slider = new ZSliderPrincipal;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/slider_principal/".$namefile , \File::get($file));

            $slider->slider = $namefile;
        }

        $slider->save();

        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delSide(ZSliderPrincipal $slider) {
        $foto = 'img/photos/slider_principal/'.$slider->foto;
        unlink($foto);

        $slider->delete();

        \Toastr::success('Slider eliminado');
        return redirect()->back();
    }

    public function imgSiderCliente(Request $request) {
        $cliente = new ZCliente;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/clientes/".$namefile , \File::get($file));

            $cliente->logo = $namefile;
        }

        $cliente->save();
        
        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delSideCliente(ZCliente $cliente) {
        $foto = 'img/photos/clientes/'.$cliente->logo;
        unlink($foto);

        $cliente->delete();

        \Toastr::success('Cliente eliminado');
        return redirect()->back();
    }

    public function agpunto(Request $request) {
        $punto = new PFPuntoVenta;

        $punto->direccion = $request->direccion;
        $punto->codigo_postal = $request->codigo_postal;
        $punto->ciudad = $request->municipio;
        $punto->estado = $request->estado;
        $punto->mapa = $request->mapa;
        
        $punto->save();

        \Toastr::success('Punto de venta agregado');
        return redirect()->back();
    }

    public function elimpunto(PFPuntoVenta $punto) {
        $punto->delete();

        \Toastr::success('Punto de venta eliminado');
        return redirect()->back();
    }

    public function agsubdistribuidor(Request $request) {
        $subd = new PFSubdistribuidor;

        $subd->beneficio = $request->beneficio;

        $subd->save();

        \Toastr::success('Beneficio agregado');
        return redirect()->back();
    }

    public function elimsubdistribuidor(PFSubdistribuidor $sub) {
        $sub->delete();

        \Toastr::success('Beneficio eliminado');
        return redirect()->back();
    }
    
    public function agnecesidades(Request $request) {
        $necesidad = new PFNecesidades;

        if($request->sector == 'hogar') {
            $necesidad->tipo_sector = 1;
        } else {
            $necesidad->tipo_sector = 2;
        }

        $necesidad->sector = $request->sector;
        $necesidad->necesidades = $request->necesidad;

        $necesidad->save();

        \Toastr::success('Necesidad agregada');
        return redirect()->back();
    }

    public function elimnecesidades(PFNecesidades $nec) {
        $nec->delete();
        
        \Toastr::success('Necesidad eliminada');
        return redirect()->back();
    }

    public function mapac(Request $request) {
        $aux = Elemento::all();
        $cadena = $request->mapita;

        if (preg_match('/src="([^"]+)"/', $cadena, $matches)) {
            $src_value = $matches[1];
        } else {
            \Toastr::error('iframe de google maps no valido');
            return redirect()->back();
        }

        // $cadena_sin_comillas = str_replace('"', '', $src_value);
        // dd($cadena_sin_comillas);

        $aux[37]->texto = $src_value;

        $aux[37]->save();

        \Toastr::success('Mapa Actualizado');
        return redirect()->back();
    }


    public function siderBeneficio(Request $request) {
        $beneficio = new ZBeneficio;
        // dd($request->archivo);
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/beneficios/".$namefile , \File::get($file));

            $beneficio->icono = $namefile;
        }

        $beneficio->beneficio = $request->beneficio;
        $beneficio->color = $request->colorPicker;

        $beneficio->save();
        
        \Toastr::success('Guardado');
        return redirect()->back();
    }


    public function delBeneficio(ZBeneficio $beneficio) {
        $foto = 'img/photos/beneficios/'.$beneficio->icono;
        unlink($foto);

        $beneficio->delete();

        \Toastr::success('Beneficio eliminado');
        return redirect()->back();
    }



}




