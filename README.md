# timezone
PHP timezone conversion.

## How To Use
- [x] Create local database called `timezonedb`
- [x] Import database from file `timezonedb.sql.zip`
- [x] Run `index.php`

## Instal PECL Extension For TimeZone Database
- [x] Install timezonedb using PECL extension `$ pecl7 install timezonedb`
- [x] Add `extension=timezonedb.so` in `php.ini`
- [x] Restart php `service php-fpm restart`

Note: For more info please follow this link `https://stackoverflow.com/questions/52078696/how-to-upgrade-timezonedb-timelib-on-php7-plesk-onyx`

## Update TimeZone Database Automatically
- [x] Upgrade timezonedb `$ pecl7 upgrade timezonedb && pecl7 upgrade intl`
- [x] Restart php `service php-fpm restart`

Note: You can add the command as cron job.

## API
This api to get timezone conversion.
```
Endpoint: https://dev.sirlana.com/v1/timezone
Method: POST
Fields: from_datetime: 2020-06-12T22:02
        from_timezone: Asia/Jakarta
        to_timezone: Europe/Andorra
Result:
{
    "to_datetime": "2020-06-12T22:02"
}
```