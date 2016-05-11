<?php

require 'vendor/autoload.php';
use Sunra\PhpSimple\HtmlDomParser;

require 'dlYoutubePlaylist.php';

$listUrl = 'https://www.youtube.com/playlist?list=PLyPHmhk83VTskUKK9G4Wp2Xe-tyQeLahM';
$folder = "/mp3/";
$list = new dlYoutubePlaylist($listUrl,$folder);

$list->getSongs();
