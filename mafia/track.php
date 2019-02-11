<?php

require('vendor/autoload.php');
require('users.php');

use PHPHtmlParser\Dom;


//Open the database mydb
$db = new SQLite3('mydb');

//Create a basic users table
// $db->exec('CREATE TABLE users (username varchar(255), dt datetime default current_timestamp)');

$dom = new Dom;
$dom->loadFromUrl('http://vilnius.en.cx');
$html = $dom->outerHtml;

$staff = $dom->find('#boxCenterDomainStaff table tr')[3];
$loggedIn = $staff->find('a');

$guests_count = $staff->find('span.white b')[0]->innerHtml;
$registered_count = $staff->find('span.white b')[1]->innerHtml;

$uniqid = uniqid();
$db->exec('INSERT INTO logs (id, guests_count, registered_count) VALUES (" ' . $uniqid . ' ", ' . $guests_count . ', ' . $registered_count . ')');

foreach($loggedIn as $user) {
    $user = $user->innerHtml;

    if(in_array($user, $users))
        $db->exec('INSERT INTO users (username) VALUES (" ' . $user . '")');
}

echo 'all good';

$db->close();
