<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        /*
        DB::table('users')->insert([
            'id_rol' => 1,
            'name' => 'admin',
            'email' => 'admin@icatcdmx.mx',
            'password' => Hash::make('Ic4t[dmx$!!&f0%'),
        ]);

        DB::table('users')->insert([
            'id_rol' => 2,
            'name' => 'Admin DDC',
            'email' => 'ddc@icatcdmx.mx',
            'password' => Hash::make('Ic4tDDC[dmx'),
        ]);

        DB::table('users')->insert([
            'id_rol' => 3,
            'name' => 'Admin DAF',
            'email' => 'daf@icatcdmx.mx',
            'password' => Hash::make('Ic4tDAF[dmx'),
        ]);

        DB::table('users')->insert([
            'id_rol' => 4,
            'name' => 'Admin DAE',
            'email' => 'dae@icatcdmx.mx',
            'password' => Hash::make('Ic4tDAE[dmx'),
        ]);

        DB::table('users')->insert([
            'id_rol' => 5,
            'name' => 'Admin DPCER',
            'email' => 'dpcer@icatcdmx.mx',
            'password' => Hash::make('Ic4tDPCER[dmx'),
        ]);

        DB::table('users')->insert([
            'id_rol' => 6,
            'name' => 'Admin GAM',
            'email' => 'gam@icatcdmx.mx',
            'password' => Hash::make('Ic4tGAM[dmx'),
        ]);
        */

        DB::table('home_config')->insert([
            'banner' => '1',
            'location' => 'catalogue1',
        ]);

    }
}
