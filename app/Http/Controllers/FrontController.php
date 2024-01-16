<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\ProductosPhoto;
use App\Elemento;
use App\Carrusel;
use App\Politica;
use App\Vacante;
use App\Faq;
use App\Categoria;
use App\Configuracion;
use App\Producto;
use App\colores;
use App\services;
use App\herramientas;
use App\equipo;
use App\logoequipos;
use Carbon\Carbon;
use App\ZBeneficio;
use App\ZSliderPrincipal;
use App\ZCliente;
use App\ZServicio;
use App\ZProyecto;
use App\ZVacante;
use App\Estado;
use App\Municipio;
use App\ZBlog;
use App\ZSucursal;
use App\ZSucursalFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		
		$pagina = 'home';

		$slider_principal = ZSliderPrincipal::all();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();
		$config = Configuracion::find(1);
		$clientes = ZCliente::all();
		$elements = Elemento::where('seccion',1)->get();
		$sucursales = ZSucursal::all();
		$estados = Estado::all();
		$municipios = Municipio::all();
		$galeria = ZSucursalFoto::all();

		$contador = 0;
		foreach ($sucursales as $sc) {
			$contador++;
		}
		
		return view('front.index', compact('pagina', 'galeria', 'contador', 'slider_principal', 'config', 'elements', 'servicios', 'clientes', 'sucursales', 'estados', 'municipios'));
	}

	public function servicio($id) {
		$config = Configuracion::find(1);
		$servicio = ZServicio::find($id);
		$proyectos = ZProyecto::all();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.servicio', compact('config', 'servicio', 'proyectos', 'servicios'));
	}

	public function tienda() {

		$pagina = 'tienda';


		return view('front.tienda', compact('pagina'));
	}

	public function producto($id) {
	
		$pagina = 'producto_detalle';

		return view('front.tienda_detalle', compact('pagina'));
	}

	public function soluciones() {
		$soluciones = PFSolucion::all();

		$pagina = 'soluciones';

		$config = Configuracion::find(1);
		$elements_home = Elemento::where('seccion',1)->get();
		$elements = Elemento::where('seccion',5)->get();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.soluciones', compact('pagina', 'soluciones', 'elements', 'elements_home', 'config', 'servicios'));
	}

	public function punto_venta() {
		$puntos_venta = PFPuntoVenta::all();

		$pagina = 'punto_venta';

		$config = Configuracion::find(1);
		$elements = Elemento::where('seccion',6)->get();

		return view('front.punto_venta', compact('pagina', 'puntos_venta', 'elements', 'config'));
	}

	public function subdistribuidor() {

	}

	public function aboutus() {
		$config = Configuracion::find(1);
		$elements = Elemento::where('seccion',8)->get();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.aboutus', compact('config', 'elements', 'servicios'));
	}

	public function vacantes() {
		$beneficios = ZBeneficio::all();
		$vacantes = ZVacante::all();
		$config = Configuracion::find(1);
		$elements = Elemento::where('seccion',11)->get();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();
		
		$cont = 0;
		$band = 0;

		return view('front.vacantes', compact('config', 'elements', 'beneficios', 'cont', 'band', 'vacantes', 'servicios'));
	}

	public function blog() {
		// $entradas = ["#CDE700","#FE6E63","#CCAEEC","#A2E9FF"];
		$blogs = ZBlog::all();
		$config = Configuracion::find(1);
		$cont = 1;
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.blog', compact('blogs', 'cont', 'servicios'));
	}

	public function blog_detalle($id) {
		$config = Configuracion::find(1);
		$blog = ZBlog::find($id);
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.blog_detalle', compact('blog', 'servicios', 'config'));
	}

	public function contact(){
		$pagina = 'contacto';
		
		$config = Configuracion::find(1);
		$elements = Elemento::where('seccion',4)->get();
		$sucursales = ZSucursal::all();
		$estados = Estado::all();
		$municipios = Municipio::all();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();

		return view('front.contacto', compact('pagina', 'elements', 'config', 'config', 'sucursales', 'estados', 'municipios', 'servicios'));
	}


	public function projects(){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$proyectos = services::all();
		$config = Configuracion::find(1);
		$elements = Elemento::where('seccion',3)->get();
		return view('front.projects',compact('user','proyectos','elements', 'config'));
	}

	

	public function products(Request $request){
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$config = Configuracion::find(1);
		$categorias =  Categoria::all();
		$nom_cat = null;
		if(empty($request->all())){
			$productos = Producto::all();
		}else{
			$productos = Producto::where('categoria',$request->Categoria)->get();
			$nom_cat =  Categoria::find($request->Categoria);
		}
		
		return view('front.productos',compact('user','productos','categorias','nom_cat', 'config'));
	}

	public function detprod($id) {
		$user=null;
		if(auth()->check()){
			$user = auth()->user();
		}
		$config = Configuracion::find(1);
		$producto = Producto::find($id);
		$color = colores::find($producto->color);
		$categorias =  Categoria::find($producto->categoria);
		$productosPhoto = ProductosPhoto::where('producto',$producto->id)->get();
		$relacionado = Producto::where('categoria',$producto->categoria)->get();
		return view('front.detprod',compact('user','producto','color','categorias','productosPhoto','relacionado', 'config'));
	}

	public function faqs() {
		$config = Configuracion::find(1);
		$preguntas = Faq::all();
		$pagina = 'preguntas';
		return view('front.faq', compact('preguntas', 'pagina', 'config'));
	}

	public function politicas() {
		$config = Configuracion::find(1);
		$politica = Politica::all();
		$servicios = ZServicio::orderBy('orden', 'asc')->get();
		$pagina = 'politicas';
		return view('front.politicas', compact('politica', 'pagina', 'config', 'servicios'));
	}

	public function metodos_pago() {
		$config = Configuracion::find(1);
		$metodos_pago = Politica::all();
		$pagina = 'metodos_pago';
		return view('front.metodos_pago', compact('metodos_pago', 'pagina', 'config'));
	}


	// public function tienda(Request $request){
	// 	$elements = Elemento::where('seccion',2)->get();
		// $categoria = $request->get('categoria');
		
		// if(!empty($categoria)){
		// 	$categoria_b = Categoria::find($categoria);
		// 	$busqueda = $request->get('busqueda');
		// 	$productos = DB::table('productos')
		// 	->select('id','portada','nombre','descripcion','precio')
		// 	->where('categoria','LIKE','%'.$categoria.'%')
		// 	->paginate(12);
		// 	$categoria = Categoria::all();

		// }else{

		// $busqueda = $request->get('busqueda');

		// $productos = DB::table('productos')
		// ->select('id','portada','nombre','descripcion','precio')
		// ->where('nombre','LIKE','%'.$busqueda.'%')
		// ->orwhere('descripcion','LIKE','%'.$busqueda.'%')
		// ->orwhere('precio','LIKE','%'.$busqueda.'%')
		// ->paginate(12);
		// $categoria = Categoria::all();
		// }

	// 	$productos = Producto::all();
	// 	foreach($productos as $p){
	// 		$prod_photos = ProductosPhoto::where('producto',$p->id)->get()->first();
	// 		if(!empty($prod_photos)){
	// 			$p->photo = $prod_photos->image;
	// 		}

	// 	}


	// 	return view('front.tienda',compact('productos','elements'));
	// }

	// public function details($id){
		
	// 	$producto = Producto::find($id);


	// 	$productosr = Producto::where('categoria',$producto->categoria)->get();

		

	// 	$producto->categoria = Categoria::find($producto->categoria);

	// 	$productos_photos =  ProductosPhoto::where('producto',$producto->id)->get();

		

		// $variantes = ProductoVariante::where('producto', $product->id)->get();
		// $medidas = ProductoMedida::where('producto',$product->id)->orderBy('orden', 'asc')->get();
		// return view('front.detalles', compact('product','variantes','productos_rel','elements'));
		// $data = array(
		// 	'product' => $product,
		// 	'medidas' => $medidas,
		// );
		// return response()->json($data);
		// return $product;

	// 	return view('front.detalles',compact('producto','productos_photos','productosr'));
	// }

	// Validator::make($data, $rules, $messages, $customAttributes);

	// $data: Representa los datos que se validarán, generalmente provienen de la solicitud ($request->all() en este caso).
	// $rules: Especifica las reglas de validación que se deben aplicar a los datos.
	// $messages: Permite especificar mensajes de error personalizados para reglas específicas.
	// $customAttributes: Permite especificar nombres personalizados para los atributos.

	// correo de contacto normal
	public function mailcontact(Request $request){
		$mail = new PHPMailer;
		if($request->tipoForm == 'inicio') {
			$validate = Validator::make($request->all(),[
				'nombre' => 'required',
				"correo" => "required",
				'ciudad' => 'required',
				"mensaje" => "required",
			],[],[]);
	
			if ($validate->fails()) {
				\Toastr::error('Error, se requieren todos los datos');
				return redirect()->back();
			}
	
			$data = array(
				'tipoForm' => $request->tipoForm,
				'nombre' => $request->nombre,
				'correo' => $request->correo,
				'ciudad' => $request->ciudad,
				'mensaje' => $request->mensaje,
				'asuntow' => "Test",
				'hoy' => Carbon::now()->format('d-m-Y')
			);
		} else if($request->tipoForm == 'vacante') {
			$validate = Validator::make($request->all(),[
				'nombre' => 'required',
				"correo" => "required",
				'vacante' => 'required',
				"mensaje" => "required",
				'curriculum' => 'required|mimes:pdf',
			],[],[]);
	
			if ($validate->fails()) {
				\Toastr::error('Error, se requieren todos los datos');
				return redirect()->back();
			}

			$pdf = $request->file('curriculum');
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $profileImage);

			// Adjunta el archivo cargado
			$mail->addAttachment('img/'.$profileImage, $profileImage);
	
			$data = array(
				'tipoForm' => $request->tipoForm,
				'nombre' => $request->nombre,
				'correo' => $request->correo,
				'vacante' => $request->vacante,
				'mensaje' => $request->mensaje,
				'asuntow' => "Test",
				'hoy' => Carbon::now()->format('d-m-Y')
			);
		} else if($request->tipoForm == 'contacto') {
			$validate = Validator::make($request->all(),[
				'nombre' => 'required',
				'empresa' => 'required',
				'whatsapp' => 'required',
				"correo" => "required",
				'asunto' => 'required',
				"mensaje" => "required",
			],[],[]);
	
			if ($validate->fails()) {
				\Toastr::error('Error, se requieren todos los datos');
				return redirect()->back();
			}
	
			$data = array(
				'tipoForm' => $request->tipoForm,
				'nombre' => $request->nombre,
				'empresa' => $request->empresa,
				'whatsapp' => $request->whatsapp,
				'correo' => $request->correo,
				'asunto' => $request->asunto,
				'mensaje' => $request->mensaje,
				'asuntow' => "Test",
				'hoy' => Carbon::now()->format('d-m-Y')
			);
		} else {
			return redirect()->back();
		}



		$html = view('front.mailcontact', compact('data'));

		$config = Configuracion::first();

		
		
		try {
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			// $mail->SMTPDebug = 2;
			$mail->Host = $config->remitentehost;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$mail->Port = $config->remitenteport;

			$mail->SetFrom($config->remitente, 'SAP anuncios - Contacto');
			$mail->isHTML(true);

			$mail->addAddress($config->destinatario,'SAP anuncios - Contacto');
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,'SAP anuncios - Contacto');
			}
			
			if($data['tipoForm'] == 'contacto') {
				$mail->Subject = $data['asuntow'];
			} else {
				$mail->Subject = 'Mensaje';
			}
			
			$mail->msgHTML($html);
			// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			

			if($mail->send()){
				// dd('paso culo');
			//Contacto@dineroorganico.com
			\Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
			}else{
				// dd('no paso culo');
				\Toastr::error('Error al enviar el correo');
				return redirect()->back();
			}


		} catch (phpmailerException $e) {
			\Toastr::error($e->errorMessage());//Pretty error messages from PHPMailer
			return redirect()->back();
		} catch (Exception $e) {
			\Toastr::error($e->getMessage());//Boring error messages from anything else!
			return redirect()->back();
		}
		

	}

	

}
