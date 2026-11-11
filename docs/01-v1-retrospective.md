# v1 (StoreTrack2) Retrospective
> For each finding: what breaks at 100x usage? Mark Confirmed (seen in code) or Question.
> Thin pass — full v1 audit still pending.

| Finding | Evidence | Status (Confirmed/Question) | Severity | Lesson for v2 |
|---------|----------|-----------------------------|----------|---------------|
| Staff must not see cost/purchase prices | Carried in AGENTS.md from v1 | Question (confirm in v1 code) | High | Keep as a hard API/UI rule; verify in security review |
| Auth / identity approach unclear for SPA | v2 exploration (Firebase vs Socialite) | Confirmed (decision made for v2) | Medium | Laravel Socialite owns Google OAuth; users + social_accounts |
| Dual backend (Laravel + FastAPI) needs clear ownership | Stack choice in AGENTS.md | Question | Medium | Laravel owns auth + CRUD; FastAPI owns algorithms/reports |
| Full v1 schema/code audit not done yet | docs still thin | Question | Medium | Complete retrospective before large data migration |

## Business rules v1 learned that v2 must keep
- Do not expose cost/purchase prices in any staff-facing response (confirm against v1, then keep)

## Things v1 did well
- TODO (owner after reading v1 repo)
