<?php
session_start();
include 'examples/head.php';
include 'examples/header.php';

$result = ([
    ['namber' => 'Номер', 'task' => 'Задача', 'status' => 'Статус'],
    ['namber' => '1', 'task' => 'Зварити какао!!!', 'status' => 'Важно']
        ]);
?>
<div class="main">
    <div class="newTask">
        <p><a href="index.php?page=newTask">Создать новую задачу</a></p>
    </div>
    <div class="listTask">
        <h2>Список задач:</h2>
        <ul>


            <?php
            foreach ($result as $row) {
                echo "<li><p><span>" . $row['namber'] . "  | </span>";
                echo " <span> " . $row['task'] . "  | </span>";
                echo " <span> " . $row['status'] . " </span></p></li>";
            }
            ?>
        </ul>
    </div>  
</div>




<?php
include 'examples/footer.php';
?>