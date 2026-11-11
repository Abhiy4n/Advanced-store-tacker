# Risks and Unknowns
| Risk / unknown | Impact | How to test it cheaply (spike) | Result |
|----------------|--------|--------------------------------|--------|
| Google OAuth client secret leaked via chat/git | Account takeover / abuse of OAuth client | Keep secrets only in `.env`; rotate if exposed; never commit `.env` | Open — rotate if secret was pasted |
| SPA (React) + Laravel session/CORS cookie auth | Login works in Postman but not browser | Spike Sanctum SPA cookie auth on localhost | Not started |
| PostgreSQL not running locally while app still on SQLite | Migrations diverge / surprise in foundation | Point `.env` at Postgres; run migrate once Postgres is up | Deferred — migrations written, not run yet |
| FastAPI calling Laravel-owned user data | Authz bugs / dual source of truth | ADR: Laravel owns users; FastAPI receives verified identity only | Documented in architecture ADR path |
| v1 data migration unknown | Bad cutover | Audit v1 DB after retrospective; dry-run mapping | Not started |
