<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject',
        'full_mark',
    ];

    public function secondModels()
    {
        return $this->hasMany(User::class);
    }
}
