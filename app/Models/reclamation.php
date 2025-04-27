<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamation extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'description',
        'to_id',   
        'from_id' ];
    public function reclamations()
{
    return $this->hasMany(reclamation::class, 'to_id');
}
public function professeur()
{
    return $this->belongsTo(user::class, 'to_id');

}
public function etudiant()
{
    return $this->belongsTo(User::class, 'from_id');
}

}
