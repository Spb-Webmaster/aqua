<?php

namespace App\Http\Controllers\Cabinet;

use App\Models\File;
use phpQuery;

class CabinetManagerController
{
    public function page()
    {

/*
        $file = File::query()->find(9);
        $url = asset($file->file_path);
        $data = parserHTML($url);
        dd($data);
*/
        $data = [];
        return view('cabinet.cabinet_manager', [
            'data' => $data,
        ]);
    }
}
