<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class DashboardController extends Controller
{

	public function index(){
		
		$nldOrders  = DB::connection('fotoalbumnl')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		$nlbeOrders = DB::connection('fotoalbumbe')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		
		//$nlOrdersToday = $nldOrders->whereRaw('date(created) = ?', [Carbon::today()]);
		
		
		return view('dashboard', compact(
			'nldOrders', 
			'nlOrdersToday',
			'nlbeOrders'
		));
		
		
	}	
}
