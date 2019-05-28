<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    protected $fillable = ['large','small'];
    public function rooms()
    {
        $this->hasMany('App\Room','beds_id','id');
    }

    public static function add($request)
    {
        $new = new self();
        $new->fill($request);
        $new->save();

        return $new;
    }

    public function edit($request)
    {
        $this->fill($request);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }

    public function large()
    {
        if ($this->large == 0) {
            return '<option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>';
        }

        if ($this->large == 1) {
            return '<option value="0">0</option>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>';
        }

        if ($this->large == 2) {
            return '<option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2" selected>2</option>';
        }
    }

    public function small()
    {
        if ($this->small == 0) {
            return '<option value="0" selected>0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>';
        }

        if ($this->small == 1) {
            return '<option value="0">0</option>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>';
        }

        if ($this->small == 2) {
            return '<option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2" selected>2</option>';
        }
    }

}
