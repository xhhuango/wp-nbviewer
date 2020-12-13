# WPNbviewer

WPNbviewer is a WordPress plugin to display jupyter notebooks in posts.


[nbviewer](https://nbviewer.jupyter.org/) is a great tool to share jupyter notebooks. 
It can beautifully display notebook in browsers.
[nbconvert](https://github.com/ghandic/nbconvert) is a WordPress plugin that embeds nbviewer results in WordPress posts.
However, nbconvert requires you to add additional CSS in your WordPress, 
and its installation requires you to install WPPusher.


WPNbviewer is a fork of nbconvert, but it does not require you to add additional CSS.

## Installation

Download wp-nbviewer.zip from [releases](https://github.com/xhhuango/wp-nbviewer/releases).

On WordPress, go to Plugins->Add New->Upload Plugin, and upload wp-nbviewer.zip and install it.

## Usage

Use shortcode "wpnbviewer" in posts.

```
[wpnbviewer url="https://github.com/path/to/notebook.ipynb"]
```
