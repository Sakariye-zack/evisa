<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @mixin IdeHelperDocument
 */
class Document extends Model
{
    use HasFactory;

    protected $fillable = ['visa_application_id','type','file_path','verified_by','verified_at'];

    public function application() { return $this->belongsTo(VisaApplication::class, 'visa_application_id'); }
}
