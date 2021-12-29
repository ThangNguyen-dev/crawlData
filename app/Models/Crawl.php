<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Crawl extends Model
{
    use HasFactory;

    /**
     * get covid data by map
     * @param string $url is string need to crawl data
     * @param int $position is offset need to explode data
     * @return array data by map with information province
     */
    public static function getCovidData(string $url, int $position)
    {
        $dataResponse = Crawl::getData($url);
        return Crawl::getArray($dataResponse, $position);
    }

    /**
     * get data vaccine by city in vietname
     * @param string $url is string url need crawl data
     * @return array data by city with information province
     */
    public static function getVaccineData($url = 'https://vnexpress.net/microservice/sheet/type/vaccine_data_vietnam_city')
    {
        $data = Crawl::getData($url);
        return Crawl::getArray($data, 28);
    }

    /**
     * set array from long array to array short follow province
     * @param array $array is array data input
     * @param int $position is position seperate province in array input
     * @return array is array need return data
     */
    public static function getArray($array, $position)
    {
        $temp = 0;
        $arrayResponse = array(array());
        foreach ($array as $key => $value) {

            //seperate array to provice and information of province by position in array input
            if (($key + 1) % $position == 0) {
                $temp++;
                $arrayResponse[$temp] = array();
            }

            array_push($arrayResponse[$temp], $value);
        }

        // remove data later because it null
        unset($arrayResponse[count($arrayResponse) - 1]);
        return $arrayResponse;
    }


    /**
     * get data from file in url and explode to array all data in file
     * @param string $url is url to file in vnexpress
     * @return array data return when get data
     */
    public static function getData($url)
    {
        $fn = fopen($url, "r");

        $dataResponse = array();
        while (!feof($fn)) {
            foreach (preg_split('/["?"]/', fgets($fn)) as $key => $value) {
                if ($value != '","' && $value != ',') {
                    array_push($dataResponse, $value);
                }
            }
        }
        fclose($fn);
        return $dataResponse;
    }

    /**
     * get data from url
     * @param string $url is string url to Https::get data
     * @return array is sum and date
     */
    public static function getCovidByDay($url)
    {
        $response = Http::get($url);
        $data = $response->body();

        $date = new DateTime();
        $dataDate = (explode(date('d/m'), $data)[1]);

        /**
         * get data by date now. if date now then get.
         */
        if (Crawl::getSum($dataDate) == 0) {
            $date = date_modify($date, '-1 day');
            $dataDate = (explode($date->format('d/m'), $data)[1]);
            $sum = Crawl::getSum($dataDate);
        } else {
            $sum = Crawl::getSum($dataDate);
        }
        return [
            'sum' => number_format($sum, 0, ',', '.'),
            'date' => $date->format('d/m/Y'),
        ];
    }

    /**
     * get sum data in date.
     * @param array is data to get date
     * @return int sum for covid infected date
     */
    public static function getSum($dataDate)
    {
        $sum = 0;
        foreach (preg_split('/"?"/', $dataDate) as $value) {
            if ($value != '""' && $value != '","' && $value != ',') {
                $sum += is_numeric($value) ? (int)$value : 0;
            }
        };
        return $sum;
    }

    /**
     * get offset by date
     * @param string $startDate date start date to get. default from 2021-04-27
     * @return false|float is offset need get
     */
    public static function getOffsetByDate(string $startDate = '2021-04-27')
    {
        $first_date = strtotime($startDate);
        $second_date = strtotime(date('Y-m-d'));
        $dateDiff = abs($first_date - $second_date);

        return floor($dateDiff / (60 * 60 * 24));
    }
}
