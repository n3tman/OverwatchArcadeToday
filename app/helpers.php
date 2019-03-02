<?php

function getRandomBackground() {
    $files = Storage::disk('assets')->allFiles('img/backgrounds');
    $background = $files[rand(0, count($files) - 1)];
    return $background;
}
