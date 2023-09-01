<?php
include_once "controller.php";

class AccountManager
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

    public function getUserAccount() : user
    {
        $email = Controller::Instance()->SessionManager->getUserSession()->Email;

        $userDto = Controller::Instance()->DatabaseDataAccess->getUserByEmail($email);

        return $userDto;
    }

    public function updateUserAccount(user $userInfo) : void
    {
        $user = Controller::Instance()->DatabaseDataAccess->updateUserData($userInfo);

        // Set user logedin into session
        if ($user !== null) {
            Controller::Instance()->SessionManager->setUserSession($user);
        }
    }

    #end region
}
