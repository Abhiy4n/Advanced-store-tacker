# 0001. Google auth via Laravel Socialite
- **Status:** Accepted
- **Date:** 2026-11-10
- **Decided by:** owner

## Context
Staff need Sign in with Google. Firebase Auth was explored, but the stack is React → Laravel → FastAPI, and Laravel should own identity.

## Options considered
1. Firebase Auth (client Google → Laravel verifies ID token) — fast SSO, but extra vendor and auth outside Laravel
2. Laravel Socialite (Google OAuth redirect → Laravel callback) — fits main API; one auth system
3. Email/password only first — simplest, no Google yet

## Decision
Use **Laravel Socialite** with Google OAuth. Do not use Firebase Auth for login.

## Consequences
- Google Client ID/Secret live in Laravel `.env` only
- React starts login by hitting Laravel (`/auth/google`), not Firebase
- `frontend/src/firebase.ts` is unused for auth and can be removed later
- Sanctum (or equivalent) still needed for SPA session after callback
