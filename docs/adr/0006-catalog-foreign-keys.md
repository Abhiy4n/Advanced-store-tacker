# 0006. Catalog foreign keys (category, brand, color, size)
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
Free-text category/brand/color/size causes typos and weak filters. We need a stable catalog before real products land.

## Options considered
1. Keep strings on products/variants — fastest, messy data
2. Normalize categories, brands, colors, sizes as tables with FKs
3. Normalize only category + brand; leave color/size as strings

## Decision
Option 2. Categories use one table with `parent_id` (null = top category, set = subcategory). Gender and status stay as string columns + PHP enums.

## Consequences
- Add-product UI uses pickers; reports stay consistent.
- Need seed or admin CRUD for catalog rows before adding products.
- Subcategory must belong to the chosen category (validate in app: `subcategory.parent_id === category_id`).
