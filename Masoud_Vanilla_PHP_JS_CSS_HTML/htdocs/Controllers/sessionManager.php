<?php
    include_once "controller.php";

    #region Enums

    enum LoginState
    {
        case Loggedin;
        case Loggedout;
    }

    enum SessionKey : string
    {
        case UserSession = "UserSession";

        // TODO Here another keys.
    }

    #endregion
    
    class SessionManager 
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

        public function checkUserLoginState() : LoginState 
        {
            $userSession = $this->getUserSession();
            
            if ($userSession === null || $userSession->LoginState === LoginState::Loggedout)
            {
                return LoginState::Loggedout;
            }
            else if ($userSession->LoginState === LoginState::Loggedin)
            {
                return LoginState::Loggedin;
            }
            return LoginState::Loggedout;
        }

        public function endSession() : void 
        {
            session_status() === PHP_SESSION_ACTIVE ? : session_start();
            if (session_status() === PHP_SESSION_ACTIVE)
            {
                session_destroy();
            }
        }

        public function getSession(SessionKey $sessionKey)
        {
            session_status() === PHP_SESSION_ACTIVE ? : session_start();
            if (isset($_SESSION[$sessionKey->value]) === false)
            {
                return null;
            }
            return $_SESSION[$sessionKey->value];
        }

        public function getUserSession() : ?UserSession 
        {
            return $this->getSession(SessionKey::UserSession); 
        }

        public function removeAllSessionValues() : void
        {
            foreach (SessionKey::cases() as $sessionKey)
            {
                $this->setSession($sessionKey, null);
            }
        }

        public function removeSession(SessionKey $sessionKey) : void
        {
            $_SESSION[$sessionKey->value] = null;
        }

        public function setSession(SessionKey $sessionKey, $sessionValue) : void
        {
            session_status() === PHP_SESSION_ACTIVE ? : session_start();          
            $_SESSION[$sessionKey->value] = $sessionValue;
        }

        public function setUserSession(user $userDto) : void 
        {
            if ($userDto === null)
            {
                $this->endSession();
                return;
            }
            $userSession = new UserSession();
            $userSession->Email = $userDto->Email;
            $userSession->FirstName = $userDto->FirstName;
            $userSession->Gender = $userDto->Gender;
            $userSession->Id = $userDto->Id;
            $userSession->LastName = $userDto->LastName;
            $userSession->LoginState = LoginState::Loggedin;
            $this->setSession(SessionKey::UserSession, $userSession);
        }

        public function showLoggedinUserInformation() : void
        {
            $userSession = $this->getUserSession();
            if ($userSession === null)
            {
                return;
            }
            // TODO show loggedin u ser information
        }

        #endregion
    }

    class UserSession 
    {
        public string $Email;

        public string $FirstName;

        public string $Gender;

        public int $Id;

        public string $LastName;

        public LoginState $LoginState;
    }
