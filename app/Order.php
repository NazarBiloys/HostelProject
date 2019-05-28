<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['users_id', 'rooms_id', 'from', 'to'];

    public function rooms()
    {
        return $this->belongsTo('App\Room', 'rooms_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','users_id','id');
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

    public function getfromAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');

        return $date;
    }

    public function gettoAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('Y-m-d');

        return $date;
    }

    public function remove()
    {
        $this->delete();
    }


}
