<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use phpDocumentor\Reflection\Types\Nullable;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {

            
            $table->id();
            $table->decimal('quantity', $precision = 8, $scale = 2);
            $table->integer('category_id');
            $table->string('req_id');
            $table->foreignId('item_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('unit_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('requisitions');
    }
}
