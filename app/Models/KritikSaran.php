<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KritikSaran;
class KritikSaran extends Model
{
    use HasFactory;

    
    protected $fillable = ['nama', 'email', 'pesan'];
}