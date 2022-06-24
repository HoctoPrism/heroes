<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Race
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Hero[] $produit
 * @property-read int|null $produit_count
 * @method static Builder|Race newModelQuery()
 * @method static Builder|Race newQuery()
 * @method static Builder|Race query()
 * @method static Builder|Race whereCreatedAt($value)
 * @method static Builder|Race whereId($value)
 * @method static Builder|Race whereName($value)
 * @method static Builder|Race whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Race extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function heroe(): HasMany
    {
        return $this->HasMany(Hero::class);
    }
}
