<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['is', 'wifi', 'tv', 'air_conditioning', 'photo','beds_id', 'states_id', 'counts_id', 'price'];

    public function counts()
    {
        return $this->belongsToMany('App\Count', 'count_room', 'room_id','count_id');
    }

    public function states()
    {
        return $this->belongsTo('App\State','states_id','id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order','rooms_id','id');
    }

    public function beds()
    {
        return $this->belongsTo('App\Bed','beds_id','id');
    }

    public static function add($Request)
    {
        $room = new static();
        $room->fill($Request);
        $room->save();

        return $room;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if($this->photo != null)
        {
            Storage::delete('uploads/'.$this->photo);
        }
    }

    public function uploadImage($image)
    {
        if($image == null){ return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads',$filename);
        $this->photo = $filename;
        $this->save();

    }

    public function getImage()
    {
        if($this->photo != null)
        {

            return 'uploads/'. $this->photo;
        }

        return 'images/no-image.png';
    }

    public function count($people)
    {
        $new = [];
        $collection = $this->counts()->pluck($people);
        foreach ($collection as $key => $value)
        {
            if(!in_array($value,$new))
            {
                array_push($new,$value);
            }
        }
        $mass = [];
        $count = count($new);
        foreach ($new as $value)
        {
            if($count == 1)
            {
                echo $value;
            }
            else {
               array_push($mass,$value);
            }
        }
        if(!empty($mass)){
            $string = implode(' або, ',$mass);
            echo $string;
        }

    }

}
