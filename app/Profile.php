<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function profileImage()
    {
        $imagePath=($this->image)? $this->image:
        '/profile/ysGgBLIQoUzl8CjusfeuK3IvOd4zYSdnCHR1RQ69.png';
        return '/storage/'.$imagePath;
    }
}
