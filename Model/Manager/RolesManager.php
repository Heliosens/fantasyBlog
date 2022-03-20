<?php


class RolesManager
{
    /**
     * @param User $user
     * @return array
     */
    public static function getUserRoles (User $user): array
    {
        $roles = [];
        $id = $user->getId();
        $query = DB::conn()->query("
            SELECT * FROM role WHERE id IN
                (SELECT role_fk FROM user_role WHERE user_fk = $id);
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

    public static function getRole (string $roleName): Role {
        $role = new Role();
        $query = DB::conn()->query("
            SELECT * FROM role WHERE role_name = '" . $roleName . "'
        ");

        if($query){
            $data = $query->fetch();
            $role->setId($data['id']);
            $role->setRoleName($data['role_name']);
        }
        return $role;
    }
}
