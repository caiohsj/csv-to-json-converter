<?php

class Converter
{
    public function toJson($file)
    {
        $dataCsv = [];
        $indexes = [];
        if (($handle = fopen($file['tmp_name'], "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                
                array_push($dataCsv, $data);

            }
            fclose($handle);
        }
        $indexes = $dataCsv[0];
        array_shift($dataCsv);
        $arrayToJson = [];
        $arrayDataToJson = [];
        foreach ($dataCsv as $keyRow => $row) {
            foreach ($row as $key => $value) {
                $arrayDataToJson[$indexes[$key]] = $value;
            }
            array_push($arrayToJson, $arrayDataToJson);
        }
        return json_encode($arrayToJson, JSON_UNESCAPED_UNICODE);
    }
}