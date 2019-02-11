<?php

//Open the database mydb
$db = new SQLite3('mydb');

//Create a basic users table
$db->exec('CREATE TABLE users (username varchar(255), log_id int(11), dt datetime default current_timestamp)');
$db->exec('CREATE TABLE logs (id int(11), guests_count int(11), registered_count int(11), dt datetime default current_timestamp)');
