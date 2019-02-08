<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create array of pre-defined options
        $appsettings = [
          ['id' => 1, 'group' => 'company_info', 'name' => 'street', 'value' => 'undefined'],
          ['id' => 2, 'group' => 'company_info', 'name' => 'house_number', 'value' => 'undefined'],
          ['id' => 3, 'group' => 'company_info', 'name' => 'company_name', 'value' => 'undefined'],
          ['id' => 4, 'group' => 'company_info', 'name' => 'country', 'value' => 'undefined'],
          ['id' => 5, 'group' => 'company_info', 'name' => 'postal', 'value' => 'undefined'],
          ['id' => 6, 'group' => 'company_info', 'name' => 'state_province_county', 'value' => 'undefined'],
          ['id' => 7, 'group' => 'company_info', 'name' => 'contact_email', 'value' => 'undefined'],
          ['id' => 8, 'group' => 'company_info', 'name' => 'contact_phone', 'value' => 'undefined'],
          ['id' => 9, 'group' => 'sales', 'name' => 'currency', 'value' => '€']
        ];

        // insert
        DB::table('appsettings')->insert($appsettings);
    }
}
