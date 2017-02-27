<?php
/**
 * Created by PhpStorm.
 * User: daniel.wilhelmsen
 * Date: 2/26/17
 * Time: 1:44 AM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Zipcode;
use Illuminate\Http\Request;
use App\Http\Requests;

class ZipCodeController extends Controller
{
    public function create(Request $request)
    {
        if(!$request->user()) {
            return response()->json([
                'message' => 'Not Authorized',
            ], 401);
        }

        $zipcodeInput = $request->input('zipcode');

        $zipcode = Zipcode::firstOrCreate(['zipcode' => $zipcodeInput]);
        $request->user()->zipcodes()->attach($zipcode->id);


        return response()->json([
            'success' => true,
        ]);
    }
}