<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('requisition_id');
            $table->boolean('is_sh_tl_approved')->nullable();
            $table->boolean('is_manager_approved')->nullable();
            $table->boolean('is_clevel_approved')->nullable();
            $table->text('sh_tl_comment')->nullable();
            $table->text('manager_comment')->nullable();
            $table->text('clevel_comment')->nullable();
            $table->integer('sh_tl_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('clevel_id')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approvals');
    }
}
