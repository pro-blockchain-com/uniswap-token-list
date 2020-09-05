#!/usr/bin/php
<?php

include "conf.php";

$f = "tokens.1inch.eth.link.2020-09-05";
$a = file_get_contents($f);
$a = json_decode($a,1);
//print_r($a);
$d = __DIR__;
foreach($a[tokens] as $v)
{
    print_r($v);
    $f = "$d/img/$t.png";
    if(!file_exists($f))
    {
    $t = $v[symbol];
    $t = strtolower($t);

    $a = file_get_contents($v[logoURI]);
    file_put_contents($f,$a);
    }
}