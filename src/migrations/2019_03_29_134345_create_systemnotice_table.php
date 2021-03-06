<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateSystemnoticeTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('systemnotice', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('uuid', 64);
                $table->string('title');
                $table->string('desc')->nullable();
                $table->text('content');
                $table->tinyInteger('status');
                $table->datetime('created_at');
                $table->datetime('updated_at')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('systemnotice');
        }
    }
