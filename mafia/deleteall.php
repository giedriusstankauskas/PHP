<?php

require('users.php');


$db = new SQLite3('mydb');

$results['top'] = $db->query('SELECT count(*) as cnt, username, dt FROM users GROUP BY username ORDER BY cnt DESC');
$results['all'] = $db->query('SELECT username, dt FROM users ORDER BY dt DESC');

$selected_result = 'top';

$output = '<table>';

while ($row = $results[$selected_result]->fetchArray()) {
    $output .= '<tr>';

    foreach($row as $col)
        $output .= '<td>' . $col . '</td>';

    $output .= '</tr>';
}

$output .= '</table>';

echo $output;
?>
