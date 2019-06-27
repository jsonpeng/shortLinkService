<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 15:06
 */
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

/**
 * 获取设置信息
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
function getSettingValueByKey($key){
    return app('setting')->valueOfKey($key);
}

function getSettingValueByKeyCache($key){
    return Cache::remember('getSettingValueByKey'.$key, Config::get('web.cachetime'), function() use ($key){
        return getSettingValueByKey($key);
    });
}


function get_page_custom_value_by_key($page,$key){
    return Cache::remember('zcjy_custom_page_'.$key.'_'.$page->id, Config::get('web.shrottimecache'), function() use ($page,$key) {
        $pageItems = $page->pageItems();
        if (empty($pageItems->get())) {
            return '';
        } else {
            if (empty($pageItems->where('key', $key)->first())) {
                return '';
            } else {
                return $pageItems->where('key', $key)->first()->value;
            }
        }
    });
}

function get_post_custom_value_by_key($post,$key){
    return Cache::remember('zcjy_custom_post_'.$key.'_'.$post->id, Config::get('web.shrottimecache'), function() use ($post,$key) {
        $postItems = $post->items();
        if (empty($postItems->get())) {
            return '';
        } else {
            if (empty($postItems->where('key', $key)->first())) {
                return '';
            } else {
                return $postItems->where('key', $key)->first()->value;
            }
        }
    });
}

//截取指定字符串前几位
function des($str, $num){
        global $Briefing_Length;
        mb_regex_encoding("UTF-8");
        $Foremost = mb_substr($str, 0, $num);
        $re = "<(\/?) 
    (P|DIV|H1|H2|H3|H4|H5|H6|ADDRESS|PRE|TABLE|TR|TD|TH|INPUT|SELECT|TEXTAREA|OBJECT|A|UL|OL|LI| 
    BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|SPAN)[^>]*(>?)";
        $Single = "/BASE|META|LINK|HR|BR|PARAM|IMG|AREA|INPUT|BR/i";

        $Stack = array(); $posStack = array();

        mb_ereg_search_init($Foremost, $re, 'i');

        while($pos = mb_ereg_search_pos()){
            $match = mb_ereg_search_getregs();

            if($match[1]==""){
                $Elem = $match[2];
                if(mb_eregi($Single, $Elem) && $match[3] !=""){
                    continue;
                }
                array_push($Stack, mb_strtoupper($Elem));
                array_push($posStack, $pos[0]);
            }else{
                $StackTop = $Stack[count($Stack)-1];
                $End = mb_strtoupper($match[2]);
                if(strcasecmp($StackTop,$End)==0){
                    array_pop($Stack);
                    array_pop($posStack);
                    if($match[3] ==""){
                        $Foremost = $Foremost.">";
                    }
                }
            }
        }

        $cutpos = array_shift($posStack) - 1;
        $Foremost =  mb_substr($Foremost,0,$cutpos,"UTF-8");
        return strip_tags($Foremost);
}


function get_en_name($ch_name){
    $names_arr = [
        '首页' => 'HOME',
        '关于我们' => 'ABOUT US',
        '服务项目' => 'SERVICE ITEMS',
        '经典案例' => 'CLASSIC CASE',
        '相关资讯' => 'NEWS',
        '联系我们' => 'CONTACT US',
        '法律声明' => 'STATEMENT',
        '深圳飞天文化传媒有限公司' => 'COMPANY PROFILE',
        '飞天演出' => 'ACTIVITY PLANNING',
        '飞天制作' => 'STAGE DESIGN&BUILD',
        '飞天音乐' => 'ARTIST TRAINING&MUSIC',
        '大型活动策划' => 'ACTIVITY PLANNING',
        '舞美工程设计与搭建' =>'STAGE DESIGN&BUILD',
        '艺术培训与音乐制作相关' => 'ARTIST TRAINING&MUSIC'
    ]; 
    if(isset($names_arr[$ch_name])){
        return $names_arr[$ch_name];
    }
    else{
        return '';
    }
}

function time_parse($time){
    return Carbon::parse($time);
}