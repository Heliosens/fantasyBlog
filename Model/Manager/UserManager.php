<?php


class UserManager
{
    /**
     * @param $id
     * @return User
     */
    public function getUserById($id) :User {
        $data = new User();
        $query = DB::conn()->query("SELECT * FROM user WHERE id = $id");
        if($query){
            $data = $query->fetch();
        }
        return $this->setUser($data);
    }



    /**
     * @param array $data
     * @return User
     */
    private function setUser(array $data): User
    {
        $roleManager = new RolesManager();

        $user = (new User())
            ->setId($data['id'])
            ->setPseudo($data['pseudo'])
            ->setEmail($data['email'])
            ->setPassword($data['password'])
            ;
        return $user->setRoles($roleManager->getUserRoles($user));
    }
}