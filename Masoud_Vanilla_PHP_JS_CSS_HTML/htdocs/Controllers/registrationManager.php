<?php
include_once "controller.php";

// Registration
class RegistrationManager
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

    public function register(UserFormDto $userFormDto): void
    {
        $isValid = Controller::Instance()->Helper->validateName($userFormDto->FirstName, NameType::FirstName, $userFormDto->FirstName_error) === true;
        $isValid &= Controller::Instance()->Helper->validateName($userFormDto->LastName, NameType::LastName, $userFormDto->LastName_error, ) === true;
        $isValid &= Controller::Instance()->Helper->validateEmail($userFormDto->Email, $userFormDto->Email_error) === true;
        $isValid &= Controller::Instance()->Helper->validatePassword($userFormDto->Password, $userFormDto->PasswordRepeat, $userFormDto->Password_error, $userFormDto->PasswordRepeat_error) === true;
        $isValid &= Controller::Instance()->Helper->validateCheckboxes($userFormDto->Datenschutz, $userFormDto->Geschaeftsbedingung) === true;

        if ($isValid) {
            $isValid &= $this->existsEmail($userFormDto->Email, $userFormDto->Email_error) == false;
        }

        if ($isValid) {
            $tempUser = new user();
            $tempUser->FirstName = $userFormDto->FirstName;
            $tempUser->LastName = $userFormDto->LastName;
            $tempUser->Email = $userFormDto->Email;
            $tempUser->Password = $userFormDto->Password;
            $tempUser->RegistrationDate = $userFormDto->RegistrationDate;
            $tempUser->Gender = $userFormDto->Gender;

            // Add user into database
            $user = Controller::Instance()->DatabaseDataAccess->addUser($tempUser);

            // Set user logedin into session
            if ($user !== null) {
                Controller::Instance()->SessionManager->setUserSession($user);

                // Redirect to products
                Controller::Instance()->NavigationManager->navigateToPage(Page::Products);
            } else {
                // TODO Redirect to crash page
                Controller::Instance()->NavigationManager->navigateToPage(Page::Crash);
            }
        }
    }

    // Validation if the Email already exists.
    private function existsEmail(string $email, string &$error): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return true;
        }
        if (Controller::Instance()->DatabaseDataAccess->existsUserEmail($email) !== false) {
            $error = 'Die Email existiert bereits!';
            return true;
        }
        return false;
    }

#endregion
}
?>