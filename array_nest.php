<?php
function array_nest($in)
{
    $scope = [];
    foreach ($in as $k=>$v) {
        $ancestors = explode(".",$k);
        $scope = array_nest_scope($v, $ancestors, $scope);
    }
    return $scope;
}

function array_nest_scope($value, $ancestors = [], $scope = [])
{
    $current = array_shift($ancestors);
    if (count($ancestors)) {
        $child_scope = isset($scope[$current]) ? $scope[$current] : [];
        $scope[$current] = array_nest_scope($value, $ancestors, $child_scope);
    } else {
        $scope[$current] = $value;
    }
    return $scope;
}
