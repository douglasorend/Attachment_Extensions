[hr]
[center][color=red][size=16pt][b]ATTACHMENT EXTENSION v2.3[/b][/size][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=253913][b]By Dougiefresh[/b][/url] -> [url=http://custom.simplemachines.org/mods/index.php?mod=3039]Link to Mod[/url]
[/center]
[hr]

[color=blue][b][size=12pt][u]Introduction[/u][/size][/b][/color]
Evidentally, some FTP clients, which shall rename nameless (*cough*cough* FileZilla), doesn't transfer files without an extension correctly without some work.  After reading at one of these threads on the Simple Machines forum (lost the link), I wondered how hard it would be to add an extension to the filenames that attachments are stored under.  So I did some research and figured out it wasn't hard at all.....

[b]PLEASE NOTE[/b] that uploaded avatars are considered attachments within SMF and this mod will rename them as well as regular attachments!

[color=blue][b][size=12pt][u]What It Does[/u][/size][/b][/color]
This mod makes a small change to Subs.php to add the ".321" extension to all attachment filenames.  It also renames all attachments to have the ".321" extension.  Upon uninstalling, it removes the ".321" extension.  This mod also modified the code for the PM attachments mod, if present, in order to effect the same modification to it.

[b]AEVA MEDIA:[/b] This mod adds the proper extension (lowercase) to the media attachment file, thus [b]1_blah[/b] becomes [b]1_blah.jpg[/b] if the original filename has an extension of [b]jpg[/b].

[color=blue][b][size=12pt][u]Credits[/u][/size][/b][/color]
[url=http://www.simplemachines.org/community/index.php?action=profile;u=391249]stucki[/url] requested the addition of support for Aeva Media files.  Thanks, Stucki!

[color=blue][b][size=12pt][u]Admin Settings[/u][/size][/b][/color]
There are no admin settings.  To disable it, you must remove this mod.

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.9, but should work on any version of SMF 2.0.x.  SMF 1.x and SMF 2.1 is not and will not be supported.

If you use the [url=http://custom.simplemachines.org/mods/index.php?mod=1974]PM Attachments[/url] mod, it should be installed before this mod.

If you use the [url=http://custom.simplemachines.org/mods/index.php?mod=977]Aeva Media v1.4w[/url] mod, it should be installed before this mod.

This mod should be installed AFTER a forum conversion (phpbb -> smf), not before, as files will not be named correctly during the conversion.

[color=blue][b][size=12pt][u]Compatibility Notes[/u][/size][/b][/color]
This mod was tested on SMF 2.0.8, but should work on earlier versions of SMF 2.0.x.  SMF 1.x is not and will not be supported.

[color=blue][b][size=12pt][u]Changelog[/u][/size][/b][/color]
The changelog has been removed and can be seen at [url=http://www.xptsp.com/board/index.php?topic=6.msg130#msg130]XPtsp.com[/url].

[color=blue][b][size=12pt][u]License[/u][/size][/b][/color]
Copyright (c) 2015, Douglas Orend
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.

2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
