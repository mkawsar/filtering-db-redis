<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ini_set('memory_limit', '-1');
        $filepath = base_path('test-data.csv');
        $array = $this->csvToArray($filepath);

        $this->command->getOutput()->progressStart(count($array));
        for ($i = 0; $i < count($array); $i ++) {
            $person = new Person();
            $person->id = $array[$i]['id'];
            $person->email_address = $array[$i]['email_address'];
            $person->name = $array[$i]['name'];
            $person->birthday = $array[$i]['birthday'];
            $person->phone = $array[$i]['phone'];
            $person->ip = $array[$i]['ip'];
            $person->country = $array[$i]['country'];
            $person->save();
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }

    protected function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
