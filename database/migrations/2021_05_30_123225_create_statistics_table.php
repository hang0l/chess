<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement(
            "CREATE TABLE `statistics` (
                        `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                        `playerId` INT(11) UNSIGNED NOT NULL,
                        `rating` INT(11) UNSIGNED NULL DEFAULT NULL,
                        `gamesCount` INT(11) UNSIGNED NULL DEFAULT NULL,
                        `win` INT(11) UNSIGNED NULL DEFAULT NULL,
                        `lose` INT(11) UNSIGNED NULL DEFAULT NULL,
                        `draw` INT(11) UNSIGNED NULL DEFAULT NULL,
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
        Schema::dropIfExists('statistics');
    }
}
