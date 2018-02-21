# WPLib Box

**The EASIEST way to get a local WordPress development environment**

## Links
 - [Quick Start](http://wplib.github.io/wplib-box/#quickstart)
 - [Full Documentation](http://wplib.github.io/wplib-box/)
 - [Interactive Help](https://wplib.slack.com) on [Slack](https://slackhq.com) <em>(Join [here](https://slackpass.io/wplib))</em>


## Release Candidate - NEW! 

We have a candiate for our next release available for testing! 

If you a familiar with WPLib Box [please help us test](#instructions-for-getting-0160-rc). 


## Instructions for getting 0.16.0-rc 

If you new to WPLib Box click [**here**](#new-to-wplib-box).  If not, continue on.

The following should work **for Mac users**: 

```
cd ~/Sites
git clone https://github.com/wplib/wplib-box.git 0.16.0-rc
cd 0.16.0-rc
git checkout -b 0.16.0-rc origin/0.16.0-rc
vagrant up
sleep 3
open "http://wplib.box"
```
For **Windows** or **Linux** users you will probably need use a different directory on the first `cd` command. Pick the parent directory where you typically put your website projects.

**Note:** The `sleep 3` command is needed if you run the commands in a script but not if you type the commands in manually one-by-one.

### New to WPLib Box?

If you are new to WPLib Box be sure to:

- [**Install required software**](http://wplib.github.io/wplib-box/#required-hw) to support WPLib Box.

Once installedd [**return to getting**](#instructions-for-getting-0160-rc) `0.16.0-rc`.

### If you get 404 Not Found on Vagrant Up
If you get a 404 error from `vagrant up` chances are you are on a `1.x` version of Vagrant and need to upgrade to a `2.x` version.  The `1.x` version does not recognize the new Vagrant Cloud and still looks to [atlas.hashicorp.com](https://atlas.hashicorp.com) for our Vagrant image, which is obviously no longer there _(not sure why Hashicorp does not support redirects here, but maybe Vagrant `1.x` deoes not follow them?)_ 

Upgrading Vagrant to `2.x` then running `vagrant plugin repair` should resolve this issue. 

Here is what this error looks like on the command line:

```
$ vagrant up
Bringing machine 'default' up with 'virtualbox' provider...
==> default: Box 'wplib/wplib' could not be found. Attempting to find and install...
    default: Box Provider: virtualbox
    default: Box Version: 0.16.0-rc
The box 'wplib/wplib' could not be found or
could not be accessed in the remote catalog. If this is a private
box on HashiCorp's Atlas, please verify you're logged in via
`vagrant login`. Also, please double-check the name. The expanded
URL and error message are shown below:

URL: ["https://atlas.hashicorp.com/wplib/wplib"]
Error: The requested URL returned error: 404 Not Found
```

## How to Test
- **To help us QA our changes**, please review the [issues for the `0.16.0` milestone](https://github.com/wplib/wplib-box/milestone/24) and look for any that are marked _"Ready for QA"_ as we think those tickets should all be working.  If we missed something, please add comments to the respective issue.
- **To review it for your own use-cases** go ahead and set up your own project to work with it and see if it meets your needs, if you struggle to understand anything, if anything does not work for you, or if you have an idea for how it can become better please [add an issue](https://github.com/wplib/wplib-box/issues/new).
- **Pay attention to performance.**  We think this release resolved some performance issues  we did not even know we had; it feels much faster to us.  We'd like to know if it also feels faster to you. Let us know in the `#box` channel on our [Slack account](wplib.slack.com) <em>(join [here](https://slackpass.io/wplib).)</em>


## Troubleshooting, Questions and Feedback/Bug Reports
- **If your browser times out** trying to load http://wplib.box check your `/env/hosts` file to see if you have more than one IP address entry mapped to the `wplib.box` domain and its various subdomains.
- **If you have questions** please post them in the `#box` channel on our [Slack account](https://wplib.slack.com) <em>(join [here](https://slackpass.io/wplib).)</em>
- **If you find bugs or have suggestions** of any type, please [**create an issue on Github**](https://github.com/wplib/wplib-box/issues/new) so we can keep track of your feedback.
