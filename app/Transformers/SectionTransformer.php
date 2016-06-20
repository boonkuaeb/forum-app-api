<?php
/**
 * Created by PhpStorm.
 * User: boonkuae_boo
 * Date: 6/20/16
 * Time: 18:10
 */

namespace App\Transformers;

use App\Models\Section;
use League\Fractal\TransformerAbstract;

class SectionTransformer extends TransformerAbstract
{
    public function transform(Section $section)
    {
        return [
            'id' => $section->id,
            'title' => $section->title,
            'slug' => $section->slug,
            'description' => $section->description,
        ];
    }
}
