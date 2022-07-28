<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    
    public function run()
    {
            $designations = ["Officer", "Site Head", "Team Lead", "Manager", "Ic", "Store"];
            for ($i = 0; $i < count($designations); $i++){
                foreach ($designations as $designation){
                    $designation = new Designation;
                    $designation->name = $designations[$i];
                    $designation->save();
                    $i+=1;
                }
            }
        // ]);
    }
}
