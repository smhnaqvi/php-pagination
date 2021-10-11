<?php
require_once "Libraries/Pagination.php";

use Libraries\Pagination\Pagination;


// make sample data for test pagination for example i get data from database :))
$data = [];
for ($i = 1; 100 > $i; $i++) {
    $text = md5("description $i");
    $data[] = array(
        ["title" => "title $i", "description" => "description $text"],
    );
}


$page = $_GET["page"] ?? 1; // current page number
$limit = $_GET["limit"] ?? 10; // limit is how  many result showing per page

/** create Pagination instance and pass three required argument
 *  1 @int count of your total data count
 *  2 @int your current page number its by default set to 1
 *  3 @int limit number of showing data per page its optional and by default set to ten|10
 */
$pagination = new Pagination(count($data), $page, $limit);

// using array_slice for showing real result like mysql from database ;)
$post = array_slice($data, $pagination->getOffset(), $limit);

// return object of paginate result
$paginate = $pagination->paginate();

echo json_encode(array(
    "data" => $post,
    "pagination" => $paginate,
));