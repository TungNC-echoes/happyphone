<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Catalog
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Catalog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Catalog extends Model
{
    //
    protected $table = 'type_products';
}
