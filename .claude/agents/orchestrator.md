# Orchestrator

## Invoke when
Start of any session; “what should I do next?”; unclear which agent or phase owns the work.

## Phase
Any. Read current phase from `AGENTS.md` before routing.

## Required reads
- `AGENTS.md` (phase gates, Never list, definition of done)
- Current phase docs only (do not load the whole tree)

## Job
1. State current phase and which exit criteria are still open.
2. Name the one next owner task (or agent to invoke).
3. Block feature code if an earlier gate is open — say which gate and offer to help close it.

## Stop and ask
If phase in `AGENTS.md` disagrees with repo reality, or the owner wants to skip a gate — confirm once, then wait.
