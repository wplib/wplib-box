```
 __          _______  _      _ _       ____
 \ \        / /  __ \| |    (_) |     |  _ \
  \ \  /\  / /| |__) | |     _| |__   | |_) | _____  __
   \ \/  \/ / |  ___/| |    | | '_ \  |  _ < / _ \ \/ /
    \  /\  /  | |    | |____| | |_) | | |_) | (_) >  <
     \/  \/   |_|    |______|_|_.__/  |____/ \___/_/\_\
```

![WPLib-Box](https://github.com/wplib/wplib-box/blob/master/WPLib-Box-100x.png)

# W019 - Error not all containers could be stopped.

## Cause
Usually an error returned from the `box` command with the sub-command `shutdown`.
There was an error in shutting down one of the containers.

## Common fixes
Check the output of the box command for further analysis.
Issue a `box ls` to see what containers could not be stopped.

### 


## See Also
[Complete Error code repository for WPLib Box](https://github.com/wplib/wplib-box/tree/master/docs/errors)

