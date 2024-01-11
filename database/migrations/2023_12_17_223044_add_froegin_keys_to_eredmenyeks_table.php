<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFroeginKeysToEredmenyeksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('eredmenyeks', function (Blueprint $table) {
            $table->foreign('task_id', 'task_idfk_1')->references('id')->on('tasks');
            $table->foreign('user_id', 'user_idfk_1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eredmenyeks', function (Blueprint $table) {
            $table->dropForeign('task_idfk_1');
            $table->dropForeign('user_idfk_1');
        });
    }
}
