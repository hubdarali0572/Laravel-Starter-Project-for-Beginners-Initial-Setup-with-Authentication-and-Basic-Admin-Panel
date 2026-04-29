<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;


//  (User Email Verification other functionality completed only this added only)
//  class User extends Authenticatable  == > class User extends Authenticatable implements MustVerifyEmail

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * CONFIGURATION: Activity Log Options
     * Purpose: Defines how the Spatie Activity Log should behave for this specific model.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            /* 
               WHY 'logOnly': Security and Privacy. 
               We only track name and email. We avoid logging 'password' or 'remember_token' 
               for security reasons.
            */
            ->logOnly(['name', 'email','user_type', 'ip'])

            /* 
               WHY 'logOnlyDirty': Efficiency. 
               If a user clicks "Save" without changing anything, no log is created. 
               It keeps the database clean and small.
            */
            ->logOnlyDirty()

            /* 
               WHY 'useLogName': Organization. 
               Labels these logs as 'user'. This allows you to filter logs specifically 
               for the User module in your admin dashboard.
            */
            ->useLogName('user')

            /* 
               WHY 'dontSubmitEmptyLogs': Data integrity. 
               Prevents saving a record if the 'logOnly' fields didn't change.
            */
            ->dontSubmitEmptyLogs();
    }

    /**
     * CUSTOMIZATION: Tap Activity
     * Purpose: To inject dynamic request data (like IP and User Type) into the log 
     * that is not part of the User model itself.
     */
    public function tapActivity(Activity $activity, string $eventName)
    {
        /* 
           WHY 'ip': Traceability and Security. 
           If a malicious change happens, you can track the physical location/source 
           via the IP address.
        */
        $activity->properties = $activity->properties->put('ip', request()->ip());

        /* 
           WHY 'user_type': Role context. 
           In systems with multiple guards (Admin vs Customer), this tells you 
           exactly what 'kind' of user performed the action, which is vital for audits.
        */
        if (auth()->check()) {
            $activity->properties = $activity->properties->put('user_type', auth()->user()->user_type);
        }
    }
}
