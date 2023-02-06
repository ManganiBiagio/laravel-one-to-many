<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        "name","description","cover_img","github_link","type_id"
    ];
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
