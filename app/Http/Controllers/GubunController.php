<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gubun;

class GubunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tmp'] = $this->qstring();

        $text1 = request('text1');
        $data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);

        return view('gubun.index', $data);
    }

    public function getlist($text1){
        $result = Gubun::where('name', 'like', '%'. $text1. '%')
            ->orderby('name', 'asc')->paginate(5)->appends(['text1'=>$text1]);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tmp'] = $this->qstring();
        return view('gubun.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $row = new Gubun;
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('gubun'.$tmp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['tmp'] = $this->qstring();
        $data['row'] = Gubun::find($id);
        return view('gubun.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['tmp'] = $this->qstring();

        $data['row'] = Gubun::find($id);
        return view('gubun.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Gubun::find($id);
        $this->save_row($request, $row);

        $tmp = $this->qstring();
        return redirect('gubun'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gubun::find($id)->delete();

        $tmp = $this->qstring();
        return redirect('gubun'.$tmp);
    }

    public function save_row(Request $request, $row)
    {
        $request->validate([
            'name'  => 'required|max:20',
        ],
        [
            'name.required' =>'이름은 필수 입력입니다.',
            'name.max'      =>'20자 이내입니다.',
        ]);

        $row->name = $request->input('name');

        $row->save();
    }

    public function qstring(){
        $text1 = request("text1") ? request('text1') : "";
        $page = request('page') ? request('page') : "1";

        $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";

        return $tmp;
    }
}
