<?php

function randomHexColor(){
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

function fontColorCalculate($bgColor){
    // check if bgColor is in hex
    if($bgColor[0] == "#") $bgColor = hexToRgb($bgColor);
    list($r, $g, $b) = explode(',', preg_replace('/[rgb() ]/', '', $bgColor));

    $lumins = 1 - (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
    $ret = "#FFFFFF";

    if($lumins < 0.5){
        $ret = "#000000";
    }else{
        $ret = "#FFFFFF";
    }

    return $ret;
}

function hexToRGB($hex){
    if($hex[0] == "#") $hex = substr($hex, 1);
    return hexdec(substr($hex, 0, 2)) . ',' . hexdec(substr($hex, 2, 2)) . ',' . hexdec(substr($hex, 4, 2));
} // end hexToRGB()
