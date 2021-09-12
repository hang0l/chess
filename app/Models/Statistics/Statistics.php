<?php

namespace App\Models\Statistics;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Statistics\Statistics
 *
 * @property int $id
 * @property int $playerId
 * @property int|null $rating
 * @property int|null $gamesCount
 * @property int|null $win
 * @property int|null $lose
 * @property int|null $draw
 * @method static Builder|Statistics newModelQuery()
 * @method static Builder|Statistics newQuery()
 * @method static Builder|Statistics query()
 * @method static Builder|Statistics whereDraw($value)
 * @method static Builder|Statistics whereGamesCount($value)
 * @method static Builder|Statistics whereId($value)
 * @method static Builder|Statistics whereLose($value)
 * @method static Builder|Statistics wherePlayerId($value)
 * @method static Builder|Statistics whereRating($value)
 * @method static Builder|Statistics whereWin($value)
 * @mixin \Eloquent
 */
class Statistics extends Model
{
    use HasFactory;

    protected $table = 'statistics';
}
