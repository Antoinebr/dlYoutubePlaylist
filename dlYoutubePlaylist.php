<?php
use Sunra\PhpSimple\HtmlDomParser;

class dlYoutubePlaylist{

  private $playlistUrl;
  private $location;

  function __construct($playlistUrl,$location = "/mp3/"){
    $this->playlistUrl = $playlistUrl;
    $this->location = $location;
  }

  public function getSongs(){

    $html = HtmlDomParser::file_get_html($this->playlistUrl);

    foreach($html->find('.pl-video-title-link') as $element) {

      $song = json_decode(file_get_contents("http://www.youtubeinmp3.com/fetch/?format=JSON&video=$element->href"),true);

      exec('wget -nc '.urldecode($song['link']).' -O "'.__DIR__ . $this->location . str_replace(' ', '-', $song['title']).'.mp3"');

    }


  }

}
