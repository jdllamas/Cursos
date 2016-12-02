<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Profesor;
use App\Curso;

class ProfesorController extends Controller
{
	public function __construct(){
		
		$this->middleware('auth');
		
	}
	
    public function index() {

        $profesores = Profesor::all();
        return view('profesor.index')->with('profesores', $profesores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $post_data = $request->all();
		$rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required',
            'email' => 'required'
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate->fails()) {
			return view('profesor.create')->with('profesor', $post_data);
        }
		else{
			$profesor = Profesor::create($post_data);
			$profesores = Profesor::all();
			return view('profesor.index')->with('profesores', $profesores);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $profesor = Profesor::find($id);
        $cursos = $profesor->cursos;
        return view('profesor.show', compact('profesor', 'cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the customer
        $profesor = Profesor::find($id);
        // show the edit form and pass the customer
        return view('profesor.edit')->with('profesor', $profesor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $profesor = $request->all();
        $rules = [
            'nombre' => 'required',
            'apellido' => 'required',
            'codigo' => 'required',
            'email' => 'required'
        ];
        $validate = Validator::make($profesor, $rules);
        if ($validate->fails()) {
            return view('profesor.edit')->with('profesor', $profesor2);;
        }
		else{
			$profesor2 = Profesor::find($id);
            $profesor2->nombre = $profesor['nombre'];
            $profesor2->apellido = $profesor['apellido'];
            $profesor2->codigo = $profesor['codigo'];            
            $profesor2->email = $profesor['email'];
            $profesor2->save();
            // Session::flash('message', 'Successfully updated customer!');
			return view('profesor.show')->with('profesor', $profesor2);;
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
		$user = Profesor::find($id);    
		$user->delete();
		$profesores = Profesor::all();
		return view('profesor.index')->with('profesores', $profesores);
    }
}
