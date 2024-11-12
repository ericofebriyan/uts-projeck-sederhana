<?php
if ($_SERVER['REQUES_METHOD'] == 'POST') {
    $data =json_decode(json: file_get_contents(filename: 'php://input'), associative:true);


    if (isset($data['index'])) {
        $index = $data['index'];

        $jadwalfile = 'data.json';
        $jadwaldata = file_exists(filename :$jadwalfile) ? json_decode(json: file_get_contents(filename: $jadwalfile),associative: true): [];

        if (isset($jadwaldata[$index])) {
            unset($jadwaldata[$index]);


            $jadwaldata = array_values(array: $jadwaldata);
            file_put_contents(filename: $jadwalfile,data : json_encode(value: $jadwaldata, flags: JSON_PRETTY_PRINT));
            echo json_encode(value: ['success' => true]);
        }else{
            echo json_encode(value: ['succes' => false]);
        }

    }else{
        echo json_encode(value:['succes' => false]);
    }
}