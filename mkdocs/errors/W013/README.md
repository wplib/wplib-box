```
 __          _______  _      _ _       ____
 \ \        / /  __ \| |    (_) |     |  _ \
  \ \  /\  / /| |__) | |     _| |__   | |_) | _____  __
   \ \/  \/ / |  ___/| |    | | '_ \  |  _ < / _ \ \/ /
    \  /\  /  | |    | |____| | |_) | | |_) | (_) >  <
     \/  \/   |_|    |______|_|_.__/  |____/ \___/_/\_\
```

![WPLib-Box](https://github.com/wplib/wplib-box/blob/master/WPLib-Box-100x.png)

# W013 - Error container can't be installed.

## Cause
Usually an error returned from the `box` command with any of the sub-commands `install`, `start`, `stop`, `rm`, `clean` and `refresh`.
The specified container image can't be installed. Due to anotehr container already existing.

## Common fixes
Remove the container with the same name.
`box container rm <container name>`

### 


## See Also
[Complete Error code repository for WPLib Box](https://github.com/wplib/wplib-box/tree/master/docs/errors)

