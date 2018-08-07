<?php
/**
 * The Welcome Theme for WPLib Box
 *
 * @package WPLib Box
 */
?>
<html>
<head>
    <title>The WPLib Box Welcome Theme</title>
<style type="text/css">
body { background: lightgray; font-size:18pt;}
#main { margin: 50px auto; text-align: center;}
#outer { padding: 50px; margin: 0 auto; width: 960px; background:white;;height:100%;}
#outer img { margin-right: 2em;}
p, li { font-family: Georgia, "Times New Roman", "Bitstream Charter", Times, serif }
h1,h2 { font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif; }
h1 {margin-bottom:0;}
h2 {margin:0 auto 42px;font-style: italic;}
#content { padding: 0 50px; margin: 0 auto; text-align: left;}
em { font-size:0.85em; }
</style>
</head>
<body>
<div id="main">
    <div id="outer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="527" height="146" alt="WPLib Box Logo"/>
        <h1>Welcome Theme</h1>
        <h2>Box Version 0.17.1</h2>
        <div id="content">
            <p>To get started with WPLib Box:</p>
            <ul>
                <li><a href="<?php echo site_url( '/wp-login.php' ); ?>" target="_blank">Login</a> to the WordPress admin <em>(username and password will be provided)</em></li>
                <li><a href="<?php echo site_url( '/wp-admin/themes.php?theme=wplib-box-welcome' ); ?>" target="_blank">Manage</a> this theme in the WordPress admin</li>
                <li><a href="<?php echo admin_url( '/themes.php' ); ?>" target="_blank">Switch</a> to a different WordPress theme</li>
                <li><a href="<?php echo admin_url( '/plugins.php' ); ?>" target="_blank">Install and activate</a> plugins</li>
                <!--
                <li><a href="#" target="_blank">Change</a> the <a href="http://wplib.box" target="_blank">wplib.box</a> domain name to one for your project.</li>
                <li><a href="#" target="_blank">Disconnect</a> the <a href="https://github.com/wplib/wplib-box" target="_blank">WPLib Box GitHub repository</a> from your project</li>
                -->
            </ul>

            <p>You may also want to:</p>
            <ul>
                <li><a href="http://wplib.org/box/" target="_blank">Read the docs</a> to configure WPLib Box for your needs</li>
                <li><a href="http://adminer.wplib.box?server=172.18.0.1&username=wordpress&db=wordpress" target="_blank">Explore</a> the WordPress' MySQL database using Adminer</li>
                <li><a href="http://mailhog.wplib.box" target="_blank">View</a> password reset and other emails in MailHog <em>(if any)</em></li>
                <li><a href="http://docs.wplib.box" target="_blank">See MkDocs</a> in action, for documenting your plugin or theme</li>
                <!--
                <li><a href="#" target="_blank">Enable</a> a different stack <em>(vs. Nginx/MySQL/PHP7/Redis)</em> <em>(NOT IMPLEMENTED YET)</em></li>
                <li><a href="#" target="_blank">Manage</a> your project dependencies using <a href="https://getcomposer.org" target="_blank">Composer</a> <em>(NOT IMPLEMENTED YET)</em></li>
                -->
            </ul>

            <p>To <strong>get help</strong> or give feedback:</p>
            <ul>
                <li>Get <strong>immediate help</strong> by <a href="https://launchpass.com/wplib" target="_blank">joining</a> our Slack community</li>
                <li><a href="https://github.com/wplib/wplib-box/issues/new" target="_blank">Submit</a> <strong>bug reports</strong> so we can make WPLib Box better.</li>
                <li><a href="https://github.com/wplib/wplib-box/issues/new" target="_blank">Submit</a> <strong>feature requests</strong> <em>(we really <strong>want</strong> to get these!)</em></li>
                <li>After you've joined our Slack <a href="http://wplib.slack.com" target="_blank"><strong>tell us about your needs!</strong></a></li>
            </ul>

        </div>
    </div>
</div>
</body>
</html>
