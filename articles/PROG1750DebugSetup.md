Adding the flash Debugger
==========================

FDT contains support for the `trace()` as command as well as for actually debugging within eclipse. To use that support it is necessary to install the flash debugger. On windows, flash runs within the Internet Explorer (IE) active X control. This can be [installed from here.](http://download.macromedia.com/pub/flashplayer/updaters/12/flashplayer_12_ax_debug.exe). At the college you will need to save this away somewhere and install it when you need to debug because of the deep freeze environment.

On Mac, the plugin environment is slightly different, more like the netscape plugin environment on windows. The plugin that we use on the [mac is here.](http://fpdownload.macromedia.com/pub/flashplayer/updaters/12/flashplayer_12_plugin_debug.dmg)

Once the plugin is installed you can right mouse in windows or on the mac over the code you wish to debug and click `Debug As/FDT SWF Application`. If you set a breakpoint, you will be in the eclipse debugger on that line of your script. `trace()` commands will also appear in your console window.  