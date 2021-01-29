<?php

include "./includes/autoload.php";

$todos = new Todo();

if (isset($_POST["add-new"])) {
    $title = $_POST["todo-title"];
    $todos->addTodo($title);
}

else if (isset($_POST["update"])) {
    $id = $_GET["id"];
    $title = $_POST["update-todo-title"];
    $todos->updateTodo($title, $id);
    header("Location: full-todo.php"); 
}

else if ($_GET["send"] === "del") {
    $id = $_GET["id"];
    $todos->deleteTodo($id);
    header("Location: full-todo.php"); 
}

else if (isset($_POST["apply"])) {
    if(isset($_POST['checkboxes'])) {
        $bulk_option = $_POST['bulk-options'];
        foreach ($_POST['checkboxes'] as $id) {
            if ($bulk_option == 'delete') {
                $todos->deleteTodo($id);
            }
            else {
                echo "sorry inside";
            }
        } 
    }
    else {
        echo "sorry outside";
    }
    
}


?>