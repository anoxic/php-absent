<?php
function array_unnest(array $in, array $stack = []) 
{
    $out = [];
    foreach ($in as $k=>$v) {
        array_push($stack, $k);
        if (is_array($v))
            $out = array_merge($out, array_unnest($v, $stack));
        else
            $out[implode('.', $stack)] = $v;
        array_pop($stack);
    }
    return $out;
}
