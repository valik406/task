<body>
<header>
<div class="staticHeader">
		<h1><a href="index.php">Задачник</a></h1>
		<div class="layout-column">
			<ul class="menu hidden">
                            <?php if(isset($_SESSION['logged_user'])){ ?>
                            <p style="color: white; text-align: center;">Привіт, <?php echo $_SESSION['login'];?>!</p>
                                <li><a href="index.php?page=out">Вихід</a></li>
                                <li><a href="index.php?page=user">
                                        Список здач</a></li>
                                
                            <?php } else { ?>
				<li><a href="index.php?page=login">Вхід</a></li>
				<li><a href="index.php?page=registration">
                                        Реєстрація</a></li>
                            <?php } ?>
			</ul>
		</div>
	</div>
</header>