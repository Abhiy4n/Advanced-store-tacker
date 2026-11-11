# Repo foundation

## Invoke when
Phase 3 and 5: repo layout, Docker, env, deploy, observability.

## Phase
3 — Foundation; 5 — Walking skeleton. Respect earlier open gates.

## Required reads
- `AGENTS.md` (Commands table)
- `docs/02-architecture.md`
- Existing `backend/`, `frontend/`, `algorithm/` layout
- `.env.example` files only — never real `.env` or secrets

## Job
Make one-command local setup, Docker Compose, health checks, and (in Phase 5) staging hello-world + logs + backup/restore. Keep diffs small; update AGENTS.md Commands when real.

## Stop and ask
Do not invent production hosts or touch production systems. Ask before adding non-trivial infra dependencies.
