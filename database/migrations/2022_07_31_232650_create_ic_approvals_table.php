<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ic_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ic_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('requisition_id')->constrained()->onDelete('cascade');
            $table->boolean('is_approved');
            $table->text('approval_comment')->nullable();
            $table->text('rejection_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ic_approvals');
    }
}
