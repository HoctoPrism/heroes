<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Hero
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $gender
 * @property int $race
 * @property-read Gender|null $hGender
 * @property-read Race|null $hRace
 * @property-read Skill|null $hSkill
 * @property-read Collection|Universe[] $universe
 * @property-read int|null $universe_count
 * @method static Builder|Hero newModelQuery()
 * @method static Builder|Hero newQuery()
 * @method static Builder|Hero query()
 * @method static Builder|Hero whereCreatedAt($value)
 * @method static Builder|Hero whereDescription($value)
 * @method static Builder|Hero whereGender($value)
 * @method static Builder|Hero whereId($value)
 * @method static Builder|Hero whereName($value)
 * @method static Builder|Hero whereRace($value)
 * @method static Builder|Hero whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Hero extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'gender', 'skill', 'race', 'image'];

    public function hgender(): BelongsTo
    {
        return $this->BelongsTo(Gender::class, 'gender');
    }

    public function hrace(): BelongsTo
    {
        return $this->BelongsTo(Race::class, 'race');
    }

    public function hskill(): BelongsTo
    {
        return $this->BelongsTo(Skill::class, 'skill');
    }

    public function universe(): BelongsToMany
    {
        return $this->belongstoMany(
            Universe::class,
            'heroe_universes',
            'heroe',
            'universe'
        );
    }
}
