- List command artisan : php artisan list
- Maintaince mode: Open console, cd to root folder, type : php artisan down
    The default template for maintenance mode responses is located in :  resources/views/errors/503.blade.php
    To disable maintenance mode, use the up command: php artisan up
- Database:
  + Tạo model có tên là Country, đồng thời tạo luôn cả CountryController và file migration create_countries_table
    php artisan make:model Country -mc
  + Tao table : php artisan migrate
  + Rollback lai thao tac gan nhat : php artisan migrate:rollback
  + Rollback ban dau : php artisan migrate:reset
  + Rollback roi Tao moi : php artisan migrate:refresh

- Su dung Vuejs:
  + Cai dat : cd folder_contain_package.json
    npm install
  + Build : npm run dev

- ElasticSearch:
  + Run ElasticSearch: cd folder_elastic
    bin\elasticsearch.bat
    
