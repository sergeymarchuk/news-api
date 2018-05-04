<?php

namespace application\models;

use application\config\Config;

class APIResponse {
    private $top_headlines_string ='https://newsapi.org/v2/top-headlines?country=%2$s&page=%3$s&apiKey=%1$s';
    private $key_word_string = 'https://newsapi.org/v2/everything?q=%2$s&page=%3$s&apiKey=%1$s';

    public function getTopHeadlines($number_page = 1) {
        $request_string =  sprintf($this->top_headlines_string, Config::get('api_key'), Config::get('country'), $number_page);
        $news_list = json_decode(file_get_contents($request_string));

        if ($news_list->status == 'ok') {
            return $news_list->articles;
        }
    }

    public function getEverything($key_word, $number_page = 1) {
        $request_string = sprintf($this->key_word_string, Config::get('api_key', $key_word, $number_page));
        $news_list = json_decode(file_get_contents($request_string));

        if ($news_list->status == 'ok') {
            return $news_list->articles;
        }
    }
}
