```
 __          _______  _      _ _       ____
 \ \        / /  __ \| |    (_) |     |  _ \
  \ \  /\  / /| |__) | |     _| |__   | |_) | _____  __
   \ \/  \/ / |  ___/| |    | | '_ \  |  _ < / _ \ \/ /
    \  /\  /  | |    | |____| | |_) | | |_) | (_) >  <
     \/  \/   |_|    |______|_|_.__/  |____/ \___/_/\_\
```

![WPLib-Box](https://github.com/wplib/wplib-box/blob/master/WPLib-Box-100x.png)

# W012 - Error container can't be removed.

## Cause
Usually an error returned from the `box` command with any of the sub-commands `install`, `start`, `stop`, `rm`, `clean` and `refresh`.
The specified container cannot be removed. This is due to the container running.

## Common fixes
Shutdown the container by issuing `box container stop <container name>`

### 


## See Also
[Complete Error code repository for WPLib Box](https://github.com/wplib/wplib-box/tree/master/docs/errors)

