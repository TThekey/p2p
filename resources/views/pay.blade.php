<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<title>资金管理-我要充值</title>


<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">


<link href="/css/common.css" rel="stylesheet" type="text/css">
<link href="/css/sea.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<link href="/css/grey2013.css" rel="stylesheet">

<!--时间  s-->

<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css">

<!--时间  e-->
 
<!---静态化 - 头部内容---->


<link href="/css/forms_style.css" rel="stylesheet" type="text/css">

<style type="text/css">
.plusBank5{width:680px; height:500px;  margin-left:-340px; margin-top:-250px;_margin-top:-250px;}
.serviceFeeTR{
	display:none;
}
</style>
</head>

<body style="display: block;">
<!--header 1000-->
<div class="niwdoawi_top">
<div class="niwdoawi_top">
	<div class="header w1000 clearfix">
        <div class="fl tel">
            <em class="fs_14 mr_5 tel_ico">客服热线</em><i class="aril">010-57155250</i>
            <span class="iphone"><i></i><a href="#" target="_blank">手机客户端</a>
            	<div class="webdown">
                	
                </div>
            </span>
            
            <span class="hover_sina">
            	<a href="#" target="_blank"></a>
            </span>
            <span class="fs_12 ml_10">市场有风险，投资需谨慎</span>
        </div>
        
        <div class="fr login clearfix">
            @guest
                {{--@if(!Auth::user())--}}
                <div class="login_bt">
                    <a class="fff" title="登录" rel="nofollow" href="{{ url('login') }}">登录</a>
                    <a class="fff" title="注册" rel="nofollow" href="{{ url('register') }}">注册</a>
                </div>
            @endguest
            {{--@else--}}
            @auth
                <div class="login_bt">
                    <input value="" id="log_userid" type="hidden">
                    <input value="itbool" id="log_username" type="hidden"><em class="fff fs_12">您好，</em>
                    <a href="#" rel="nofollow" class="hello">{{ Auth::user()->name }}</a>
                    <a href="{{ url('logout') }}" id="loginOut" class="hello">退出</a>
                </div>
                {{--@endif--}}
            @endauth
            <dl>
                <dt><a href="#" target="_blank" rel="nofollow" title="账户中心" class="txnone">账户中心</a></dt>
                <dd><a href="#" target="_blank" rel="nofollow" title="充值">充值</a></dd>
                <dd><a href="#" target="_blank" rel="nofollow" title="提现">提现</a></dd>
                <dd><a href="#" target="_blank" rel="nofollow" title="我的投资">我的投资</a></dd>
                <dd><a href="#" target="_blank" rel="nofollow" title="我的借款">我的借款</a></dd>
                
            </dl>
            <div class="community"><a href="#" target="_blank" rel="nofollow" class="fc_white">关于我们</a></div>
        </div>
    </div>
</div><!--登录-->
<div class="niwdoawi_center">
	<div class="w1000 logo clearfix">
    	<a href="#" title="给梦想可能" class="fl pl_20 logo_a holiday_logo"><img height="52" src="/image/logo_all.png" alt="点点贷"></a>
        <div class="fl logo_aft">
        	<div class="pos_aft" id="headLogo">
            			<a class="defaultlogo" href="#"><img src="/image/logo1200.png"></a>
            </div>
        </div>
        <div class="fr righ">
        	<ul class="nav clearfix">
            	<li>
      			 <a rel="nofollow" href="{{ url('home') }}" title="首页" class="one">首页</a>
                </li>
                <li class="one">
                	<a href="{{ url('home') }}" title="我要投资" class="two">我要投资</a>
                </li>
                <li class="rela">
                	<a href="{{ url('jie') }}" title="我要借款" class="one">我要借款</a>
                </li>
                 <li class="rela">
                 <a href="#" target="_blank" title="新手导航" class="one">新手导航</a>
 
                </li>
                <li style="margin-right:0;">
                	<a href="#" target="_blank" title="社区" class="one">社区 </a>
                </li>
            </ul>
        </div>
    </div>
</div><!--nav-->
</div><!--nav-->
 
  <!--红包抵扣金额-->
  <!--手续费-->
  
  <!--本期次理财金最低投资金额-->
  <!--本期次理财金最高投资金额-->
  
  
   
  
