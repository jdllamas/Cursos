<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Profesor;
use App\Curso;

class CursoController extends Controller
{
    //
	
	public function __construct(){
		
		$this->middleware('auth');
		
	}
	
	
	public function index() {

        $cursos = Curso::all();
        return view('curso.index')->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
		$profesoresGeneral = Profesor::all();
        return view('curso.create')->with('profesoresGeneral', $profesoresGeneral);
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
            'descripcion' => 'required',
            'anio' => 'required',
            'periodo' => 'required',
			'fecha_inicio' => 'required'
        ];
        $validate = Validator::make($post_data, $rules);
        if (!$validate->failed()){
			$curso = Curso::create($post_data);
			$cursos = Curso::all();
			return view('curso.index')->with('cursos', $cursos);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $curso = Curso::find($id);
        $profesores = $curso->profesores;
        return view('curso.show', compact('curso', 'profesores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the customer
        $curso = Curso::find($id);
        // show the edit form and pass the customer
		$profesores = $curso->profesores->toArray(); 
		$profesoresGeneral = Profesor::all();
        return view('curso.edit', compact('curso', 'profesores', 'profesoresGeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $post_data = $request->all();
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'required',
            'anio' => 'required',
            'periodo' => 'required',
			'fecha_inicio' => 'required'
        ];
        $validate = Validator::make($post_data, $rules);
        if (!$validate->failed()) {
            $curso = Curso::find($post_data['id']);
            $curso->nombre = $post_data['nombre'];
            $curso->descripcion = $post_data['descripcion'];
            $curso->anio = $post_data['anio'];            
            $curso->periodo = $post_data['periodo'];
			$curso->fecha_inicio = $post_data['fecha_inicio'];
			$curso->profesores()->sync($post_data['profesores'], false);
            $curso->save();
            $profesores = $curso->profesores;
			return view('curso.show', compact('curso', 'profesores'));
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
    }

}
