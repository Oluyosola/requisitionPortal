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
            $table->timestamps();
            $table->decimal('quantity', $precision = 8, $scale = 2);
            $table->integer('category_id');
            $table->integer('item_id');
            $table->text('description');
            $table->integer('status_id')->default(1);
            $table->integer('user_id');
            $table->boolean('is_sh_tl_approved')->nullable();
            $table->boolean('is_manager_approved')->nullable();
            $table->boolean('is_clevel_approved')->nullable();
            $table->text('sh_tl_approval_comment')->nullable();
            $table->text('manager_approval_comment')->nullable();
            $table->text('clevel_approval_comment')->nullable();
            $table->text('sh_tl_rejection_comment')->nullable();
            $table->text('manager_rejection_comment')->nullable();
            $table->text('clevel_rejection_comment')->nullable();
            $table->integer('sh_tl_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('clevel_id')->nullable();
            $table->string('req_id');
            $table->integer('is_store_approved')->nullable();
            $table->integer('store_id')->nullable();
            $table->integer('item_unit_id')->nullable();
            // $table->double('quantity', 8, 2);

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
