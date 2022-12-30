<?php

namespace App\Http\Controllers;

use App\Models\TikaLog;
use Illuminate\Http\Request;

class TikaLogController extends Controller
{


    public function tikacount(Request $request)
    {
        $applicantId = $request->applicantId;
        $tikadose = $request->tikadose;
        $tikatype = $request->tikatype;

        if($tikatype=='বিসিজি টিকা'){

            return TikaLog::where(['applicantId'=>$applicantId,'tikadose'=>$tikadose,'tikaname'=>'বিসিজি'])->count();
        }else{

            return TikaLog::where(['applicantId'=>$applicantId,'tikadose'=>$tikadose])->where('tikaname','!=', 'বিসিজি')->count();
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applicantId = $request->applicantId;

        return TikaLog::where('applicantId',$applicantId)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tikaname = $request->tikaname;

        foreach ($tikaname as $value) {
            // print_r($value);
            $datas = [
                'applicantId'=>$request->applicantId,
                'kendro_name'=>$request->kendro_name,
                'kormir_name'=>$request->kormir_name,
                'nextTikaDate'=>$request->nextTikaDate,
                'tikaDate'=>$request->tikaDate,
                'tikadose'=>$request->tikadose,
                'tikaname'=>$value,
            ];
             TikaLog::create($datas);
        }

        // return $data =  $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TikaLog  $tikaLog
     * @return \Illuminate\Http\Response
     */
    public function show(TikaLog $tikaLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TikaLog  $tikaLog
     * @return \Illuminate\Http\Response
     */
    public function edit(TikaLog $tikaLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TikaLog  $tikaLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TikaLog $tikaLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TikaLog  $tikaLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(TikaLog $tikaLog)
    {
        //
    }
}
