<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['users_id', 'comment', 'publish'];

    public function users()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }


    public function allow()
    {
        $this->publish = 1;
        $this->save();
    }

    public function disAllow()
    {
        $this->publish = 0;
        $this->save();
    }

    public function toogleStatus()
    {
        if($this->publish == 0)
        {

            return $this->allow();
        }

        return $this->disAllow();

    }

    public function remove()
    {
        $this->delete();
    }
}
