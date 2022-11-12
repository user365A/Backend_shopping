<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }
    public function index(){
        $users=User::paginate(5);
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        $roles=$this->role->all();
        return view('admin.users.add',compact('roles'));
    }
    public function store(UserAddRequest $req){
        try {
            DB::beginTransaction();
            $user=$this->user->create([
               'name'=>$req->name,
               'email'=>$req->email,
               'password'=>Hash::make($req->password)
            ]);
            $user->roles()->attach($req->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
        };


    }
    public function edit($id){
        $user=$this->user->find($id);
        $roles=$this->role->all();
        $rolesOfUser =$user->roles;
        return view('admin.users.edit',compact('user','roles','rolesOfUser'));
    }
    public function update(UserAddRequest $req,$id){
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
               'name'=>$req->name,
               'email'=>$req->email,
               'password'=>Hash::make($req->password)
            ]);
            $user=$this->user->find($id);
            $user->roles()->sync($req->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch(\Exception $exception) {
            DB::rollBack();
            Log::error('Message: '.$exception->getMessage().' Line:'.$exception->getLine());
        };
    }
    public function delete($id){
        return $this->DeleteModelTrait($id,$this->user);
    }
}
