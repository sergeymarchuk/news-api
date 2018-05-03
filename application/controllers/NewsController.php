<?php

use application\config\BaseController;
use application\models\APIResponse;

class NewsController extends BaseController {

    public function indexAction() {
        $news_list = new APIResponse();

        $this->data['news_list'] = $news_list->getTopHeadlines();

    }

    public function viewAction() {
        echo 'View tro-lo-lo';
    }
}