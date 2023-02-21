<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAccountVerification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_verifications', function (Blueprint $table) {
			$table->integer('user_id');
			$table->text('token');
			$table->text('expiry');
			$table->boolean('is_used');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_verifications', function (Blueprint $table) {
			$table->dropColumn('user_id');
			$table->dropColumn('token');
			$table->dropColumn('expiry');
			$table->dropColumn('is_used');
        });
    }
}
