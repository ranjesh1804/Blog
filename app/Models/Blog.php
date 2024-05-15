<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    use HasFactory,SoftDeletes;

    public function getImageAttribute($value)
    {
        // dd($value);

        $value = $this->attributes['image'];
       
        if ($value == null) {
            return  asset('images/advertisement.png');
        }

        return  asset('/storage').'/'.$value;

    }
}
