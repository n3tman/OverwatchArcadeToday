<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

/**
 * @return mixed
 */
function getRandomBackground()
{
    $files = Storage::disk('assets')->allFiles('img/backgrounds');
    $background = $files[rand(0, count($files) - 1)];
    return $background;
}

/**
 * @param $code
 * @param bool $largeTile
 * @return string
 */
function getTileImageByCode($code, $largeTile = false)
{
    $tileType = $largeTile ? "modes_large" : "modes";
    $image = 'img/' . $tileType . '/' . $code . '.jpg';

    if (File::exists($image)) {
        return URL::asset($image);
    } else {
        return URL::asset('img/' . $tileType . '/404.jpg');
    }
}