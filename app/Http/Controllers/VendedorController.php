<?php

namespace App\Http\Controllers;

use App\Vendedor;
use App\Articulo;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas=['Menos de 50',
        'De 50 a 100',
        'Más de 100'];

        $nombre=trim(strtolower($request->nombre));
        $unidades=$request->get('ventas');

        $vendedores = Vendedor::orderBy('apellidos')
        ->nombre($nombre)
        ->ventas($unidades)
        ->paginate(4);        
        
        return view("vendedores.index", compact("vendedores","ventas","request"));
    }

    public function ventas(Vendedor $vendedore)
    {
        $vendidos = DB::select("select a.nombre, a.id, v.unidades from articulos as a, ventas as v where articulo_id=a.id and vendedor_id=".$vendedore->id." order by v.id;");
        $total = DB::table('ventas')
        ->where('vendedor_id', $vendedore->id)
        ->sum('unidades');
        return view('vendedores.ventas',compact('vendedore','vendidos','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
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
            'apellidos'=>['required'],
            'email'=>['required', 'unique:vendedors,email']
        ]);

        $vendedor = new Vendedor;
        $vendedor->nombre=$request->nombre;
        $vendedor->apellidos=$request->apellidos;
        $vendedor->email=$request->email;
        $vendedor->telefono=$request->telefono;
            
        if($request->has('imagen')){
            $request->validate([
                'imagen'=>['image']
            ]);
            $file=$request->file('imagen');
            $nombre='vendedores/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));

            $vendedor->imagen="img/$nombre";
        }
        $vendedor->save();

        return redirect()->route('vendedores.index')->with('mensaje','Se ha dado de alta al vendedor '.$vendedor->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedore)
    {
        return view('vendedores.show',compact('vendedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedore)
    {
        return view('vendedores.edit',compact('vendedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedore)
    {
        $request->validate([
            'nombre'=>['required'],
            'apellidos'=>['required'],
            'email'=>['required', 'unique:vendedors,email,'.$vendedore->id]
        ]);
            
        if($request->has('imagen')){
            $request->validate([
                'imagen'=>['image']
            ]);
            $file=$request->file('imagen');
            $nombre='vendedores/'.time().'_'.$file->getClientOriginalName();
            Storage::disk('public')->put($nombre, \File::get($file));
            if(basename($vendedore->imagen)!='default.png'){
                unlink(public_path().'/'.$vendedore->imagen);
            }
            $vendedore->update($request->all());
            $vendedore->update(['imagen'=>"img/$nombre"]);
        }else{
            $vendedore->update($request->all());
        }
        $vendedore->update();

        return redirect()->route('vendedores.index')->with('mensaje','La información del vendedor '.$vendedore->nombre.' se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedore)
    {
        $nombre=$vendedore->nombre;
        if(basename($vendedore->imagen)!='default.png'){
            unlink(public_path().'/'.$vendedore->imagen);
        }
        $vendedore->delete();
        return redirect()->route('vendedores.index')->with('mensaje','El vendedor '.$nombre.' se ha eliminado de la BD');
    }
}
