<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Models\Customer;
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
        // user

        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password')
        ]);

//        // customer
//
//        Customer::create([
//            'fullName' => 'Zikri',
//            'idNumber' => '001',
//            'dateOfBirth' => '1996-02-20',
//            'gender' => 'L',
//            'address' => 'purkat rt 7'
//        ]);
//
//        Customer::create([
//            'fullName' => 'Danang',
//            'idNumber' => '002',
//            'dateOfBirth' => '2002-07-07',
//            'gender' => 'L',
//            'address' => 'purkat rt 8'
//        ]);
//
//        Customer::create([
//            'fullName' => 'Wahyu',
//            'idNumber' => '003',
//            'dateOfBirth' => '1999-12-05',
//            'gender' => 'L',
//            'address' => 'ponser rt 4'
//        ]);
//
//        Customer::create([
//            'fullName' => 'Laras',
//            'idNumber' => '004',
//            'dateOfBirth' => '1999-11-29',
//            'gender' => 'P',
//            'address' => 'purkat rt 6'
//        ]);
//
//        Customer::create([
//            'fullName' => 'Ahmad',
//            'idNumber' => '005',
//            'dateOfBirth' => '1992-11-27',
//            'gender' => 'L',
//            'address' => 'tajur rt 2'
//        ]);
//
//        // criteria
//
//        Criteria::create([
//            'name' => 'Frekuensi Transaksi (2 Bulan)',
//            'code' => 'K1',
//            'weight' => 25,
//            'type' => 'Benefit'
//        ]);
//
//        Criteria::create([
//            'name' => 'Waktu Join Member',
//            'code' => 'K2',
//            'weight' => 25,
//            'type' => 'Benefit'
//        ]);
//
//        Criteria::create([
//            'name' => 'Cara Pembayaran',
//            'code' => 'K3',
//            'weight' => 20,
//            'type' => 'Benefit'
//        ]);
//
//        Criteria::create([
//            'name' => 'Lokasi',
//            'code' => 'K4',
//            'weight' => 15,
//            'type' => 'Benefit'
//        ]);
//
//        Criteria::create([
//            'name' => 'Frekuensi Komplain (2 Bulan)',
//            'code' => 'K5',
//            'weight' => 15,
//            'type' => 'Benefit'
//        ]);

        // sub-criteria

    }
}
