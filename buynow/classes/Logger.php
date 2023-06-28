<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles functions related to logging               *
 *******************************************************************/

class Logger
{
    /**
     * Writes database errors.
     * @param string $errorCode Database error code.
     * @param string $errorMessage Database error message.
     */
    public static function writeDBErrors(int $errorCode, string $errorMessage)
    {
        // Log file with current date as file name.
        $logFile = Config::DB_LOGS_PATH . date('Y-m-d') . '.txt';
        ini_set('error_log', $logFile);
        
        $message = "\nError Code: " . $errorCode;
        $message .= "\nError Message: " . $errorMessage;
        $message .= "\n";
        
        // Write message to log file.
        error_log($message);
    }
    
    
    
    /**
     * Writes message to log file.
     */
    public static function writeMessage(array $data)
    {
        // IP Address.
        $IPAddress = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER["REMOTE_ADDR"] : "IP ADDRESS NOT FOUND";
        
        // Log file with current date as file name.
        $logFile = Config::LOGS_PATH . date('Y-m-d') . '.txt';
        ini_set('error_log', $logFile);
        
        $message = "\nIP Address: " . $IPAddress;
        
        // Loop through $data array to make a string.
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $message .= "\n{$key}: " . json_encode($value);
            } else {
                $message .= "\n{$key}: " . $value;
            }
        }
        
        $message .= "\n";

        // Write message to log file.
        error_log($message);
    }
}