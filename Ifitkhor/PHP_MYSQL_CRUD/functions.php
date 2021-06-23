<?php

function dumpDie($arg)
{
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
    die();
}