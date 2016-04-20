<?php

$www_root = dirname( __DIR__ ) . '/www';

$actions = array(
    "delete" => array(
        "wp/wp-config-sample.php",
        "wp/readme.html",
    ),
    "overwrite" => array(
        "wp/xmlrpc.php",
        "wp/wp-trackback.php",
        "wp/wp-links-opml.php",
    ),
);

foreach( $actions["delete"] as $file ) {

    if ( is_file( $file = "{$www_root}/{$file}" ) ) {

        unlink( $file );

    }

}

foreach( $actions["overwrite"] as $file ) {

    file_put_contents( "{$www_root}/{$file}", "<?php\n" );

}


