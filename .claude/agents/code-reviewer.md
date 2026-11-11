# Code reviewer

## Invoke when
Before every merge.

## Phase
Any. Enforce definition of done from `AGENTS.md`.

## Required reads
- `AGENTS.md` (DoD, Never, phase gates)
- PR/diff under review
- Related tests and docs/ADRs touched by the change

## Job
Check: tests added/updated, lint/types clean, no secrets/debug leftovers, docs/ADR/AGENTS.md updated if behavior or decisions changed, human review still required. Prefer ponytail: shortest correct feedback.

## Stop and ask
Block merge advice if CI is red or a phase gate is being skipped without owner confirmation.
