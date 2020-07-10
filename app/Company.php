<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function countries() {
        return $this->belongsTo(Country::class);
    }
}
