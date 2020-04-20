<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amis extends Model {
   public function amisAll(){
      return $this->belongsToMany(\App\User::class, 'amis','user_id', 'amis_id')->withPivot('active')->withPivot('created_at');
}

public function amisActive() {
    return $this->belongsToMany(\App\User::class, 'amis','user_id', 'amis_id')
        ->withPivot('active')->withPivot('created_at')
        ->wherePivot('active', true);
}

public function amisNotActive() {
    return $this->belongsToMany(\App\User::class ,'amis','user_id', 'amis_id')
        ->withPivot('active')->withPivot('created_at')
        ->wherePivot('active', false);
}

public function amisWait() {
    return $this->belongsToMany(\App\User::class ,'amis','amis_id', 'user_id')
        ->withPivot('active')->withPivot('created_at')
        ->wherePivot('active', false);
}

public function isFriend(User $user){
    return $user->hasMany(Amis::class,'user_id')->where('amis_id', $this->id)
    ->where('active', true)->count();
}

public function demandeAmis(User $user){
    return $user->hasMany(Amis::class,'amis_id')->where('user_id', $this->id)
    ->where('active', false)->count();
}

public function demandeRecu(User $user){
    return $user->hasMany(Amis::class,'user_id')->where('amis_id', $this->id)
    ->where('active', false)->count();
}
}
