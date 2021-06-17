<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('store_id');
            $table->integer('requisition_id');
            $table->boolean('is_approved');
            $table->text('approval_comment')->nullable();
            $table->integer('quantity_given');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_approvals');
    }
}
