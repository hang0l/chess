<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeExpiresInColumnInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "ALTER TABLE `playerTokens`
                        CHANGE COLUMN `accessTokenExpiresIn` `accessTokenExpiresIn` INT UNSIGNED NOT NULL AFTER `refreshToken`,
                        CHANGE COLUMN `refreshTokenExpiresIn` `refreshTokenExpiresIn` INT UNSIGNED NOT NULL AFTER `accessTokenExpiresIn`;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('column_int', function (Blueprint $table) {
            //
        });
    }
}
