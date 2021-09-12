<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE TABLE `playerTokens` (
                        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `playerId` INT(11) UNSIGNED NOT NULL,
                        `accessToken` VARCHAR(50) NULL DEFAULT NULL,
                        `refreshToken` VARCHAR(50) NULL DEFAULT NULL,
                        `accessTokenExpiresIn` TIMESTAMP NULL DEFAULT NULL,
                        `refreshTokenExpiresIn` TIMESTAMP NULL DEFAULT NULL,
                        `createTime` DATETIME NULL DEFAULT NULL,
                        `modifyTime` DATETIME NULL DEFAULT NULL,
                        `deleteTime` DATETIME NULL DEFAULT NULL,
                        PRIMARY KEY (`id`)
                    )
                    COLLATE='utf8mb4_general_ci'
                    ;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_tokens');
    }
}
