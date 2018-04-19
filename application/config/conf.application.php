<?php
    return array(
        'name_site' => 'news-api',
        'language' => 'ua',
        'routes' => array(
            'controllers' => array(
                'admin' => array(
                    'action' => array(

                    )
                ),
                'news' => array(
                    'action' => array(
                        'index',
                        'veiw'
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
