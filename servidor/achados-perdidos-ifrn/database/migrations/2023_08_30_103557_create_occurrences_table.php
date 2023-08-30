<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->id();

            $table->boolean('refund')->default(false);

            //user_id
            $table->foreignIdFor(\App\Models\User::class);

            //item_id
            $table->foreignIdFor(\App\Models\Item::class);

            $table->string('responsible_registration');

            $table->text('description');

            // $table->timestamps('input_date');   

            // $table->timestamps('output_date');   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occurrences');
    }
};
