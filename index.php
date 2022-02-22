<!DOCTYPE html>
<html lang="">
    // Сделал простые переменные, на строках 62-71 сделал if else
<?php 
$isAuth = true;

$justVariable = '23d934mfds121df';
$number = (int) $justVariable;
$boolean = (bool) $justVariable;
echo $justVariable."<br>";
echo $number."<br>"; 
echo $boolean;
?>

<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Проект php</title>
</head>
// Сделал запрос к своей бд и вывел посты на строках 84-103
<?php
$hn = 'localhost';
$db = 'my_project';
$un = 'root';
$pw = '123';
$conn = new mysqli($hn, $un, $pw, $db);
$query = 'SELECT posts.title, posts.url, posts.main_text, posts.count, categories.name, posts.id, posts.created FROM posts INNER JOIN categories ON posts.category_id = categories.id';
$result = $conn -> query($query);
$rows = $result->num_rows;
?>
<body>
    <div id="app" data-v-app="">
        <div class="container-fluid upp pt-1 pb-1 header_top">
            <header class="pt-2 ps-2 d-flex container-fluid">
                <div class="col-md-4 col-lg-2 align-self-center"><a href="https://dimakharlashkin.web.app/"
                        class="router-link-active router-link-exact-active site_logo" aria-current="page"><img
                            src="./img/logo.png" class="d-block w-100 logo"></a></div>
                <div class="col-md-4 col-lg-7 justify-content-between align-self-center">
                    <nav class="navbar navbar-expand-lg navbar-da rk nav_backround">
                        <div class="container-fluid d-flex justify-content-around"><button class="navbar-toggler"
                                type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                                    class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <div class="navbar-nav text-center align-items-center"><a
                                        href="https://dimakharlashkin.web.app/"
                                        class="router-link-active router-link-exact-active fw-bold text-light h5 upp_nav nav-item me-lg-4 me-xl-5"
                                        aria-current="page">Главная</a><a href="https://dimakharlashkin.web.app/Best"
                                        class="fw-bold text-light h5 upp_nav nav-item me-lg-4 me-xl-5">Лучшее</a><a
                                        href="https://dimakharlashkin.web.app/AddNew"
                                        class="fw-bold text-light h5 upp_nav nav-item me-lg-4 me-xl-5">Добавить
                                        новость</a><a href="https://dimakharlashkin.web.app/PostsByCategories"
                                        class="fw-bold text-light h5 upp_nav nav-item me-lg-4 me-xl-5">Категории</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-1 align-self-center"><img src="./img/profile_icon.png"
                        class="d-block profile_icon img-fluid"></div>
                <?php if($isAuth == true) : ?>
                <div class="col-md-2 col-lg-2 align-self-center text-center">
                    <div class="fw-bold text-light h5 upp_nav">Выйти</div>
                </div>
                <?php else : ?>
                <div class="col-md-2 col-lg-2 align-self-center text-center">
                    <div class="fw-bold text-light h5 upp_nav">Вход</div>
                    <div class="fw-bold text-light h5 upp_nav">Регистрация</div>
                </div>
                <?php endif ?>
            </header>
        </div>
        <main class="d-flex main_window">
            <div class="d-none d-sm-none d-md-block col-md-2 col-lg-2 container-fluid"><a
                    href="https://carsharing-73693.web.app/" class="text-decoration-none kram_car">
                    <div class="text-center text-muted">Лучший сайт по аренде авто</div><img
                        src="./img/kram_car.jpg" class="d-block adv_pic img-fluid">
                </a></div>
            <div>
                <div>
                    <?php 
                    for ($i =0; $i < $rows; $i++) {
                        $result->data_seek($i);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo '<div class="container-fluid align-items-center pb-2 border-bottom border-danger pt-2">'.
                         '<div class="text-center h5">' .$row[title].'</div>'.
                         '<img src="'.$row[url].'"class="d-block img-fluid">'.
                         '<div class="text-center">' .$row[main_text].'</div>'.
                         '<div class="d-flex justify-content-between p-3">'.
                         '<div class="text-center h5 pt-3"> Рейтинг новости:'.$row[count].'</div>'.
                         '<div class="pt-2">'.
                            '<div class="text-center">Дата публикации:'.$row[created].'</div>'.
                            '<div class="text-center">Категория:'.$row[name].'</div>'.
                            '</div>'.
                         '</div>'.
                         '<div class="justify-content-around d-flex mt-4"><button class="btn btn-secondary"> Удалить пост
                                 </button><button class="btn btn-secondary" id="e587dc3f-579f-474c-8620-6a48c154741f">
                                     Просмотреть пост целиком </button></div>'.
                         '</div>';
                    };
                    ?>
                </div>
            </div>        
            <div class="d-none d-sm-none d-md-block col-md-2 col-lg-2 container-fluid"><a
                    href="https://hotels-1e8d2.web.app/" class="text-decoration-none adv pt-2">
                    <div class="text-center text-muted"> Бронирование отелей по всему миру </div><img
                        src="./img/peter_polyak.png" class="d-block adv_pic img-fluid h-30 pb-5">
                </a><a href="https://vue-project-movies.web.app/" class="text-decoration-none adv pt-2">
                    <div class="text-center text-muted"> Следующий шагом человечества станет фильм </div><img
                        src="./img/korsun.jpg"
                        class="d-block adv_pic img-fluid h-30 pb-5">
                </a></div>
        </main>
        <div class="container-fluid main_footer text-light">
            <footer class="d-flex container-fluid">
                <div class="container-fluid d-flex justify-content-between">
                    <div class="col-6 text-center"><span class="d-block"> email: 1234556@gmail.com </span><span> tel:
                            +1(234)333542</span></div>
                    <div class="col-6 text-center align-self-center"> @copyright </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="./my_project_files/chunk-vendors.43ea8bf7.js.Без названия"></script>
    <script src="./my_project_files/app.a08b0f0c.js.Без названия"></script>
</body>
<div class="troywell-caa"></div>

</html>