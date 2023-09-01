<?php
include_once "controller.php";
include_once "Helpers/helper.php";

class LoginManager
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

    public function login(UserFormDto $userFormDto): void
    {
        $isValid = Controller::Instance()->Helper->validateEmail($userFormDto->Email, $userFormDto->Email_error) === true;
        $isValid &= Controller::Instance()->Helper->validatePasswordIsNotEmpty($userFormDto->Password, $userFormDto->Password_error) === true;

        if ($isValid) {
            $isValid &= $this->validateLoginPassword($userFormDto->Email, $userFormDto->Password, $userFormDto->Password_error) === true;
        }

        if ($isValid) {
            $user = Controller::Instance()->DatabaseDataAccess->getUserByEmail($userFormDto->Email);

            if ($user !== null) {
                Controller::Instance()->SessionManager->setUserSession($user);

                // Redirect to products
                Controller::Instance()->NavigationManager->navigateToPage(Page::Products);
            } else {
                // TODO Redirect to crash page
                Controller::Instance()->NavigationManager->navigateToPage(Page::Crash);
            }
        } else if (!empty($userFormDto->Email) && !empty($userFormDto->Password)) {
            $userFormDto->Email_error = "Email oder Passwort ist falsch.";
        }
    }

    private function validateLoginPassword(string $userEmail, string $passwordUserInput, string &$error): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }

        // Get the password from DB
        $passwordFromDB = Controller::Instance()->DatabaseDataAccess->getPassword($userEmail);

        // Validate password
        $isCorrect = password_verify($passwordUserInput, $passwordFromDB);
        if (!$isCorrect) {
            $error = "Email oder Passwort ist falsch.";
        }

        return $isCorrect;
    }

#endregion
}
?>