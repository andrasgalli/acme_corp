<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends RepositoryBase {
    protected static string $modelClass = User::class;
}
