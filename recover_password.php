<?php
require_once 'bootstrap.php';

$templateParams["title"] = "GameHub - Password Recovery";
$templateParams["name"] = "template/template-recover-password.php";

if(isset($_POST['fields']) && isset($_POST['success'])){
    if($userId =  $dbr->getUserIdFromEmail($_POST['email'])) {
        $content = "Premere il seguente link per reimpostare: http://localhost/gamehub/recover_password.php?id=" . base64_decode($userId);
        sendEmail($_POST['email'], "Email per la reimpostazione password", $content);
        $_POST['success'] = "Un email per la reimpostazione è stata inviata per email.";
    }else{
        $_POST['email-error'] = "No user registered with given email! ";
    }
}
if(isset($_POST['id'])){
    if($_POST['password'] == $_POST['repeat_password']){
        $dbu->changePasswordById($_POST['id'],hash_password($_POST['password']));
        $_POST['success'] = "Password has been change properly.";
    }
    else {
        $_POST['password-error'] = "Password doesn't match";
    }
}
require 'template/base.php';

