
## PWL Sunarin

### Update Package Dependencies
Make sure to install dependencies after pulling newest commit.

```sh
composer install
npm ci
npm run dev
```

### User untuk testing

Super admin
- Email: admin@localhost
- Password: admin123

Contributor
- Email: contributor@gmail.com
- Password: fanfanfan

Editor
- Email: editor@gmail.com
- Password: fanfanfan

User biasa
- Email: user@gmail.com
- Password: fanfanfan

Don't forget to run DB Seeder

```
php artisan db:seed 
```

and also don't forget to run websocket server
```
php artisan websockets:serve 
```

todo list
1. copntributor request
2. random pick editor 
3. change latest view article database to cookie
4. 
