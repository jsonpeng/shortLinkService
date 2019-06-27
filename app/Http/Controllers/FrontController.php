<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SettingRepository;

use App\Models\LinkList;
use Illuminate\Support\Facades\Log;



class FrontController extends Controller
{
    private $settingRepository;


    public function __construct(
        SettingRepository $settingRepo
    )
    {
        $this->settingRepository = $settingRepo;
      
    }

     //处理长连接
     public function dealLongUrl(Request $request){
        $input = $request->all();

        if(isset($input['url']) && !empty($input['url'])){
            $short_link = $this->LinkListFirst($input['url']);
            if(empty($short_link)){
                 return $request->root().'/'.$this->generateShortLink($input['url']);
            }
            else{
                 return $request->root().'/'.$short_link->word;
            } 
        }
        else{
            return '';
        }
     }

    //处理短链接
    public function dealShortUrl(Request $request,$short_url){
            $url = $this->LinkListFirst($short_url);
            if(!empty($url)){
                $url->update(['view'=>$url->view+1]);
                return redirect($url->link);
            }
    }

    //获取长链接或者短链接
    private function LinkListFirst($wordOrLink)
    {
        if(strlen($wordOrLink) > 6){
          return LinkList::where('link',$wordOrLink)->first();
        }
        else{
          return LinkList::where('word',$wordOrLink)->first();
        }
    }

    //生成字符字母组合
    private function randomString($length = 6)
    { 
        // 密码字符集，可任意添加你需要的字符 
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
        $password = ''; 
        for ( $i = 0; $i < $length; $i++ ) 
        { 
        // 这里提供两种字符获取方式 
        // 第一种是使用 substr 截取$chars中的任意一位字符； 
        // 第二种是取字符数组 $chars 的任意元素 
        // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1); 
            $password .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
        }
        //判断是否重复
        if ($this->LinkListFirst($password)) {
            return $this->randomString();
        } else {
            return $password; 
        }
    } 

    //生成短链接和长连接
     private function generateShortLink($link){
       $word = $this->randomString();
       LinkList::create(
                [
                    'word'=>$word,
                    'link'=>$link
                ]
        );
       return $word;
    }

    public function erweima(Request $request)
    {
        $size = 100;
        $input = $request->all();
        if(array_key_exists('size', $input)){
            $size = $input['size'];
        }
        $param = '';
        if(array_key_exists('param', $input)){
            $param = $input['param'];
        }
        return view('front.erweima',compact('size','input','param'));
    }
    
}
