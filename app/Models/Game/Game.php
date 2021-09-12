<?php

namespace App\Models\Game;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * App\Models\Game\Game
 *
 * @property int $id
 * @property int $playerOneId
 * @property int $playerTwoId
 * @property string|null $currentPosition
 * @property string|null $movesHistory
 * @property string|null $playerOneLastMove
 * @property string|null $playerTwoLastMove
 * @property Carbon|null $createTime
 * @property string|null $modifyTime
 * @property string|null $deleteTime
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereCreateTime($value)
 * @method static Builder|Game whereCurrentPosition($value)
 * @method static Builder|Game whereDeleteTime($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereModifyTime($value)
 * @method static Builder|Game whereMovesHistory($value)
 * @method static Builder|Game wherePlayerOneId($value)
 * @method static Builder|Game wherePlayerOneLastMove($value)
 * @method static Builder|Game wherePlayerTwoId($value)
 * @method static Builder|Game wherePlayerTwoLastMove($value)
 * @mixin \Eloquent
 */
class Game extends BaseModel
{
    use HasFactory;

    protected $table = 'game';
}
