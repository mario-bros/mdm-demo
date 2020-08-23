## DB Restore and Seed Guides

- Create fresh 3 new DB schema with your MySQL.
- Restore schema by issuing this command sequentially ```php artisan migrate``` then ```php artisan migrate --database=INSU --path=database/migrations/mdm_staging_insurance``` and ```php artisan migrate --database=FINA --path=database/migrations/mdm_staging_finance```.
- Seed DB with ```php artisan db:seed``` command.
- Run the applications to see the results, login using user: mario.fredrick@mncgroup.com and password: password.