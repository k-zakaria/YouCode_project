<?php 

namespace core;

class Session {
    
    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    public static function get($key) {
        self::startSession();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function remove($key) {
        self::startSession();
        unset($_SESSION[$key]);
    }

    public static function destroy() {
        self::startSession();
        session_unset();
        session_destroy();
    }
}




// Utilisation de la classe SessionManager
Session::startSession();

// Enregistrement d'une variable dans la session
Session::set('user_id', 123);

// Obtention de la valeur d'une variable de session
$userID = Session::get('user_id');

// Suppression d'une variable de session
Session::remove('user_id');

// Destruction complète de la session
Session::destroy();


