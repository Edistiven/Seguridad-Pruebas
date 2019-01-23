<?php
//modelo no se necesita crearse en una carpeta 
namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Account extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ // campos del modelo aceptas para se utilize los parámetros en BD
        'email', 'alternative_email', 'name' ,'password','token','role','state'
    ];

    protected $hidden = [ //al momento de realizar una consulta el campo password no se visualiza
        'password'
    ];


    public function role()
    {
        return $this->hasOne('App\Role');//relación cuenta se relaciona con una persona uno a uno
    } //el padre tiene hasOne

    public function systems() //Relacion de Muchos a muchos
    {
        return $this->hasMany('App\Account'); //Se relacionara de muchos a muchos
    }
}
