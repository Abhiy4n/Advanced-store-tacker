# Roles (what each role is supposed to do)

Source of truth for role intent. Enforcement (policies/gates) comes later.
Stored on `users.role` as a string enum. **Default: `admin`.**

Branch assignment for Branch Manager is a separate data-model decision (not on this list yet).

---

## Admin (`admin`)

**Full access.** The person who manages the entire business and system.

- Manage users, roles and permissions
- Create and manage branches
- Manage all products, suppliers and inventory
- View company-wide sales, profit and analytics
- Configure payment methods and verification rules
- Approve exceptional payment and stock adjustments

---

## Branch Manager (`branch_manager`)

Manages operations within an assigned branch.

- View branch sales and performance
- Monitor inventory and low-stock alerts
- Approve stock adjustments and transfers
- Review payment exceptions
- Manage branch employees
- View branch-specific forecasts and recommendations

---

## Inventory Staff (`inventory_staff`)

Responsible for maintaining stock accuracy.

- Add and update product information (where permitted)
- Receive purchased stock
- Record stock movements
- Manage expiry dates
- Process stock transfers
- View replenishment recommendations

---

## Sales & Payment Staff (`sales_staff`)

Handles customer purchases and payment operations.

- Create customer orders and sales
- Upload or inspect payment evidence
- Review OCR-extracted payment information
- Resolve payment mismatches
- Confirm orders when payment is verified
- View sales history

---

## Customer (`customer`)

**External user.** Only needed if a customer-facing ordering portal exists.

- Browse available products
- Submit orders
- Upload payment screenshots
- View their own payment and order status
- Track deliveries

Non-goal until a customer portal is in scope: do not build customer UI/API just because this role exists.
