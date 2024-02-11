<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'social_id', 'label', 'link', 'type', 'order'];

    public function social()
    {
        return $this->hasOne(Social::class, 'id', 'social_id');
    }
}
