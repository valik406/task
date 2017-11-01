<?php
require 'models/mod_connectionSQL.php';
          
if($action == 'creat'){
$newTask = $_POST;
if (isset($newTask[submit])) {
    $errors = array();
    
    if(trim($newTask['task']) == ''){
        $errors[] = 'Введіть завдання!';
    }
    
     if(trim($newTask['importance']) == ''){
        $errors[] = 'Виберіть важливість!';
    }
    
     if($newTask['urgency'] == ''){
        $errors[] = 'Виберіть терміновість!';
    }
 
    //Все добре реєструємо
    
    if(empty($errors)){
        if($newTask['importance'] == i && $newTask['urgency'] == u){
            $category = 1;
            $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = 1") + 1;
        }
        if($newTask['importance'] == i && $newTask['urgency'] == nu){
            $category = 2;
            $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = 2") + 1;
        }
        if($newTask['importance'] == ni && $newTask['urgency'] == u){
            $category = 3;
            $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = 3") + 1;
        }
        if($newTask['importance'] == ni && $newTask['urgency'] == nu){
            $category = 4;
            $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = 4") + 1;
        }
        
        $task = R::dispense($_SESSION['login']);
        $task->task = htmlspecialchars($newTask['task'], ENT_QUOTES);
        $task->category = $category;
        $task->sorting = $ordinalNamber;
        $task->status = 0;
        
        R::store($task);
        
        
        
        $good = 'Нове завдання створено!';
        
    }
    // Виводимо ошибку
    else {
        $error = array_shift($errors);
    }
}
}
 






else if($action == 'delete'){
    $delete = $_GET;
    R::exec( "DELETE FROM ${_SESSION['login']} WHERE id = ${delete['id']}" );
}

else if($action == 'moving'){
    $moving = $_GET;
    $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = ${moving['goto']}") + 1;
    R::exec( "UPDATE ${_SESSION['login']} SET category = ${moving['goto']} WHERE id = ${moving['id']}" );
    R::exec( "UPDATE ${_SESSION['login']} SET sorting = ${ordinalNamber} WHERE id = ${moving['id']}" );
    //echo "<script>window.location.href='/?scrl=" . "${delete['scrl']}" . "'</script>";
}

else if($action == 'restore'){
    $restore = $_GET;
    $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE category = ${restore['category']}") + 1;
    R::exec( "UPDATE ${_SESSION['login']} SET status = 0 WHERE id = ${restore['id']}" );
    R::exec( "UPDATE ${_SESSION['login']} SET sorting = ${ordinalNamber} WHERE id = ${restore['id']}" );
    //echo "<script>window.location.href='/?scrl=" . "${delete['scrl']}" . "'</script>";
}

else if($action == 'statusOk'){
    $statusOk = $_GET;
    $ordinalNamber = R::getCell("SELECT MAX(sorting) FROM ${_SESSION['login']} WHERE status = 1") + 1;
    R::exec( "UPDATE ${_SESSION['login']} SET status = 1 WHERE id = ${statusOk['id']}" );
    R::exec( "UPDATE ${_SESSION['login']} SET sorting = ${ordinalNamber} WHERE id = ${statusOk['id']}" );
    //echo "<script>window.location.href='/?scrl=" . "${delete['scrl']}" . "'</script>";
}

else if($action == 'ordinal'){
    $ordinal = $_GET;
    R::exec( "UPDATE ${_SESSION['login']} SET sorting = ${ordinal['idSort']} WHERE id = ${ordinal['replaceId']}" );
    R::exec( "UPDATE ${_SESSION['login']} SET sorting = ${ordinal['replaceIdSort']} WHERE id = ${ordinal['id']}" );
    //echo "<script>window.location.href='/?scrl=" . "${delete['scrl']}" . "'</script>";
}



else if($action == 'edit'){
   $editTask = $_POST;
   $edit = $_GET;
   if (isset($editTask[submit])) {
    $errors = array();
    
    if(trim($editTask['task']) == ''){
        $errors[] = 'Поле не може бути пустим!';
    }
    
    //Все добре реєструємо
    
    if(empty($errors)){
        $editTask['task'] = htmlspecialchars($editTask['task'], ENT_QUOTES);
        R::exec( "UPDATE ${_SESSION['login']} SET task = " . "'" . "${editTask['task']}" . "'" . " WHERE id = ${edit['id']}" );
        echo "<script>window.location.href='/?scrl=" . "${edit['scrl']}" . "'</script>";
    }
    // Виводимо ошибку
    else {
        $error = array_shift($errors);
    }
}
}

$taskImpUrg =  R::getAll( "SELECT * FROM ${_SESSION['login']} WHERE category = :category AND status = 0 ORDER BY sorting ASC",
        [':category' => '1']
        );

$taskImpNUrg =  R::getAll( "SELECT * FROM ${_SESSION['login']} WHERE category = :category AND status = 0 ORDER BY sorting ASC",
        [':category' => '2']
        );

$taskNImpUrg =  R::getAll( "SELECT * FROM ${_SESSION['login']} WHERE category = :category AND status = 0 ORDER BY sorting ASC",
        [':category' => '3']
        );

$taskNImpNUrg =  R::getAll( "SELECT * FROM ${_SESSION['login']} WHERE category = :category AND status = 0 ORDER BY sorting ASC",
        [':category' => '4']
        );

$taskOk =  R::getAll( "SELECT * FROM ${_SESSION['login']} WHERE status = :status ORDER BY sorting DESC",
        [':status' => '1']
        );

    //echo "<script>window.location.href='/?scrl=" . "${delete['scrl']}" . "'</script>";