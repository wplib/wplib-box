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
p, li { font-family: Georgia, "Times New Roman", "Bitstream Charter", Times, serif }
h1,h2 { font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif; }
h1 {margin-bottom:0;}
h2 {margin:0 auto 42px;font-style: italic;}
#content { padding: 0 50px; margin: 0 auto; text-align: left;}
</style>
</head>
<body>
<div id="main">
    <div id="outer">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="100" height="100" alt="WPLib Box Logo"/>
        <h1>WPLib Box Welcome Theme</h1>
        <h2>Version 0.16.0-rc</h2>
        <div id="content">
            <p>Hello and welcome to WPLib Box. This theme should help you get started.</p>
            <p>Things you will likely want to do, in order:</p>
            <ul>
                <li><a href="<?php echo site_url( '/wp-login.php' ); ?>" target="_blank">Login</a> to the admin</li>
                <li><a href="#" target="_blank">See</a> this page in the admin</li>
                <li><a href="<?php echo admin_url( '/themes.php' ); ?>" target="_blank">Switch</a> to a real WordPress theme</li>
                <li><a href="<?php echo admin_url( '/plugins.php' ); ?>" target="_blank">Install and activate</a> plugins</li>
                <li><a href="#" target="_blank">Change</a> the <a href="http://wplib.box" target="_blank">wplib.box</a> domain name to one for your project.</li>
                <li><a href="#" target="_blank">Disconnect</a> the <a href="https://github.com/wplib/wplib-box" target="_blank">WPLib Box GitHub repository</a> from your project</li>
            </ul>

            <p>You may also need to:</p>
            <ul>
                <li><a href="http://adminer.wplib.box" target="_blank">Explore</a> the WordPress' MySQL database using Adminer</li>
                <li><a href="http://mailhog.wplib.box" target="_blank">View</a> emails sent out by WPLib Box in MailHog <em>(if any)</em></li>
                <li><a href="#" target="_blank">Enable</a> a different stack <em>(vs. Nginx/MySQL/PHP7/Redis)</em></li>
                <li><a href="#" target="_blank">Manage</a> your project dependencies using <a href="https://getcomposer.org" target="_blank">Composer</a></li>
            </ul>

            <p>And to give feedback or get help:</p>
            <ul>
                <li><a href="https://github.com/wplib/wplib-box/issues/new" target="_blank">Submit</a> feature requests and/or bug reports for WPLib Box</li>
                <li><a href="https://launchpass.com/wplib" target="_blank">Join</a> the WPLib Box Slack community</li>
                <li><a href="http://wplib.slack.com" target="_blank">Ask questions</a> about WPLib Box in Slack</li>
            </ul>

        </div>
    </div>
</div>
</body>
</html>
