<?php
/**
 * Created by PhpStorm.
 * User: pasenger
 * Date: 2016/10/15
 * Time: 下午9:06
 */

echo uniqid() . "\n";

$fileName = "about.1.jpg";

echo uniqid().strrchr($fileName, ".") . "\n";


mkdir("/Users/pasenger/Downloads/upload/aaa/bbb", 0777, true);

