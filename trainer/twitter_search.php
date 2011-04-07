<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//include('simple_html_dom.php');

//$tweets = json_decode(json_encode($page),true);
//var_dump(json_decode($page, true));

function getNPosts($parameters,$query,$numPosts,$lang) {
    $url = 'http://search.twitter.com/search.json?q='.$query.'&lang='.$lang.'&rpp='.$numPosts;
    $page = join('',file($url));
    $tweets = json_decode($page, true);
    $tweets = $tweets['results'];
    $posts = '';
    foreach ($tweets as $tweet) {
//        $post=array();
        foreach ($parameters as $param) $post = array('',$tweet[$param],'');
//        var_dump($post);
//        echo '<br>';
        $posts[] = $post;
    }
//    echo json_encode($posts);
    return $posts;
}

$parameters = array('text');
$numPosts = $_GET['n'];
$query = $_GET['q'];
$lang = 'es';
$request = array('aaData'=>getNPosts($parameters,$query,$numPosts,$lang));
echo json_encode($request);
?>
