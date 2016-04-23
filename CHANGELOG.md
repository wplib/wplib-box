# WPLib Box ChangeLog

# Version 0.10.5
- Changed nginx website root to `/var/www`.
- Upon `vagrant ssh` current directory is changed to website root.
- Increased upload_max_size to 100M.
- Set nginx "sendfile" option to off
- Added Support for PHP GD (php5-gd)
    - See http://php.net/manual/en/book.image.php
