<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagerApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manager_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('manager_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('manager_approvals');
    }
}
