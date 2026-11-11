# 0005. Store money as decimal
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
Product variants need purchase cost and selling price. We must pick one storage form before migrations land.

## Options considered
1. Integer cents — exact math, awkward for humans reading SQL
2. `decimal(12,2)` — readable, normal for Laravel shops, fine for NPR-style currency
3. Float — easy bugs with rounding

## Decision
Store money as `decimal(12,2)` on variant (and future) money columns.

## Consequences
- Migrations and forms stay simple.
- App code must avoid float casts for money; use string/decimal-aware handling.
- Revisit if we later need more than 2 fractional digits.
