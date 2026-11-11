# 0003. PostgreSQL as application database
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
Laravel shipped with SQLite as a zero-deps local default. The owner wants PostgreSQL for the real application database.

## Options considered
1. SQLite forever — simplest local setup; weaker for concurrency / production parity
2. MySQL/MariaDB — common with Laravel; fine, but owner preference is Postgres
3. PostgreSQL — good production parity, strong constraints/indexes

## Decision
Use **PostgreSQL** as the application database. Point `DB_CONNECTION=pgsql` in env examples. Migrations are written for Postgres-friendly schema; the owner runs migrate when Postgres is available.

## Consequences
- Local/dev needs a running Postgres (Docker Compose comes in foundation follow-up)
- Existing local SQLite migrate history may not match; prefer a fresh Postgres database rather than mixing engines
- `.env.example` documents pgsql defaults; real credentials stay in `.env`
