<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Profesor';
	
	protected $fillable = array('nombre', 'apellido', 'codigo', 'email');
	
	
	public function cursos()
    {
        return $this->belongsToMany('App\Curso');
    }
}
