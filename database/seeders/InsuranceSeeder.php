<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Insurance::create([
            'name' => 'Primary Medical',
            'company_name' => 'Uttara General Insurance Company Limited',
            'insurance_fee' => 500.00,
            'coverage' => 'We will reimburse any person using our vehicle for payments made under the Road Traffic Acts for emergency medical treatment.
                             And If any people in your vehicle are injured as a direct result of your vehicle being involved in an accident, we will pay 40% amount for:
                            The medical expenses arising in connection with that accident. ',
            'status' => 'active',

        ]);
    }
}
