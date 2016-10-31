<?php

function is_mobile()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}

/**
 * 是否微信端
 */
function is_weixin()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(stripos($user_agent, 'MicroMessenger') !== false) {
        return true;
    }
    return false;
}

/**
 * size的换算
 * @param $number
 * @return string
 */
function conversion($number)
{
    $num = strlen($number);
    if ($num > 9) {
        $num = $num - 9;
        return  substr($number,0,$num)."GB";
    } elseif ($num > 6) {
        $num = $num - 6;
        return substr($number,0,$num)."MB";
    } elseif ($num > 3) {
        $num = $num -3;
        return substr($number,0,$num)."KB";
    } else {
        return $number."B";
    }
}

/**
 * 显示距离当前时间的字符串
 * @param $time 时间戳
 * @return string
 */
function tranTime($time)
{
    $rtime = date("m-d H:i",$time);
    $htime = date("H:i",$time);

    $time = time() - $time;

    if ($time < 60)
    {
        $str = '刚刚';
    }
    elseif ($time < 60 * 60)
    {
        $min = floor($time/60);
        $str = $min.'分钟前';
    }
    elseif ($time < 60 * 60 * 24)
    {
        $h = floor($time/(60*60));
        $str = $h.'小时前 '.$htime;
    }
    elseif ($time < 60 * 60 * 24 * 3)
    {
        $d = floor($time/(60*60*24));
        if($d==1)
            $str = '昨天 '.$rtime;
        else
            $str = '前天 '.$rtime;
    }
    else
    {
        $str = $rtime;
    }
    return $str;
}
/*
 * 获取指定目录下的子目录或指定后缀的子文件
* @param string $path 指定目录路径
* @param string $suffix 文件后缀,不写默认为获取子目录
* @return array
*/
function get_sub_dir($path, $suffix='')
{
    $path = iconv('utf-8', 'gbk', $path);
    if(!is_dir($path)){
        throw new Exception($path."不是目录");
    }
    $arr = array('dir'=>array(),'file'=>array());
    $hd = opendir($path);
    while(($file = readdir($hd))!==false){
        if($file=="."||$file=="..") {continue;}
        if(is_dir($path."/".$file)){
            $arr['dir'][] = iconv('gbk','utf-8',$file);
        }else if(is_file($path."/".$file)){
            $pathinfo = pathinfo($file);
            if($suffix && $pathinfo['extension'] == $suffix){
                $arr['file'][] = iconv('gbk','utf-8',$file);
            }

        }
    }
    closedir($hd);
    return $arr;
}


/*
 * 获取前台所有模板主题名
* @return array
*/
function get_all_tpl_theme($type = 'array')
{
    $path = 'Template';
    $sub_dir = get_sub_dir($path);
    if($type == 'array'){
        return $sub_dir['dir'];
    }else if($type == 'string'){
        $tpl_theme_array = $sub_dir['dir'];
        $tpl_theme_str = implode(',', $tpl_theme_array);
        return $tpl_theme_str;
    }

}

/*
 * 获取某个模板风格的缩略图
* @return string
*/
function get_theme_thumb($theme) {
    $path = 'Template/'.$theme;
    $tpl_theme_thumb_array = get_sub_dir($path, 'png');
    $tpl_theme_thumb = $tpl_theme_thumb_array['file'][0];

    if($tpl_theme_thumb){
        $tpl_theme_thumb_src = __ROOT__.'/'.$path.'/'.$tpl_theme_thumb;
    }else{
        $tpl_theme_thumb_src = __ROOT__.'/Public/images/default_preview.png';
    }
    return $tpl_theme_thumb_src;
    }

/*
 * 获取当前模板路径
* @return string
*/
function get_theme_path() {
    $default_theme = C('DEFAULT_THEME');
    $path = __ROOT__.'/Template/'.$default_theme;

    return $path;
}

/**
 * 返回配置项对应值
 * @param string|integer $field 标识名,标识为空则返回所有配置项数组
 * @param string|integer $config_type 配置类型
 * @return string
 */
function get_config_value($field = '', $type = 'site') {
    $Config = M('Config');
    if ($field) {
        $value = $Config->where(array('status' => 1, 'field' => $field))->getField('value');
        return $value;
    } else {
        $config_list = $Config->where(array('status' => 1, 'config_type' => $type))->order('sort ASC')->select();
        return $config_list;
    }

   
}
