<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Att;
use App\Bid;
use DB;
use Auth;
use Gregwar\Captcha\CaptchaBuilder;
use App\Rules\ImgcodePost;

class ProController extends Controller
{
    /**
     *
     * 获取借款页面
     */
    public function jie()
    {
        return view('woyaojiekuan');
    }

    /**
     *
     *借款逻辑
     */
    public function jiePost(Request $req)
    {
        //借款信息验证(自动验证)
        $this->validate($req , [
            'age'=>'required|in:15,40,80',
            'money'=>'required|integer|digits_between:5,6|nullable',
            'imgcode'=> ['required',new ImgcodePost],
        ]);

//        [
//            'age.required'=>'年龄必须填写',
//            'in'=>':attribute 必须是 :values 之一',
//            'money.required'=>'金额必须填写',
//            'money.digits_between'=>'金额必须在五至六位',
//        ]


        $user = Auth::user();
        //开启事务
        DB::beginTransaction();
        try {
            $pro = Project::create([
                'uid'=>$user->uid,
                'name'=>$user->name,
                'money'=>request('money')*100,
                'mobile'=>$user->mobile,
                'pubtime'=>time()
            ]);
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            $att = Att::create([
              'pid'=>$pro->pid,
              'uid'=>$user->uid,
              'age'=>request('age')
            ]);
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }

        //提交事务
        DB::commit();
        dump("申请成功");
    }


    /**
     * @param $pid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 投资界面
     */
    public function touzi($pid)
    {
        $pro = Project::find($pid);
        return view('lijitouzi',compact('pro'));
    }


    /**
     *
     * 投资逻辑
     */
    public function touziPost($pid)
    {
        $user = Auth::user();
        $pro = Project::where('pid',$pid)->first();
        $bid = new Bid();

        if(request('money')*100 > ($pro->money-$pro->recive)){
                return "金额不能多于投标金额";
        }

        $bid->uid = $user->uid;
        $bid->pid = $pid;
        $bid->title = $pro->title;
        $bid->money = request('money')*100;
        $bid->pubtime = time();
        $bid->save();  //信息写入投资表

        $pro->recive += $bid->money; //投资的钱写入项目表
        $pro->save();

        if($pro->recive == $pro->money){
            $this->touzidone($pid);
        }
        
        dump("投标成功");
    }

    /**
     * @param $pro
     * 项目招标结束
     */
    public function touzidone($pid)
    {
        //1.修改项目状态
        $pro = Project::find($pid);
        $pro->status = 2;
        $pro->save();

        //2.为借款人生成还款账单
        //本金加利息，等息
        $amount = $pro->money / $pro->hrange + ($pro->money * $pro->rate) / 1200;
        $data = ['uid' => $pro->uid, 'pid' => $pid, 'title' => $pro->title, 'amount' => $amount];
        $data['status'] = 0;
        for ($i = 1; $i < $pro->hrange; $i++) {
            $paydate = date('Y-m-d', strtotime("+ $i months"));
            $data['paydate'] = $paydate;
            DB::table('hks')->insert($data);
        }


        //3.为投资人生成预收益账单
        $bids = Bid::where('pid', $pid)->get();
        $row = ['pid' => $pid, 'title' => $pro->title];
        $row['enddate'] = date('Y-m-d', strtotime("+ $pro->hrange months"));

        foreach ($bids as $bid) {
            $row['uid'] = $bid->uid;
            $row['amount'] = ($bid->money * $pro->rate) / 36500;
            DB::table('tasks')->insert($row);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 生成我的账单表
     */
    public function myzd()
    {
        $hks = DB::table('hks')->where('uid',Auth::id())->paginate(3);
        return view('myzd',compact('hks'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 生成我的投资表
     */
    public function mytz()
    {
        $bids = DB::table('bids')->where('bids.uid',Auth::id())->whereIn('status',[1,2])->join('projects','bids.pid','=','projects.pid')
                ->get(['bids.*','projects.status']);
        return view('mytz',compact('bids'));

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 生成我的收益表
     */
    public function mysy()
    {
        $grows = DB::table('grows')->where('uid',Auth::id())->orderBy('gid','desc')->get();
        return view('mysy',compact('grows'));
    }

    /**
     *
     * 生成验证码
     */
    public function captcha()
    {
        $builder = new CaptchaBuilder;//实例化
        $builder->build();//创建验证码
        session(['imgcode'=> strtoupper($builder->getPhrase())]);
        //Session::put('img_code',strtoupper( $builder->getPhrase()));//把值存到session中
        header('Content-type: image/jpeg');
        $builder->output();//输出到模板
    }


    /**
     * 支付
     */
    public function pay()
    {
        $row = [];
        //v_amount v_moneytype v_oid v_mid v_url key
        $row['v_amount'] = '25.67';
        $row['v_moneytype'] = 'CNY';
        $row['v_oid'] = '2016254523';
        $row['v_mid'] = '1009004';
        $row['v_url'] = 'http://xxx.com';
        $row['key'] = '48905ldc%^&(*slslUT';

        $row['v_md5info'] = strtoupper(md5(implode('',$row)));

        return view('pay',$row);

    }






















}
