<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;
use App\Models\Comment;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'country', 'inapp_paid'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'confirm_payment' => 'integer'
    ];

    protected $appends = ['payment_confirm'];

    public function getPaymentConfirmAttribute()
    {
        return $this->confirm_payment;
    }


    public function article()
    {
        return $this->hasMany(Article::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function payment()
    {
        if ($this->confirm_payment == 1)
        {
            return "<span class='badge bg-success'>Paid</span>";
        }
        return "<span class='badge bg-danger'>Unpaid</span>";
    }

}
