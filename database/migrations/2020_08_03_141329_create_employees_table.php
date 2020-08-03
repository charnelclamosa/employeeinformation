<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('EmployeeName');
            $table->date('BirthDate');
            $table->string('Gender');
            $table->string('Address');
            $table->string('ContactNumber');
            $table->string('Position');
            $table->string('ContractStatus');
            $table->string('CompanyCode');
            $table->string('DepartmentCode');
            $table->string('SectionCode');
            $table->string('TeamCode');
            $table->date('HiredDate');
            $table->date('RegularizationDate');
            $table->date('RetirementDate');
            $table->timestamps();
            $table->softDeletes();
            $table->string('updated_by');
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
