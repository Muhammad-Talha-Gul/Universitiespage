<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Permission as AppPermission;
use App\Permissions;
use App\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function updatePermission(Request $request, $userId)
    {
        
        $checkboxPermissions = $request->only([
            'slider', 
            'apply_online',
            'course',
            'free_consultation',
            'student',
            'consultant',
            'guide',
            'pages',
            'articles',
            'visit_visa',
            // Add more checkbox names here
        ]);

        // Get the permission record for the user
        $permission = Permissions::where('admin_id', $userId)->first();

        // If the permission record doesn't exist, create it
        if (!$permission) {
            $user = User::findOrFail($userId); // Fetch the user by ID
            $adminName = $user->first_name . ' ' . $user->last_name;
            $permission = new Permissions();
            $permission->admin_id = $userId;
            $permission->admin_name = $adminName;
            $permission->admin_email = $user->email;
            $permission->admin_password = $user->secret;
            $permission->admin_permissions = json_encode([]); // Initialize as empty JSON object
        }

        // Decode the permissions JSON string to an associative array
        $permissions = json_decode($permission->admin_permissions, true);

        // Decode the permissions JSON string to an associative array
        $permissions = json_decode($permission->admin_permissions, true);

       // Update the permissions array based on checkbox status from the request
    foreach ($request->all() as $checkboxName => $checkboxValue) {
        // If checkbox is checked, set permission to 'on', otherwise set it to null
        $permissions[$checkboxName] = $checkboxValue === 'on' ? 'on' : null;
    }

        // Encode the permissions array back to JSON and save it to the database
        $permission->admin_permissions = json_encode($permissions);
        $permission->save();

        // Retrieve updated permissions data for all admin users
        $permissionsData = [];
        $adminUsers = User::where('user_type', 'admin')->get();
        foreach ($adminUsers as $adminUser) {
            $permissionsData[$adminUser->id] = Permissions::where('admin_id', $adminUser->id)->first();
            if ($permissionsData[$adminUser->id]) {
                $permissionsData[$adminUser->id]->admin_permissions = json_decode($permissionsData[$adminUser->id]->admin_permissions, true);
            }
        }
        return redirect()->route('admin-users')->with('success', 'Permissions updated successfully.');
    }
}
