<?php
$a = $b = $c = $d = false;
$num = "5";
$number = "5";

extract($_POST);
//调用function
random_text($num, $a, $b, $c, $d, $number);
/**
 * @param $count 生成的字符长度
 * @param $a 大写
 * @param $b 小写
 * @param $c 数字
 * @param $d 特殊字符
 * @param $number 生成的条数
 * @return string 生成的随机字符串
 */
function random_text($count = "5", $a = false, $b = false, $c = false, $d = false, $number = "1")
{
    if ($a && $b && $c && $d) {//全选情况
        $chars = array_flip(range(chr(33), chr(126)));
    } elseif ($a && $b && $c) {//大小写数字
        $chars = array_flip(array_merge(range(0, 9), range("A", "Z"), range("a", "z")));
    } elseif ($a && $b && $d) {//大小写加特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(47)), range(chr(58), chr(126))));
    } elseif ($c && $b && $d) {//小写，数字，特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(64)), range(chr(91), chr(126))));
    } elseif ($a && $c && $d) {//大写，数字，特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(96)), range(chr(123), chr(126))));
    } elseif ($a && $b) {//大小写
        $chars = array_flip(array_merge(range("A", "Z"), range("a", "z")));
    } elseif ($a && $c) {//大写，数字
        $chars = array_flip(array_merge(range(0, 9), range("A", "Z")));
    } elseif ($a && $d) {//大写，特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(47)), range(chr(65), chr(96)), range(chr(123), chr(126))));
    } elseif ($b && $c) {//小写，数字
        $chars = array_flip(array_merge(range(0, 9), range("a", "z")));
    } elseif ($b && $d) {//小写，特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(47)), range(chr(58), chr(64)), range(chr(91), chr(126))));
    } elseif ($c && $d) {//数字，特殊字符
        $chars = array_flip(array_merge(range(chr(33), chr(64)), range(chr(91), chr(96)), range(chr(123), chr(126))));
    } elseif ($a || $b || $c || $d) {//abcd只选择其中一个的情况
        switch (true) {
            case $a:
                $chars = array_flip(range("A", "Z"));
                break;
            case $b:
                $chars = array_flip(range("a", "z"));
                break;
            case $c:
                $chars = array_flip(range(1, 9));
                break;
            case $d:
                $chars = array_flip(array_merge(range(chr(33), chr(47)), range(chr(58), chr(64)), range(chr(91), chr(96)), range(chr(123), chr(126))));
                break;
        }
    } else {
        return "请选择一种密码形式生成";
    }

    for ($k = 0; $k < $number; $k++) {
        for ($i = 0, $text = ''; $i < $count; $i++) {
            //  htmlspecialchars用于过滤html标签
            $text .= htmlspecialchars(array_rand($chars, 1));
        }
        echo $text;
        echo "\n";
    }
//    return $text;
}