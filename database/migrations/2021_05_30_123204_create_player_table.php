<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::statement(
            "CREATE TABLE `player` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `firstName` VARCHAR(255) NULL DEFAULT NULL,
                            `lastName` VARCHAR(255) NULL DEFAULT NULL,
                            `passwordHash` VARCHAR(255) NULL DEFAULT NULL,
                            `email` VARCHAR(255) NULL DEFAULT NULL,
                            `isDeleted` TINYINT(3) UNSIGNED ZEROFILL NULL DEFAULT NULL,
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
        Schema::dropIfExists('player');
    }
}
