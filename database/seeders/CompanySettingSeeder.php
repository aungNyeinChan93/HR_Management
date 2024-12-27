<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if(!CompanySetting::exists()){
            CompanySetting::create([
                'company_name' => 'Chan HR',
                'company_email' => 'cahn@123123',
                'company_phone' => '0656235698',
                'company_address' => 'yangon ',
                'contact_person' => 'Chan HR',
                'office_start_time' => '09:00:00',
                'office_end_time' => '17:00:00',
                'break_start_time' => '12:00:00',
                'break_end_time' => '13:00:00',
            ]);
        }
    }
}
