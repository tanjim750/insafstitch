# Database Installation

New installations use the consolidated MySQL schema in
`database/schema/mysql-schema.sql`. Historical migrations are retained in
`database/migrations_legacy` for reference only and must not be moved back into
`database/migrations`.

## Install a new database

Configure an empty MySQL database in `.env`, then run:

```bash
php artisan config:clear
php artisan migrate --seed
php artisan app:create-superuser
```

The baseline seeder creates operational defaults only: settings, interface
text, order statuses, permissions, roles, default size/color values, couriers,
and delivery charges. It does not create dummy products, customers, or orders.

## Future schema changes

Create normal forward-only migrations in `database/migrations`:

```bash
php artisan make:migration describe_the_schema_change
```

Do not edit the schema dump for routine changes. Regenerate it only after a
release's migrations have been applied and verified on a disposable database.
