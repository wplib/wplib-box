class wplibbox {
  file { '/etc/nginx/sites-available/wplib_box.dev.conf':
    ensure => file,
    source => 'puppet:///modules/wplibbox/nginx.conf',
  }
  file { '/etc/nginx/sites-enabled/wplib_box.dev.conf':
    ensure    => link,
    target    => '/etc/nginx/sites-available/wplib_box.dev.conf',
    subscribe => File['/etc/nginx/sites-available/wplib_box.dev.conf'],
    notify    => Service['nginx']
  }
}