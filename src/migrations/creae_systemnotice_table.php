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
                $table->string('desc');
                $table->text('content');
                $table->tinyint('status', 1);
                $table->datetime('created_at');
                $table->datetime('updated_at');
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
