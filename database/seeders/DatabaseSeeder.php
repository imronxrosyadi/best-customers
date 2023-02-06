<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Customer;
use App\Models\CustomerEvaluation;
use App\Models\CustomerPointEvaluation;
use App\Models\SubCriteria;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $count = 80;
        $criteria = 5;
        $latest = 1;

        // user

        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);

        // customer

        Customer::factory($count)->create();

        // criteria

        Criteria::create([
            'name' => 'Frekuensi Transaksi (2 Bulan)',
            'code' => 'K1',
            'weight' => 25,
            'type' => 'Benefit'
        ]);

        Criteria::create([
            'name' => 'Quantity / KG (2 Bulan) ',
            'code' => 'K2',
            'weight' => 25,
            'type' => 'Benefit'
        ]);

        Criteria::create([
            'name' => 'Waktu Join Member',
            'code' => 'K3',
            'weight' => 20,
            'type' => 'Benefit'
        ]);

        Criteria::create([
            'name' => 'Ketepatan Pembayaran',
            'code' => 'K4',
            'weight' => 15,
            'type' => 'Benefit'
        ]);

        Criteria::create([
            'name' => 'Jarak Tempuh',
            'code' => 'K5',
            'weight' => 15,
            'type' => 'Benefit'
        ]);

        // sub-criteria

        // freq-trx
        SubCriteria::create([
            'name' => '<5',
            'value' => '1',
            'criteria_id' => '1'
        ]);

        SubCriteria::create([
            'name' => '5-10',
            'value' => '2',
            'criteria_id' => '1'
        ]);

        SubCriteria::create([
            'name' => '11-15',
            'value' => '3',
            'criteria_id' => '1'
        ]);

        SubCriteria::create([
            'name' => '16-20',
            'value' => '4',
            'criteria_id' => '1'
        ]);

        SubCriteria::create([
            'name' => '>20',
            'value' => '5',
            'criteria_id' => '1'
        ]);

        // qty per kg
        SubCriteria::create([
            'name' => '10 Kg',
            'value' => '1',
            'criteria_id' => '2'
        ]);

        SubCriteria::create([
            'name' => '20 Kg',
            'value' => '2',
            'criteria_id' => '2'
        ]);

        SubCriteria::create([
            'name' => '30 Kg',
            'value' => '3',
            'criteria_id' => '2'
        ]);

        SubCriteria::create([
            'name' => '40 Kg',
            'value' => '4',
            'criteria_id' => '2'
        ]);

        SubCriteria::create([
            'name' => '50 Kg',
            'value' => '5',
            'criteria_id' => '2'
        ]);

        // ketepatan pembayaran
        SubCriteria::create([
            'name' => '1 / Jumlah Transaksi',
            'value' => '1',
            'criteria_id' => '3'
        ]);

        SubCriteria::create([
            'name' => '2 / Jumlah Transaksi',
            'value' => '2',
            'criteria_id' => '3'
        ]);

        SubCriteria::create([
            'name' => '3 / Jumlah Transaksi',
            'value' => '3',
            'criteria_id' => '3'
        ]);

        SubCriteria::create([
            'name' => '4 / Jumlah Transaksi',
            'value' => '4',
            'criteria_id' => '3'
        ]);

        SubCriteria::create([
            'name' => '5 / Jumlah Transaksi',
            'value' => '5',
            'criteria_id' => '3'
        ]);

        // waktu join member
        SubCriteria::create([
            'name' => '1 Tahun',
            'value' => '1',
            'criteria_id' => '4'
        ]);

        SubCriteria::create([
            'name' => '2 Tahun',
            'value' => '2',
            'criteria_id' => '4'
        ]);

        SubCriteria::create([
            'name' => '3 Tahun',
            'value' => '3',
            'criteria_id' => '4'
        ]);

        SubCriteria::create([
            'name' => '4 Tahun',
            'value' => '4',
            'criteria_id' => '4'
        ]);

        SubCriteria::create([
            'name' => '5 Tahun',
            'value' => '5',
            'criteria_id' => '4'
        ]);

        // jarak tempuh
        SubCriteria::create([
            'name' => '500 M',
            'value' => '1',
            'criteria_id' => '5'
        ]);

        SubCriteria::create([
            'name' => '2 KM',
            'value' => '2',
            'criteria_id' => '5'
        ]);

        SubCriteria::create([
            'name' => '4 KM',
            'value' => '3',
            'criteria_id' => '5'
        ]);

        SubCriteria::create([
            'name' => '6 KM',
            'value' => '4',
            'criteria_id' => '5'
        ]);

        SubCriteria::create([
            'name' => '8 KM',
            'value' => '5',
            'criteria_id' => '5'
        ]);

        // customer evaluation
        for ($i = 0; $i < $count; $i++) {
            CustomerEvaluation::create([
                'customer_id' => $i+1
            ]);
        }

        for ($i = 0; $i < $criteria; $i++) {
            for ($j = 0; $j < $count; $j++) {
                CustomerPointEvaluation::create([
                    'customer_evaluation_id' => $j+1,
                    'sub_criteria_id' => rand($latest,($latest+$criteria-1))
                ]);
            }
            $latest = $latest+$criteria;
        }

    }
}
