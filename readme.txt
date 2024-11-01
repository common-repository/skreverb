=== Skloogs Reverb ===

Contributors: skloogs
Donate link: http://tec.skloogs.com/dev/plugins
Tags: music,band,reverbnation,tunepak,widget,flash,player,venues,fans
Requires at least: 2.7
Tested up to: 3.0
Stable tag: 1.2.0

This plugin is a Skloogs Music development.

== Description ==

This wordpress plugin allows the display of the various ReverbNation widgets on your blog's posts,
pages or sidebars, simply and efficiently, by the use of the `[reverb]` markup.


_IMPORTANT_:
This plugin has been handled over to the ReverbNation team. Please use the new version
<a href="http://wordpress.org/extend/plugins/reverbnation-widgets/">here</a>
Development on this version is stopped and no support is offered.

== Installation ==

1. Copy the `skreverb` directory into directory `/wp-content/plugins/`;
1. Ativate the plugin within the 'Plugins' menu in WordPress;
1. Configure the plugin's default options in the ReverbNation options panel
1. Use the `[reverb]` syntax in your templates and/or posts: see Syntax in the Other Notes section.

== About label, artist, venue fan and store IDs ==

For the moment, you have to find these IDs as explained hereafter. I'll soon update the plugin so that you can
enter directly your URL or shortname, but in the meantime you have to enter the corresponding IDs.

To find one ID, just visit your artist, label, fan, or venue page and check any of the red title
links (Bio, New Releases, Artist Roster, About...). The link should end with a 5 or 6 digits number: that is your ID.

By default, your artist ID will be used in the widgets, and if it's missing the label ID will be,
or your venue ID, or your fan ID, in this order.

In the next version of this plugin, you will have the ability to fill all available IDs and
still be able to decide which corresponding widget to display (artist, venue, label...)

Regarding the store ID, the procedure is a bit trickier, unfortunately. You will have to go to your
ReverbNation account, look for the Store Widget (in the Widgets section), click on "Get Widget" and
inspect the "Embed code" display: at the third visible line you will see something like userId=
followed by a 5 digits number and an ampersand (&) sign. The store ID is that 5 digits number.

I know this is a little inconvenient, but be patient: I'll ease things as soon as possible.

== Syntax and currently supported options ==

The plugin syntax is quite basic. Use `[reverb <widgets>]` at the right place
you want to see the widget.

The `<widgets>` parameter is a comma separated list of RN widgets and their
and possible options. The options are separated from the widget name by an `=` character and from one another by the `|`
character. Additionally, an option can take an argument after the `:` character.

The widgets are:

* tunes
* shows
* largeshows
* blogshows
* showsmap
* player
* miniplayer
* microplayer
* blogplayer
* videos
* fans
* blogfans
* streetteam
* store
* grabbox
* press
* fanexclusive
* playerpro
* videospro
* showspro
* presspro
* fanspro
* charts

The options are as follows:

* a -> autoplay [true|false]
* s -> shuffle [true|false] (e.g: s:true)
* b -> blog/buzz [blog|buzz] (e.g: b:blog)
* d -> display mode [list|details|smart] (e.g: d:smart)
* w -> widget width (e.g.: w:300)
* h -> widget height (e.g.: w:150)
* sz -> widget size (overrides w and h parameters) [standard|blog|mini|micro|custom]
* bg -> widget background color, as an hex value (6 hex digits) (e.g.: bd:e8b332)
* tx -> widget text color, same syntax as bg
* bd -> widget border color, same syntax as bg
* sm -> showmap [true|false] (e.g: sm:true)
* st -> streetteam [true|false] (e.g: st:true)
* sk -> skin [classic|seamless|tiny|strong|electrogreen|sketched|bigbutton|bigbuttonlight] (e.g: sk:tiny)
* wm -> widget mode [opaque|transparent] (e.g: wm:opaque)
* P -> playlist [playlist_ID]
* S -> song [song_ID]
* A -> artist [artist_ID]
* L -> label/manager [label_ID]
* F -> fan [fan_ID]
* V -> venue [venue_ID]

Now some examples:

* If I'd like a TuneWidget with autoplay and shuffle active and showing my buzz first,
this would be the syntax: `[reverb tunes=a:true|s:true|b:buzz]`

* Now if I'd like a ShowsWidget with a bordeaux background, yellow text and a smart display,
I'll use: `[reverb shows=bg:840a0a|tx:fffe25|d:smart]`

