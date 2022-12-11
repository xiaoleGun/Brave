<?php
/* 
 * 作者 苏晓晴
 * 个人博客 www.toubiec.cn
 *修改 浩瀚
 *个人博客 www.blogbig.cn
 * 免费源码 请勿商用! 
 */
require 'ipdata/src/IpLocation.php';
require 'ipdata/src/ipdbv6.func.php';
use itbdw\Ip\IpLocation;
function convertips($ip){  
if (!isipv6($ip)) {
	$ipaddr = IpLocation::getLocation($ip);
	if($ipaddr['code']==-400){
	    return "error";
	}else{
	    return $ipaddr["area"];
	}
} else {
	$db6 = new ipdbv6("ipdata/src/ipv6wry.db");
	$code = 0;
	try {
		if (isipv6($ip)) {
			$result = $db6->query($ip);
		}
	}
	catch (Exception $e) {
		$result = array("disp" => $e->getMessage());
		$code = -400;
	}
    if($result['disp']=="错误或不完整的IP地址: ".$ip){ 
	    return "可能来自火星";
    }else{
	    $local = str_replace(["无线基站网络","公众宽带","3GNET网络","CMNET网络","CTNET网络","\t"],"",str_replace("\"", "\\\"", $result["addr"][0]));
	    return $local;
    }
}
}
function isipv6($s) { //硬核判断是否为ipv6地址
	return strpos($s, ":") !== false;
}
?>