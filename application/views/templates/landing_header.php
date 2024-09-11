<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pustaka Syabab</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/images/logo/pustaka.ico" type="image/x-icon">
  <!-- custom css link -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style-prefix.css">

  <!--- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

</head>

<body>
  <div class="overlay" data-overlay></div>

  <!-- HEADER -->

  <header>

    <div class="header-top">
      <div class="container">
        <ul class="header-social-container">
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="header-main">
      <div class="container">
        <a href="#" class="header-logo">
          <img src="<?php echo base_url(); ?>/assets/images/logo/logopustaka.svg" alt="PustakaSyabab logo" width="120" height="36">
        </a>
        <div class="header-search-container">
          <input type="search" name="search" class="search-field" placeholder="Search ...">
          <button class="search-btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>
        </div>
        <div class="header-user-actions">
          <button class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
          </button>
          <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>
            <span class="count">0</span>
          </button>
          <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">0</span>
          </button>
        </div>
      </div>
    </div>

    <nav class="desktop-navigation-menu">
      <div class="container">
        <ul class="desktop-menu-category-list">
          <li class="menu-category">
            <a href="#" class="menu-title">Home</a>
          </li>
          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>
            <div class="dropdown-panel">
              <ul class="dropdown-panel-list">
                <li class="menu-title">
                  <a href="#">Electronics</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Desktop</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Laptop</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Camera</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Tablet</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Headphone</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">
                    <img src="<?php echo base_url(); ?>/assets/images/electronics-banner-1.jpg" alt="headphone collection" width="250" height="119">
                  </a>
                </li>
              </ul>
              <ul class="dropdown-panel-list">
                <li class="menu-title">
                  <a href="#">Men's</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Formal</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Casual</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Sports</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Jacket</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Sunglasses</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">
                    <img src="<?php echo base_url(); ?>/assets/images/mens-banner.jpg" alt="men's fashion" width="250" height="119">
                  </a>
                </li>
              </ul>
              <ul class="dropdown-panel-list">
                <li class="menu-title">
                  <a href="#">Women's</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Formal</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Casual</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Perfume</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Cosmetics</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Bags</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">
                    <img src="<?php echo base_url(); ?>/assets/images/womens-banner.jpg" alt="women's fashion" width="250" height="119">
                  </a>
                </li>
              </ul>
              <ul class="dropdown-panel-list">
                <li class="menu-title">
                  <a href="#">Electronics</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Smart Watch</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Smart TV</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Keyboard</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Mouse</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">Microphone</a>
                </li>
                <li class="panel-list-item">
                  <a href="#">
                    <img src="<?php echo base_url(); ?>/assets/images/electronics-banner-2.jpg" alt="mouse collection" width="250" height="119">
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="menu-category">
            <a href="#" class="menu-title">Blog</a>
          </li>
          <li class="menu-category">
            <a href="#" class="menu-title">Hot Offers</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="mobile-bottom-navigation">
      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>
      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>
        <span class="count">0</span>
      </button>
      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>
      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>
        <span class="count">0</span>
      </button>
      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>
    </div>
    <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu>
      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>
        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>
      <ul class="mobile-menu-category-list">
        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>
            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>
          <ul class="submenu-category-list" data-accordion>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>
          </ul>
        </li>
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>
            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>
          <ul class="submenu-category-list" data-accordion>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>
          </ul>
        </li>
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>
            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>
          <ul class="submenu-category-list" data-accordion>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>
          </ul>
        </li>
        <li class="menu-category">
          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>
            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>
          <ul class="submenu-category-list" data-accordion>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>
          </ul>
        </li>
        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>
        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>
      </ul>

      <div class="menu-bottom">
        <ul class="menu-social-container">
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <main>