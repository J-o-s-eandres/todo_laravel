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


     public function index(){
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
     }

     public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
     }

     public function update(Request $request,$id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        // dd($request);
        //return view('todos.index', ['success' => 'Tarea Actualizada']);
        return redirect()->route('todos')->with('success', 'Tarea Actualizada');
     }

     public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'La tarea ha sido eliminada');

     }

}