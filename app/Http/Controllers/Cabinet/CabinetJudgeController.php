<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;

class CabinetJudgeController
{
    public function page()
    {

        return view('cabinet.cabinet_judge', [
            'test' => 'test',
        ]);
    }

}
