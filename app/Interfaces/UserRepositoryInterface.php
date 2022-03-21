<?php
namespace App\Interfaces;

interface UserRepositoryInterface
{
    public function createUserApiToken($email, $password);
    public function findUser($user_id);
    public function findUserByMetadata($key, $value);
    public function updateUser($user_id);
    public function deleteUser($user_id);
}
