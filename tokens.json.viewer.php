#!/usr/bin/php
<?php

include "conf.php";

$f = "tokens.1inch.eth.link.2020-09-05.json";
$a = file_get_contents($f);
$a = json_decode($a,1);
$mas = $a;
//print_r($a);die;
$m[address] = "0xa7bc3d36a189d1448fce9c135be0e1496039ac48";
$m[chainId] = 1;
$m[name] = "ProBlockchainToken";
$m[symbol] = "PROTOKEN";
$m[decimals] = 18;
$m[logoURI] = "https://raw.githubusercontent.com/pro-blockchain-com/uniswap-token-list/master/img/protoken.png";
$out[] = $m;



$d = __DIR__;
foreach($a[tokens] as $v)
{
//    print_r($v);

    $t = $v[symbol];
    $t = strtolower($t);

    $m = $v;
    $m[logoURI] = "https://raw.githubusercontent.com/pro-blockchain-com/uniswap-token-list/master/img/$t.png";
    $out[] = $m;

    $f = "$d/img/$t.png";
    if(!file_exists($f))
    {
    $b = file_get_contents($v[logoURI]);
    file_put_contents($f,$b);
    }
}
$mas[name] = "ProBlockchainTokenList";
//$mas[timestamp] = "2020-09-05T10:00:00+03:00";
//$mas[timestamp] = date("Y-m-d")."T".date("H:i:s",time()-3600*2)."+02:00";
$mas[timestamp] = date("Y-m-d")."T".date("H:i:s")."+02:00";
$mas[keywords][0] = "pro-blockchain";
$mas[tokens] = $out;
$mas[logoURI] = "https://raw.githubusercontent.com/pro-blockchain-com/uniswap-token-list/master/img/protoken.png";

//print_r($out);
print_r($mas);

$l = 0;
$l += JSON_PRETTY_PRINT;
$l += JSON_UNESCAPED_SLASHES;
$txt = json_encode($mas,$l);

$f = "pro-blockchain-token-list.json";
file_put_contents($f,$txt);
