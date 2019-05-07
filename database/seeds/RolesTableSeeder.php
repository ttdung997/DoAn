<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', '1.2.3.4.5.6.8', 'EKU_NIST_ADMIN', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()],
            ['name' => 'doctor', '1.2.3.4.5.6.9', 'EKU_NIST_DOCTOR', 'created_at' => Carbon\Carbon::now(), 'updated_at' => Carbon\Carbon::now()]
        ]);
    }
}
