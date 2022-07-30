<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShTlApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sh_tl_approvals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('sh_tl_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('requisition_id')->constrained()->onDelete('cascade');
            $table->foreignId('reporting_id')->constrained('designation_types')->onDelete('cascade');
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
        Schema::dropIfExists('sh_tl_approvals');
    }
}
