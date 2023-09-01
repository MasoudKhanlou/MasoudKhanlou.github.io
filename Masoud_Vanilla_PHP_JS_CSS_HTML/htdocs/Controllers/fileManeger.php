<?php

#region Enums

enum FileExtension : string
{
   case Jpeg = "Jpeg";

   case Png = "Png";
}

#endregion

class FileManager
{
  #region Fields
  #endregion

  #region Properties
  #endregion

  #region Constructors
  #endregion

  #region Methods

  public function checkAndUploadFile(Page $page) : string
  {
    $error = "";

    $upload_file_name = "";
    $upload_file_full_path = "";
    $upload_file_type = "";
    $upload_file_tmp_name = "";
    $upload_file_error = "";
    $upload_file_size = "";

    switch ($page) {
      case Page::Account: {
        if (isset($_FILES['user-img'])) {
          if ($_FILES['user-img']['tmp_name']) {
            $upload_file_name = $_FILES['user-img']['name'];
            $upload_file_full_path = $_FILES['user-img']['full_path'];
            $upload_file_type = $_FILES['user-img']['type'];
            $upload_file_tmp_name = $_FILES['user-img']['tmp_name'];
            $upload_file_error = $_FILES['user-img']['error'];
            $upload_file_size = $_FILES['user-img']['size'];

            if ($upload_file_error !== 0) {
              $error = $this->getUploadFileErrorMessage($upload_file_error);
            } else {
              $base64Value = $this->convertFileToBase64($upload_file_tmp_name);
              $magicBytes = $this->getMagicBytes($base64Value);
              $fileExtention = $this->getFileExtension($magicBytes);
              if ($fileExtention === FileExtension::Jpeg || $fileExtention === FileExtension::Png) {
                if (0 < $upload_file_size && $upload_file_size <= 5 * 1024 * 1024) {
                $type = $this->extractFileType($upload_file_type);
                $name = $this->extractFileName($upload_file_name);
                Controller::Instance()->DatabaseDataAccess->addOrUpdateUserImage($base64Value, $name, $type);
              } else {
                $error = "Die Bildgröße darf nicht leer und maximal 5 MBytes sein.";
              }
            }else {
                $error = "Nur JPEG und PNG Dateien sind zulässig.";
              }
            } 
          }
        }
    
        return $error;
      }

      default: {
          return $error;
      }
    }
  }

  private function convertFileToBase64($data_tmp_name): string
  {
    $openFile = fopen($data_tmp_name, 'r');
    $readFile = fread($openFile, filesize($data_tmp_name));
    $base64Value = base64_encode($readFile);
    fclose($openFile);
    return $base64Value;
  }

  private function extractFileName(string $fileName): string
  {
    $array = explode('.', $fileName);
    return $array[0];
  }

  private function extractFileType($fileType): string
  {
    $array = explode('/', $fileType);
    return end($array);
  }

  private function getFileExtension($magicBytes): ?FileExtension
  {
    if ($magicBytes == 'ffd8ffe0') // JPEG
    {
      return FileExtension::Jpeg;
    }

    if ($magicBytes == '89504e47') // PNG
    {
      return FileExtension::Png;
    }

    return null;
  }

  private function getMagicBytes($base64Value): string
  {
    return substr(bin2hex(base64_decode($base64Value)), 0, 8);
  }

  private function getUploadFileErrorMessage(int $errorCode): string
  {
    switch ($errorCode) {
      case 1: {
          $message = 'Die hochgeladene Datei überschreitet die maximal erlaubte Dateigröße.';
          break;
        }
      case 2: {
          $message = 'Die hochgeladene Datei überschreitet die maximal erlaubte Dateigröße.';
          break;
        }
      case 3: {
          $message = 'Die Datei wurde nur zum Teil hochgeladen.';
          break;
        }
      case 4: {
          $message = 'Keine Datei wurde hochgeladen.';
          break;
        }
      case 6: {
          $message = 'Es fehlt ein temporäres Verzeichnis.';
          break;
        }
      case 7: {
          $message = 'Die Datei konnte nicht auf der Platte abgelegt werden.';
          break;
        }
      case 8: {
          $message = 'Die Datei-Aktualisierung wurde gestoppt.';
          break;
        }
    }
    return $message;
  }

  #endregion
}