<?php

namespace App\Models\Player;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Player\PlayerTokens
 *
 * @property int $id
 * @property int $playerId
 * @property string|null $accessToken
 * @property string|null $refreshToken
 * @property string|null $accessTokenExpiresIn
 * @property string|null $refreshTokenExpiresIn
 * @property string|null $createTime
 * @property string|null $modifyTime
 * @property string|null $deleteTime
 * @method static Builder|PlayerTokens newModelQuery()
 * @method static Builder|PlayerTokens newQuery()
 * @method static Builder|PlayerTokens query()
 * @method static Builder|PlayerTokens whereAccessToken($value)
 * @method static Builder|PlayerTokens whereAccessTokenExpiresIn($value)
 * @method static Builder|PlayerTokens whereCreateTime($value)
 * @method static Builder|PlayerTokens whereDeleteTime($value)
 * @method static Builder|PlayerTokens whereId($value)
 * @method static Builder|PlayerTokens whereModifyTime($value)
 * @method static Builder|PlayerTokens wherePlayerId($value)
 * @method static Builder|PlayerTokens whereRefreshToken($value)
 * @method static Builder|PlayerTokens whereRefreshTokenExpiresIn($value)
 * @mixin \Eloquent
 */
class PlayerTokens extends BaseModel
{
    use HasFactory;

    protected $table = 'playerTokens';

    public $timestamps = false;

    protected $fillable = [
        'playerId',
        'accessToken',
        'refreshToken',
        'accessTokenExpiresIn',
        'refreshTokenExpiresIn',
        'createTime',
        'modifyTime',
        'deleteTime',
    ];
}
