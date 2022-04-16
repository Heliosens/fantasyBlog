<?php


class UserManager
{
    /**
     * @return array
     */
    public static function getAllUser(){
        $users = [];
        $query = DB::conn()->query("SELECT * FROM user ORDER BY pseudo ASC ");
        if($query){
            foreach ($query->fetchAll() as $data){
                $users[] = (new User())
                    ->setId($data['id'])
                    ->setPseudo($data['pseudo'])
                    ->setEmail($data['email'])
                    ->setPassword($data['password'])
                ;
            }
        }
        foreach ($users as $user){
            $roles = RolesManager::getUserRoles($user);
            $user->setRoles($roles);
        }
        return $users;
    }

    /**
     * @param $id
     * @return User
     */
    public static function getUserById($id) :User {
        $data = "";
        $query = DB::conn()->query("SELECT * FROM user WHERE id = $id");
        if($query){
            $data = $query->fetch();
        }
        $user = (new User())
            ->setId($data['id'])
            ->setPseudo($data['pseudo'])
            ->setEmail($data['email'])
            ->setPassword($data['password'])
            ;
        $roles = RolesManager::getUserRoles($user);
        return $user->setRoles($roles);
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function addUser(User &$user) :bool{
        $stm = DB::conn()->prepare("
            INSERT INTO user (pseudo, email, password)
            VALUES (:pseudo, :email, :password)
        ");

        $stm->bindValue(':pseudo', $user->getPseudo());
        $stm->bindValue(':email', $user->getEmail());
        $stm->bindValue(':password', $user->getPassword());

        $result = $stm->execute();
        $user->setId(DB::conn()->lastInsertId());
        if($result){
            $addUserRole = DB::conn()->exec("
                INSERT INTO user_role (user_fk, role_fk)
                VALUES (" . $user->getId() . ", 2)
            ");
        }
        return $result && $addUserRole;
    }

    /**
     * @param $mail
     * @return int|mixed
     */
    public static function isAlreadyMail ($mail){
        $result = DB::conn()->prepare("
            SELECT * FROM user WHERE email = :mail
        ");
        $result->bindValue(':mail', $mail);
        $result->execute();
        return $result->fetch() ? true : false;
    }

    /**
     * @param $mail
     * @return User|null
     */
    public static function getUserByMail ($mail): ?User {
        $query = DB::conn()->query("
            SELECT * FROM user WHERE email = '$mail'
            ");
        $user = new User();
        if($query){
            $result = $query->fetch();
            $user->setId($result['id'])
                ->setPseudo($result['pseudo'])
                ->setEmail($result['email'])
                ->setPassword($result['password'])
                ;
            $user->setRoles(RolesManager::getUserRoles($user));
        }
        return $user;
    }

    /**
     * @param $id
     * @return false|int
     */
    public static function deleteUserById ($id){
        $sql = "DELETE FROM user WHERE id = $id";
        return DB::conn()->exec($sql);
    }


    /**
     * count nbr of admin (role_fk = 1)
     * @return mixed
     */
    public static function getAdmin (){
        $query = DB::conn()->query("
            SELECT count(*) FROM user WHERE id IN (SELECT user_fk FROM user_role WHERE role_fk = 1)
        ");
        return $query->fetch();
    }

}
