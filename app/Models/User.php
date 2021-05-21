<?php

namespace App\Models;


use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use DateTimeInterface;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'last_name',
        'telephone',
        'ci',
        'password',
        'branch_office_id',
    ];

    protected $appends = ['full_name'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i:s');
    }

    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }

    public function getFullName(): string
    {
        return $this->name . ' '. $this->last_name;
    }

    public function branchOffice()
    {
        return $this->belongsTo(BranchOffice::class, 'branch_office_id')
        ->withDefault([
            'name' => 'Sin sucursal',
        ]);
    }

    public function routeNotificationForSlack($notification)
    {
        return "https://hooks.slack.com/services/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"; 
    }

}
