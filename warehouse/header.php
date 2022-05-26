<header class="header">
    <div class="container">
        <div class="header__inner">
            <a class="header__logo" href="index.php">
            <div class="header__logo">Оптовый склад</div>
            </a>
            <nav class="nav">
                <div class="dropdown">
                <a class="nav__link" href="postavshik.php">Поставщикам</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="postavshikAdd.php">Добавление</a>
                    </div>
                </div>
                <div class="dropdown">
                <a class="nav__link" href="pokupatel.php" >Покупателям</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="pokupatelAdd.php">Добавление</a>
                    </div>

                </div>
                <?php if(isset($_SESSION['user']['name'])) : ?>
                <div class="dropdown">
                                   <a class="nav__link" >Работникам склада</a>
                                    <div class="dropdown-content">
                        <a class="nav__link" href="skladpost.php" >Поставщики</a>
                        <a class="nav__link" href="skladpok.php" >Покупатели</a>
                        <a class="nav__link" href="sklad.php" >Товары на складе</a>
                        <a class="nav__link" href="history.php" >История сделок</a>
                    </div>
                    </div>
                <?php endif; ?>
                <div class="dropdown">
                    <a class="nav__link">Контакты</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="https://vk.com/danilyh" target="_blank">К. Данил</a>
                        <a class="nav__link" href="https://vk.com/6robin6" target="_blank">В. Иван</a>
                    </div>    
                </div>
                
                    <!-- Если авторизован выведет приветствие -->
                <?php if(isset($_SESSION['user']['name'])) : ?>
                <div class="dropdown">
                <a class="nav__link"> <?php echo $_SESSION['user']['name'] ?> </a>
                <div class="dropdown-content">
                <a class="nav__link" href="reg/logout.php">Выйти</a> <!-- файл logout.php создадим ниже -->
                </div>
                </div>
                <?php else : ?>
                
                <!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
                <a class="nav__link" href="reg/index.html">Авторизоваться</a>
                <?php endif ?>
            </nav>
        </div>
    </div>
</header>