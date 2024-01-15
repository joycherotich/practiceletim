<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cycles', function (Blueprint $table) {
            $table->id();
            $table->string('payment_cycle_name')->unique();
            $table->decimal('amount', 8, 2);
            
            $table->boolean('status')->default(true);
            // $table->string('premium_plan')->unique();
            $table->timestamps();
        });

        // Seed the payment_cycles table with predefined values
        $this->seedPaymentCycles();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_cycles');
    }

    /**
     * Seed payment_cycles table with predefined values.
     *
     * @return void
     */
    private function seedPaymentCycles()
    {/*  */
        $paymentCycles = [
            ['payment_cycle_name' => 'Monthly', 'amount' => 2500.00,  'status' => rand(0, 1) == 1],
            ['payment_cycle_name' => 'Quarterly', 'amount' => 7000.00,  'status' => rand(0, 1) == 1],
            ['payment_cycle_name' => 'Annually', 'amount' => 30000.00,'status' => rand(0, 1) == 1],
            // Add more predefined values as needed
        ];
        

        foreach ($paymentCycles as $cycle) {
            \DB::table('payment_cycles')->insert($cycle);
        }
    }
}