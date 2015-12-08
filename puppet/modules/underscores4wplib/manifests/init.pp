class underscores4wplib {
  exec { 'composer install':
    cwd         => '/var/www/underscores4wplib',
    environment => ['HOME=/home/vagrant'],
    path        => ['/usr/local/bin/', '/usr/bin'],
    user        => 'vagrant',
    group       => 'vagrant'
  }
  file { '/etc/nginx/sites-available/underscores.conf':
    ensure   => file,
    source   => 'puppet:///modules/underscores4wplib/nginx.conf'
  }
  file { '/etc/nginx/sites-enabled/underscores.conf':
    ensure    => link,
    target    => '/etc/nginx/sites-available/underscores.conf',
    subscribe => File['/etc/nginx/sites-available/underscores.conf'],
    notify    => Service['nginx']
  }
  vcsrepo { '/var/www/underscores4wplib/www/content/themes/underscores4wplib':
    ensure   => present,
    provider => git,
    source   => 'https://github.com/wplib/underscores4wplib',
  }
  mysql::db{'underscores4wplib':
    user           => 'wordpress',
    password       => 'wordpress',
    host           => '%',
    grant          => ['ALL'],
    sql            => '/vagrant/puppet/modules/underscores4wplib/files/import.sql',
    import_timeout => 900
  }
  file { '/var/www/underscores4wplib/www/content/object-cache.php':
    ensure    => link,
    target    => '/var/www/underscores4wplib/www/content/plugins/wp-redis/object-cache.php',
    subscribe => Exec['composer install'],
  }
}