<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperVisaApplication
 */
class VisaApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','visa_type','purpose','arrival_date','duration_days',
        'status','reference_no','fee_amount','payment_status'
    ];

    public function user() { return $this->belongsTo(User::class); }

    public function documents() { return $this->hasMany(Document::class, 'visa_application_id'); }
}
