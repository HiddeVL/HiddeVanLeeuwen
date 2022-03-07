<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berichten extends Model
{
    use HasFactory;

    protected $table = 'berichten';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'title',
        'content',
        'auteur',
        'auteur_id'
    ];
}
