<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_tickets',
            'add_tickets',
            'edit_tickets',
            'delete_tickets',

            'view_drivers',
            'add_drivers',
            'edit_drivers',
            'delete_drivers',

            'view_buses',
            'add_buses',
            'edit_buses',
            'delete_buses',

            'view_orders',
            'add_orders',
            'edit_orders',
            'delete_orders',

            'view_categories',
            'add_categories',
            'edit_categories',
            'delete_categories',
        ];
    }
}
