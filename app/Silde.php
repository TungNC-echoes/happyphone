<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Silde
 *
 * @property int $id
 * @property string|null $link
 * @property string $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Silde newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Silde query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Silde whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Silde whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Silde whereLink($value)
 * @mixin \Eloquent
 */
class Silde extends Model
{
    //
    protected $table='slide';
    public $timestamps = false;
}
