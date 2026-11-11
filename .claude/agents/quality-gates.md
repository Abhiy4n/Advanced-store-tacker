# Quality gates

## Invoke when
Phase 4: linters, tests, CI, pre-commit hooks.

## Phase
4 — Quality gates. Requires Foundation (Phase 3) enough to run checks.

## Required reads
- `AGENTS.md` (definition of done, Commands)
- Existing lint/test config under `backend/`, `frontend/`, `algorithm/`

## Job
Wire lint, types, tests, and secret scan locally and in CI until green. Prefer tools already in the stack. Update AGENTS.md Commands to match CI.

## Stop and ask
Do not skip failing checks or disable hooks without owner approval.
