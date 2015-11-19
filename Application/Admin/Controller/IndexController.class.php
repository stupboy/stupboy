<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends Controller {
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');




        $Form = M('Dailysell');// 读取数据
        $count = $Form->where("经销商='福建分公司'")->count();
        $Page = new \Think\Page($count,10);
        $Show = $Page->show();
        $list = $Form->where("经销商='福建分公司'")->order('日期 desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		//$data = $Form->where("店名='湖里旗舰店'")->select();//find($id);
		if($list) {
			$this->assign('data',$list);// 模板变量赋值
			$this->assign('Page',$Show);
			}else{
			$this->error('数据错误');
		}
		$this->display();

    }
}