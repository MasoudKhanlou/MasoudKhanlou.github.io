<?php
include_once "controller.php";
include_once "Helpers/helper.php";

class DatabaseConnection
{
    #region Fields

    private static string $dbServername = "localhost";
    private static string $dbUsername = "root";
    private static string $dbPassword = "";
    private static string $dbName = "lbl_database";

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

    public function closeConnection(mysqli $conn): void
    {
        try {
            $conn = mysqli_close($conn);
        } catch (Exception $exc) {
            throw new Exception("Closing connection to Server failed:" . mysqli_connect_error() . $exc);
        }
    }

    public function openConnection(): mysqli
    {
        try {
            $conn = mysqli_connect(self::$dbServername, self::$dbUsername, self::$dbPassword, self::$dbName);
        } catch (Exception $exc) {
            throw new Exception("Connecting to Server failed:" . mysqli_connect_error() . $exc);
        }
        return $conn;
    }

    #endregion
}

class DatabaseDataAccess
{
    #region Fields
    #endregion Fields

    #region Properties

    public readonly DatabaseConnection $DatabaseConnection;
    public readonly DatabaseDataMapper $DatabaseDataMapper;

    #endregion Properties

    #region Constructors

    public function __construct()
    {
        // Initializations
        $this->DatabaseConnection = new DatabaseConnection();
        $this->DatabaseDataMapper = new DatabaseDataMapper();

        // Events
    }

    #endregion Constructors

    #region Methods

    #region Image

