<?php
    include_once "controller.php";
    include_once "Helpers/helper.php";

    #region Enums

    // Enum NameType
    enum Page : string
    {
       case AboutUs = "aboutUs";

       case Account = "account";

       case AGB = "AGB";

       case Crash = "crash";

       case Datenschutz = "datenschutz";

       case Impressum = "impressum";

       case Index = "index";

       case Login = "login";

       case Logout = "logout";

       case PasswordRecovering = "passwordRecovering";

       case PasswordReset = "passwordReset";

       case Products = "products";

       case Registration = "registration";

       case ShoppingCard = "shoppingCard";

       case Support = "support";
    }

    #endregion

    class NavigationManager
    {
        #region Field
        #endregion

        #region Properties
        #endregion

        #region Constructers

        public function __construct()
        {
            // Initializations

            // Events
        }

        #endregion

        #region Methods

        public function navigateToPage(Page $page) :void
        {
            header("Location:{$page->value}.php");
        }

        #endregion
    }
?>