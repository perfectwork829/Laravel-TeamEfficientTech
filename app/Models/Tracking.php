<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracking extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'trackings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lat',
        'lon',
        'user_id',
        'action',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public const ACTION_SELECT = [
        'periodic' => 'Periodic Check In',
        'jobsite'  => 'Jobsite Check In',
        'start'    => 'Time Start Check In',
        'stop'     => 'Time Stop Check In',
        'expense'  => 'Expense Added',
        'login'    => 'Log In',
        'logout'   => 'Log Out',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
