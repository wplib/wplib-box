service{ 'nginx':
  ensure => running
}

service{ 'varnish':
  ensure => running
}

service{ 'mysql':
  ensure => running
}

include wplibbox
include underscores4wplib