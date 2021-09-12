<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::statement(
            "CREATE TABLE `game` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `playerOneId` INT(11) UNSIGNED NOT NULL,
                            `playerTwoId` INT(11) UNSIGNED NOT NULL,
                            `currentPosition` TEXT NULL DEFAULT NULL,
                            `movesHistory` TEXT NULL DEFAULT NULL,
                            `playerOneLastMove` VARCHAR(50) NULL DEFAULT NULL,
                            `playerTwoLastMove` VARCHAR(50) NULL DEFAULT NULL,
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
        Schema::dropIfExists('game');
    }
}
