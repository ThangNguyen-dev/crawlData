<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberInjectionDates extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    /**
     * Display a listing of the resource.
     *
     * @throws \Exception
     */
    public static function getNumberInfection()
    {
        $data = Crawl::getCovidData('https://vnexpress.net/microservice/sheet/type/covid19_2021_by_map', 40);;
        unset($data[0]);

        foreach ($data as $key => $value) {

            //            empty in offset 10 is empty province
            if (is_array($value) && !empty($value[10])) {
                $numberInjectionDates = NumberInjectionDates::where('province', $value[10])->first();
                $dataInput = [
                    'province' => $value[10],
                    'number_infections' => $value[5] != "" ? $value[5] : 0,
                    'number_dead' => $value[22] != "" ? $value[22] : 0,
                    'level' => $value[13] != "" ? $value[35] : 0,
                    'date' => date('Y-m-d'),
                ];

                //                check isset province in database
                if (is_null($numberInjectionDates)) {
                    NumberInjectionDates::create($dataInput);
                } else {
                    $numberInjectionDates->update($dataInput);
                }
            };
        }
    }
}
