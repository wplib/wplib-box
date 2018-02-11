# WPLib Box

**The EASIEST way to get a local WordPress development environment**

## Release Candidate - !NEW! 

We have a candiate for our next release available for testing! 

If you a familiar with WPLib Box [please help us test](#instructions-for-0160-rc). 


## Links
 - [Quick Start](http://wplib.github.io/wplib-box/)
 - [Documentation](http://wplib.github.io/wplib-box/)
 - [Interactive Help](https://slackpass.io/wplib) on [Slack](https://slackhq.com)

## Instructions for 0.16.0-rc 

The following should work **for Mac users** _(Windows and Linux users probably need a different directory on the `cd` command):_

```cd ~/Sites
git clone https://github.com/wplib/wplib-box.git 0.16.0-rc
cd 0.16.0-rc
git checkout 0.16.0-rc
vagrant up
open wplib.box
```

If your browser tries to load http://wplib.box but times out check to see if you have more than one IP address entry mapped to the `wplib.box` domain and its various subdomains.

If you have questions please post them in the `#box` channel on our [Slack account](https://slackpass.io/wplib).

If you find bugs or have suggestions of any type, please [**create an issue on Github**](https://github.com/wplib/wplib-box/issues/new) so we can keep track of your feedback.
