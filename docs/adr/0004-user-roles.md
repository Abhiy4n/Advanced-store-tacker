# 0004. Single role on users (enum)
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
StoreTrack needs fixed staff roles (Admin, Branch Manager, Inventory, Sales, Customer). Permission checks and branch assignment come later; we need a clear role list and a default.

## Options considered
1. String/enum column `users.role` — simple; one role per user; enough for now
2. `roles` + pivot tables — flexible multi-role; more tables before we need them
3. Spatie laravel-permission — full permissions package; heavier for foundation

## Decision
Store **one role per user** as `users.role` (PHP enum `App\Enums\Role`). **Default: Admin.** Document intended duties in `docs/roles.md`. Do not implement permission gates yet.

## Consequences
- Easy to read in DB and code
- Multi-role users are not supported until we revisit
- Customer role exists in the catalog but customer portal remains a non-goal until scoped
- Branch Manager without `branch_id` cannot be scoped yet — add when branches exist
