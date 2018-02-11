# WPLib Box

**The EASIEST way to get a local WordPress development environment**

## Release Candidate - NEW! 

We have a candiate for our next release available for testing! 

If you a familiar with WPLib Box [please help us test](#instructions-for-0160-rc). 


## Links
 - [Quick Start](http://wplib.github.io/wplib-box/#quickstart)
 - [Documentation](http://wplib.github.io/wplib-box/)
 - [Interactive Help](wplib.slack.com) on [Slack](https://slackhq.com) <em>(Join [here](https://slackpass.io/wplib))</em>

## Instructions for 0.16.0-rc 

The following should work **for Mac users** _(Windows and Linux users probably need a different directory on the `cd` command):_

```
cd ~/Sites
git clone https://github.com/wplib/wplib-box.git 0.16.0-rc
cd 0.16.0-rc
git checkout 0.16.0-rc
vagrant up
open "wplib.box"
```

### Troubleshooting, Questions and Feedback/Bug Reports
- **If your browser times out** trying to load http://wplib.box check your `/env/hosts` file to see if you have more than one IP address entry mapped to the `wplib.box` domain and its various subdomains.
- **If you have questions** please post them in the `#box` channel on our [Slack account](wplib.slack.com) <em>(join [here](https://slackpass.io/wplib).)</em>
- **If you find bugs or have suggestions** of any type, please [**create an issue on Github**](https://github.com/wplib/wplib-box/issues/new) so we can keep track of your feedback.
