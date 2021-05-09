<?php
//{"jsonrpc":"2.0","method":"aria2.addUri","id":"QXJpYU5nXzE1NzAzMzMzMjZfMC40NTg1MTI4Mjg0OTM1NTk1Nw==","params":["token:Aria@AliBJ666",["http://multicraft.org/download/linux64"],{"dir":"/www/wwwroot/mudown","allow-overwrite":"true","split":"32","max-connection-per-server":"16"}]}
//http://aria.tysv.top:6800/jsonrpc
/**
 * Curl访问请求集成,自动转化为Array
 * @param  $url string 访问链接
 * @param $json bool 是否将返回结果转化为Array
 * @param $ispost bool 是否为post,否则为get
 * @param $post array Post/Get的数据用Array
 * @return  array JSON
 */
function cquery($url, $json, $ispost, $post, $raw = false)
{
    $ch = curl_init();
    if ($ispost) {
        //设置post方式提交
        curl_setopt($ch, CURLOPT_POST, 1);
        //设置post数据
        //$post_data = JSON($post);   这个是专门为了微信API设计
        if (!$raw) {
            $post_data = http_build_query($post);
        }
        $post_data = $post;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    } else {
        if (!$raw) {
            $getdata = http_build_query($post);
            $url = $url . "?" . $getdata;
        }
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出

    $result = curl_exec($ch);
    curl_close($ch);
    if ($json) {
        $result = json_decode($result, true);
    }
    return $result;
}


define('L64', '{"jsonrpc":"2.0","method":"aria2.addUri","id":"' . base64_decode(date('YmdHis') . "L64") . '","params":["token:Aria@AliBJ666",["http://multicraft.org/download/linux64"],{"dir":"/www/wwwroot/mudown/Linux64"}]}');
define('Ws', '{"jsonrpc":"2.0","method":"aria2.addUri","id":"' . base64_decode(date('YmdHis') . "Ws") . '","params":["token:Aria@AliBJ666",["http://multicraft.org/download/win64standalone"],{"dir":"/www/wwwroot/mudown/WindowsInstaller"}]}');
define('L32', '{"jsonrpc":"2.0","method":"aria2.addUri","id":"' . base64_decode(date('YmdHis') . "L32") . '","params":["token:Aria@AliBJ666",["http://multicraft.org/download/linux32"],{"dir":"/www/wwwroot/mudown/Linux32"}]}');
define('Wa', '{"jsonrpc":"2.0","method":"aria2.addUri","id":"' . base64_decode(date('YmdHis') . "Wa") . '","params":["token:Aria@AliBJ666",["http://multicraft.org/download/win32"],{"dir":"/www/wwwroot/mudown/WindowsAdvanced"}]}');
define('Pr', '{"jsonrpc":"2.0","method":"aria2.addUri","id":"' . base64_decode(date('YmdHis') . "Pr") . '","params":["token:Aria@AliBJ666",["http://www.multicraft.org/download/linux64?version=preview"],{"dir":"/www/wwwroot/mudown/Preview"}]}');
define('Er','{"jsonrpc":"2.0","method":"aria2.purgeDownloadResult","id":"' . base64_decode(date('YmdHis') . "Er") . '","params":["token:Aria@AliBJ666"]}');//清除已下载内容缓存

cquery('http://aria.tysv.top:6800/jsonrpc', true, true, L64, true);
cquery('http://aria.tysv.top:6800/jsonrpc', true, true, Ws, true);
cquery('http://aria.tysv.top:6800/jsonrpc', true, true, L32, true);
cquery('http://aria.tysv.top:6800/jsonrpc', true, true, Wa, true);
cquery('http://aria.tysv.top:6800/jsonrpc', true, true, Pr, true);
cquery('http://aria.tysv.top:6800/jsonrpc', true, true, Er, true);


echo "EveryJob Has Been Done";