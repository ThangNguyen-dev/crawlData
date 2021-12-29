<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Vnexpress extends Model
{
    use HasFactory;

    protected $table = 'vnexpresss';
    protected $guarded = ['id'];

    /**
     * get number infection and dead new
     * @return void 
     */
    public static function getSumInfectionAndDead()
    {
        //        get data from url with position explode
        $data = Crawl::getCovidData('https://vnexpress.net/microservice/sheet/type/covid19_2021_by_day', 66);
        //        get offset data need get from 27/4/2021 to now
        $offset = Crawl::getOffsetByDate('2021-04-27');

        // check date now have data or not update
        $dataInput = [
            'number_infections' => $data[$offset][4] != 0 ? $data[$offset][4] : $data[$offset + 1][4],
            'number_dead' => $data[$offset][12]  != 0 ? $data[$offset][12] : $data[$offset + 1][12],
            'new_case' => $data[$offset][3]  != 0 ? $data[$offset][3] : $data[$offset + 1][3],
            'new_dead' => $data[$offset][8]  != 0 ? $data[$offset][8] : $data[$offset + 1][8],
            'date' => date('Y-m-d'),
        ];

        $vnexpress = Vnexpress::latest()->first();
        //        check isset column to update else create
        if (empty($vnexpress)) {
            Vnexpress::create($dataInput);
        } else {
            $vnexpress->update($dataInput);
        }
    }
}
