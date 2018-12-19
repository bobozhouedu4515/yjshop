<?php

use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::firstOrNew(['username'=>'bobozhou'])->fill(['password'=>bcrypt ('admin888')])->save();
    }
}
