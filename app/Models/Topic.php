<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/20/16
 * Time: 22:26
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'section_id',
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
