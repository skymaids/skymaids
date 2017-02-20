<?php
namespace Modules\User\Entities;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Modules\Auth\Traits\PasswordResetTrait;
use Modules\Base\Entities\Company;
use Modules\Base\Entities\Profile;

/**
 * Class User
 * @package Modules\User\Entities
 * @author Ruver Dornelas <ruver@imatec.com.br>
 * @Date 02/15/2017
 * @version 1.0
 */
class User extends Authenticatable
{
    use HasApiTokens,Notifiable,PasswordResetTrait;

    /**
     * Fields available to insert
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_id',
        'company_id',
        'status',
        'warn',
        'cell',
        'phone',
        'gender',
        'image',
        'obs'
    ];

    /**
     * Hidden fields
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send token to email
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->setUserInPasswordResets($this->id,$token);
        $this->notify(new ResetPasswordNotification($token,$this->name));
    }

    /**
     * Relation with profile
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Relation with company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Relation with status
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    private function status()
    {
        return $this->belongsTo(Status::class);
    }
}