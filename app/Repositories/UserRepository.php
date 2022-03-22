<?php
namespace App\Repositories;

use \App\Interfaces\GroceryItemRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserRepositoryInterface
{

    public function createUserApiToken($email, $password)
    {
        $user = $this->findUserByMetadata('email', $email);

        if (! $user || ! Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken("api")->plainTextToken;
    }

    public function findUser($user_id)
    {
        // TODO: Implement findUser() method.
    }

    public function updateUser($user_id)
    {
        // TODO: Implement updateUser() method.
    }

    public function deleteUser($user_id)
    {
        // TODO: Implement deleteUser() method.
    }

    public function findUserByMetadata($key, $value)
    {
        return User::where($key, $value)->first();
    }
}
