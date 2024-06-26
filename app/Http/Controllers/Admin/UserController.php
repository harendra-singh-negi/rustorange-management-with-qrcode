<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\ImageMimeTypeRule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected string $path ;

    public function __construct()
    {
        $this->path  = 'assets/admin/img/propics';
    }

    public function index() {
        $data['users'] = Admin::all();
        $data['roles'] = Role::all();
        return view('admin.user.index', $data);
    }

    public function edit($id) {
        $data['user'] = Admin::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.user.edit', $data);
    }


    public function store(Request $request) {
        $rules = [
            'username' => 'required|max:255|unique:admins',
            'email' => 'required|email|max:255|unique:admins',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'required|confirmed',
            'role_id' => 'required',
            'image' => ['required',new ImageMimeTypeRule()],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $user = new Admin;
        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = upload_picture($this->path,$request->file('image'));
        }

        $input['password'] = bcrypt($request['password']);
        $user->create($input);

        Session::flash('success', 'User created successfully!');
        return "success";
    }


    public function update(Request $request) 
    {
       
        $rules = [
            'username' => [
                'required',
                'max:255',
                Rule::unique('admins')->ignore($request->user_id),
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('admins')->ignore($request->user_id),
            ],

            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'role_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }
        $user = Admin::query()->findOrFail($request->user_id);
        $input = $request->all();

        if($request->hasFile('image')){
            $input['image'] = update_picture($this->path,$request->file('image'),$user->image);
        }
        $user->update($input);

        Session::flash('success', 'User updated successfully!');
        return "success";
    }

    public function delete(Request $request) {
        if ($request->user_id == 1) {
            Session::flash('warning', 'You cannot delete the owner!');
            return back();
        }
        $user = Admin::query()->findOrFail($request->user_id);
        deleteFile($this->path, $user->image);
        $user->delete();

        Session::flash('success', 'User deleted successfully!');
        return back();
    }

    public function managePermissions($id) {
        $data['user'] = Admin::find($id);
        return view('admin.user.permission.manage', $data);
    }

    public function updatePermissions(Request $request) {
        $permissions = json_encode($request->permissions);
        $user = Admin::find($request->user_id);
        $user->permissions = $permissions;
        $user->save();

        Session::flash('success', "Permissions updated successfully for '$user->name' user");
        return back();
    }
}
