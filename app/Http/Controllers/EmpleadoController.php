<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        //Linea para agregar un Middleware a las funciones del controlador
        $this->middleware('auth');
        $this->middleware('authByName')->only('create','edit','destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('id','DESC')->paginate(3);
        return view('Empleado.index',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lstEstados = $this->obtenerEstadosWS();
        return view('Empleado.create',compact('lstEstados'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request,[
            'nombre' => 'required',
            'edad' => 'required',
            'puesto' => 'required',
            'moneda'=> 'required',
            'salario'=> 'required',
            'activo'=> 'required',
            'estado'=> 'required']);

        $arrayUpdate =[
            'nombre' => $request->get("nombre"),
            'edad' => $request->get('edad'),
            'puesto' => $request->get('puesto'),
            'moneda' => $request->get('moneda'),
            'salario' => $request->get('salario'),
            'activo' => $request->has('activo') ? $request->get('activo') : 0,
            'estado' => $request->get('estado')
        ];

        Empleado::create($arrayUpdate);

        return redirect()->route('empleado.index')->with('success','Registro creado satisfactoriamente');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('Empleado.show',compact('empleado'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lstEstados = $this->obtenerEstadosWS();
        $empleado = Empleado::find($id);
        return view('Empleado.edit',compact('empleado'),compact('lstEstados'));
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
        $this->validate($request,['nombre' => 'required', 'estado' => 'required','edad' => 'required','puesto' => 'required','moneda'=> 'required' , 'activo'=> 'required' ,'salario'=> 'required']);
        Empleado::find($id)->update($request->all());

        return redirect()->route('empleado.index')->with('success','Registro actualizado satisfactoriamente');
    }


    public function delete($id)
    {
        $empleado = Empleado::find($id);
        return view('Empleado.delete',compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }

    private function obtenerEstadosWS(){

        $client = new HttpClient(['base_uri' => 'https://beta-bitoo-back.azurewebsites.net/api/']);
        $response = $client->request('POST',"proveedor/obtener/lista_estados");
        return json_decode($response->getBody())->data->lst_estado_proveedor;

    }

}