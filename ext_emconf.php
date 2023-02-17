<?php

/** @var $_EXTKEY string */
$EM_CONF[$_EXTKEY] = [
    'title'            => 'sypets_example_plugincacheexpiration',
    'description'      => 'TYPO3 example for testing a core patch to modify page cache expiration time',
    'version' => '0.0.1',
    'state'            => 'beta',
    'clearcacheonload' => 0,
    'author'           => 'Sybille Peters',
    'author_email'     => 'sypets@gmx.de',
    'constraints'      => [
        'depends' => [
            'typo3' => '12.3.0-12.9.99',
        ],
    ],
];
