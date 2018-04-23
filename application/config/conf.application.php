<?php
    return array(
        'name_site' => 'news-api',
        'languagesList' => array('en', 'ua', 'ru'),
        'routes' => array(
            'admin' => array(
                'index'
            ),
            'news' => array(
                'index',
                'view'
            ),
            'user' => array(
                'index',
                'change',
                'view'
            ),
            'default' => array(
                'controller' => 'news',
                'action' => 'index',
                'language' => 'ua'
            )
        )
    );
