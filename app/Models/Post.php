<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/20/16
 * Time: 22:26
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }


}
