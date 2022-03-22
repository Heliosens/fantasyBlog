<?php


class UserManager
{
    /**
     * @param $id
     * @return User
     */
    public static function getUserById($id) :User {
        $data = new User();
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
            $role = RolesManager::getRole('user');
            $addUserRole = DB::conn()->exec("
                INSERT INTO user_role (user_fk, role_fk)
                VALUES (" . $user->getId() . ", " . $role->getId() . ")
            ");
        }
        return $result && $addUserRole;
    }

    /**
     * @param $mail
     * @return int|mixed
     */
    public static function isAlreadyMail ($mail){
        $result = DB::conn()->query("
        SELECT count(*) as nbr FROM user WHERE email = \"$mail\"
        ");
        return $result ? $result->fetch()['nbr'] : 0;
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
}
