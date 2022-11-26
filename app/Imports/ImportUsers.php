<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
class ImportUsers implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
           'name'=>$row['name'],
           'mobile'=>$row['mobile'],
           'address'=>$row['address'],
           'email'=>$row['email'],
           'password'=>Hash::make($row['password']),

        ]);
    }
}
