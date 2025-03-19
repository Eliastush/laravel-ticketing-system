<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // This is BIGINT by default
            $table->string('title');
            $table->text('description');
            $table->date('event_date');
            $table->decimal('price', 8, 2);
            $table->integer('available_tickets');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('events');
    }
};