    public function addOrUpdateUserImage($base64Value, $fileName, $fileType)
    {
        $userId = Controller::Instance()->SessionManager->getUserSession()->Id;
        $selectQuery = "SELECT UserId FROM userimage WHERE UserId = $userId;";
        try {
            $conn = $this->DatabaseConnection->openConnection();
            $result = mysqli_query($conn, $selectQuery)->fetch_all(MYSQLI_ASSOC);
            if (empty($result)) {
                $currentDateTime = date('Y-m-d H:i:s');
                $tempUserImage = new userImage();
                $tempUserImage->Creation = $currentDateTime;
                $tempUserImage->Image = $base64Value;
                $tempUserImage->ImageFileType = $fileType;
                $tempUserImage->ImageName = $fileName;
                $tempUserImage->LastUpdate = $currentDateTime;
                $tempUserImage->UserId = $userId;
                $insertQuery = $this->DatabaseDataMapper->createInsertQuery($tempUserImage, array("Id"));
                mysqli_query($conn, $insertQuery);
            } else if (!empty($result)) {
                $currentDateTime = date('Y-m-d H:i:s');
                $updateQuery = "UPDATE userimage SET Image = '$base64Value', LastUpdate = '$currentDateTime', ImageName = '$fileName', ImageFileType = '$fileType' WHERE UserId = $userId;";
                mysqli_query($conn, $updateQuery);
            }
        } catch (Exception $exp) {
            throw $exp;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
    }

    public function deleteUserImage(): void
    {
        $userId = Controller::Instance()->SessionManager->getUserSession()->Id;
        $deleteQuery = $this->DatabaseDataMapper->createDeleteQuery(new userImage(), "WHERE UserId = '$userId'");
        try {
            $conn = $this->DatabaseConnection->openConnection();
            mysqli_query($conn, $deleteQuery);
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
    }

    public function getUserImage() : string
    {
        $userImage = "";
        $userSession = Controller::Instance()->SessionManager->getUserSession();
        if ($userSession === null)
        {
            return $this->getDefaultUserImage("Herr");
        }

        $userId = $userSession->Id;
        $gender = $userSession->Gender;
        $selectQuery = "SELECT Image FROM userimage WHERE UserId = $userId";
        try {
            $conn = $this->DatabaseConnection->openConnection();
            $result = mysqli_query($conn, $selectQuery)->fetch_all(MYSQLI_ASSOC);
            if (empty($result)) {
                $userImage = $this->getDefaultUserImage($gender);
            } 
            foreach ($result as $row) {
                $imageBase64 = $row['Image'];
                $userImage = (string)$imageBase64;
            }
        } catch (Exception $exp) {
            throw $exp;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
            return $userImage;
        }
    }

    private function getDefaultUserImage(string $gender) : string
    {
        if ($gender === 'Frau') {
            $path = getcwd() . '\Pictures\defaultWoman.png';
            $openImage = fopen($path, 'r');
            $defaultImage = fread($openImage, filesize($path));
            $defaultImage = base64_encode($defaultImage);
            return $defaultImage;
        } else {
            $path = getcwd() . '\Pictures\defaultMan.jpg';
            $openImage = fopen($path, 'r');
            $defaultImage = fread($openImage, filesize($path));
            $defaultImage = base64_encode($defaultImage);
            return $defaultImage;
        }
    }

    #endregion Image
    
    #region User

    public function addUser(user $tempUser): ?user
    {
        $user = null;
        $tempUser->Password = password_hash($tempUser->Password, CRYPT_SHA512);
        $insertQuery = $this->DatabaseDataMapper->createInsertQuery($tempUser, array("Birthday", "City", "Country", "HouseNumber", "Id", "PhoneNumber", "PLZ", "Street"));
        try {
            $conn = $this->DatabaseConnection->openConnection();
            mysqli_query($conn, $insertQuery);
            $user = $this->getUserByEmail($tempUser->Email);
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
        return $user;
    }

    public function checkSqlInjectionForUserInputs($userInputs)
    {
        try {
            $count = count($userInputs);
            $conn = $this->DatabaseConnection->openConnection();
            for ($index = 0; $index < $count; $index++) {
                $userInputs[$index] = mysqli_real_escape_string($conn, $userInputs[$index]);
            }
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
    }

    public function existsUserEmail(string $email): ?bool
    {
        $exists = null;
        $selectQuery = "SELECT Email FROM user WHERE Email='$email';";
        try {
            $conn = $this->DatabaseConnection->openConnection();
            $result = mysqli_query($conn, $selectQuery);
            $exists = 0 < mysqli_num_rows($result);
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
        return $exists;
    }

    public function getMaxLegthOfUserFields(): userFieldsMaxLength
    {
        $userFieldsMaxLength = new userFieldsMaxLength();

        $selctLengthQuery = "SELECT COLUMN_NAME AS KeyValueEntry, CHARACTER_MAXIMUM_LENGTH AS Value FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'lbl_database' AND TABLE_NAME='user' AND DATA_TYPE = 'varchar'; ";
        try {
            $conn = $this->DatabaseConnection->openConnection();
            $result = mysqli_query($conn, $selctLengthQuery)->fetch_all(MYSQLI_ASSOC);

            foreach ($result as $row) {
                $key = $row['KeyValueEntry'];
                $value = (int) $row['Value'];

                if ($key === $userFieldsMaxLength->FirstNameAndMaxLength->getKey()) {
                    $userFieldsMaxLength->FirstNameAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->LastNameAndMaxLength->getKey()) {
                    $userFieldsMaxLength->LastNameAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->EmailAndMaxLength->getKey()) {
                    $userFieldsMaxLength->EmailAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->PasswordAndMaxLength->getKey()) {
                    $userFieldsMaxLength->PasswordAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->StreetAndMaxLength->getKey()) {
                    $userFieldsMaxLength->StreetAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->HouseNumberAndMaxLength->getKey()) {
                    $userFieldsMaxLength->HouseNumberAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->CityAndMaxLength->getKey()) {
                    $userFieldsMaxLength->CityAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->PLZAndMaxLength->getKey()) {
                    $userFieldsMaxLength->PLZAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->CountryAndMaxLength->getKey()) {
                    $userFieldsMaxLength->CountryAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->PhoneNumberAndMaxLength->getKey()) {
                    $userFieldsMaxLength->PhoneNumberAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->CompanyAndMaxLength->getKey()) {
                    $userFieldsMaxLength->CompanyAndMaxLength->setValue($value);
                } elseif ($key === $userFieldsMaxLength->TitleAndMaxLength->getKey()) {
                    $userFieldsMaxLength->TitleAndMaxLength->setValue($value);
                }
            }
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }

        return $userFieldsMaxLength;
    }

    public function getPassword($userEmail)
    {
        try {
            $conn = $this->DatabaseConnection->openConnection();

            $selectPasswordQuery = "SELECT Password FROM user WHERE Email = '$userEmail';";
            $passValueArray = mysqli_query($conn, $selectPasswordQuery);
            foreach ($passValueArray as $value) {
                $passValue = $value['Password'];
                return $passValue;
            }
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
    }

    public function getUserByEmail(string $email): ?user
    {
        $user = null;
        $selectQuery = $this->DatabaseDataMapper->createSelectQuery(new user(), "WHERE Email = '$email'");
        try {
            $conn = $this->DatabaseConnection->openConnection();
            $result = mysqli_query($conn, $selectQuery);
            $row = $result->fetch_assoc();
            $user = new user();
            $this->DatabaseDataMapper->mapp($row, $user);
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
        return $user;
    }

    public function updateUserData(user $user): ?user
    {
        $updataQuery = $this->DatabaseDataMapper->createUpdateQuery($user, array("Id"), "where Email = '$user->Email'");
        try {
            $conn = $this->DatabaseConnection->openConnection();
            mysqli_query($conn, $updataQuery);
            $user = $this->getUserByEmail($user->Email);
        } catch (Exception $exc) {
            throw $exc;
        } finally {
            $this->DatabaseConnection->closeConnection($conn);
        }
        return $user;
    }

    #endregion User
    
    #endregion Methods
}

class DatabaseDataMapper
{
    #region Fields
    #endregion Fields

    #region Properties
    #endregion Properties

    #region Constructors

    public function __construct()
    {
        // Initializations

        // Events
    }

    #endregion Constructors

    #region Methods

    function createDeleteQuery($entity, string $whereExpression): string
    {
        $reflection = new ReflectionClass($entity);
        $query = "DELETE FROM {$reflection->getName()} {$whereExpression};";
        
        return $query;
    }

    function createInsertQuery($entity, array $columnsToSkip): string
    {
        $query = "";
        $columns = "";
        $values = "";
        $reflection = new ReflectionClass($entity);
        $entityProperties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
        foreach ($entityProperties as $property) {
            // Skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $reflection->getName()) {
                continue;
            }
            // Skip columns to skip
            if (in_array($property->getName(), $columnsToSkip)) {
                continue;
            }

            if (0 < strlen($columns)) {
                $columns .= ", ";
            }
            $columns .= "{$property->getName()}";

            if (0 < strlen($values)) {
                $values .= ", ";
            }
            $values .= "'{$reflection->getProperty($property->getName())->getValue($entity)}'";
        }

        if (0 < strlen($columns) && 0 < strlen($values)) {
            $query = "INSERT INTO {$reflection->getName()} ({$columns}) VALUES ({$values});";
        }

        return $query;
    }

    function createSelectQuery($entity, string $whereExpression): string
    {
        $query = "";
        $reflection = new ReflectionClass($entity);
        $entityProperties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
        foreach ($entityProperties as $property) {
            // Skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $reflection->getName()) {
                continue;
            }

            if (0 < strlen($query)) {
                $query .= ", ";
            }
            $query .= "{$property->getName()}";
        }

        if (0 < strlen($query)) {
            $query = "SELECT {$query} FROM {$reflection->getName()} {$whereExpression};";
        }

        return $query;
    }

    function createUpdateQuery($entity, array $columnsToSkip, string $whereExpression): string
    {
        $query = "";
        $reflection = new ReflectionClass($entity);
        $entityProperties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
        foreach ($entityProperties as $property) {
            // Skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $reflection->getName()) {
                continue;
            }
            // Skip columns to skip
            if (in_array($property->getName(), $columnsToSkip)) {
                continue;
            }

            if (0 < strlen($query)) {
                $query .= ", ";
            }
            $query .= "{$property->getName()} = '{$reflection->getProperty($property->getName())->getValue($entity)}'";
        }

        if (0 < strlen($query)) {
            $query = "UPDATE {$reflection->getName()} SET {$query} {$whereExpression};";
        }

        return $query;
    }

    function mapp(array $source, &$targetEntity)
    {
        $reflection = new ReflectionClass($targetEntity);
        $entityProperties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
        foreach ($entityProperties as $property) {
            // Skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $reflection->getName()) {
                continue;
            }

            $reflection->getProperty($property->getName())->setValue($targetEntity, $source[$property->getName()]);
        }
    }

    #endregion Methods
}

#region Entities

class user
{
    public ?string $Birthday;
    public ?string $City;
    public ?string $Country;
    public string $Email;
    public string $FirstName;
    public string $Gender;
    public ?string $HouseNumber;
    public int $Id;
    public string $LastName;
    public ?string $Password;
    public ?string $PhoneNumber;
    public ?string $PLZ;
    public ?string $RegistrationDate;
    public ?string $Street;
}

class userFieldsMaxLength
{
    public KeyValueEntry $CityAndMaxLength;
    public KeyValueEntry $CompanyAndMaxLength;
    public KeyValueEntry $CountryAndMaxLength;
    public KeyValueEntry $EmailAndMaxLength;
    public KeyValueEntry $FirstNameAndMaxLength;
    public KeyValueEntry $HouseNumberAndMaxLength;
    public KeyValueEntry $LastNameAndMaxLength;
    public KeyValueEntry $PasswordAndMaxLength;
    public KeyValueEntry $PhoneNumberAndMaxLength;
    public KeyValueEntry $PLZAndMaxLength;
    public KeyValueEntry $StreetAndMaxLength;
    public KeyValueEntry $TitleAndMaxLength;

    public function __construct()
    {
        // Initializations
        $this->CityAndMaxLength = new KeyValueEntry("City", 0);
        $this->CompanyAndMaxLength = new KeyValueEntry("Company", 0);
        $this->CountryAndMaxLength = new KeyValueEntry("Country", 0);
        $this->EmailAndMaxLength = new KeyValueEntry("Email", 0);
        $this->FirstNameAndMaxLength = new KeyValueEntry("FirstName", 0);
        $this->HouseNumberAndMaxLength = new KeyValueEntry("HouseNumber", 0);
        $this->LastNameAndMaxLength = new KeyValueEntry("LastName", 0);
        $this->PasswordAndMaxLength = new KeyValueEntry("Password", 0);
        $this->PhoneNumberAndMaxLength = new KeyValueEntry("PhoneNumber", 0);
        $this->PLZAndMaxLength = new KeyValueEntry("PLZ", 0);
        $this->StreetAndMaxLength = new KeyValueEntry("Street", 0);
        $this->TitleAndMaxLength = new KeyValueEntry("Title", 0);
    }
}

class userImage
{
    public string $Creation;
    public int $Id;
    public string $Image;
    public string $ImageFileType;
    public string $ImageName;
    public string $LastUpdate;
    public ?int $UserId;
}

#endregion Entities
