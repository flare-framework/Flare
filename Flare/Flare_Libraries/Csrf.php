<?php

namespace Flare_Libraries;

class Csrf {
    private $tokenName = 'csrf_token';
    private $sessionKey = 'csrf_token';
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
          @  session_start();
        }
    }
    public function generateToken() {

        $_SESSION[$this->sessionKey] = bin2hex(random_bytes(32));
        return $_SESSION[$this->sessionKey];
    }
    public function validateToken($token) {
        if (!isset($_SESSION[$this->sessionKey]) || $_SESSION[$this->sessionKey] !== $token) {
            return false;
        }
        $this->destroyToken();
        return true;
    }
    public function getTokenName() {
        return $this->tokenName;
    }

    public function destroyToken() {
        unset($_SESSION[$this->sessionKey]);
    }

    public function getTokenField() {
        $token = $this->generateToken();
        return '<input type="hidden" name="' . $this->tokenName . '" value="' . $token . '">';
    }
}
