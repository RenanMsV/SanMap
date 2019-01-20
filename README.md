# [WEB] MapAndreas online
PHP Tool that can get the Z (aprox) coordinate from a X and Y coordinate.
As the MapAndreas pawn plugin does.

From https://forum.sa-mp.com/showthread.php?t=280330

![](http://i51.tinypic.com/1zh313s.png)

What is it ?
This is a online variant of the famous plugin MapAndreas (by Kalcor). You can select a spot on the map and it will get you the X,Y and correct Z coordinate*

It will automaticly find the right altitude using the previewmap made by Kalcor. You can also get the coordinates for gangzones and/or player world bounds ! Just select the point where it should begin and then select the other waypoint and it will generate the code for you!

What is it usefull for ?
*Getting coordinates for placing vehicles without needing to go ingame using fsdebug!
*Getting coordinates for player spawnpoints without needing to go ingame using fsdebug!
*Getting the code for gangzones/playerworldbounds

Online demo
http://www.gamer93.net/mapandreas/ (offline)

Sourcecode
http://solidfiles.com/d/9b72a4bcb1/ 

Credits
Kalcor for the MapAndreas plugin (or actually the preview image i used).
Ian Albert for the GTA San Andreas Detailed map.
Myself for the PHP/Javascript/Html scripts.

Changelog
Code:
-1.1:
Small bugfix, if user scrolls down the page, it will automaticly correct the coordinate now.
*Please note that the preview image is 400x400, if i would have used the full map it would take 80mb ram per user on my server which requires too much capacity. It is pretty accurate and does the job, but it does NOT meet the accuracy of the original MapAndreas plugin.
