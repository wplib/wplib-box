```
 __          _______  _      _ _       ____
 \ \        / /  __ \| |    (_) |     |  _ \
  \ \  /\  / /| |__) | |     _| |__   | |_) | _____  __
   \ \/  \/ / |  ___/| |    | | '_ \  |  _ < / _ \ \/ /
    \  /\  /  | |    | |____| | |_) | | |_) | (_) >  <
     \/  \/   |_|    |______|_|_.__/  |____/ \___/_/\_\
```

![WPLib-Box](https://github.com/wplib/wplib-box/blob/master/WPLib-Box-100x.png)

# W010 - Error image doesn't conform to JSON config format in 0.16 or later.

## Cause
Usually an error returned from the `box` command with any of the sub-commands `install`, `start`, `stop`, `rm`, `clean` and `refresh`.
The specified container image is not using the WPLib-Box JSON string that is present in all images from WPLib-Box version 0.16 and onwards.

## Common fixes
You may have to upgrade to WPLib-Box 0.16 or later.
Alternatively start the container manually.

### 


## See Also
[Complete Error code repository for WPLib Box](https://github.com/wplib/wplib-box/tree/master/docs/errors)

