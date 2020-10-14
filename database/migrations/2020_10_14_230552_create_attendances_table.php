<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->tinyInteger('type');
            $table->dateTime('att_on', 0)->default(\DB::raw('CURRENT_TIMESTAMP'));;
            //$table->date('att_date');
            //$table->time('att_time', 0);
            $table->string('ip', 100);
            $table->point('position')->nullable();

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
        Schema::dropIfExists('attendances');
    }
}
