<?php

use Database\DBHelper;

$url = $_POST['url'];
$db = new DBHelper();
if(isset($url) && !empty($url)) {
    create_url($url, $db);
} else {
    echo json_encode(['result' => 'What a fuck, url is empty!']);
}

function create_url($url, $db) 
{
    $url = trim(strtolower($url));
    if(false !== strpos($url,'http://') || false !== strpos($url, 'https://')) {

        $db->createTableIfNotExist();
        $res = $db->checkExistsUrl($url);
        if($res !==false) {
            echo json_encode(['result' => "link is exist and here is: <a href='" . $_SERVER['HTTP_ORIGIN'] . '/' . $res . "'>" . $_SERVER['HTTP_ORIGIN'] . '/' . $res ."</a>"]);
        } else {
            echo json_encode(createLink($url, $db));
        }
    }
}

function createLink($url, $db)
{
    $arrChar = [
        'a','b','c','d','e','f',
        'g','h','i','j','k','l',
        'm','n','o','p','q','r',
        's','t','u','v','w','x',
        'y','z','A','B','C','D',
        'E','F','G','H','I','J',
        'K','L','M','N','O','P',
        'Q','R','S','T','U','V',
        'W','X','Y','Z'
    ];
    $changedUrl = '/';
    for($i = 0; $i < 6; $i++) {
        $rand = rand(0, count($arrChar) - 1);
        $changedUrl .= $arrChar[$rand];
    }
    return $db->createChangedLink($url, $changedUrl);

}