<div class="clearfix"></div>
<!--layout start-->
<div class="main page215 clearfix" style="min-height:230px">
	<!--content start-->
	<div class="pt_20 fluid">
        <form method=post action="https://pay3.chinabank.com.cn/PayGate">
            商户编号:<input type=text name=v_mid value='{{ $v_mid }}'><br />
            订单编号:<input type=text name=v_oid value='{{ $v_oid }}'><br />
            订单总金额:<input type=text name=v_amount value='{{ $v_amount }}'><br />
            币种:<input type=text name=v_moneytype value='{{ $v_moneytype }}'><br />
            回调url:<input type=text name=v_url value='{{ $v_url }}'><br />
            订单MD5校验码:<input type=text name=v_md5info value='{{ $v_md5info }}'><br />
            <input type=submit value="网银在线支付">
        </form>

        <div class="fluid">

            <!-- tab out s-->

        
    </div>
            <!--tab out end-->
            
        </div>
    </div>
    <!--content end-->

</div>
<!--layout end-->

 <!-- 遮盖层 -->
<!--地域选择银行start-->

<!--地域选择银行end-->

<!-- foot start -->
<div class="h35 clearfix"></div>

<div class="foot1 wt_1190">
	<div class="clearfix out">
    	<div class="l">
        	<ul class="clearfix fNav">
            	<li>
                	<a href="#" target="_blank" class="span01">关于我们</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>公司简介</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>业绩报告</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>法律法规</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">安全保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>本金保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>风控保障</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>账户安全</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">帮助中心</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>如何投资</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>如何借款</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>网站资费</a><br>
                </li>
                <li>
                	<a href="#" target="_blank" class="span01">用心服务</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>联系我们</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>网站地图</a><br>
                    <a href="#" target="_blank" class="a01"><i></i>服务地区</a><br>
                </li>	
            </ul>
        </div>
        <div class="r">
        	<ul>
            	<li class="line1"><span class="fs_16 pr_20 fc_3">热线电话</span>(服务时间 09 : 00 - 21 : 00 )</li>
                <li class="line2"><span class="fs_32 bold fc_6 pr_20">010-5715520</span></li>
                <li class="line3 fc_3">关注我们<a href="#" target="_blank" class="ico" rel="nofollow"><i class="i_s"></i></a><i class="i_q" onclick="showCon_2()"></i></li>
            </ul>
        </div>
    </div>
    <div class="footlink footlink2">
    	<span class="bt">合作伙伴：</span>
        <span class="lg_box fl_img1"></span>
        <span class="lg_box fl_img2"></span>
        <span class="lg_box fl_img3"></span>
        <span class="lg_box fl_img4"></span>
        <span class="lg_box fl_img5"></span>
        <span class="lg_box fl_img6"></span>
        <span class="lg_box fl_img7"></span>
        <span class="lg_box fl_img8"></span>
        <span class="lg_box fl_img9"></span>
        <a href="#" target="_blank" class="lg_box fl_img10" rel="nofollow"></a>
    </div>
</div>
<div class="clearfix foot2 wb_1190">
	<div class="out ff">
        <div class="line2">
        	Copyright &copy; 2016 点点贷（www.dddai.com）&#12288;版权所有；市场有风险，投资需谨慎，营造合法、诚信借贷环境。
        </div>
        <div class="police">
        	<a rel="nofollow" class="img1" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
            <a rel="nofollow" class="img2" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
            <a rel="nofollow" class="img3" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
            <a rel="nofollow" class="img4" target="_blank" href="#"><img width="70" height="32" src="/image/px.gif"></a>
            <a rel="nofollow" class="img5" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
        	<a rel="nofollow" class="img6" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
            <a rel="nofollow" class="img7" target="_blank" href="#"><img width="70" height="32" src="/image/px_002.gif"></a>
        </div>
    </div>
</div>

<!-- weixin start -->


<!-- weixin end -->




<!--foot end-->	









<!--foot start-->
<!--银行委托管理的电子合同-->
<div class="agreement_foot">
    <i class="ico_all size20 img_icon xy_foot_pos"></i><span class="fc_white">账户资金安全由银行和PICC共同保障</span>
</div>

<!--foot end-->





</body></html>