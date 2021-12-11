
## PWL Sunarin

### Update Package Dependencies
Make sure to install dependencies after pulling newest commit.

```sh
composer install
npm ci
npm run dev
```

### Role

Super admin
- Email: admin@localhost
- Password: admin123

Don't forget to run DB Seeder

```
php artisan db:seed --class=RolePermissionSeeder
```
