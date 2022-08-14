<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-laptop"></i>
            ALE<span>DROGO</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header bg-dark">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    <i class="fas fa-grip-horizontal"></i>
                    ALEDROGO MENU</h5>
                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body bg-dark">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fas fa-home"></i>
                            Strona główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            Koszyk
                                <?php

                                if (isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-black\">$count</span>";
                                }else{
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-black\">0</span>";
                                }

                                ?>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-laptop"></i>
                            Komputery i laptopy
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="category.php?category=komputer">Komputery</a></li>
                            <li><a class="dropdown-item" href="category.php?category=laptop">Laptopy</a></li>
                            <li><a class="dropdown-item" href="category.php?category=tablet">Tablety</a></li>
                            <li><a class="dropdown-item" href="category.php?category=telefon">Telefony</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-headphones "></i>
                            Akcesoria
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="category.php?category=myszka">Myszki</a></li>
                            <li><a class="dropdown-item" href="category.php?category=klawiatura">Klawiatury</a></li>
                            <li><a class="dropdown-item" href="category.php?category=sluchawki">Słuchawki</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="search.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Czego szukamy?" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Szukaj</button>
                </form>
            </div>
        </div>
    </div>
</nav>