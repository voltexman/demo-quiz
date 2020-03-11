<?php
namespace site;


class ErrorHendler
{
    public function __construct()
    {
        if (DEBUG){
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_exception_handler([$this, 'exeptionHandler']);
    }

    /**
     * @param $e
     */
    public function exeptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayErrors('Exeption', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * @param string $message
     * @param string $file
     * @param string $line
     */
    protected function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Text error: {$message} | File: {$file} | Line: {$line} 
        \n====================='=\n", 3, ROOT . '/tmp/errors.log');
    }

    /**
     * @param $errorNumber
     * @param $errorMessage
     * @param $errorFile
     * @param $errorLine
     * @param int $responce
     */
    protected function displayErrors($errorNumber, $errorMessage, $errorFile, $errorLine, $responce = 404){
        http_response_code($responce);

        if ($responce == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die();
        }
        if (DEBUG){
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die();
    }


}