<?php
require('array_unnest.php');
require('array_nest.php');

class Test extends PHPUnit_Framework_TestCase
{
    function test_array_nest()
    {
        $in = ['user.name.first'=>'bob','user.name.last'=>'smith'];
        $expected = ['user'=>['name'=>['first'=>'bob','last'=>'smith']]];
        $this->assertEquals($expected, array_nest($in));
    }

    function test_array_unnest()
    {
        $in = ['user'=>['name'=>['first'=>'bob','last'=>'smith']]];
        $expected = ['user.name.first'=>'bob','user.name.last'=>'smith'];
        $this->assertEquals($expected, array_unnest($in));
    }
}
