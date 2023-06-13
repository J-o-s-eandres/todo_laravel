<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    //
    
    /**
 * Convención de nombres de laravel:
 * Index para mostrar todos los elementos
 * 
 * store para guardar
 * 
 * update para actualizar 
 * 
 * destroy para eliminar
 * 
 * edit para mostrar el formulario de edición
 * 
 */

     public function store(Request $request){

        $request->validate([
            'title' => 'required|min:5'
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('success' , 'Tarea creada correctamente');
     }

}