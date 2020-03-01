<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use App\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $precios=['Menor de 50€',
        'Entre 50€-100€',
        'Mayor de 100€'];

        $nombre=trim(strtolower($request->get('nombre')));
        $categoria=$request->get('categoria');
        $precio=$request->get('precio');
        
        $articulos = Articulo::orderBy('id')
        ->nombre($nombre)
        ->categoria($categoria)
        ->precio($precio)
        ->paginate(4);
        $categorias = Categoria::all();
        return view("articulos.index", compact("articulos", "categorias","precios","request"));
    }

    public function vender(Articulo $articulo){
        $vendedores = Vendedor::orderBy('apellidos')
        ->get();
        return view('articulos.vender',compact('articulo','vendedores'));
    }

    public function venta(Request $request){
        $registro = DB::select("select id, unidades from ventas where articulo_id=".$request->articulo." and vendedor_id=".$request->vendedor);

        if(empty($registro)){
            //si no existe
            DB::table('ventas')->insert([
                'articulo_id' => $request->articulo,
                'vendedor_id' => $request->vendedor,
                'unidades' => $request->stock,
                "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                ]
            );
        }else{
            //si existe
            DB::table('ventas')
            ->where('id', $registro[0]->id)
            ->update(['unidades' => $registro[0]->unidades+$request->stock]);            
        }

        //resto el stock vendido
        Articulo::where('id', $request->articulo)
            ->update(['stock' => $request->stockInicial-$request->stock]);

        return redirect()->route('articulos.index')->with("mensaje","El vendedor ".$request->vendedor." ha vendido ".$request->stock." unidades del artículo ".$request->nombre); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('articulos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>['required'],
            'precio'=>['required']
        ]);

        $articulo = new Articulo;
        $articulo->nombre=$request->nombre;
        $articulo->categoria_id=$request->categoria;
        $articulo->precio=$request->precio;
        if($request->stock!=null)
        $articulo->stock=$request->stock;

        if($request->has('imagen')){
            $request->validate([
                'imagen'=>['image']
            ]);
            $file=$request->file('imagen');
            $nombre='articulos/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            
            $articulo->imagen="img/$nombre";
        }
        $articulo->save();

        return redirect()->route('articulos.index')->with('mensaje',"El artículo ".$request->nombre." se ha creado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view("articulos.show", compact("articulo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $categorias = Categoria::all();
        return view('articulos.edit',compact('articulo','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'nombre'=>['required'],
            'precio'=>['required']
        ]);

        if($request->has('imagen')){
            $request->validate([
                'imagen'=>['image']
            ]);
            $file=$request->file('imagen');
            $nombre='articulos/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            if(basename($articulo->imagen)!='default.png'){
                unlink(public_path().'/'.$articulo->imagen);
            }
            $articulo->update($request->all());
            $articulo->update(['imagen'=>"img/$nombre"]);
        }else{
        $articulo->update($request->all());
        }
        $articulo->update();

        return redirect()->route('articulos.index')->with('mensaje',"La información del artículo ".$request->nombre." se ha actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $nombre=$articulo->nombre;
        if(basename($articulo->imagen)!='default.png'){
            unlink(public_path().'/'.$articulo->imagen);
        }
        $articulo->delete();
        return redirect()->route('articulos.index')->with('mensaje',"El artículo ".$nombre." se ha eliminado de la BD");
    }
}
