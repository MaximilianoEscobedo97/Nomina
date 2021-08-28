<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Helpers\General;

class EmployeeController extends Controller
{

    ///Metodo para traes todos los empleados
    public function index()
    {

        $employees = Employee::all();//Se recuperan empleados, ignorando a los eliminados

        return General::makeResponse(['message' => 'Acción realizada con éxito', 'employees' => $employees], 200, true);
    }


    //Crear empleados
    public function store(Request $request)
    {
        $data = $request->all(); //Se recuperan datos

        $validate = General::validateRequest($request->all(),Employee::$rules);//Validamos los datos

        if($validate)//Validamos si existe un error
            return $validate;

        $employee =  Employee::create($data);// se crea el registro

        if(!$employee)//se valida si se hizo el registro con exito
            return General::makeResponse(['message'=> 'Algo salio mal'], 400,false);

        return General::makeResponse(['message' => 'Acción realizada con éxito', 'employee' => $employee], 200, true);
    }

    //Traer empleados
    public function show($id)
    {
        //Se busca el empleado
        $employee = Employee::find($id);

        if(!$employee)// verificamos si se encontro algo
            return General::makeResponse(['message'=> 'Empleado no encontrado'], 400,false);

        return General::makeResponse(['message' => 'Acción realizada con éxito', 'employee' => $employee], 200, true);//Retorna el empleado

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
        $data = $request->all();

        $validate = General::validateRequest($request->all(),Employee::$rules);//Validamos los datos

        if($validate)//Validamos si existe un error
            return $validate;

        //Se busca el empleado
        $employee = Employee::find($id);

        if(!$employee)// verificamos si se encontro algo
            return General::makeResponse(['message'=> 'Empleado no encontrado'], 400,false);

        $employee->update($data);// se actualizan los datos

        return General::makeResponse(['message' => 'Acción realizada con éxito', 'employee' => $employee], 200, true);//Retorna el empleado

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se busca el empleado
        $employee = Employee::find($id);

        if(!$employee)// verificamos si se encontro algo
            return General::makeResponse(['message'=> 'Empleado no encontrado'], 400,false);

        $employee->delete();// se hace eliminacion logica

        return General::makeResponse(['message' => 'Acción realizada con éxito'], 200, true);//Retorna el empleado

    }
}
