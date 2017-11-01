<?php
include 'examples/head.php';
include 'examples/header.php';
require_once 'models/mod_listTask.php';
?>
<script>
    function skrl() {
        window.scroll(0, <?php echo $_GET['scrl']; ?>);
    }
    document.addEventListener("DOMContentLoaded", skrl);

</script>
<script type="text/javascript">
    jQuery(function()
    {
        jQuery('textarea').autoResize();
    });
</script>

<div style="width: 1000px" class="main">
    <table class="table">
        <caption>Завдання на сьогодні<br>
            <?php if ($action == 'creat') { ?>
            <form class="newTaskForm" method="post" action="">

                    <?php if ($good) { ?><p style="color: green; margin: 0 ;"><?= $good ?></p><?php } else { ?>

                        <label for="task">Нове завдання</label>
                        <textarea autofocus name="task" id="task" rows="3" maxlength="256"><?= $newTask['task'] ?></textarea>
                        <div class="radio1">
                            <label for="importance">Важливість:</label>

                            <label><input type="radio" name="importance" value="i" 
                                          <?php if ($newTask['importance'] == 'i') {echo 'checked';} ?> >Важливе</label>
                            <label><input type="radio" name="importance" value="ni" 
                                          <?php if ($newTask['importance'] == 'ni') {echo 'checked';} ?> >Не важливе</label>
                        </div>
                        <div class="radio2">
                            <label for="urgency">Терміновість:</label>
                            
                            <label><input type="radio" name="urgency" value="u" 
                                          <?php if ($newTask['urgency'] == 'u') {echo 'checked';} ?>>Термінове</label>
                            <label><input type="radio" name="urgency" value="nu" 
                                          <?php if ($newTask['urgency'] == 'nu') {echo 'checked';} ?>>Не термінове</label>
                        </div>
                        
                            <?php if ($error) { ?><p style="color: red"><?= $error ?></p><?php } ?>
                            
                        <input type="submit" value="Створити" name="submit"/>
                <?php } ?>
                </form>
            <?php if ($good) { ?><div class="newTask"><p><a href="/?action=creat" onclick="this.href += '&scrl=' + window.pageYOffset" title="Додати запис"><img src="views/images/add.png" width="20" height="20" alt="add">
                            Cтворити нове завдання</a>
                    </p></div>
                        <?php }?>

                <?php } else { ?>
                <div class="newTask"><p><a href="/?action=creat" onclick="this.href += '&scrl=' + window.pageYOffset" title="Додати запис"><img src="views/images/add.png" width="20" height="20" alt="add">
                            Cтворити нове завдання</a>
                    </p></div>
                <?php } ?>
        </caption>

        <tr>
            <td class="tdname td01"></td>
            <td class="tdname td02">Термінові</td>
            <td class="tdname td03">Не термінові</td>
        </tr>
        <tr>
            <td class="tdroteid td04">В<br>а<br>ж<br>л<br>и<br>в<br>і<br></td>
            <td class="td1">
                <ol>
                    <?php foreach ($taskImpUrg as $key => $task) { ?>
                    <li class="li">
                            <?php if ($action == 'edit' && $id == "${task['id']}") { ?>
                                <form method="post" action="">
                                    <div><textarea autofocus name="task" maxlength="256"><?php if($editTask){
                                        echo $editTask['task'];} else{
                                        echo  $task['task'];} ?></textarea></div>
                                            <?php if ($error) { ?><p style="color: red;"><?= $error ?></p><?php } ?>
                                    <input type="submit" value="Зберегти" name="submit"/> 
                                </form>
                            <?php } else {?>
                        <a class="clikc element" href='?action=statusOk&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Відмітити як виконане"><img src="views/images/check.png" width="20" height="20" alt="v"></a> 
                        <?php if ($taskImpUrg[$key-1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskImpUrg[$key-1]['id']?>&replaceIdSort=<?=$taskImpUrg[$key-1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вгору"><img src="views/images/up.png" width="20" height="20" alt="вверх"></a>
                            <?php } ?>
                        <div><?=$key+1?>.) <?=$task['task']?></div>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=3&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в не важливі"><img src="views/images/down.png" width="20" height="20" alt="Перемістити в не важливі"></a>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=2&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в не термінові"><img src="views/images/right.png" width="20" height="20" alt="Перемістити в не термінові"></a>
                        <a class="element" href='?action=edit&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Редагувати"><img src="views/images/edit.png" width="20" height="20" alt="Редагуввщцт.pngати"></a>
                        <a class="element" href='?action=delete&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Видалити"><img src="views/images/delete.png" width="20" height="20" alt="Видалити"></a>
                        <?php if ($taskImpUrg[$key+1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskImpUrg[$key+1]['id']?>&replaceIdSort=<?=$taskImpUrg[$key+1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вниз"><img src="views/images/down.png" width="20" height="20" alt="вниз"></a>
                           <?php } ?> 
                         <?php } ?>
                    </li>
                    <?php } ?>
                </ol>
            </td>
            
            <td class="td2">
                <ol>
                    <?php foreach ($taskImpNUrg as $key => $task) { ?>
                    <li class="li">
                            <?php if ($action == 'edit' && $id == "${task['id']}") { ?>
                                <form method="post" action="">
                                    <div><textarea autofocus name="task" maxlength="256"><?php if($editTask){
                                        echo $editTask['task'];} else{
                                        echo  $task['task'];} ?></textarea></div>
                                            <?php if ($error) { ?><p style="color: red;"><?= $error ?></p><?php } ?>
                                    <input type="submit" value="Зберегти" name="submit"/> 
                                </form>
                            <?php } else {?>
                        <a class="clikc element" href='?action=statusOk&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Відмітити як виконане"><img src="views/images/check.png" width="20" height="20" alt="v"></a> 
                        <?php if ($taskImpNUrg[$key-1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskImpNUrg[$key-1]['id']?>&replaceIdSort=<?=$taskImpNUrg[$key-1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вгору"><img src="views/images/up.png" width="20" height="20" alt="вверх"></a>
                            <?php } ?>
                        <div><?=$key+1?>.) <?= $task['task']?></div>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=1&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в термінові"><img src="views/images/left.png" width="20" height="20" alt="Перемістити в термінові"></a>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=4&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в не важливі"><img src="views/images/down.png" width="20" height="20" alt="Перемістити в не важливі"></a>
                        <a class="element" href='?action=edit&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Редагувати"><img src="views/images/edit.png" width="20" height="20" alt="Редагуввщцт.pngати"></a>
                        <a class="element" href='?action=delete&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Видалити"><img src="views/images/delete.png" width="20" height="20" alt="Видалити"></a>
                        <?php if ($taskImpNUrg[$key+1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskImpNUrg[$key+1]['id']?>&replaceIdSort=<?=$taskImpNUrg[$key+1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вниз"><img src="views/images/down.png" width="20" height="20" alt="вниз"></a>
                           <?php } ?> 
                         <?php } ?>
                    </li>
                    <?php } ?>
                </ol>
            </td>
        </tr>
        <tr>
            <td class="tdroteid td05">Н<br>е<br> <br>в<br>а<br>ж<br>л<br>и<br>в<br>і<br></td>
            <td class="td3">
                <ol>
                    <?php foreach ($taskNImpUrg as $key => $task) { ?>
                    <li class="li">
                            <?php if ($action == 'edit' && $id == "${task['id']}") { ?>
                                <form method="post" action="">
                                    <div><textarea autofocus name="task" maxlength="256"><?php if($editTask){
                                        echo $editTask['task'];} else{
                                        echo  $task['task'];} ?></textarea></div>
                                            <?php if ($error) { ?><p style="color: red;"><?= $error ?></p><?php } ?>
                                    <input type="submit" value="Зберегти" name="submit"/> 
                                </form>
                            <?php } else {?>
                        <a class="clikc element" href='?action=statusOk&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Відмітити як виконане"><img src="views/images/check.png" width="20" height="20" alt="v"></a> 
                        <?php if ($taskNImpUrg[$key-1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskNImpUrg[$key-1]['id']?>&replaceIdSort=<?=$taskNImpUrg[$key-1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вгору"><img src="views/images/up.png" width="20" height="20" alt="вверх"></a>
                            <?php } ?>
                        <div><?=$key+1?>.) <?= $task['task']?></div>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=1&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в важливі"><img src="views/images/up.png" width="20" height="20" alt="Перемістити в важливі"></a>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=4&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в не термінові"><img src="views/images/right.png" width="20" height="20" alt="Перемістити в не термінові"></a>
                        <a class="element" href='?action=edit&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Редагувати"><img src="views/images/edit.png" width="20" height="20" alt="Редагуввщцт.pngати"></a>
                        <a class="element" href='?action=delete&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Видалити"><img src="views/images/delete.png" width="20" height="20" alt="Видалити"></a>
                        <?php if ($taskNImpUrg[$key+1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskNImpUrg[$key+1]['id']?>&replaceIdSort=<?=$taskNImpUrg[$key+1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вниз"><img src="views/images/down.png" width="20" height="20" alt="вниз"></a>
                           <?php } ?> 
                         <?php } ?>
                    </li>
                    <?php } ?>
                </ol>
            </td>
            <td class="td4">
                <ol>
                     <?php foreach ($taskNImpNUrg as $key => $task) { ?>
                    <li class="li">
                            <?php if ($action == 'edit' && $id == "${task['id']}") { ?>
                                <form method="post" action="">
                                    <div><textarea autofocus name="task" maxlength="256"><?php if($editTask){
                                        echo $editTask['task'];} else{
                                        echo  $task['task'];} ?></textarea></div>
                                            <?php if ($error) { ?><p style="color: red;"><?= $error ?></p><?php } ?>
                                    <input type="submit" value="Зберегти" name="submit"/> 
                                </form>
                            <?php } else {?>
                        <a class="clikc element" href='?action=statusOk&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Відмітити як виконане"><img src="views/images/check.png" width="20" height="20" alt="v"></a> 
                        <?php if ($taskNImpNUrg[$key-1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskNImpNUrg[$key-1]['id']?>&replaceIdSort=<?=$taskNImpNUrg[$key-1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вгору"><img src="views/images/up.png" width="20" height="20" alt="вверх"></a>
                            <?php } ?>
                        <div><?=$key+1?>.) <?= $task['task']?></div>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=3&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в термінові"><img src="views/images/left.png" width="20" height="20" alt="Перемістити в термінові"></a>
                        <a class="element" href='?action=moving&id=<?=$task['id']?>&goto=2&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити в важливі"><img src="views/images/up.png" width="20" height="20" alt="Перемістити в важливі"></a>
                        <a class="element" href='?action=edit&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Редагувати"><img src="views/images/edit.png" width="20" height="20" alt="Редагуввщцт.pngати"></a>
                        <a class="element" href='?action=delete&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Видалити"><img src="views/images/delete.png" width="20" height="20" alt="Видалити"></a>
                        <?php if ($taskNImpNUrg[$key+1]['id']){ ?>
                        <a class="move element" href='?action=ordinal&id=<?=$task['id']?>&idSort=<?=$task['sorting']?>&replaceId=<?=$taskNImpNUrg[$key+1]['id']?>&replaceIdSort=<?=$taskNImpNUrg[$key+1]['sorting']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Перемістити вниз"><img src="views/images/down.png" width="20" height="20" alt="вниз"></a>
                           <?php } ?> 
                         <?php } ?>
                    </li>
                    <?php } ?>
                </ol>
            </td>
        </tr>
    </table>
    
    <table class="completedTable">
        <caption>Виконані завдання</caption>
        <tr>
            <td>
                <ol>
                    <?php foreach ($taskOk as $task) { ?>
                    <li class="li">
                        <a class="restore element" href='?action=restore&id=<?=$task['id']?>&category=<?=$task['category']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Відновити"><img src="views/images/back.png" width="20" height="20" alt="Відновити"></a>
                        <div>- <?=$task['task']?> <a class="delete element" href='?action=delete&id=<?=$task['id']?>&' onclick="this.href += 'scrl=' + window.pageYOffset" title="Видалити"><img src="views/images/delete.png" width="20" height="20" alt="Видалити"></a></div>
                        
                    </li>
                    <?php } ?>
                </ol>
            </td>
        </tr>
    </table>
</div>
<?php
include 'examples/footer.php';
/*<?= nl2br(str_replace('  ', '&ensp;', $task['task']))?>*/
?>