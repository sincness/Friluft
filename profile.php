<?php
    include 'content/includes/functions/get_profile_data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="content/css/profile.css">
</head>
<body>
<form name="searchBox">
    <input type="text" name="search" placeholder="Søg.." id="search">
</form>
<div class="search__dropdown">
    <a href="#">asd</a>
</div>
    <section class="profile">
        <section class="profile__info">
            <figure class="profile__fig">
                <img class="profile__img" src="https://placeimg.com/640/480/any" alt="">
            </figure>
            <article class="profile__text">
                <h1 class="profile__text-name"><?php echo $username ?></h1>
                <p class="profile__text-last--online">Sidst aktiv: 25-09-2019</p>
                <p class="profile__text-city"><span class="profile__text-postnr"><?php echo $postnumber?></span> <?php echo $city ?></p>
                <p class="profile__text-tel"><span class="profile__text-telnr">Tel:</span> <?php echo $phone ?></p>
                <i class="fas fa-star profile__text-star"></i>
                <button type="button" class="profile__text-send-msg">Send besked</button>
            </article>
        </section>
        <section class="profile__articles">
            <h2 class="profile__articles-header">Annocner</h2>
            <section class="profile-articles-article-container">
<!-- 
                <div class="profile__articles-article">
                    <a class="profile__articles-article-link" href="#">this is a test</a>
                    <p class="profile__articles-article-description">Text</p>
                    <p class="profile__articles-article-price">100,-</p>
                    <figure class="profile__articles-fig">
                        <img class="profile__articles-img" src="https://placeimg.com/640/480/any" alt="">
                    </figure>
                </div>
                <p class="profile__articles-article-show">Vis flere</p> -->
                <p class="profile__articles-article-no-show">Jens Hansen har ingen annoncer.</p>
            </section>
        </section>
    </section>
    <script src="https://kit.fontawesome.com/4a0535102f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="content/js/main.js"></script>
</body>
</html>