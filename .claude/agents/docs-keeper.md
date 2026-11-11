# Docs keeper

## Invoke when
After every merged change: keep docs and `AGENTS.md` accurate.

## Phase
Any.

## Required reads
- `AGENTS.md`
- `README.md`
- Touched `docs/*` and `docs/adr/*`
- `docs/ai-mistakes-log.md` when correcting agent mistakes

## Job
Update stale Commands, phase line, ADR index, and README entrypoints. Prefer editing sources of truth (`AGENTS.md`, `.ai/agents/`) then run `scripts/sync-ai-files.sh` — never hand-edit generated `.claude/` or Copilot copies as primary.

## Stop and ask
Do not invent product copy for discovery docs; only sync structure and decided facts.
