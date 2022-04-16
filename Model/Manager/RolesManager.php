<?php


class RolesManager
{
    /**
     * get all roles object for a user
     * @param User $user
     * @return array
     */
    public static function getUserRoles (User $user): array
    {
        $roles = [];
        $id = $user->getId();
        $query = DB::conn()->query("
            SELECT * FROM role WHERE id IN
                (SELECT role_fk FROM user_role WHERE user_fk = $id) ORDER BY id DESC;
            ");
        if($query){
            foreach ($query->fetchAll() as $data){
                $roles[] = (new Role())
                    ->setId($data['id'])
                    ->setRoleName($data['role_name'])
                    ;
            }
        }
        return $roles;
    }

    /**
     * @return false|mixed
     */
    public static function getDefaultRole (){
        $role = new Role();
        $query = DB::conn()->query("
            SELECT * FROM role WHERE id = 2
        ");

        if($query){
            $data = $query->fetch();
            $role->setId($data['id']);
            $role->setRoleName($data['role_name']);
        }
        return $role;
    }

    /**
     * add admin role to user
     * @param $id
     * @return false|PDOStatement
     */
    public static function addAdminRole ($id){
        return DB::conn()->query("
            INSERT INTO user_role (user_fk, role_fk)
            VALUES ($id, 1)
        ");
    }

    /**
     * suppr admin role to user
     * @param $id
     * @return false|PDOStatement
     */
    public static function delAdminRole ($id){
        return DB::conn()->query("DELETE FROM user_role WHERE user_fk = $id AND role_fk = 1");
    }

}
