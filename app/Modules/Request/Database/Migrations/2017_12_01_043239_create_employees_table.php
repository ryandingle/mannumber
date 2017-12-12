<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('request_id')->comment('Batch Id');
            $table->bigInteger('employee_number')->unique();

            /*basic info*/
            $table->string('full_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('age')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->char('zip_code', 255)->nullable();
            $table->char('post_code', 255)->nullable();
            $table->char('contact', 255)->nullable();
            $table->char('gender', 255)->nullable();
            $table->char('marital_status', 255)->nullable();
            $table->char('religion', 255)->nullable();
            $table->date('date_hire')->nullable();

            /*government benefits*/
            $table->bigInteger('sss_number')->nullable()->unique();
            $table->bigInteger('tin_number')->nullable();
            $table->bigInteger('phic_number')->nullable();
            $table->bigInteger('pagibig_number')->nullable();
            $table->bigInteger('hdmf_number')->nullable();

            /*others*/
            $table->date('date_regularized')->nullable();
            $table->decimal('hourly_rate', 10, 2)->nullable();
            $table->decimal('daily_rate', 10, 2)->nullable();
            $table->char('branch', 255)->nullable();
            $table->char('company', 255)->nullable();
            $table->char('previous_branch', 255)->nullable();
            $table->char('position', 255)->nullable();
            $table->char('department', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
