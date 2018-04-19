<?php
    return array(
        'name_site' => 'news-api',
        'language' => 'ua',
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
            )
        )
    );
