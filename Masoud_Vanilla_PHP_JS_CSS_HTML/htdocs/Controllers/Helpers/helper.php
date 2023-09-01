<?php
include_once "Controllers/controller.php";

#region Enums

// Enum NameType
enum NameType
{
    case FirstName;
    case LastName;
}

#endregion

#region Classes

class KeyValueEntry
{
    private $key;
    private $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}

class Helper
{
    #region fields
    #endregion

    #region Properties
    #endregion

    #region Constructers
    #endregion

    #region Methods

    // Validation of checkboxes.
    public function validateCheckboxes(string $checkBox1, string $checkBox2): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }
        return $checkBox1 === 'checked' && $checkBox2 === 'checked';
    }

    // Email validation
    public function validateEmail(string $email, string &$error): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }
        if (empty($email)) {
            $error = 'Bitte Email eingeben!';
            return false;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Check if e-mail address is well-formed
            $error = 'Bitte eine Email mit gültigem Format eingeben!';
            return false;
        }
        return true;
    }

    // Validation if the Email already exists.
    public function validateEmailExists(string $email, string &$error): bool
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

    // Name validation
    public function validateName(string $name, NameType $nameType, string &$error): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }
        // Name validation
        if (empty($name)) {
            if ($nameType === NameType::FirstName) {
                $error = 'Bitte Vorname eingeben!';
            } else if ($nameType === NameType::LastName) {
                $error = 'Bitte Nachname eingeben!';
            }
            return false;
        } else if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            // Check if name only contains letters and whitespace
            if ($nameType === NameType::FirstName) {
                $error = 'Nur Buchstaben und Leerzeichen sind erlaubt.';
            } else if ($nameType === NameType::LastName) {
                $error = 'Nur Buchstaben und Leerzeichen sind erlaubt.';
            }
            return false;
        }
        return true;
    }

    // Password validation
    public function validatePassword(string $password, string $repeatPassword, string &$error, string &$error_repeate): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if ($password != $repeatPassword) {
            $error = 'Passwörter sind nicht identisch!';
            $error_repeate = 'Passwörter sind nicht identisch!';
            return false;
        } else if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            //$error = 'Passwort muss mindestens 8 Zeichen lang sein, einen Großbuchstaben, einen Kleinbuchstaben, eine Ziffer und ein Sonderzeichen enthalten!';
            //return false;
        }
        return true;
    }

    public function validatePasswordIsNotEmpty(string $password, string &$error): bool
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return false;
        }
        if (empty($password)) {
            $error = 'Bitte Passwort eingeben!';
            return false;
        }
        return true;
    }

#endregion
}

class UserFormDto
{
    #region Field
    #endregion

    #region Properties

    public string $Gender = "";
    public string $FirstName = "";
    public string $LastName = "";
    public string $Email = "";
    public string $Password = "";
    public string $PasswordRepeat = "";
    public string $RegistrationDate = "";
    public string $Datenschutz = "";
    public string $Geschaeftsbedingung = "";
    public string $FirstName_error = "";
    public string $LastName_error = "";
    public string $Email_error = "";
    public string $Password_error = "";
    public string $PasswordRepeat_error = "";

#endregion

#region Constructers
#endregion

#region Methods 
#endregion
}

#endregion
?>