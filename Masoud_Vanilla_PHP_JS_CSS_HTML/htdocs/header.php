<!--Start naigation left site-->
<div class="header">
  <nav class="header-nav-left">
    <ul class="link-main-left">
      <!--later comes logo here
          <img src="" alt="" />
          the next span is just as place holder of Logo
          ------------------>
      <li class="header-link-left">
      <span><a href="index.php"><img class="logo-homePage" src="Static-Icons/Icons/learnoo.svg" alt=""> </a></span>
      </li>
      <li class="header-link-left">
        <a class="nav-link-left-produkte" href="products.php">Produkte</a>
      </li>
    </ul>
  </nav>
  <!--Start naigation center-->
  <!--Start Search Box appearing-->
  <nav class="link-main-center">
    <div class="header-search-box hidden">
      <input id="input-search" class="search-box" type="text" placeholder="Suche ..." onclick="showDropDown();" />
      <div class="drop-box-container drop-box-visible">
        <div id="dropdownSearchBox" class="dropdown-search-box">
          <ul>
            <li onclick="dropDownSearchItemClick(this);">Masoud</li>
            <li onclick="dropDownSearchItemClick(this);">Khashi</li>
            <li onclick="dropDownSearchItemClick(this);">Ami</li>
            <li onclick="dropDownSearchItemClick(this);">wwwhtml</li>
            <li onclick="dropDownSearchItemClick(this);">salam</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
            <li onclick="dropDownSearchItemClick(this);">serviece</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="header-search-close-icon hidden">
      <button class="search-start-close header-back-to-normal nav-btn" onclick="backToMain();">
        <span class="material-symbols-outlined"> close </span>
      </button>
    </div>
  </nav>
  <!--End Search Box appearing-->
  <!--Start naigation right site-->
  <nav class="header-nav-right">
    <ul class="link-main-right">
      <li class="header-link-support search-start">
        <a href="support.php" class="nav-link-right">Support</a>
      </li>
      <li class="header-link-right-search">
        <button class="nav-btn">
          <span class="material-symbols-outlined change-search-icon" onclick="showHideSearch()">
            search
          </span>
        </button>
      </li>
      <li class="header-link-right-shopping-cart">
        <a clss="nav-link" href="shoppingcard.php"><span class="material-symbols-outlined"> shopping_cart </span></a>
      </li>
      <li class="header-link-right">
        <a clss="nav-link-account-circle" href="login.php"><span class="material-symbols-outlined"> account_circle
          </span></a>
      </li>
    </ul>
  </nav>
</div>
<!--End naigation-->
<style>
  /* Styling Headers*/
  /*General Heading Setting */
  .header {
    position: fixed;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5rem;
    width: 100%;
    height: 4.4rem;
    background-color: #343434;
    color: #d6d6d6;
    font-weight: 30;
    z-index: 500;
    opacity: 0.97;
  }

  /* Sticky by scrolling navigation stays in the same position*/
  .header-main {
    position: fixed;
    top: 0;
    bottom: 0;
    width: 100%;
    z-index: 999;
    /* Header transparncy*/
    opacity: 0.988;
    padding-left: 0;
    padding-right: 0;
  }

  .logo-homePage{
    width:8rem;
    height: 14rem;
    margin-top:1.8rem;
  }

  /* Icons situation */
  .material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 300, "GRAD" 0, "opsz" 48;
  }

  /*Buttons and links Hover*/
  .nav-btn:link,
  .nav-btn:visited,
  .header a:link,
  .header a:visited,
  .footer-container a:link,
  .footer-container a:visited,
  .dropdown-search-box li {
    color: #d6d6d6;
    text-decoration: none;
    transition-duration: 0.5s;
    margin-right: 2rem;
  }

  .nav-btn:hover,
  .nav-btn:active,
  .header a:hover,
  .header a:active,
  .footer-container a:hover,
  .footer-container a:active,
  .dropdown-search-box li {
    color: #f9f9f9;
    font-weight: 100;
  }

  .nav-btn {
    background-color: #343434;
    color: #d6d6d6;
    border: none;
    cursor: pointer;
  }

  /* The Heading is a flex box which consists 3 seprated Flex Boxes Right,Center and Left*/
  /* Left and right*/
  .link-main-right,
  .link-main-left,
  .link-main-center {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 0rem;
    list-style: none;
    font-size: 1.2rem;
    letter-spacing: 0.5px;
  }

  .header-link-right-shopping-cart {
    padding-left: 1.8rem;
  }

  .logo {
    margin-right: 2rem;
  }

  .hidden {
    display: none;
  }

  /* SearchBox appearing*/
  .search-box {
    border: none;
    outline: none;
    width: 37.5rem;
    background-color: #343434;
    margin-left: 5rem;
    padding-left: 4.3rem;
    font-size: 1.2rem;
    color: #d6d6d6;
    border-radius: 0.5rem;
  }

  /*Serach Box dropdown it is define as a pop up page*/
  /*Search Drop Down*/
  .dropdown-search-box {
    width: 38rem;
    height: 30rem;
    overflow-y: scroll;
    background-color: #343434;
    border-bottom-left-radius: 1rem;
    border-bottom-right-radius: 1rem;
    font-size: 1.2rem;
    opacity: 0.9;
    z-index: 10 overflow;
  }

  .dropdown-search-box ul {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .dropdown-search-box li {
    list-style: none;
    padding: 0.8rem 3rem;
    width: 100%;
    height: 40%;
    cursor: default;
    z-index: 20;
  }

  .dropdown-search-box li:hover {
    border-radius: 0.5rem;
    color: #343434;
    background: #d6d6d6;
  }

  .drop-box-container {
    position: fixed;
    display: block;
    justify-content: center;
    align-items: center;
    margin-left: 6.5rem;
    margin-top: 1.5rem;
    z-index: 10;
  }

  .drop-box-visible {
    display: none;
  }
</style>