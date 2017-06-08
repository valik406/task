<body>
    <header>
        <div class="staticHeader">
            <h1><a href="index.php">Задачник</a></h1>
            
            <div class="layout-column">
                <ul class="menu hidden">
                    <?php if (isset($_SESSION['login'])) { ?>
                        <div style="color: white; text-align: center; margin-bottom: 10px">Привіт, <?php echo $_SESSION['login_orig']; ?>!</div>
                        <?php if ($page == 'about') { ?>
                            <a href="index.php"><li>Список задач</li></a>
                        <?php } else { ?>
                            <a href="index.php?page=about"><li>Про використання</li></a>
                            <?php } ?>
                            <a href="index.php?page=out"><li>Вихід</li></a>
                        <?php } else { ?>
                            <a href="index.php?page=login"><li>Вхід</li></a>
                            <a href="index.php?page=registration"><li>
                                    Реєстрація</li></a>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </header>