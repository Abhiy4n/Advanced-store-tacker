<?php

namespace App\Enums;

/**
 * Staff/customer roles. Behaviour details: docs/roles.md
 */
enum Role: string
{
    case Admin = 'admin';
    case BranchManager = 'branch_manager';
    case InventoryStaff = 'inventory_staff';
    case SalesStaff = 'sales_staff';
    case Customer = 'customer';

    public static function default(): self
    {
        return self::Admin;
    }

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::BranchManager => 'Branch Manager',
            self::InventoryStaff => 'Inventory Staff',
            self::SalesStaff => 'Sales & Payment Staff',
            self::Customer => 'Customer',
        };
    }
}
