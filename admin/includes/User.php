<?php


class User extends Db_object
{
    protected static $db_table = "user";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function verify_user($user, $pass) {
        global $database;
        $username = $database->escape_string($user);
        $password = $database->escape_string($pass);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE username = '" . $username. "' AND password = '" . $password . "';";

        $result = self::find_this_query($sql);

        return !empty($result) ? array_shift($result) : false;
    }
}