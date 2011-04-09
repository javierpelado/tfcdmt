<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
// example of how to use basic selector to retrieve HTML contents
include('simple_html_dom.php');

function format($text) {

//        echo '<br><b>FORMATEANDO....</b>'.substr($text, 0, 100).'==';
//        echo substr($text, 100).'<br>';
    if (strlen($text) > 80)
    {
        $text = substr($text, 0, 80).' '.format(substr($text, 80));
    }
    return $text;
}

function extractComents($url) {
//    echo 'URL: '.$url.'<br>';
    $html = file_get_html($url);
    $posts = array();
    foreach($html->find('div.module div.comment div.cfx p') as $e)
    {
        $text = format($e->plaintext);
        $posts[] = array("","",$text);
//        echo '<br><b>TEXTO: </b>'.$text.'<br>';
    }
        //if(strlen($e->plaintext) < 200 )
//                $posts[] = array($e->plaintext,"");
    return $posts;
}


function getNPosts() {
    $numPosts = $_GET['n'];
    $query = $_GET['q'];
    $posts = array();

    $page=0;
    while (sizeof($posts) < $numPosts) {
// get DOM from URL or file
        $pageURL = 'http://search.fotolog.com/results?start='.$page.'&q='.$query;
        $html = file_get_html($pageURL);
        foreach($html->find('div.title a') as $e)
            if (sizeof($posts) < $numPosts)
                $posts = array_merge($posts,extractComents($e->href));
        $page += 8;
    }
    $aux = array();
    foreach ($posts as $post)
        if(!(json_encode($post[0]) == "null"))
            $aux[] = $post;
//    echo json_encode(($posts[sizeof($posts) -1 ][0]));
//    print_r($posts[sizeof($posts) -1 ]);
    return $aux;
}


//echo json_encode(getNPosts());
$posts = array('aaData'=>getNPosts());
echo json_encode($posts);
//$text = '*Naanu*dddee*Tiesto*••*Naanu*dddee*Tiesto*••*Naanu*dddee*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•.......•*Tiesto*Naanu*•.......•*Tiesto*Naanu*•.......•*Tiesto*•.......•*Tiesto*•.......•*Tiesto*Naanu*•.......•*Tiesto*Naanu*•.......•*Tiesto*•.......•*Tiesto*•.......•*Tiesto*Naanu*•.......•*Tiesto*Naanu*•..........•*Naanu*•...•*Tiesto*...*Tiesto*•.•*Tiesto*.......*Tiesto*•...•*Tiesto*......*Tiesto*•......•*Tiesto*•...........•*Tiesto*••*Tiesto*......*Tiesto*•.•*Tiesto*.......*Tiesto*•...•*Tiesto*...*Tiesto*•...........•*Naanu*••*Naanu*dddee*Tiesto*••*Naanu*dddee*Tiesto*••*Naanu*dddee*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•...........•*Naanu*•...........•*dddee*•...........•*Tiesto*•............•*Naanu*•....•*Tiesto*...*Tiesto*•.•*Tiesto*..........*Tiesto*•.•*Tiesto*..........*Tiesto*••*Tiesto*............*Tiesto*•.•*Tiesto*..........*Tiesto*•.•*Tiesto*..........*Tiesto*•....•*Tiesto*...*Tiesto*•……….•*Naanu*';
//echo format($text);
?>
