<?php
    return array(
        'name_site' => 'news-api',
        'language' => 'ua',
        'languagesList' => array('en', 'ua', 'ru'),
        'routes' => array(
            'controllers' => array(
                'admin' => array(
                    'action' => array(

                    )
                ),
                'news' => array(
                    'action' => array(
                        'index',
                        'view'
                    )
                ),
                'user' => array(
                    'action' => array(
                        'index',
                        'change',
                        'view'
                    )
                )
            )
        )
    );
