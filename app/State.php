<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'states_id', 'id');
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
