<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'dob',
        'status',
        'image',
        'password_reset_token',
    ];
    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class,'user_id','user_id');
    }
    public function scopeActive($query){
        return $query->where('status',1);
    }
    protected $dates=['dob'];
    public function getdobFormatedAttribute()
    {
        return date('d-M-Y',strtotime($this->dob));
    }
    public function address()
    {
        return $this->hasOne(UserAddress::class,'user_id','user_id');
    }
    public function getStatusTextAttribute(){
       if($this->status == 1) return "Active";
       else return "Inactive";
    }
    protected $appends =  ['dob_formated','status_text'];
    public function setdobAttribute($value)
    {
        $this->attributes['dob']=date('d-m-Y',strtotime($value));
    }
}
