<?php
// phpcs:disable PSR1.Classes.ClassDeclaration

use Library\Console;

/**
 * Error handling class, define callbacks to execute when warnings, errors, exceptions and unknown errors happen
 */
class Errors
{
    public $error_handle;

    /**
     * Error handler, parses the error, and wether it's a warning, exception, notice or something else, executes the
     * correct callback
     *
     * @param string $errno        Error name
     * @param string $error_string Error description
     * @param string $error_file   File of the error
     * @param string $error_line   Line of the error
     *
     * @return void
     */
    public function myErrorHandler($errno, $error_string, $error_file, $error_line)
    {
        $error = "Unknown";
        if ($errno === E_NOTICE || $errno === E_USER_NOTICE) {
            $error = 'Notice';
        }
        if ($errno === E_WARNING || $errno === E_USER_WARNING) {
            $error = 'Warning';
        }
        if ($errno === E_ERROR || $errno === E_USER_ERROR) {
            $error = 'Fatal Error';
        }

        $error_string_log = " *" . $error . "* " . $error_string . "\n - file: " . $error_file . "\n - on line: " . $error_line. "\n\n";
        $error_string_log = addslashes($error_string_log);

        if ($error === "Warning") {
            $this->warningHandler($error_string_log);
        }

        if ($error === "Notice") {
            $this->noticeHandler($error_string_log);
        }

        if ($error === "Fatal Error") {
            $this->errorHandler($error_string_log);
        }

        if ($error === "Unknown") {
            $this->noticeHandler($error_string_log);
        }
    }

    /**
     * Exception callback
     *
     * @param string $exception Exception message
     *
     * @return void
     */
    public function myExceptionHandler($exception)
    {
        $exception_message = $exception->getMessage();

        Console::addError($exception_message);

        $this->checkLogFile(SYSTEM . "writable/logs/errors.log");
        error_log($exception_message."\n", 3, SYSTEM . "writable/logs/errors.log");

        die($exception_message);
    }

    /**
     * Notice callback
     *
     * @param string $error_string Notice message
     *
     * @return void
     */
    public function noticeHandler($error_string)
    {
        Console::addWarning($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/notice.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/notice.log");
    }

    /**
     * Warning handler
     *
     * @param string $error_string Warning message
     *
     * @return void
     */
    public function warningHandler($error_string)
    {
        Console::addWarning($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/warnings.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/warnings.log");
    }

    /**
     * Error handler
     *
     * @param string $error_string Error message
     *
     * @return void
     */
    public function errorHandler($error_string)
    {
        Console::addError($error_string);
        $this->checkLogFile(SYSTEM . "writable/writable/logs/errors.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/errors.log");
    }

    /**
     * Unknown Error handler
     *
     * @param string $error_string Unknown error message
     *
     * @return void
     */
    public function unknownErrorHandler($error_string)
    {
        Console::addError($error_string);
        $this->checkLogFile(SYSTEM . "writable/logs/unknown-errors.log");
        error_log($error_string."\n", 3, SYSTEM . "writable/logs/unknown-errors.log");
    }

    /**
     * Checks, wether the file passed in the argument exist, if not, creates it
     *
     * @param string $file_name path of the log file
     *
     * @return void
     */
    public function checkLogFile($file_name)
    {
        if (!file_exists($file_name)) {
            $fileResource = fopen($file_name, "w");
            fclose($fileResource);
        }
    }
}