Be careful not to mistakenly switch between options (`|`) and shares (`,`) separators!!
The comma is used to separate different widgets. Note that having several widgets displayed
within the same tag can lead to their unexpected display (side-by-side, or one below the other...)
according to the stylesheet your blog is using.  
For more clarity, you can also use a space instead of or in addition to the comma.
e.g.: [reverb blogshows=bg:e0e0e0|tx:000000, videos, tunes=s:false|a:true]

If you get a frame with just the plugin's copyright, you probably did it wrong...

As a final note, please remember that only the tag is written to the Wordpress DB,
the presentation being made at the time the page is displayed to the users (or saved into the
cache). So you'll always be able to re-edit your page/post to change the options.

== Support ==

To get support on the installation and/or use of this plugin, please comment on the
<a href="http://tec.skloogs.com/dev/plugins/skloogs-reverb">plugin page</a>. Do not send
an email, because your problem can be someone else's problem too, and I cannot afford
answering each one personally, except in the comments section of the plugin page. Thanks!

Alternatively, and maybe preferably, you can become fan of this facebook page
<a href="http://www.facebook.com/pages/ReverbNation-WordPress-plugin/405263714615">ReverbNation
WordPress Plugin</a> that I'm currently maintaining.

== Frequently Asked Questions ==

= Can I customize the `style.css` stylesheet? =

Yes, although I wouldn't recommend it, unless you know what you are doing.

Just make a copy of `style.css`, rename it `my-style.css` and customize that copy. The plugin will
then load your customized stylesheet instead of the default one. Note that the style.css file will
be overriden each time you update the plugin, so don't waste your time playing with it (and keeping
the original will save you time if things go wrong with your own stylesheet)

= May I remove your copyright from the plugin output? =

You may. But I would advise against it: firstly you will have to do it after every plugin update, and
secondly I would not not consider your requests for support and/or suggestions regarding future
versions... it doesn't cost you much to leave it, and it helps with the plugin's promotion.

= When will this plugin be available on wordpress.com? =

No idea. I have absolutely no power on this decision. You may want to ask ReverbNation to start
negociations with wordpress.com for this to happen. RN will certainly have more influence than me :)

= Is this plugin supported by ReverbNation? =

Technically, no. At least not for the moment.

However, I already discussed about it with the RN team, and they loved the plugin. They even suggested
to take over with the development, so the ball is on their side...

I'm also working closely with them on a method to ease the plugin's setup.

= Do you plan to have a Blogger version of this plugin? =

No. ReverbNation already offers widgets for blogger.com...

= What do you earn with this? =

As long as you maintain the plugin's copyright, I get frequentation on my blog, and consequently
I also get new fans for PeerGum, on my ReverbNation account. So, it's kind of a win-win strategy :)
  
== Screenshots ==

1. Example of StoreWidget
2. Example of TuneWidget

== About the author ==

Philippe Hilger is a french engineer, IT consultant and developer, living in Rio de Janeiro, Brazil.
He's been playing keyboards since the early 80's as an independent musician and founded the PeerGum
band at the end of 2009.

He's already developed 3 plugins for WordPress: Trader, MegaSena and now ReverbNation.

Philippe also maintains several blogs: one dedicated to technology and communication and another one
dedicated to Macs; he also builds, designs and hosts various other blogs on a WordPress MU site he
maintains at http://www.skloogs.com. Did you know you could have your own blog there, too?

== Versions Notes ==

= Version 1.0.4 =

* Inform your RN URL in the setup page, for the fan exclusive & grab box widgets to
redirect properly to your RN page


== ChangeLog ==

* 1.2.0: Updated autoPlay -> auto_play
* 1.1.8: Added option popup (true/false)
* 1.1.7: correction to player pro for playlists
* 1.1.6: removed copyright / centered plugin
* 1.1.5: correction to width/height attributes. Plugin going unsupported.
* 1.1.4: correction to javascript for popups on firefox+IE
* 1.1.3: correction to hit counters (even if not redisplayed, the widget is counted) +
reactivated the option to have all Skloogs plugins in a top menu
* 1.1.2: autopopup + correction to allow tags in the sidebars
* 1.1.1: correction to popup/popin
* 1.1.0: currenlty in development: adding window pop-up + stats/charts
* 1.0.4: Adding charts + specific song player + minor corrections (see Versions Notes)
* 1.0.3: Added the Pro Widgets + the playlists + the ability to show the widgets
from another artist, label, venue or fan
* 1.0.2: Added Fan Exclusive Widget
* 1.0.1: Options menu compatibility correction for Wordpress-MU
* 1.0: Initial Version
