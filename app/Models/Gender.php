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
 * App\Models\Gender
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Hero[] $produit
 * @property-read int|null $produit_count
 * @method static Builder|Gender newModelQuery()
 * @method static Builder|Gender newQuery()
 * @method static Builder|Gender query()
 * @method static Builder|Gender whereCreatedAt($value)
 * @method static Builder|Gender whereId($value)
 * @method static Builder|Gender whereName($value)
 * @method static Builder|Gender whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Gender extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function heroe(): HasMany
    {
        return $this->HasMany(Hero::class);
    }
}
