<?php

use Illuminate\Database\Seeder;

class NumberRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\NumberRequest::class, 5)->create();
    }
}
