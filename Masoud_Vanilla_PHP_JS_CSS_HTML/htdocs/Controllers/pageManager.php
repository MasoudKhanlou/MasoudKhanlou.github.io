<?php
include_once "controller.php";

class PageManager
{
    #region Fields
    #endregion

    #region Properties
    #endregion

    #region Constructors

    public function __construct()
    {
        // Initializations

        // Events
    }

    #endregion

    #region Methods

    public function excecuteGeneralPageExitRoutines(): void
    {
        Controller::Instance()->SessionManager->endSession();

        Controller::Instance()->NavigationManager->navigateToPage(Page::Login);

        // TODO Reset all user specific stuff.
    }

    public function excecuteGeneralPageLoadingRoutines(Page $sourcePage, bool $isLoggedinRequired): void
    {
        // TODO Disable Response Cache: Should we do that?

        // TODO Show Application Information: If we want to display any version information or something similar.

        // Check User Login State
        $userLoginState = Controller::Instance()->SessionManager->checkUserLoginState();

        // If loggedin is required for the current page and user is not loggenin, navigate to the login page.
        if ($isLoggedinRequired && $userLoginState === LoginState::Loggedout) {
            Controller::Instance()->NavigationManager->navigateToPage(Page::Login);
        }
        // If loggedin is not required for the current page and user is loggenin and the target page is login, navigate to the logout page.
        else if ($isLoggedinRequired === false && $userLoginState === LoginState::Loggedin && $sourcePage === Page::Login) {
            Controller::Instance()->NavigationManager->navigateToPage(Page::Logout);
        }

        // Show loggedin user information e.g. user full name or similar instead of login icon after user is logged in.
        Controller::Instance()->SessionManager->showLoggedinUserInformation();

        // TODO $menuAndPageAuthorizations = new Authorizations.MenuAndPageAuthorizations();

        // TODO Highlight menu buttons if needed.
    }

#endregion
}
?>