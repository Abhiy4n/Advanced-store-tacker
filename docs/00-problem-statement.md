# Problem Statement
> Owner can rewrite this in their own words; thin pass so foundation can start.

## One-paragraph summary
StoreTrack v2 is a rebuild of a store inventory / shop tracking system. Staff need a reliable way to manage stock and related shop work through a web app (React) backed by Laravel, with FastAPI reserved for heavier algorithms and reports.

## Who is the next user? (one shop / many shops / chains / subscription?)
Single shop first (learning / walking-skeleton scope). Multi-shop / chains / subscription are deferred until the product scope is clearer.

## The pain they would pay to remove
Manual or fragile tracking of store inventory and shop operations; v1 lessons (including auth and data boundaries) should not be repeated blindly.

## Success in 6 months (use numbers)
- TODO (owner): number of stores, report generation time, uptime targets

## Non-goals for this version (what we are deliberately NOT building)
- Firebase Auth as the login system (Google login via Laravel Socialite instead)
- Multi-tenant chains / subscription billing
- Full algorithm/report product surface before walking skeleton

## Key assumptions
- Laravel owns identity (users) and main API data
- PostgreSQL is the application database
- Google sign-in is acceptable for staff login; email is required
