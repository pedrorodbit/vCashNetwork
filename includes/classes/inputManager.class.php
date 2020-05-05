<?php

class inputManager {

    var $cleaned_vars = [];

    public function __construct() {

        if (function_exists('get_magic_quotes_runtime') && get_magic_quotes_runtime()) {
            set_magic_quotes_runtime(false);
        }

        if (get_magic_quotes_gpc()) {
            $this->array_stripslashes($_POST);
            $this->array_stripslashes($_GET);
            $this->array_stripslashes($_COOKIES);
        }
        $this->frm = $_POST;
        $this->frmg = $_GET;
        $this->cookie = $_COOKIE;

        $this->cleanPosts();
        $this->cleanGets();
        $this->cleanCookies();
    }

    private function cleanPosts() {
        foreach ($this->frm as $key => $value) {
            if (is_array($value)) {
                $value_cleaned = $value;
            } else {
                $value = trim($value);
                $value_cleaned = htmlspecialchars($value);
            }
            $this->p[$key] = $value;
            $this->pc[$key] = $value_cleaned;
        }
    }

    private function cleanGets() {
        foreach ($this->frmg as $key => $value) {
            if (is_array($value)) {
                $value_cleaned = $value;
            } else {
                $value = trim($value);
                $value_cleaned = htmlspecialchars($value);
            }
            $this->g[$key] = $value;
            $this->gc[$key] = $value_cleaned;
        }
    }

    private function cleanCookies() {
        foreach ($this->cookie as $key => $value) {
            if (is_array($value)) {
                $value_cleaned = $value;
            } else {
                $value = trim($value);
                $value_cleaned = htmlspecialchars($value);
            }
            $this->c[$key] = $value;
            $this->cc[$key] = $value_cleaned;
        }
    }

    private function array_stripslashes(&$array) {
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if (is_array($array[$key])) {
                    $this->array_stripslashes($array[$key]);
                } else {
                    $array[$key] = stripslashes($array[$key]);
                }
            }
        }
    }

}
