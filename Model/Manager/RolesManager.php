<?php


class RolesManager
{
    /**
     * @param User $user
     * @return array
     */
    public function getUserRoles (User $user): array
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


}