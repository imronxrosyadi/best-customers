<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('idNumber')->unique();
            $table->date('dateOfBirth');
            $table->enum('gender', ['L', 'P']);
            $table->string('address');
            $table->enum('religion', ['Kristen', 'Katolik', 'Hindu', 'Islam', 'Budha']);
            $table->enum('maritalStatus', ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']);
            $table->enum('job', [
                'Belum/ Tidak Bekerja', 'Mengurus Rumah Tangga', 'Pelajar/ Mahasiswa', 'Pensiunan',
                'Pewagai Negeri Sipil', 'Tentara Nasional Indonesia', 'Kepolisian RI', 'Perdagangan',
                'Petani/ Pekebun', 'Peternak', 'Nelayan/ Perikanan', 'Industri', 'Konstruksi', 'Transportasi',
                'Karyawan Swasta', 'Karyawan BUMN', 'Karyawan Honorer', 'Buruh Harian Lepas', 'Buruh Tani/ Perkebunan',
                'Buruh Nelayan/ Perikanan', 'Buruh Peternakan', 'Pembantu Rumah Tangga', 'Tukang Cukur', 'Tukang Listrik',
                'Tukang Batu'
            ]);
            $table->enum('citizenship', ['WNA', 'WNI']);
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
        Schema::dropIfExists('customers');
    }
};
