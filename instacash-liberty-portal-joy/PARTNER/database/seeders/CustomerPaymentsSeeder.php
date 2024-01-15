<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example data for seeding
        $data = [
            [
                'customer_id' => 1,
                'paymentcycle_id' => 1,
                'full_name' => 'John Doe',
                'email' => 'john@example.com',
                'phone_number' => '123456789',
                'id_number' => 'ABC123',
                'amount' => 100.00,
                'payment_reference' => 'PAY123',
                'payment_sacco' => 'SACCO456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more data as needed
        ];

        // Insert the data into the customerpayments table
        DB::table('customerpayments')->insert($data);
    }
}
