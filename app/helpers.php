<?php

use Illuminate\Support\Facades\Request;

function isActive($path)
{
    return request()->route()->getName() === $path ? ' active ' : '';
    // return Request::is($path . '*') ? ' active' : false;
}
