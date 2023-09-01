<?php
include_once "accountManager.php";
include_once "databaseManager.php";
include_once "fileManeger.php";
include_once "Helpers/helper.php";
include_once "loginManager.php";
include_once "navigationManager.php";
include_once "pageManager.php";
include_once "registrationManager.php";
include_once "sessionManager.php";

class Controller
{
    #region Fields

    private static Controller $instance;

    #endreion

    #region Properties

    public static function Instance(): Controller
    {
        if (empty(self::$instance)) {
            return new Controller();
        }

        return self::$instance;
    }

    public readonly AccountManager $AccountManager;
    public readonly DatabaseDataAccess $DatabaseDataAccess;
    public readonly FileManager $FileManger;
    public readonly Helper $Helper;
    public readonly LoginManager $LoginManager;
    public readonly NavigationManager $NavigationManager;
    public readonly PageManager $PageManager;
    public readonly RegistrationManager $RegistrationManager;
    public readonly SessionManager $SessionManager;
     
    #endregion

    #region Constructors

    protected function __construct()
    {
        // Initializations
        $this->AccountManager=new AccountManager();
        $this->DatabaseDataAccess = new DatabaseDataAccess();
        $this->FileManger = new FileManager();
        $this->Helper = new Helper();
        $this->LoginManager = new LoginManager();
        $this->NavigationManager = new NavigationManager();
        $this->PageManager = new PageManager();
        $this->RegistrationManager = new RegistrationManager();
        $this->SessionManager = new SessionManager();
        
        // Events
    }

    #endreion

    #region Methods
    #endreion
}
?>