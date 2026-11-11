# Data Model

## Entities and relationships
- **users** — who the person is (one row per human); includes `role`
- **social_accounts** — how they log in (many per user; e.g. Google)
- Relationship: `users 1—N social_accounts`
- Role duties: [`docs/roles.md`](roles.md) · ADR [`0004`](adr/0004-user-roles.md)

- **categories** — tree via `parent_id` (null = top category; set = subcategory)
- **brands**, **colors**, **sizes** — shared pick lists
- **products** — one style/item
- **product_images** — photos for a product (Cloudinary ids/urls)
- **product_variants** — sellable SKU (color + size + prices)
- Relationships: `users 1—N products` (`created_by`); `categories 1—N products`; `products 1—N product_images` / `product_variants`
- Rule: if `subcategory_id` is set, that row’s `parent_id` must equal `category_id` (enforce in app validation)
- Stock quantity is **not** on variants; it will come from stock movement rows later
- Cost/purchase price must not appear in staff-facing responses unless the role is allowed (see AGENTS.md)

## Table notes (owner service, constraints, indexes and the query that needs them)
| Table | Owner | Constraints / indexes | Why |
|-------|-------|----------------------|-----|
| users | Laravel | `email` required, unique; `password` nullable; `avatar_url` optional; `role` default `admin` | Social-only users; one role per user for now |
| social_accounts | Laravel | FK `user_id` cascade delete; unique `(provider, provider_user_id)` | Lookup on Google callback |
| categories | Laravel | self FK `parent_id` nullOnDelete; unique `(parent_id, name)` | Clean category / subcategory tree |
| brands | Laravel | unique `name` | Shared brand list |
| colors | Laravel | unique `name` | Shared color list |
| sizes | Laravel | unique `name`; `sort_order` | Shared size list, display order |
| products | Laravel | FKs category (restrict), subcategory (nullOnDelete), brand (nullOnDelete), created_by; index `(status, category_id)`, `name` | Catalog filters |
| product_images | Laravel | FK `product_id` cascade delete; `sort_order` | Ordered gallery; primary via `is_primary` |
| product_variants | Laravel | FKs product (cascade), color/size (restrict); unique `sku`, unique `barcode`, unique `(product_id, color_id, size_id)` | One SKU per color/size |

No `access_token` / `refresh_token` columns — login only, not calling Google APIs later.

### products columns
name, category_id, subcategory_id (nullable), brand_id (nullable), gender, description (nullable), status, tax_rate (nullable), tags (json, nullable), created_by, timestamps  
Gender/status: string columns + PHP enums (`App\Enums\…`), not DB enums.

### product_images columns
product_id, public_id (Cloudinary), url, sort_order, is_primary, timestamps

### product_variants columns
product_id, color_id, size_id, name, sku, barcode (nullable), purchase_cost, selling_price, status, timestamps  
**Not stored:** current stock qty, low-stock threshold, shelf/rack

## Decisions (money, time zones, IDs, tenancy, history/audit, delete strategy)
- Database: **PostgreSQL** (see ADR 0003)
- IDs: biginteger auto-increment for now (default Laravel)
- Email: required; normalize (lowercase/trim) in app code when wiring Socialite
- Delete: deleting a user cascades social_accounts; products keep `created_by` null if user removed; deleting a product cascades images and variants; categories/colors/sizes used by products are restrict-on-delete
- Money: **`decimal(12,2)`** (see ADR 0005)
- Catalog FKs: categories/brands/colors/sizes (see ADR 0006)
- Tenancy / multi-shop: deferred (single shop)
- Stock ledger / audit of qty: TODO (next slice)

## v1 → v2 data migration plan
Mapping · validation counts · dry run · rollback

Auth tables are greenfield for v2. Full v1 → v2 data mapping waits on the v1 retrospective audit. Until then: no production cutover; local Postgres only when the owner runs migrate. Early-stage note: empty product tables were rolled back once to reshape FKs before real catalog data; after real data, treat applied migrations as immutable.
