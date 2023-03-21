<?php

namespace App\Imports;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class LocationImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new Location([
            'loc_code' => "_".strtoupper(Str::random(9)),
            'location' => $row['area'],
        ]);
    }
}
