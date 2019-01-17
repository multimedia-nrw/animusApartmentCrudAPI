<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartments extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'apartments';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'property_id', 'move_in_date', 'street', 'postal_code', 'town', 'country', 'contact_email_address', 'access_token', 'created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function scopeByToken($query, $access_token)
    {
        return $query->where('access_token', $access_token);
    }

}
