<?php
/********************************************************************
 * Ideabytes Software India Pvt Ltd.                                *
 * 50 Jayabheri Enclave, Gachibowli, HYD                            *
 * Created Date : 2017-11-23                                        *
 * Created By : Poorna Teja Konatham                                *
 * Project : DGMobi Landstar Payment                                *
 * Description : Handles autoloading classes, error handling and    *
 *      exception handling.                                         *
 *******************************************************************/

error_reporting(E_ALL); //Report all PHP errors.
ini_set("log_errors", 1); //Set error logging.
date_default_timezone_set("UTC"); //Set timezone to UTC.

/**
 * Autoloads classes.
 * @param string $className Name of the Class.
 */
function customAutoloader($className)
{
//    $baseDirectory = "/var/www/dgsmsca.com/dgmobi/santaspot/classes/"; // on 17-11-2020
    //$baseDirectory = "/var/www/html/santaspot-2019/classes/";
    $baseDirectory = "/var/www/html/dgmobi/santaspot/classes/";
    $classFile = $baseDirectory . $className . ".php";

    if (file_exists($classFile)) {
        require_once($classFile);
    }
}



/**
 * Converts errors to exceptions.
 * @param int $level Level of the error raised.
 * @param string $message Error message.
 * @param string $file File name that the error was raised in.
 * @param int $line Line number that the error was raised at.
 * @throws ErrorException Throws error as exception.
 */
function customErrorHandler($level, $message, $file, $line)
{
    if (error_reporting() !== 0) {
        throw new ErrorException($message, 0, $level, $file, $line);
    }
}



/**
 * Handles exceptions.
 * @param string $exception ErrorException.
 */
function customExceptionHandler($exception)
{
    if (Config::SHOW_ERRORS) {
        // Display errors on webpage.
        echo "<h1>Fatal Error:</h1>";
        echo "<p>Uncaught Exception: '" . get_class($exception) . "'</p>";
        echo "<p>Message: '" . $exception->getMessage() . "'</p>";
        echo "<p>Stact trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
        echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
    } else {
        // Write errors to log file.
        // Creates log file with current date as file name.
        $log = Config::LOGS_PATH . date('Y-m-d') . '.txt';
        ini_set('error_log', $log);

        $message = "\nUncaught Exception: '" . get_class($exception) . "'";
        $message .= " with message " . $exception->getMessage() . "'";
        $message .= "\nStack trace: " . $exception->getTraceAsString();
        $message .= "\nThrown in '" . $exception->getFile() . "' on line " . $exception->getLine();
        $message .= "\n";

        // Write message to log file.
        error_log($message);
    }
}


spl_autoload_register("customAutoloader"); //Register autoloader
set_error_handler("customErrorHandler"); //Set custom error handler
set_exception_handler("customExceptionHandler"); //Set custom exception handler
