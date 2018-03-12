```
 __          _______  _      _ _       ____
 \ \        / /  __ \| |    (_) |     |  _ \
  \ \  /\  / /| |__) | |     _| |__   | |_) | _____  __
   \ \/  \/ / |  ___/| |    | | '_ \  |  _ < / _ \ \/ /
    \  /\  /  | |    | |____| | |_) | | |_) | (_) >  <
     \/  \/   |_|    |______|_|_.__/  |____/ \___/_/\_\
```

![WPLib-Box](https://github.com/wplib/wplib-box/blob/master/WPLib-Box-100x.png)

# W014 - Error container can't be started.

## Cause
Usually an error returned from the `box` command with any of the sub-commands `install`, `start`, `stop`, `rm`, `clean` and `refresh`.
The specified container can't be started. Due to several reasons:
* The container doesn't exist.
* Another container is already listening on ports that are required by this container.

## Common fixes
Check to make sure that the container exists - `container ls`
Check to ensure no other container is listening on required ports - check the error message from the box command.

### 


## See Also
[Complete Error code repository for WPLib Box](https://github.com/wplib/wplib-box/tree/master/docs/errors)

