<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\  
     */
    public function index() {
        
    }

	public function update(Request $request) {
        $result = array('status' => 'fail');

        try {
            $idx = $request->uidx;
            $lat = $request->lati;
            $lng = $request->long;

            DB::table('users')
                ->where('id', $idx)
                ->update(['lat' => $lat, 'lng' => $lng]);

            $result['status'] = 'success';
        } catch (Exception $exc) {
            $result['error'] = '500';
            $result['description'] = $exc->getTraceAsString();
        }

        return response()->json($result);
	}
}

