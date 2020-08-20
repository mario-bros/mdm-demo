## DB Restore and Seed Guides

- Create fresh new DB in your PostgreSQL.
- Restore schema file begin from under database/main-schema.sql, then database/mdm-customer-finance-schema-only.sql &  database/mdm-customer-finance-insurance-only.sql .
- Seed DB with ```php artisan db:seed``` command.
- Run the applications to see the results, login using user: mario.fredrick@mncgroup.com and password: password.