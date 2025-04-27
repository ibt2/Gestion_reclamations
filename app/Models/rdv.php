<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rdv extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'num'; // Spécifie que la clé primaire est 'num'

    protected $fillable = [
        'date',
        'lieu',
        'durée',
        'heure',
        'reclamation_id'
    ]; 
    public function rdvs()
    {
        return $this->hasMany(rdv::class, 'reclamation_id');
    }
}
