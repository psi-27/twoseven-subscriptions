<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("subscriptions")) {
            Schema::create('subscriptions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('package');
                $table->integer('user_id')->references('id')->on('users');
                $table->timestamps();
                $table->boolean('is_active')->default(true);
            });
        }
        if (!Schema::hasTable("channels")) {
            Schema::create('channels', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code', 10);
            });
            factory(TwoSeven\Models\Channel::class, 50)->create();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('channels');
    }
}
