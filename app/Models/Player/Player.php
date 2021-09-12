<?php

namespace App\Models\Player;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * App\Models\Player\Player
 *
 * @property int $id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $passwordHash
 * @property string|null $email
 * @property int $isDeleted
 * @property Carbon|null $createTime
 * @property string|null $modifyTime
 * @property string|null $deleteTime
 * @method static Builder|Player newModelQuery()
 * @method static Builder|Player newQuery()
 * @method static Builder|Player query()
 * @method static Builder|Player whereCreateTime($value)
 * @method static Builder|Player whereDeleteTime($value)
 * @method static Builder|Player whereEmail($value)
 * @method static Builder|Player whereFirstName($value)
 * @method static Builder|Player whereId($value)
 * @method static Builder|Player whereIsDeleted($value)
 * @method static Builder|Player whereLastName($value)
 * @method static Builder|Player whereModifyTime($value)
 * @method static Builder|Player wherePasswordHash($value)
 * @property-read string $password
 * @mixin Eloquent
 */
class Player extends BaseModel implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory, Authenticatable;

    protected $table = 'player';

    protected $fillable = [
        'firstName',
        'lastName',
        'passwordHash',
        'email',
    ];

    public function id(): int {
        return $this->id;
    }

    public function getPasswordAttribute(): string {
        return $this->passwordHash;
    }
}
