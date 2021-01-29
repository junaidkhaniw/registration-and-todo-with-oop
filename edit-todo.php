<?php

include "./includes/autoload.php";
include "./templates/header.php";

$todos = new Todo();

$todo = $todos->editTodo($_GET['id']);
$id = $todo["id"];
$title = $todo["title"];
?>


<div class="modal-body">
    <form action="todo-process.php?send=update&id=<?php echo $id; ?>" method="POST" class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
        <div class="col">
            <input value="<?php echo $title; ?>" name="update-todo-title" class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Edit Todo ..">
        </div>
        <div class="col-auto px-0 mx-0 mr-2">
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

<?php
include "./templates/footer.php";
?>