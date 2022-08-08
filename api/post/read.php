<?php
//Header 
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();
$post = new Post($db);

// Blog post query 
$result = $post->read();


//Get row Count
$num = $result->rowCount();

if ($num > 0) {
    //Post array

    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );


        //push to "data
        array_push($posts_arr, $post_item);


        // Turn to JSON & output
        echo json_encode($posts_arr);
    }
} else {
    echo json_encode(
        array('message' => 'no Post İn data')
    );
}
