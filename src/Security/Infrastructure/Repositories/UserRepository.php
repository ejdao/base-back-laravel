<?php

namespace Src\Security\Infrastructure\Repositories;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Src\Security\Application\CreateUserDto;
use Src\Security\Application\UpdateUserDto;
use Src\Security\Infrastructure\Models\Role;
use Src\Security\Infrastructure\Models\User;
use Src\Shared\Infrastructure\BaseRepository;

class UserRepository extends BaseRepository
{
    public function create(CreateUserDto $request)
    {
        $newUser['role_id'] = Role::where('code', $request->role)->first()->id;
        $newUser['full_name'] = $request->fullName;
        $newUser['email'] = $request->email;
        $newUser['password'] = bcrypt($request->password);
        $newUser['created_by'] = Auth::user()->id;
        DB::beginTransaction();
        try {
            User::create($newUser);
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            return false;
        }
        return false;
    }
    public function update(UpdateUserDto $request, $id)
    {
        $userToUpdate = $this->getOne($id);
        $newUser['role_id'] = Role::where('code', $request->role)->first()->id;
        $newUser['full_name'] = $request->fullName;
        $newUser['email'] = $request->email;
        $newUser['password'] = bcrypt($request->password);
        $userToUpdate->active = $request->active;
        DB::beginTransaction();
        try {
            $userToUpdate->save();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            return false;
        }
    }
    public function getAll()
    {
        return User::all();
    }
    public function getOne(int $id)
    {
        return User::findOrFail($id);
    }
    public function deleteOne(int $id)
    {
        $userToDelete = User::findOrFail($id);
        DB::beginTransaction();
        try {
            $userToDelete->delete();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            return false;
        }
    }
}
