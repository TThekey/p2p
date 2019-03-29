<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Att;
use DB;

class CheckController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 审核列表页面
     */
    public function prolist()
    {
        $pro = Project::orderBy('pid','desc')->get();


        return view('prolist',compact('pro'));
    }

    /**
     * @param $pid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 审核页面
     */
    public function check($pid)
    {
        $pro = Project::find($pid);
        return view('shenhe',compact('pro'));

    }

    /**
     * @param $pid
     * 审核逻辑
     */
    public function checkPost($pid)
    {
        $pro = Project::find($pid);
        $att = Att::where('pid',$pid)->first();

        DB::beginTransaction();
        try {
            $pro->title = request('title');
            $pro->rate = request('rate');
            $pro->hrange = request('hrange');
            $pro->status = request('status');
            $pro->save();
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            $att->title = request('title');
            $att->realname = request('realname');
            $att->gender = request('gender');
            $att->udesc = request('udesc');
            $att->save();
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }

        //提交事务
        DB::commit();
        dump("审核已提交");


    }


}
