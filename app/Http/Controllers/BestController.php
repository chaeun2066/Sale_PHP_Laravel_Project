<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Jangbu;

class BestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $text1 = $request->input('text1');
        if(!$text1) $text1 = date("Y-m-d",strtotime("-1 month"));

        $text2 = $request->input('text2');
        if(!$text2) $text2 = date("Y-m-d");

        $data['text1'] = $text1;
        $data['text2'] = $text2;
        $data['list'] = $this->getlist($text1, $text2);

        return view('best.index', $data);
    }

    public function getlist($text1, $text2){
        $result = Jangbu::leftjoin('products','jangbus.products_id','=','products.id')->
        select('products.name as product_name',DB::raw('count(jangbus.numo) as cnumo'))->
            wherebetween('jangbus.writeday', array($text1, $text2))->
            where('jangbus.io','=',1)->
            orderby('cnumo','desc')->
            groupby('products.name')->
            paginate(5)->appends(['text1'=>$text1, 'text2'=>$text2]);

        return $result;        
    }
}
