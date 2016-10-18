<?php
function get_url($url){
include 'config2.php';
$status = base64_encode('active');
$stmt = $dbhs->prepare('SELECT name FROM pages WHERE url = :url AND status = :status');
$stmt->bindParam(':url', base64_encode($url));
$stmt->bindParam(':status', $status);
$stmt->execute();
$name = $stmt->fetch();
return ucwords(strtolower(base64_decode($name['name'])));//base64_decode
}

function get_menu($menu){
    include 'config2.php';
    $stat = base64_encode('active');
    $check = $dbhs->prepare('SELECT * FROM pages WHERE status = :stat AND menu = :menu');
    $check->bindParam(':stat', $stat);
    $check->bindParam(':menu', base64_encode($menu));
    $check->execute();
    $count = $check->rowCount();
    return $count;
}
//gets all the menu items as array


function get_users(){
    include 'config2.php';
    $status="QWN0aXZl";
    $check = $dbhs->prepare('select * from users where status=:stat ');
    $check->bindParam(':stat', $status);
    $check->execute();
    $data=$check->fetchAll();
    return $data;

}
function get_pagesMenu($menu){
    include 'config2.php';
    $status="YWN0aXZl";
    $check = $dbhs->prepare('select * from pages where menu=:1 and status=:stat ');
    $check->bindParam(':1', $menu);
    $check->bindParam(':stat', $status);
    $check->execute();
    $data=$check->fetchAll();
    return $data;

}
//get pages given url
function get_pages($url){
    include 'config2.php';
    $status="YWN0aXZl";
    $check = $dbhs->prepare('select * from pages where url=:1 and status=:stat ');
    $check->bindParam(':1', $url);
    $check->bindParam(':stat', $status);
    $check->execute();
    $data=$check->fetch();
    return $data;

}
//get page details given page ID
function get_pageDetails($gageid){
    include 'config2.php';
    $status="YWN0aXZl";
    $check = $dbhs->prepare('select * from pages where id=:1 and status=:stat ');
    $check->bindParam(':1', $gageid);
    $check->bindParam(':stat', $status);
    $check->execute();
  $data=$check->fetch();
    return $data;

}
//get all the pages
function get_Allpages(){
    include 'config2.php';
    $status="YWN0aXZl";
    $check = $dbhs->prepare('select * from pages where status=:stat ');
    $check->bindParam(':stat', $status);
    $check->execute();
    $data=$check->fetchAll();
    return $data;

}
//get permisions per user
function get_user_permision($userd){
    include 'config2.php';
    $check = $dbhs->prepare('select * from permission where user=:1 ');
    $check->bindParam(':1', $userd);
    $check->execute();
    $data=$check->fetchAll();
    return $data;

}

//check read/write permission
function check_write_permission(){
    include 'config2.php';
    $page = basename($_SERVER['PHP_SELF']);
    $pid = get_page_id($page);
    $page_id = base64_encode($pid);
    $us = $_SESSION['users'];
    $userd = base64_encode($us);
    $check = $dbhs->prepare('select page_write from permission where user=:user and page=:page');
    $check->bindParam(':user', $userd);
    $check->bindParam(':page', $page_id);
    $check->execute();
    $data=$check->fetch();
    $level = base64_decode($data['page_write']);
    return $level;
}

//get the page id given the url
function get_page_id($pg){
    include 'config2.php';
    $page = base64_encode($pg);//current page/filename
    $status = base64_encode('active');
    $check = $dbhs->prepare('select id from pages where url=:page and status=:stat');
    $check->bindParam(':stat', $status);
    $check->bindParam(':page', $page);
    $check->execute();
    $data=$check->fetch();
    $id = $data['id'];
    return $id;
    
}