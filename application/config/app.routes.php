<?php
    return array(
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
            'view',
            'preferences'
        ),
        'default' => array(
            'controller' => 'news',
            'action' => 'index',
            'language' => 'ua',
            'layout' => 'app.layout'
        )
    );
