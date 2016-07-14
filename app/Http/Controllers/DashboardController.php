<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class DashboardController extends Controller
{

	public function index(){
		$nl_total_orders	= 0;	// Lets count.
		$nl_total_money		= 0;	// Lets count.
		$nlbe_total_orders	= 0;	// Lets count.
		$nlbe_total_money	= 0;	// Lets count.
		$frbe_total_orders	= 0;	// Lets count.
		$frbe_total_money	= 0;	// Lets count.
		$fra_total_orders	= 0;	// Lets count.
		$fra_total_money	= 0;	// Lets count.
		
		$today_date 	=  date('Ymd H:i:s'); // What .. what day is it?
		
		$nldOrders  = DB::connection('fotoalbumnl')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		$nlbeOrders = DB::connection('fotoalbumbe')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		$frbeOrders = DB::connection('albumphotobe')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		$fraOrders  = DB::connection('albumphotofr')->table('shop_orders')->take(50)->orderBy('created', 'desc')->get();	
		
		//$nlOrdersToday = $nldOrders->whereRaw('date(created) = ?', [Carbon::today()]);
		
		/** Get total orders of Fotoalbum.nl in 24 hours **/
		foreach ($nldOrders as $nldOrder){
			$order_created 	= $nldOrder->created;
			$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
			$total_price 	= number_format($nldOrder->subtotal + $nldOrder->shipping - $nldOrder->discount, 2, '.', '');

			if($hourdiff < 23 && $total_price > 0){
				$nl_total_orders++;
				$nl_total_money = $nl_total_money + $total_price;
			}
		}
		/** Get total orders of Fotoalbum.be in 24 hours **/
		foreach ($nlbeOrders as $nlbeOrder){
			$order_created 	= $nlbeOrder->created;
			$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
			$total_price 	= number_format($nlbeOrder->subtotal + $nlbeOrder->shipping - $nlbeOrder->discount, 2, '.', '');

			if($hourdiff < 23 && $total_price > 0){
				$nlbe_total_orders++;
				$nlbe_total_money = $nlbe_total_money + $total_price;
			}
		}
		/** Get total orders of Albumphoto.be in 24 hours **/
		foreach ($frbeOrders as $frbeOrder){
			$order_created 	= $frbeOrder->created;
			$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
			$total_price 	= number_format($frbeOrder->subtotal + $frbeOrder->shipping - $frbeOrder->discount, 2, '.', '');

			if($hourdiff < 23 && $total_price > 0){
				$frbe_total_orders++;
				$frbe_total_money = $frbe_total_money + $total_price;
			}
		}
		/** Get total orders of Albumphoto.be in 24 hours **/
		foreach ($fraOrders as $fraOrder){
			$order_created 	= $fraOrder->created;
			$hourdiff 		= round((strtotime($today_date) - strtotime($order_created))/3600, 0);
			$total_price 	= number_format($fraOrder->subtotal + $fraOrder->shipping - $fraOrder->discount, 2, '.', '');

			if($hourdiff < 23 && $total_price > 0){
				$fra_total_orders++;
				$fra_total_money = $fra_total_money + $total_price;
			}
		}
	
		
		
		
		$total_orders = $nl_total_orders + $nlbe_total_orders + $frbe_total_orders + $fra_total_orders;
		$total_money = $nl_total_money + $nlbe_total_money + $frbe_total_money + $fra_total_money;
		
			
		return view('dashboard', compact(
			'nl_total_orders',	 // Number, amount of orders.	    - Fotoalbum.nl
			'nl_total_money',    // Total money of amount of orders - Fotoalbum.nl
			'nlbe_total_orders', // Number, amount of orders.	    - Fotoalbum.be
			'nlbe_total_money',  // Total money of amount of orders - Fotoalbum.be
			'frbe_total_orders', // Number, amount of orders.	    - Albumphoto.be
			'frbe_total_money', // Total money of amount of orders  - Albumphoto.be
			'fra_total_orders', // Number, amount of orders.	    - Albumphoto.fr
			'fra_total_money', // Total money of amount of orders   - Albumphoto.fr
			// Now the total of all.
			'total_orders',
			'total_money',
			
			// Full array of 50 last orders.
			'nldOrders', // Total array of last 50 orders - Fotoalbum.nl
			'nlbeOrders' // Total array of last 50 orders - Fotoalbum.be
		));
		
		
	}	
}
