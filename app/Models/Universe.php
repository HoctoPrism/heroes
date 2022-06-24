<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Universe
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Hero[] $heroe
 * @property-read int|null $heroe_count
 * @method static Builder|Universe newModelQuery()
 * @method static Builder|Universe newQuery()
 * @method static Builder|Universe query()
 * @method static Builder|Universe whereCreatedAt($value)
 * @method static Builder|Universe whereId($value)
 * @method static Builder|Universe whereName($value)
 * @method static Builder|Universe whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Universe extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function heroe(): BelongsToMany
    {
        return $this->belongstoMany(
            Hero::class,
            'heroe_universes',
            'universe',
            'heroe'
        );
    }
}
