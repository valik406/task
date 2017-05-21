<body>
<header>
<div class="staticHeader">
		<h1><a href="index.php">Задачник</a></h1>
		<div class="layout-column">
			<ul class="menu hidden">
                            <?php if(isset($_SESSION['logged_user'])){ ?>
                            <p style="color: white; text-align: center;">Привіт, <?php echo $_SESSION['login'];?>!</p>
                                <a href="index.php?page=out"><li>Вихід</li></a>
                                <a href="index.php?page=user"><li>
                                        Список здач</li></a>
                                
                            <?php } else { ?>
				<a href="index.php?page=login"><li>Вхід</li></a>
				<a href="index.php?page=registration"><li>
                                        Реєстрація</li></a>
                            <?php } ?>
			</ul>
		</div>
	</div>
</header>