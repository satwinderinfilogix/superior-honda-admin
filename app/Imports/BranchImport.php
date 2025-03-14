<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\Location;
use App\Models\BranchLocations;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BranchImport implements ToModel, WithHeadingRow
{
    protected $errors = [];

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'name'       => 'required',
            'address'    => 'required',
            'pincode'    => 'required',
        ]);

        if ($validator->fails()) {
            $this->errors[] = [
                'row' => $row,
                'errors' => $validator->errors()->toArray()
            ];
            return null;
        }

        $branch_code = $this->generateBranchCode();

        $branch_created = Branch::create([
            'unique_code' => $branch_code,
            'name' => $row['name'],
            'address' => $row['address'],   
            'pincode' => $row['pincode'],
        ]);

        if(!empty($row['location_id']))
        {
            $locations = explode(',', $row['location_id']);
    
            foreach($locations as $location)
            {
                $location = trim($location);
    
                if (Location::where('id', $location)->exists()) {
    
                    $branch_location = [];
                    $branch_location['branch_id'] = $branch_created->id;
                    $branch_location['location_id'] = $location;
                    
                    BranchLocations::create($branch_location);
                }
            }
        }

        return null;
    }

    /**
     * Generate a unique branch code
     *
     * @return string
     */
    public function generateBranchCode()
    {
        $branch = Branch::orderByDesc('unique_code')->first();
        if (!$branch) {
            $uniqueCode =  'BR0001';
        } else {
            $numericPart = (int)substr($branch->unique_code, 2); // Adjust to skip 'BR'
            $nextNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
            $uniqueCode = 'BR' . $nextNumericPart;
        }

        return $uniqueCode;
    }

    /**
     * Get validation errors
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
