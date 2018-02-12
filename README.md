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


## How to Test
- **To help us QA our changes**, please review the [issues for the `0.16.0` milestone](https://github.com/wplib/wplib-box/milestone/24) and look for any that are marked _"Ready for QA"_ as we think those tickets should all be working.  If we missed something, please add comments to the respective issue.
- **To review it for your own use-cases** go ahead and set up your own project to work with it and see if it meets your needs, if you struggle to understand anything, if anything does not work for you, or if you have an idea for how it can become better please [add an issue](https://github.com/wplib/wplib-box/issues/new).
- **Pay attention to performance.**  We think this release resolved some performance issues  we did not even know we had; it feels much faster to us.  We'd like to know if it also feels faster to you. Let us know in the `#box` channel on our [Slack account](wplib.slack.com) <em>(join [here](https://slackpass.io/wplib).)</em>


## Troubleshooting, Questions and Feedback/Bug Reports
- **If your browser times out** trying to load http://wplib.box check your `/env/hosts` file to see if you have more than one IP address entry mapped to the `wplib.box` domain and its various subdomains.
- **If you have questions** please post them in the `#box` channel on our [Slack account](https://wplib.slack.com) <em>(join [here](https://slackpass.io/wplib).)</em>
- **If you find bugs or have suggestions** of any type, please [**create an issue on Github**](https://github.com/wplib/wplib-box/issues/new) so we can keep track of your feedback.
