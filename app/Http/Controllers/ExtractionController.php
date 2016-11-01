<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use DB;

class ExtractionController extends Controller
{
    
	public function index(){
		$none = 0;
		return view('extrator', compact('none'));	
		
		
	}
	
	
	
	
	/*** The Fetcher ***/
	public function fetcher(){
		$input = Input::all();
		$id = $input['id'];
		$country = "NL";			// Default.
		
		$connection = DB::connection('fotoalbumnl')->table('shop_orders')->where('id', $id)->first();
		$connectionItems = DB::connection('fotoalbumnl')->table('shop_order_items')->where('order_id', $id)->first();
		
		if ($connection === null) {
			$connection = DB::connection('fotoalbumbe')->table('shop_orders')->where('id', $id)->first();
			$connectionItems = DB::connection('fotoalbumbe')->table('shop_order_items')->where('order_id', $id)->first();
			$country = "NL - BE";
		}
		if ($connection === null) {
			$connection = DB::connection('albumphotobe')->table('shop_orders')->where('id', $id)->first();
			$connectionItems = DB::connection('albumphotobe')->table('shop_order_items')->where('order_id', $id)->first();
			$country = "FR - BE";
		}
		if ($connection === null) {	
			$connection = DB::connection('albumphotofr')->table('shop_orders')->where('id', $id)->first();
			$connectionItems = DB::connection('albumphotofr')->table('shop_order_items')->where('order_id', $id)->first();
			$country = "FRA";
		} if ($connection === null) { $country = "(?)"; }
		
		
		$orderid = substr($connection->order_reference, 8);	// Trim "311506010" 
		
	
		
		//dd($printer_details);
		
		
		$data = array(
			"org_orderID"		=> $id,
			"country"			=> $country,
			"oldpdfname"		=> "?",
			"orderid"			=> $orderid,
			"quantity"			=> $connectionItems->quantity,
			"firstname"			=> $connection->first_name,
			"lastname"			=> $connection->last_name,
			"address1"			=> $connection->shipping_address,
			"address2"			=> $connection->shipping_address2,
			"address3"			=> $connection->shipping_address3,
			"city"				=> $connection->shipping_city,
			"zip"				=> $connection->shipping_zip,
		);
		
		$encodedJSON = json_encode($data);
		return $encodedJSON;	


		
	}
	
	
}
