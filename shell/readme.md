# my website get hacked everytime.
So i explorer my website files and logs _
All i get _ uploaded here


## How hacker hacked my website ?

My website had wordpress script for install. unconfigured in "/wordpress/" diredtory . So hacker added his database connection
```php
define( 'DB_NAME', 'w37291p11km' );

/** Database username */
define( 'DB_USER', 'wp-install' );

/** Database password */
define( 'DB_PASSWORD', 'f[?<eqwxf37dd53278dd831775525+sH@{c' );

/** Database hostname */
define( 'DB_HOST', 'database-1.cvzqx1mclxdh.ap-northeast-1.rds.amazonaws.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
```
After database configured. He login into /wordpress/ and uploaded custom plugin "1573e01ab81348aaa355ea3dfb535f5c222.zip" into website.
Then he run this plugin subfolder script `/wordpress/wp-content/plugins/1573e01ab81348aaa355ea3dfb535f5c/mm/`
