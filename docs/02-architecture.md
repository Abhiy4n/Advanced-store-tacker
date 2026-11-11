# Architecture
> Decisions live in `docs/adr/`. This file is the overview.

## Diagram
```
React (SPA)
  → Laravel (main API, auth, users, CRUD)
      → PostgreSQL (system of record)
  → FastAPI (algorithms, reports)  [called by Laravel or React via Laravel later]
```

Laravel owns identity and business writes. FastAPI does not own users or login.

## Service responsibilities
| Service | Owns | Does NOT own |
|---------|------|--------------|
| React | UI, calling APIs | Business rules, passwords, OAuth secrets |
| Laravel | Auth (Socialite), users, social_accounts, products/variants, main CRUD API | Heavy algorithms / big reports |
| FastAPI | Algorithms, reports | User passwords, Google OAuth, primary CRUD |
| PostgreSQL | Persisted app data | — |

## Communication & failure behavior
- Browser talks to Laravel for auth and main API.
- FastAPI is for compute/report jobs; identity should be verified upstream (Laravel) before trusting a request.
- If FastAPI is down, login and basic CRUD should still work; reports degrade.
- If PostgreSQL is down, nothing durable works — fail fast with health checks (Phase 5).

## Decision index
| ADR | Title | Status |
|-----|-------|--------|
| 0001 | Google auth via Laravel Socialite | Accepted |
| 0002 | users + social_accounts (no provider tokens) | Accepted |
| 0003 | PostgreSQL as application database | Accepted |
| 0004 | Single role on users (enum) | Accepted |
| 0005 | Money as decimal(12,2) | Accepted |
| 0006 | Catalog FKs (categories.parent_id, brands, colors, sizes) | Accepted |
