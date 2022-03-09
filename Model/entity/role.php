<?php


class role
{
    private int $id;
    private string $role_name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return role
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->role_name;
    }

    /**
     * @param string $role_name
     * @return role
     */
    public function setRoleName(string $role_name): self
    {
        $this->role_name = $role_name;
        return $this;
    }

}