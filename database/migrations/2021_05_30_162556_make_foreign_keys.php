<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MakeForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement(
            "ALTER TABLE `game`
                        ADD CONSTRAINT `FK_game_player` FOREIGN KEY (`playerOneId`) REFERENCES `player` (`id`),
                        ADD CONSTRAINT `FK_game_player_2` FOREIGN KEY (`playerTwoId`) REFERENCES `player` (`id`);"
        );

        DB::statement(
            "ALTER TABLE `statistics`
                        ADD CONSTRAINT `FK_statistics_player` FOREIGN KEY (`playerId`) REFERENCES `player` (`id`);"
        );

        DB::statement(
            "ALTER TABLE `playerTokens`
                        ADD CONSTRAINT `FK_playerTokens_player` FOREIGN KEY (`playerId`) REFERENCES `player` (`id`);"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
