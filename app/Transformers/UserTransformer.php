<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/20/16
 * Time: 18:10
 */

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'username' => $user->username,
            'avatar' => $user->avatar()
        ];
    }
}
