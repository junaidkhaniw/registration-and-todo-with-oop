<?php

include "todo-process.php";
include "./templates/header.php";

$todos = new Todo();

?>

<div class="container m-5 p-2 rounded mx-auto bg-light shadow">
    <!-- App title section -->
    <div class="row m-1 p-4">
        <div class="col">
            <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
                <i class="fa fa-check bg-primary text-white rounded p-2"></i>
                <u>My Todo-s</u>
            </div>
        </div>
    </div>
    <!-- Create todo section -->
    <div class="row m-1 p-3">
        <div class="col col-11 mx-auto">
            <form action="" method="POST" class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
                <div class="col">
                    <input name="todo-title" class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new ..">
                </div>
                
                <div class="col-auto px-0 mx-0 mr-2">
                    <button type="submit" name="add-new" class="btn btn-primary">Add New</button>
                </div>
            </form>
        </div>
    </div>
    <div class="p-2 mx-4 border-black-25 border-bottom"></div>
    
    <div class="row mx-1 px-5 pb-3 w-80">
        <div class="col mx-auto">

            <form action="" method="post">


            
                <!-- View options section -->
                <div class="row selection-row align-items-center todo-item rounded">
                <input class="form-check-input checkboxes allcheckboxes" id="selectallcheckboxes" type="checkbox"> 
                    <div class="selection col-auto d-flex align-items-center px-1 pr-3">
                        <select name="bulk-options" id="select-all-boxes" class="custom-select custom-select-sm btn my-2">
                            <option value="delete" selected>Delete</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    <div class="col-auto d-flex align-items-center px-1 pr-3">
                        <input type="submit" name="apply" value="Apply" class="apply-btn btn btn-primary">
                    </div>
                </div>
                <!-- Todo list section -->

                <!-- Todo Item -->
                <?php
                    if ($todos->getTodo()) {
                        foreach ($todos->getTodo() as $todo) {
                ?>
                <div class="row px-3 align-items-center todo-item rounded">
                
                    <div class="col px-1 m-1 d-flex align-items-center">
                        <label class="input-title">
                            <input class="form-check-input checkboxes" name="checkboxes[]" type="checkbox" value="<?php echo $todo['id']; ?>">
                            <span><?php echo $todo["title"]; ?></span>

                        </label>
                    </div> 
                    
                    <div class="col-auto m-1 p-0 todo-actions">

                        <!-- Todo Item Edit & Delete -->
                        <div class="todo-actions-inside">
                            
                            <li>
                                <a href="edit-todo.php?id=<?php echo $todo["id"]; ?>"><i class="fa fa-pencil text-info btn m-0 p-0" title="Edit todo"></i></a> 
                            </li>
                            <li>
                                <a href="todo-process.php?id=<?php echo $todo['id']; ?>&send=del"><i class="fa fa-trash-alt text-danger btn m-0 p-0" title="Delete todo"></i></a>
                            </li>
                        </div>

                        <!-- Todo Item Created Date -->
                        <div class="row todo-created-info">
                            <div>
                                <label class="date-label my-2 text-black-50"><?php echo $todo["date_time"]; ?></label>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="mx-4 border-black-25 border-bottom"></div>
                <?php
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php
include "./templates/footer.php";
?>