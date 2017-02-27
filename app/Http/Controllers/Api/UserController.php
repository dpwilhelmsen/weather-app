<?php
/**
 * Created by PhpStorm.
 * User: daniel.wilhelmsen
 * Date: 2/26/17
 * Time: 1:44 AM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $data = [];
        $data['name'] = $request->user()->name;
        $data['email'] = $request->user()->email;
        return response()->json([
            'data' => $data,
        ]);
    }
}