<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Gubun;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);

        return view('picture.index', $data);
    }

    public function getlist($text1){
        $result = Product::where('name', 'like','%'. $text1 . '%')->
                orderby('name','asc')->
                paginate(8)->appends(['text1'=>$text1]);
        
        return $result;        
    }
}
