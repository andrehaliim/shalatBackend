<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = new CsvtoArray();
        $file = __DIR__.'/../csv/city.csv';

        $header = ['id', 'nama'];
        $data = $csv->csv_to_array($file, $header, ';');
        $data = array_map(function ($arr) {
            return $arr + ['created_at' => Carbon::now()->addMonths(-1)->addMinutes($arr['id']), 'created_by' =>'admin', 'updated_at' => Carbon::now()->addMonths(-1)->addMinutes($arr['id']), 'updated_by' =>'admin'];
        }, $data);

        DB::table('city')->insert($data);
    }
}
