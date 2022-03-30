<?php

use Illuminate\Support\Str;

function generate_identifier(): string
{
    return Str::uuid()->toString();
}

function get_date_difference($start, $end, $inclusive = false)
{
    $earlier = new DateTime(date('Y-m-d', strtotime($start)));
    $later = new DateTime(date('Y-m-d', strtotime($end)));
    $days = $later->diff($earlier)->format("%a");

    return ($inclusive) ? ++$days : $days;
}
