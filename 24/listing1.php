<?php
$page_title = isset($page_title) ? $page_title : "";

// ...
session_start();
}
?>
<nav class="navbar sticky-top navbar-expand-md navbar-dark"
     style="background-color: #569f32;">
    <a class="navbar-brand" href=<?= dirname($_SERVER['PHP_SELF']) ?>>
        <img src="resources/movie_rental_icon.png" width="30" height="30"
             class="d-inline-block align-top" alt="">
        <?= MR_HOME_PAGE ?>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link<?= $page_title == MR_HOME_PAGE ? ' active' : '' ?>"
               href=<?= dirname($_SERVER['PHP_SELF']) ?>>Home </a>
        </div>
    </div>
</nav>