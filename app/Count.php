<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $fillable = ['adult','children'];

    public function rooms()
    {
        return $this->belongsToMany('App\Room','count_room','count_id','room_id');
    }

    public static function add($fields)
    {
        $new = new static();
        $new->fill($fields);
        $new->save();

        return $new;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();

    }

    public function remove()
    {
        $this->delete();
    }
}
