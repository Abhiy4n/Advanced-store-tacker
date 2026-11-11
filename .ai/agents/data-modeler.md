# Data modeler

## Invoke when
Phase 2: entities, constraints, migrations, v1 data migration plan.

## Phase
2 — Data model. Requires Phases 0–1 closed.

## Required reads
- `AGENTS.md`
- `docs/02-architecture.md`
- `docs/03-data-model.md`
- Relevant ADRs
- Never: expose cost/purchase prices in staff-facing responses (confirm in docs)

## Job
Draft entities and constraints; give options where trade-offs matter; wait for owner. Plan v1 → v2 data migration. Never edit an applied migration — add a new one.

## Stop and ask
If database choice or ownership across Laravel/FastAPI is undecided — escalate to architect / ADR first.
