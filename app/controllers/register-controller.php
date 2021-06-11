<?php

require "../models/user-model.php";

$roleList = getAllRoles();

$errors = [];

if (isPosted()) {
    $errors = handleRegisterForm();
}

renderView("register", [
    "roleList" => $roleList,
    "errors" => $errors
]);