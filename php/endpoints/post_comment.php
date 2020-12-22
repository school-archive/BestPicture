<?php
require_once "../user.php";
require_once "../photo.php";
require_once "../comment.php";

$userid = get_signed_in_user_id();
if ($userid === -1)
    handleError("not signed in");

if (!isset($_GET["photoid"])) {
    handleError("photoid not set");
} else if (!isset($_GET["comment"])) {
    handleError("comment content not set");
} else {
    filterComment($_GET["photoid"], $_GET["comment"]);
    $user =  get_signed_in_user();
    echo '#' .$user['vorname'] .' ' .$user['nachname'];
}

function handleError($msg) {
    echo 'error#';
    exit();
}