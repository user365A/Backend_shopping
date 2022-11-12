<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission)
    {
         $this->role=$role;
         $this->permission=$permission;
    }
    public function index(){
        $roles=Role::paginate(5);
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        $permissionsParent=$this->permission->where('parent_id',0)->get();
        return view('admin.roles.add',compact('permissionsParent'));
    }
    public function store(Request $req){
        $role=$this->role->create([
            'name'=>$req->name,
            'display_name'=>$req->display_name
        ]);

        $role->permissions()->attach($req->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit($id){
        $permissionsParent=$this->permission->where('parent_id',0)->get();
        $role=$this->role->find($id);
        $permissionsChecked=$role->permissions;
        return view('admin.roles.edit',compact('permissionsParent','role','permissionsChecked'));
    }
    public function update($id,Request $req){
        $this->role->find($id)->update([
            'name'=>$req->name,
            'display_name'=>$req->display_name
        ]);
        $role=$this->role->find($id);
        $role->permissions()->sync($req->permission_id);
        return redirect()->route('roles.index');
    }

}
