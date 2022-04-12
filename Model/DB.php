<?php


class DB
{
    private static ?PDO $PdoObj = null;

    /**
     * db connection
     */
    public static function conn () : ?PDO {
        if(self::$PdoObj === null){
            try {
                self::$PdoObj = new PDO("mysql:host=localhost;dbname=fantasy_blog;charset=utf8", "root" , "");
                self::$PdoObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$PdoObj->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            }
            catch (PDOException $e){
                echo "Error : " . $e->getMessage();
            }
        }
        return self::$PdoObj;
    }
}