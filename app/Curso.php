<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Curso';
	
	protected $fillable = array('nombre', 'descripcion', 'periodo', 'anio', 'fecha_inicio');

	
	public function profesores()
    {
        return $this->belongsToMany('App\Profesor');
    }
	
}
