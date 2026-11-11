# 0002. users + social_accounts (no provider tokens)
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
OAuth users need a clear model: who the person is vs how they log in. Social-only users have no password.

## Options considered
1. `google_id` column on `users` — fast for Google-only; painful if another provider is added
2. `users` + `social_accounts` — clean multi-provider; small join
3. Store Google access/refresh tokens — only needed if calling Google APIs later

## Decision
Use **users + social_accounts**. Email on users is **required**. Password is **nullable**. Do **not** store provider tokens. Unique `(provider, provider_user_id)`.

## Consequences
- `users` shape lives in the base create migration (early stage, no real data; fresh Postgres migrate)
- `social_accounts` is a separate create migration
- After data exists in any environment, do not edit applied migrations — add new ones instead
- Account linking across providers is possible later
- Login flow only needs profile identity from Google, not long-lived Google API tokens
