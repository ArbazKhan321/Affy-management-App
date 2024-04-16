<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{

    protected $Brand;


    public function __construct()
    {
        $this->Brand = new Brand();
    }
    public function saveCrate(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'brand_name' => 'required|string',
        'owner_name' => 'required|string',
        'no_crate' => 'required|integer',
        'company_uid' => 'required|string', // Assuming you'll pass the company UID in the request payload
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    // Create a new brand
    try {
         $brand = Brand::create([
            'brandName' => $request->input('brand_name'),
            'ownerName' => $request->input('owner_name'),
            'numberOfCrates' => $request->input('no_crate'),
            'company_idd' => $request->input('company_uid'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 'Crate Successfully Inserted',$brand ], 201);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something Went Wrong'], 500);
    }
}

}
