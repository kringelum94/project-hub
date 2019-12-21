<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['gravatar_pic'];

    public function projects(){
        return $this->hasMany(Project::class, 'creator_id')->latest('updated_at');
    }

    public function accessibleProjects(){
        return Project::where('creator_id', $this->id)->orWhereHas('members', function ($query) {
            $query->where('user_id', $this->id);
        })->get();
    }

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function getGravatarPicAttribute(){
        $emailHash = md5($this->email);
        return "http://www.gravatar.com/avatar/$emailHash";
    }
}
