<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <header>
        <nav>
            <img src="#" alt="">
            <a href="#rooms">Номера</a>
            <a href="#rooms">Бронирование</a>
            <a href="">Услуги</a>
            <a href="#footer">Контакты</a>
            <button id="index_header_nav_btn">Аккаунт</button>
        </nav>
        </header>

        <section class="popup" id="index_popup">
        <section class="index_popup">
            <article class="popup_text">
                <article>
            <p>В первый раз на сайте?</p>
            <p>Регистрация</p>
        </article>
            <button id="btn_close">X</button>
        </article>
        <article class = "reg">
    <form id="formElem">
    <input type="text" placeholder="Ваше имя" name = "name">
    <input type="text" placeholder="Логин" name = "login">
    <input type="password" placeholder="Пароль" name = "password">
    <input type="text" placeholder="Номер телефона" name = "number">
    <input type="submit" id="btn"></input>
</form>
</article>
        </section>
    </section>
    
    <section class="main">
        <article class="main_text">
            <article>
        <h1>современный<br>  
            отель</h1>
            <p>Комфортабельный отель пять звезд с <br>
                высоким уровем обслуживания. <br>
                Расположен в центре города Великий <br>
                новгород. В непосерсредственной близости<br>
                 от набережной</p>
                </article>
                <article>
        <button id = 'buttonJS'>Забронировать</button>
    </article>
    </article>
    </section>
    
    <section class="filterJS">
        <article class="filterLABEL">
    <label>Фильтр: 
        <select id="filter">
        <option value="default">По умолчанию</option>
        <option value="ascending">По возрастанию цены</option>
        <option value="descending">По убыванию цены</option>
        <option value="available">Свободно/Занято</option>
        <option value="presidential">Президентский</option>
        <option value="standard">Обычный</option>
        <option value="luxury">Люкс</option>
        <option value="suite">Сьют</option>
        <option value="exclusive">Эксклюзивный лофт</option>
        </select>
        </label> 
    </article>
    
        <section id="rooms">
   
    </section>
</section>
    <script src="script.js"></script>
</body>
<footer id='footer'>
    <h2>Остались вопросы - Поможем</h2>
    <section class='info'>
        <article class='info1'>
            <article>
            <p>Телефон</p>
            <p>+7-(921)-206-75-04</p>
            </article>
            <article>
            <p>e-mail</p>
            <p>zaharryzikov167@gmail.com</p>
            </article>
        </article>
        <article class='info2'>
            <article class='telega'>
            <img src="Vector (4).png">
            <a href="https://web.telegram.org/k/#@xacaxxaxa">telegram</a>
            </article>
            <article class='vk'>
                <img src="Group.png">
       <a href="https://vk.com/xacaxaxaxxa">vkontakte</a>
        </article>
        </article>
    </section>
</footer>
</html>