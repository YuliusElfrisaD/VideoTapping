<?php

namespace App\Imports;

use App\ModelUser;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ModelUser([
            //
            'name' => $row[0],
            'nomorinduk' => $row[1], 
            'status' => $row[2], 
            'avatar' => $row[3],
            'password' => $row[4],
        ]);
    }
}