# StoreTrack v2 — AI Working Agreement

Single source of truth for every AI tool (Claude, Copilot, Cursor, ChatGPT...).
Tool-specific files are generated from this one: run `scripts/sync-ai-files.sh`.

## Project
- **What:** Store inventory / shop tracking rebuild (see docs/00-problem-statement.md)
- **Stack:** React (frontend) · Laravel (main API) · FastAPI (algorithms, reports) · PostgreSQL
- **Current phase:** 3 — Foundation  <!-- update this line when a phase gate passes -->

## How AI must behave here (learning mode)
The owner is learning to run a project like a senior developer. So:
1. **The owner decides, AI advises.** For architecture, data model, or tooling choices: give 2–3 options, trade-offs, one recommendation, then STOP and wait. Never decide silently.
2. **Explain the why** in 2–3 sentences for every non-trivial suggestion.
3. **Record decisions** as an ADR in `docs/adr/` (use the template).
4. **No scope creep.** Features outside `docs/00-problem-statement.md` or listed under "Non-goals" are not built.
5. **Respect phase gates** (below). Do not write feature code while an earlier gate is open. If asked to, say which gate is open and offer to help close it.
6. **Small steps.** One task = one branch = one small PR with tests.
7. **If unsure, ask one clear question** rather than guessing.

## Never
- Commit secrets or real `.env` files; paste secrets/customer data into prompts.
- Edit a migration that has already been applied; add a new one instead.
- Touch production systems or data.
- Expose cost/purchase prices in any staff-facing response (business rule carried over from v1; confirm it in docs).
- Merge without passing CI and a human review.

## Phase gates
| # | Phase | Exit criteria (all must be true) |
|---|-------|----------------------------------|
| 0 | Discovery | `docs/00-problem-statement.md`, `01-v1-retrospective.md`, `04-risks.md` filled by the owner |
| 1 | Architecture | `docs/02-architecture.md` done; Laravel/FastAPI boundary + communication decided in ADRs |
| 2 | Data model | `docs/03-data-model.md` done; v1 data migration plan written |
| 3 | Foundation | Repo layout, Docker Compose, `.env.example`, one-command setup works |
| 4 | Quality gates | Lint, types, tests, secret scan run locally and in CI; CI is green |
| 5 | Walking skeleton | Hello-world of all services deployed to staging; logs + health checks + backup/restore tested |
| 6 | Vertical slices | Build thin end-to-end slices (UI → API → DB → deployed), one at a time |

## Cursor rules and skills
| Path | Role |
|------|------|
| `.cursor/rules/ponytail.mdc` | Always-on: simplest solution that works |
| `.cursor/rules/think-first.mdc` | Always-on: owner decides, AI advises (options → recommend → wait) |
| `.cursor/rules/simple-names.mdc` | Always-on: simple words for file and function names |
| `.cursor/skills/ponytail/` | On-demand lazy mode (`/ponytail`) |
| `.cursor/skills/ponytail-help/` | Ponytail command reference (`/ponytail-help`) |

## Agents (in `.ai/agents/`)
| Agent | Invoke when |
|-------|-------------|
| orchestrator | Start of any session; "what should I do next?" |
| product-scoper | Phase 0: problem, users, success metrics, non-goals |
| retrospective-auditor | Phase 0: audit v1 (README, code, DB) for lessons and risks |
| architect | Phase 1: service boundaries, communication, ADRs |
| data-modeler | Phase 2: entities, constraints, migrations, v1 data migration |
| repo-foundation | Phase 3 and 5: repo layout, Docker, env, deploy, observability |
| quality-gates | Phase 4: linters, tests, CI, pre-commit hooks |
| security-reviewer | Any phase: auth, permissions, input, secrets review |
| code-reviewer | Before every merge |
| docs-keeper | After every merged change: keep docs/AGENTS.md accurate |

Edit `.ai/agents/` only; run `scripts/sync-ai-files.sh` to refresh `.claude/agents/` and `.github/copilot-instructions.md`.

## Commands (fill in as they come to exist — outdated commands are worse than none)
| Task | Command |
|------|---------|
| Setup everything | TODO |
| Run all services | TODO |
| Serve Laravel API | `cd backend && php artisan serve` |
| Google login (browser) | `GET http://localhost:8000/auth/google` |
| Current user | `GET http://localhost:8000/api/me` (cookie session) |
| Run one test file/module | TODO |
| Lint + format + types | TODO |
| Run all checks (same as CI) | TODO |
| New migration | TODO |

## Definition of done (every PR)
- [ ] Tests added/updated and passing; CI green
- [ ] Lint/types clean
- [ ] No secrets, no debug leftovers
- [ ] Docs/ADR/AGENTS.md updated if behavior or decisions changed
- [ ] Reviewed by a human

## When AI gets something wrong
Add a line to `docs/ai-mistakes-log.md`, then fix the root cause (docs, tests, or this file) instead of only re-prompting. Review this file every few months and delete anything outdated.
