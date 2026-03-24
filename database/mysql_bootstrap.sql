-- Optional: create the database in phpMyAdmin (or use your host’s DB wizard).
-- Then configure .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD) and run from SSH / terminal:
--   php artisan migrate --force
--   php artisan db:seed --force
--   php artisan storage:link --force
--
-- Laravel owns the real schema via migrations in database/migrations/.

CREATE DATABASE IF NOT EXISTS `charity_trust`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
