<?php


class RolesManager
{
    public function getUserRoles (User $user): array
    {
        $roles = [];
        $query = DB::conn()->query("SELECT * FROM role");
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