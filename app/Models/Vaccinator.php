<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccinator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * get vaccine to insert database
     * @return void
     */
    public static function getVaccine()
    {
        $dataVaccine = Crawl::getVaccineData();
        unset($dataVaccine[0]);
        foreach ($dataVaccine as $key => $value) {
            $vaccinator = Vaccinator::where('province', $value[2])->first();
            $dataVaccineInput = [
                'province' => $value['2'],
                'number_vaccinate' => $value[3] != '' ? $value[3] : 0,
                'populations' => $value[7] != '' ? $value[7] : 0,
                'number_people_vaccinated' => $value[4] != '' ? $value[4] : 0,
                'number_injection_full' => $value[6] != '' ? $value[6] : 0,
                'date' => date('Y-m-d'),
            ];
            if (is_null($vaccinator)) {
                Vaccinator::create($dataVaccineInput);
            } else {
                $vaccinator->update($dataVaccineInput);
            }
        }
    }
}
