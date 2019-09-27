<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="content/css/nav.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="content/css/profile.css">
    <title>Navigation</title>
</head>

<body>
    <nav class="nav">
        <form class="nav__src" action="">
            <input class="nav__src-input" autocomplete="off" type="text" placeholder="Søg.." navn="search" id="search">
            <button class="nav__src-btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <div class="search__dropdown">
            <a href="#">asd</a>
        </div>
        <i class="fas fa-bars"></i>

        <ul class="nav__menu">
            <li class="nav__list"><a href="">Jagt <i class="down"></i></a>
                <ul class="nav__menu-dropdown">
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiske tilbehør</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiskestænger</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiskehjul</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Andet</a></li>
                </ul>
            </li>
            <li class="nav__list"><a href="">Fiskeri<i class="down"></i></a>
                <ul class="nav__menu-dropdown">
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiske tilbehør</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiskestænger</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Fiskehjul</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Andet</a></li>
                </ul>
            </li>
            <li class="nav__list"><a href="">Fritid<i class="down"></i></a>
                <ul class="nav__menu-dropdown">
                        <li class="nav__menu-dropdown-list-item"><a href="">Outdoor-tilbehør</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Telte</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Belædning</a></li>
                        <li class="nav__menu-dropdown-list-item"><a href="">Andet</a></li>
                    </li>
                </ul>
            </li>
        </ul>
        <input class="nav__btn" type="button" value="Opret annonce">
        <a class="nav__login-link" href="register.php">Opret/Login</a>
    </nav>
    <script src="https://kit.fontawesome.com/ac1a08b6ce.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="content/js/main.js"></script>
</body>

</html>