<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;


class CsvImportUsuarios implements ToCollection
{
    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) 
        {
            $data[] = array(
                    'nombre' => $row[0],
                    'cantidad'=> $row[1],
                    'precio' => $row[2]
                );
        }

        DB::table('frutas')->insert($data);
        //return $rows; 
        //Se añade esta linea.
    }
}