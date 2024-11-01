<?php
/*
Plugin Name: Skloogs Reverb
Plugin URI: http://tec.skloogs.com/dev/plugins/skloogs-reverb
Description: This plugin is no longer officially maintained. Please switch to <a href="http://wordpress.org/extend/plugins/reverbnation-widgets/">ReverbNation's official plugin</a>
Version: 1.2.0
Author: Philippe Hilger
Author URI: http://www.peergum.com

  Copyright 2010  Philippe Hilger  (hilgerph@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$SkRNDomain = "skreverb";
$SkRNVersion = "1.2.0"; 

$SkRNStartTmpl='<div class="SkReverb" id="SkReverb{POPUPID}"><span class="SkReverbGroup" id="SkReverbGroup{POPUPID}">';

$SkRNEndTmpl='</span><span class="SkReverbCR"><script src="'.plugins_url($SkRNDomain).'/skreverb.js'.'"></script><a class="SkReverbPopUp" ' .
		'href="javascript:skr_popup({POPUPID},\''.SkGetRN_stylesheet().'\',0);" id="SkReverbPUButton{POPUPID}">&nbsp;Pop Up Widget&nbsp;</a><!-- <br/><small>&copy; 2010 Plugin <i><a target=_blank href="http://tec.skloogs.com/dev/plugins/skloogs-reverb" alt="SkReverb v.'.$SkRNVersion.'">SkReverb</a></i> by Philippe Hilger/<a href="http://www.reverbnation.com/peergum" alt=PeerGum target=_blank>PeerGum</a>.</small> --></span>' .
		'</div>{AUTOPOPUP}';

function SkRN_get($codes) {
	global $SkRNStartTmpl,$SkRNEndTmpl;

		
	// TuneWidget Template
	$SkRNTuneWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/19/tuneWidget.swf?twID={FUNCTION}_{RNID}&posted_by={XREF}&shuffle={SHUFFLE}&auto_play={AUTOPLAY}&blogBuzz={BLOGBUZZ}" height="415" width="434"/>' .
			'<br/><a href="http://www.reverbnation.com/rpk" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/19/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;">' .
			'<img alt="Sample band press kits" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/19/footer.png" width="434" /></a>' .
			'<img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/19/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	//$SkRNAdTmpl='<a target=_blank href="http://br.advfn.com/p.php?pid=qkchart&symbol={MARKET}^{SHARECODE}" alt="ADVFN"><img width="{WIDTH}" height="{HEIGHT}" src="http://br.advfn.com/p.php?pid=staticchart&s={MARKET}%3A{SHARECODE}&p={PERIOD}&t={CHTYPE}&vol={VOLUME}" alt="{SHARECODE}" /></a>';
	
	// ShowWidget Templates
	$SkRNLargeShowWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/14/venue_schedule.swf?venueId={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="600" width="434" /><br/><a href="http://www.reverbnation.com/fanreachpro" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/14/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band email marketing" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/14/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/14/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	$SkRNSmallShowWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/10/schedule.swf?bandId={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&view={DISPMODE}&posted_by={XREF}" height="247" width="434" /><br/><a href="http://www.reverbnation.com/rpk" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/10/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Electronic Press Kit" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/10/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/10/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	$SkRNBlogShowWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/29/schedule.swf?bandId={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="300" width="180"/><br/><a href="http://www.reverbnation.com/sitebuilder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/29/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band website builder" border="0" height="12" src="http://cache.reverbnation.com/widgets/content/29/footer.png" width="180" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/29/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// ShowWidget Templates
	$SkRNShowsMapWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/12/schedule.swf?bandId={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&view={DISPMODE}&posted_by={XREF}" height="538" width="434" /><br/><a href="http://www.reverbnation.com/main/tunewidget_overview" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/12/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Web music player" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/12/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/12/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// PlayerWidget Templates
	$SkRNPlayerWidgetTmpl='<embed type="application/x-shockwave-flash"  src="http://cache.reverbnation.com/widgets/swf/15/widgetPlayer.swf?emailPlaylist={PLAYLIST}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&shuffle={SHUFFLE}&auto_play={AUTOPLAY}" height="228" width="434" /><br/><a href="http://www.reverbnation.com/distro" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/15/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="iTunes get music on" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/15/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/15/{PLAYLIST}/{XREF}/t.gif"/>';
	$SkRNBlogPlayerWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/28/blog_player.swf?emailPlaylist={PLAYLIST}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&shuffle={SHUFFLE}&auto_play={AUTOPLAY}" height="300" width="180"/><br/><a href="http://www.reverbnation.com/sitebuilder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/28/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band website builders" border="0" height="12" src="http://cache.reverbnation.com/widgets/content/28/footer.png" width="180" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/28/{PLAYLIST}/{XREF}/t.gif"/>';
	$SkRNMiniPlayerWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/13/widgetPlayerMini.swf?emailPlaylist={PLAYLIST}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&shuffle={SHUFFLE}&auto_play={AUTOPLAY}" height="83" width="262" /><br/><a href="http://www.reverbnation.com/rpk" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/13/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Electronic press kits" border="0" height="12" src="http://cache.reverbnation.com/widgets/content/13/footer.png" width="262" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/13/{PLAYLIST}/{XREF}/t.gif"/>';
	$SkRNMicroPlayerWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/31/widgetPlayerMicro.swf?emailPlaylist={PLAYLIST}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&shuffle={SHUFFLE}&auto_play={AUTOPLAY}" height="125" width="160" wmode="transparent"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/31/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// VideoGalleryWidget Template
	$SkRNVideoGalleryWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/33/video_gallery_widget.swf?page_object_id={FUNCTION}_{RNID}&id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&auto_play={AUTOPLAY}" height="374" width="332" /><br/><a href="http://www.reverbnation.com/gigfinder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/33/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Land Gigs" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/33/footer.png" width="332" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/33/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// FanCollectorWidget Templates
	$SkRNFanCollectorWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/11/fancollector.swf?page_object_id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="100" width="434" /><br/><a href="http://www.reverbnation.com/main/widgets_overview" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/11/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="stand alone player" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/11/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/11/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	$SkRNBlogFanCollectorWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/30/fancollector.swf?page_object_id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="180" width="180"/><br/><a href="http://www.reverbnation.com/sitebuilder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/30/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band website hosting" border="0" height="12" src="http://cache.reverbnation.com/widgets/content/30/footer.png" width="180" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/30/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	$SkRNStreetTeamCollectorWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/11/fancollector.swf?page_object_id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&street_team=true" height="100" width="434" /><br/><a href="http://www.reverbnation.com/gigfinder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/11/{RNID}/{UP_FUNCTION}/0/User/link?street_team=true&quot;; return false;"><img alt="Land Gigs" border="0" height="19" src="http://cache.reverbnation.com/widgets/content/11/footer.png" width="434" /></a><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/11/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// StoreWidget Template
	$SkRNStoreWidgetTmpl='<div style="position:relative"><object width="{WIDTH}" height="{HEIGHT}"><param name="movie" value="http://ws.audiolife.com/Webservices/GetWidget.aspx?r=a&userId={STOREID}&swfpath=http://cache.audiolife.com/Widget/&wsBasePath=http://ws.audiolife.com/Webservices/&publicFSBasePath=http://cache.audiolife.com/PublicFS/&widgettype=reverbnation"></param><param name="allowFullScreen" value="true"></param><param name="FlashVars" value="r=a&userId={STOREID}&swfpath=http://cache.audiolife.com/Widget/&wsBasePath=http://ws.audiolife.com/Webservices/&publicFSBasePath=http://cache.audiolife.com/PublicFS/&widgettype=reverbnation&track_img=http://www.reverbnation.com/widgets/trk/38/{FUNCTION}_{RNID}/{XREF}/t.gif"></param><param name="allowScriptAccess" value="always"></param><embed type="application/x-shockwave-flash" src="http://ws.audiolife.com/Webservices/GetWidget.aspx?r=a&userId={STOREID}&swfpath=http://cache.audiolife.com/Widget/&wsBasePath=http://ws.audiolife.com/Webservices/&publicFSBasePath=http://cache.audiolife.com/PublicFS/&widgettype=reverbnation&posted_by={XREF}" allowfullscreen="true" allowScriptAccess="always" FlashVars="r=a&userId={STOREID}&swfpath=http://cache.audiolife.com/Widget/&wsBasePath=http://ws.audiolife.com/Webservices/&publicFSBasePath=http://cache.audiolife.com/PublicFS/&widgettype=reverbnation&track_img=http://www.reverbnation.com/widgets/trk/38/{FUNCTION}_{RNID}/{XREF}/t.gif" height="{HEIGHT}" width="{WIDTH}" wmode="opaque"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/38/{FUNCTION}_{RNID}/{XREF}/t.gif"/></div>';
	
	// GrabBoxWidget Template
	$SkRNGrabBoxWidgetTmpl='<div style="position:relative"><embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/25/grab_box.swf?page_object_id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="{HEIGHT}" width="{WIDTH}" wmode="opaque"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/25/{FUNCTION}_{RNID}/{XREF}/t.gif"/><a href="{RNURL}"><img alt="Blank" height="26" src="http://cache.reverbnation.com/images/blank.gif" style="border:none !important;position:absolute;top:0;left:0;width:300px;height:26px;" width="{WIDTH}" /></a><a href="http://www.reverbnation.com/sitebuilder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/25/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band website builders" height="16" src="http://cache.reverbnation.com/images/blank.gif" style="border:none !important;position:absolute;bottom:0px;left:0;width:300px;height:16px;" width="{WIDTH}" /></a></div>';
	
	// PressWidget Template
	$SkRNPressWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/32/press.swf?page_object_id={FUNCTION}_{RNID}&backgroundcolor={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}" height="110" width="434" wmode="transparent"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/32/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';
	
	// FanExclusiveWidget Template
	$SkRNFanExclusiveWidgetTmpl='<div style="position:relative"><embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/36/fanexclusive_v1xx.swf?page_object_id={FUNCTION}_{RNID}&border_color={BDCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&default_song=" height="130" width="180" wmode="{WMODE}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/36/{FUNCTION}_{RNID}/{XREF}/t.gif"/><a href="{RNURL}"><img alt="Blank" height="15" src="http://cache.reverbnation.com/images/blank.gif" style="border:none !important;position:absolute;top:0;left:0;width:180px;height:15px;" width="180" /></a><a href="http://www.reverbnation.com/sitebuilder" onclick="javascript:window.location.href=&quot;http://www.reverbnation.com/c./a4/36/{RNID}/{UP_FUNCTION}/0/User/link&quot;; return false;"><img alt="Band website builders" height="12" src="http://cache.reverbnation.com/images/blank.gif" style="border:none !important;position:absolute;bottom:0px;left:0;width:180px;height:12px;" width="180" /></a></div>';
	
	// PlayerProWidget Template
	$SkRNPlayerProWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/40/pro_widget.swf" height="{HEIGHT}" width="{WIDTH}" align="top" bgcolor="#{BDCOLOR}" loop="false" wmode="{WMODE}" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id={FUNCTION}_{RNID}&posted_by={XREF}&skin_id={SKIN}&background_color={BGCOLOR}&border_color={BDCOLOR}&font_color={FONTCOLOR}&auto_play={AUTOPLAY}&shuffle={SHUFFLE}&song_ids={PLAYLIST}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/40/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';

	// VideosProWidget Template
	$SkRNVideosProWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/41/pro_widget.swf" height="{HEIGHT}" width="{WIDTH}" align="top" bgcolor="#{BDCOLOR}" loop="false" wmode="{WMODE}" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id={FUNCTION}_{RNID}&posted_by={XREF}&skin_id={SKIN}&background_color={BGCOLOR}&border_color={BDCOLOR}&font_color={FONTCOLOR}&auto_play={AUTOPLAY}&shuffle={SHUFFLE}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/41/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';

	// ShowsProWidget Template
	$SkRNShowsProWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/42/pro_widget.swf" height="{HEIGHT}" width="{WIDTH}" align="top" bgcolor="#{BDCOLOR}" loop="false" wmode="{WMODE}" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id={FUNCTION}_{RNID}&posted_by={XREF}&skin_id={SKIN}&background_color={BGCOLOR}&border_color={BDCOLOR}&font_color={FONTCOLOR}&show_map={SHOWMAP}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/42/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';

	// PressProWidget Template
	$SkRNPressProWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/43/pro_widget.swf" height="{HEIGHT}" width="{WIDTH}" align="top" bgcolor="#{BDCOLOR}" loop="false" wmode="{WMODE}" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id={FUNCTION}_{RNID}&posted_by={XREF}&skin_id={SKIN}&background_color={BGCOLOR}&font_color={FONTCOLOR}&border_color={BDCOLOR}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/43/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';

	// FansProWidget Template
	$SkRNFansProWidgetTmpl='<embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/44/pro_widget.swf" height="{HEIGHT}" width="{WIDTH}" align="top" bgcolor="#{BDCOLOR}" loop="false" wmode="{WMODE}" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id={FUNCTION}_{RNID}&posted_by={XREF}&skin_id={SKIN}&background_color={BGCOLOR}&border_color={BDCOLOR}&font_color={FONTCOLOR}&street_team={STREETTEAM}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/44/{FUNCTION}_{RNID}/{XREF}/t.gif"/>';

	// ChartsWidget Template
	$SkRNChartsWidgetTmpl='<div style="position:relative"><embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/27/localcharts_v1xx.swf?w=0&title={CHARTTITLE}&subtitle={CHARTSUBTITLE}&background_color={BGCOLOR}&font_color={FONTCOLOR}&posted_by={XREF}&country={COUNTRY}&latitude={LATITUDE}&longitude={LONGITUDE}&distance={DISTANCE}&genres={GENRES}" height="{HEIGHT}" width="{WIDTH}" wmode="{WMODE}"/><br/><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/27/main_0/{XREF}/t.gif"/></div>';
	
	// AutoPopup
	$SkRNAutoPopup='<script language="JavaScript">skr_popup({POPUPID},\''.SkGetRN_stylesheet().'\',1);</script>';
	$applets = $SkRNStartTmpl;
	
	$defwidth=get_option('SkRNDefWidth');
	$defheight=get_option('SkRNDefHeight');
	$defbgcolor=get_option('SkRNBgColor');
	$defbdcolor=get_option('SkRNBdColor');
	$deftxtcolor=get_option('SkRNTxtColor');
	$defautoplay=get_option('SkRNAutoplay');
	$defpopup=get_option('SkRNPopup');
	$defshuffle=get_option('SkRNShuffle');
	$defblogbuzz=get_option('SkRNBlogBuzz');
	$defdispmode=get_option('SkRNDispMode');
	$defwinmode=get_option('SkRNWinMode');
	$defskin=get_option('SkRNSkin');
	$defsize=get_option('SkRNSize');
	$defshowmap=get_option('SkRNShowMap');
	$defstreetteam=get_option('SkRNStreetTeam');
	$deflabelid=get_option('SkRNLabelID');
	$defartistid=get_option('SkRNArtistID');
	$defvenueid=get_option('SkRNVenueID');
	$defstoreid=get_option('SkRNStoreID');
	$deffanid=get_option('SkRNFanID');
	$defchartttl=get_option('SkRNChartsTitle');
	$defchartsubttl=get_option('SkRNChartsSubtitle');
	$defcountry=get_option('SkRNCountry');
	$defdistance=get_option('SkRNDistance');
	$deflongitude=get_option('SkRNLongitude');
	$deflatitude=get_option('SkRNLatitude');
	$defgenres=get_option('SkRNGenres');
	$rnurl=get_option('SkRNUrl');
	$popup=$defpopup;
	if (preg_match_all("/\[reverb\s+(([a-zA-Z0-9=:|]+[, ;]*)+)\]/",$codes,$ncodes)) {
		foreach ($ncodes[1] as $ucode) {
			$ecode = preg_split("/[, ;]+/",$ucode);
			foreach ($ecode as $code) {
				if ($defwidth!='' && $defheight!='') {
					$width = $defwidth;
					$height = $defheight;
				} else if ($defsize=='') $defsize="standard";
				$bgco = ($defbgcolor!='')?$defbgcolor:"EEEEEE";
				$bdco = ($defbdcolor!='')?$defbdcolor:"EEEEEE";
				$txtco = ($deftxtcolor!='')?$deftxtcolor:"000000";
				$autoplay = ($defautoplay=="true")?"true":"false";
				$popup = ($defpopup=="true")?"true":"false";
				$shuffle = ($defshuffle=="true")?"true":"false";
				$blogbuzz = ($defblogbuzz!="buzz")?"blog":"buzz";
				$dispmode = ($defdispmode!="details" && $defdispmode!="list")?"smart":$defdispmode;
				$winmode = ($defwinmode=="transparent")?"transparent":"opaque";
				if ($defsize!="standard"
					&& $defsize!="blog"
					&& $defsize!="mini"
					&& $defsize!="micro") $defsize="custom";
				$size=$defsize;
				$skin=$defskin;
				$showmap=$defshowmap;
				$streetteam=$defstreetteam;
				$labelid = $deflabelid;
				$artistid = $defartistid;
				$venueid = $defvenueid;
				$storeid = ($defstoreid=='')?'23838':$defstoreid;
				$fanid = $deffanid;
				$distance = $defdistance;
				$longitude = $deflongitude;
				$latitude = $deflatitude;
				$genres = $defgenres;
				$chartttl = urlencode($defchartttl);
				$chartsubttl = urlencode($defchartsubttl);
				if ($distance==''  || $longitude=='' || $latitude=='') {
					$distance=$longitude=$latitude='';
					$country = $defcountry;
				} else $country='';
				$rnfunction = ($artistid != '')?"artist":(($labelid != '')?"label":(($venueid != '')?"venue":(($fanid != '')?"fan":"artist")));
				$rnupfunction = ucwords($rnfunction);
				$rnid = ($artistid != '')?$artistid:(($labelid != '')?$labelid:(($venueid != '')?$venueid:(($fanid != '')?$fanid:664725)));
				// define source ID as default one (settings)
				$xrnfunction = $rnfunction;
				$xrnupfunction = $rnupfunction;
				$xrnid = $rnid;
				$playlist='';
				$attr = split('=',$code);
				if (count($attr)>1) {
					$tattr = split('\|',$attr[1]);
					foreach ($tattr as $vattr) {
						$xat=split(':',$vattr);
						switch ($xat[0]) {
							case 'popup':
								switch ($xat[1]) {
									case 'true':
									case 'false':
										$popup = $xat[1];
										break;
									default:
										$popup = "false";
										break;
								}
								break;
							case 'P':
								$playlist = 'Playlist_'.$xat[1];
								break;
							case 'S':
								$playlist = 'Song_'.$xat[1];
								break;
							case 'A':
								$artistid = $xat[1];
								break;
							case 'L':
								$labelid = $xat[1];
								break;
							case 'V':
								$venueid = $xat[1];
								break;
							case 'F':
								$fanid = $xat[1];
								break;
							case 'w':
								$width = $xat[1];
								$size='';
								break;
							case 'h':
								$height = $xat[1];
								$size='';
								break;
							case 'sz':
								$size = $xat[1];
								break;
							case 'bg':
								$bgco = $xat[1];
								break;
							case 'bd':
								$bdco = $xat[1];
								break;
							case 'tx':
								$txtco = $xat[1];
								break;
							case 'a': // autoplay
								switch ($xat[1]) {
									case 'true':
									case 'false':
										$autoplay = $xat[1];
										break;
									default:
										$autoplay = "false";
										break;
								}
								break;
							case 's': // shuffle
								switch ($xat[1]) {
									case 'true':
									case 'false':
										$shuffle = $xat[1];
										break;
									default:
										$shuffle = "false";
										break;
								}
								break;
							case 'd': // display
								switch ($xat[1]) {
									case 'list':
									case 'details':
									case 'smart':
										$dispmode = $xat[1];
										break;
									default:
										$dispmode = "smart";
										break;
								}
								break;
							case 'b': // blogbuzz
								switch ($xat[1]) {
									case 'blog':
									case 'buzz':
										$blogbuzz = $xat[1];
										break;
									default:
										$blogbuzz = "blog";
										break;
								}
								break;
							case 'sk': // skin
								switch ($xat[1]) {
									case 'seamless':
										$skin = $xat[1];
										$winmode = "transparent";
										break;
									case 'classic':
									case 'tiny':
									case 'strong':
									case 'electrogreen':
									case 'sketched':
									case 'bigbutton':
									case 'bigbuttonlight':
										$skin = $xat[1];
										$winmode = "opaque";
										break;
									default:
										$skin="classic";
										break;
								}
								break;
							case 'wm': // widget mode
								switch ($xat[1]) {
									case 'transparent':
										$winmode = $xat[1];
										break;
									default:
										$winmode = "opaque";
										break;
								}
								break;
							case 'sz': // size
								switch ($xat[1]) {
									case 'standard':
									case 'blog':
									case 'mini':
									case 'micro':
										$size = $xat[1];
										break;
									default:
										$size = "standard";
										break;
								}
								break;
							case 'sm': // showmap
								switch ($xat[1]) {
									case 'true':
									case 'false':
										$showmap = $xat[1];
										break;
									default:
										$showmap = "true";
										break;
								}
								break;
							case 'st': // streeteam
								switch ($xat[1]) {
									case 'true':
									case 'false':
										$streetteam = $xat[1];
										break;
									default:
										$streetteam = "true";
										break;
								}
								break;
						}
					}
				}
				switch ($size) {
					case 'standard':
						$width=434;
						$height=326;
						break;
					case 'blog':
						$width=180;
						$height=300;
						break;
					case 'mini':
						$width=262;
						$height=200;
						break;
					case 'micro':
						$width=180;
						$height=150;
						break;
				}
				$rnfunction = ($artistid != '')?"artist":(($labelid != '')?"label":(($venueid != '')?"venue":(($fanid != '')?"fan":"artist")));
				$rnupfunction = ucwords($rnfunction);
				$rnid = ($artistid != '')?$artistid:(($labelid != '')?$labelid:(($venueid != '')?$venueid:(($fanid != '')?$fanid:664725)));
				if ($rnfunction==$xrnfunction && $rnid==$xrnid) {
					$xrnfunction='user';
					$xrnupfunction='User';
					$xrnid='0';
					$xref='';
					$xupref='';
				} else {
					$xref=$xrnfunction.'_'.$xrnid;
					$xupref=$xrnupfunction.'_'.$xrnid;
				}
				//if ($playlist=='') $playlist=$rnfunction.'_'.$rnid;
				switch($attr[0]) {
					case 'popup':
						$popup='true';
						break;
					case 'tunes':
						$applet=$SkRNTuneWidgetTmpl;
						break;
					case 'shows':
						$applet=$SkRNSmallShowWidgetTmpl;
						break;
					case 'largeshows':
						$applet=$SkRNLargeShowWidgetTmpl;
						break;
					case 'blogshows':
						$applet=$SkRNBlogShowWidgetTmpl;
						break;
					case 'showsmap':
						$applet=$SkRNShowsMapWidgetTmpl;
						break;
					case 'player':
						$applet=$SkRNPlayerWidgetTmpl;
						break;
					case 'miniplayer':
						$applet=$SkRNMiniPlayerWidgetTmpl;
						break;
					case 'microplayer':
						$applet=$SkRNMicroPlayerWidgetTmpl;
						break;
					case 'blogplayer':
						$applet=$SkRNBlogPlayerWidgetTmpl;
						break;
					case 'videos':
						$applet=$SkRNVideoGalleryWidgetTmpl;
						break;
					case 'fans':
						$applet=$SkRNFanCollectorWidgetTmpl;
						break;
					case 'blogfans':
						$applet=$SkRNBlogFanCollectorWidgetTmpl;
						break;
					case 'streetteam':
						$applet=$SkRNStreetTeamCollectorWidgetTmpl;
						break;
					case 'store':
						$applet=$SkRNStoreWidgetTmpl;
						break;
					case 'grabbox':
						$applet=$SkRNGrabBoxWidgetTmpl;
						break;
					case 'press':
						$applet=$SkRNPressWidgetTmpl;
						break;
					case 'fanexclusive':
						$applet=$SkRNFanExclusiveWidgetTmpl;
						break;
					case 'playerpro':
						$applet=$SkRNPlayerProWidgetTmpl;
						$skintype="PWAS1";
						break;
					case 'videospro':
						$applet=$SkRNVideosProWidgetTmpl;
						$skintype="PWVS2";
						break;
					case 'showspro':
						$applet=$SkRNShowsProWidgetTmpl;
						$skintype="PWSS3";
						break;
					case 'presspro':
						$applet=$SkRNPressProWidgetTmpl;
						$skintype="PWPS4";
						break;
					case 'fanspro':
						$applet=$SkRNFansProWidgetTmpl;
						$skintype="PWFS5";
						break;
					case 'charts':
						$applet=$SkRNChartsWidgetTmpl;
						break;
					default:
						$applet='';
						break;
				}
				switch ($skin) {
					case 'classic':
						$skinname=$skintype."003";
						break;
					case 'seamless':
						$skinname=$skintype."008";
						break;
					case 'tiny':
						$skinname=$skintype."001";
						break;
					case 'strong':
						$skinname=$skintype."002";
						break;
					case 'electrogreen':
						$skinname=$skintype."004";
						break;
					case 'sketched':
						$skinname=$skintype."005";
						break;
					case 'bigbutton':
						$skinname=$skintype."006";
						break;
					case 'bigbuttonlight':
						$skinname=$skintype."007";
						break;
					default:
						$skinname=$skintype."003"; // classic
				}

				$applet = str_replace('{RNURL}',$rnurl,$applet);
				$applet = str_replace('{PLAYLIST}',$playlist,$applet);
				$applet = str_replace('{FUNCTION}',$rnfunction,$applet);
				$applet = str_replace('{UP_FUNCTION}',$rnupfunction,$applet);
				$applet = str_replace('{RNID}',$rnid,$applet);
				$applet = str_replace('{XREF}',$xref,$applet);
				$applet = str_replace('{XUP_FUNCTION}',$xrnupfunction,$applet);
				$applet = str_replace('{XRNID}',$xrnid,$applet);
				$applet = str_replace('{HEIGHT}',$height,$applet);
				$applet = str_replace('{WIDTH}',$width,$applet);
				$applet = str_replace('{BGCOLOR}',$bgco,$applet);
				$applet = str_replace('{BDCOLOR}',$bdco,$applet);
				$applet = str_replace('{FONTCOLOR}',$txtco,$applet);
				$applet = str_replace('{AUTOPLAY}',$autoplay,$applet);
				$applet = str_replace('{SHUFFLE}',$shuffle,$applet);
				$applet = str_replace('{DISPMODE}',$dispmode,$applet);
				$applet = str_replace('{WMODE}',$winmode,$applet);
				$applet = str_replace('{BLOGBUZZ}',$blogbuzz,$applet);
				$applet = str_replace('{STREETTEAM}',$streetteam,$applet);
				$applet = str_replace('{SKIN}',$skinname,$applet);
				$applet = str_replace('{SHOWMAP}',$showmap,$applet);
				$applet = str_replace('{BLOGBUZZ}',$blogbuzz,$applet);
				$applet = str_replace('{STOREID}',$storeid,$applet);
				$applet = str_replace('{COUNTRY}',$country,$applet);
				$applet = str_replace('{DISTANCE}',$distance,$applet);
				$applet = str_replace('{LATITUDE}',$latitude,$applet);
				$applet = str_replace('{LONGITUDE}',$longitude,$applet);
				$applet = str_replace('{GENRES}',$genres,$applet);
				$applet = str_replace('{CHARTTITLE}',$chartttl,$applet);
				$applet = str_replace('{CHARTSUBTITLE}',$chartsubttl,$applet);
				$applets .= '<span class="SkReverbWidget">'.$applet.'</span>';
			}
		}
	}
	preg_match_all('/(<img style="visibility:hidden;width:0px;height:0px;[^>]+>)/',$applets,$counters);
	$allcounters='';
	foreach($counters[0] as $countercode) {
		$allcounters.=$countercode;
		$applets=str_replace($countercode,'',$applets);
	}
	//$applets.='<!-- *** '.$allcounters.' *** -->';
	//$SkRNEndTmpl=str_replace('{COUNTERS}',$allcounters,$SkRNEndTmpl);
	if ($popup=='true') $popupstr=$SkRNAutoPopup;
	else $popupstr='';
	$SkRNEndTmpl=str_replace('{AUTOPOPUP}',$popupstr,$SkRNEndTmpl);
	return str_replace('{POPUPID}',rand(),$applets.$SkRNEndTmpl).$allcounters;
}

function SkRN_filter($content) {
	if (preg_match_all('/(\[reverb\s+[^\]]+\])/',$content,$sktrcodes)) {
		foreach ($sktrcodes[0] as $kk => $code) {
			$scode=SkRN_get($code);
    		$content = str_replace($code,$scode,$content);
		}
	}
    return $content;
}

function SkRN_style() {
	echo "<link rel='stylesheet' href='".SkGetRN_stylesheet()."' type='text/css' />";
}

function SkGetRN_stylesheet() {
	global $SkRNDomain;
	if (file_exists(WP_PLUGIN_DIR."/".$SkRNDomain.'/my-style.css')) {
		return plugins_url($SkRNDomain)."/my-style.css";
	} else {
		return plugins_url($SkRNDomain)."/style.css";		
	}
}

/*
 * Plugin desinstallation
 */
function SkRN_uninstall() {
}

/*
 * Plugin installation
 */
function SkRN_install() {
}

function widget_skrnplayer($args) {
	global $SkRNDomain;
    extract($args);
	echo $before_widget;
	echo $before_title;
	echo __('ReverbNation Player',$SkRNDomain);
	echo $after_title;
	//echo SkRN_filter('[reverb popup,blogplayer]');
	echo SkRN_filter('[reverb playerpro=sz:blog|sk:sketch]');
	echo $after_widget;
}

function widget_skrnshows($args) {
	global $SkRNDomain;
    extract($args);
	echo $before_widget;
	echo $before_title;
	echo __('ReverbNation Shows',$SkRNDomain);
	echo $after_title;
	//echo SkRN_filter('[reverb popup,blogshows]');
	echo SkRN_filter('[reverb blogshows]');
	echo $after_widget;
}

/*
 * Plugin loader (widgets registry) 
 */
function SkRN_loader() {
	global $SkRNIsSetup,$SkRNDomain;

	if($SkRNIsSetup) {
		return;
	} 
	load_plugin_textdomain($SkRNDomain, PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)), dirname(plugin_basename(__FILE__)));
	$SkRNIsSetup=1;

	// register widget
	register_sidebar_widget('ReverbNation Player', 'widget_skrnplayer');
	register_sidebar_widget('ReverbNation Shows', 'widget_skrnshows');
}

function SkRN_menu() {
	global $SkRNDomain;
	$SkMenuMode=get_option('SkMenuMode');
	//$SkMenuMode="Settings";
	switch($SkMenuMode) {
		case 'Skloogs':
			if (!function_exists('SkOptions')) {
				function SkOptions() {
				  echo '<div class="wrap">';
				  echo '<p>'.__('This section provides access to all options for the Skloogs plugins '
				  . 'you have installed.',$SkRNDomain).'</p>';
				  echo '</div>';
				}
				function SkOptionsFile() {
					return __FILE__;
				}
				add_menu_page('Skloogs Plugins', 'Skloogs', 8, __FILE__, 'SkOptions');
			}
			$SkMenuMode='Skloogs';
			$SkMenu=SkOptionsFile();
			add_submenu_page($SkMenu, 'SkReverb', 'ReverbNation', 8, __FILE__, 'SkRNOptions');		
			break;
		case 'Settings':
		default:
			$SkMenuMode='Settings';
			$SkMenu='options-general.php';
			add_options_page('ReverNation', 'ReverbNation', 8, __FILE__, 'SkRNOptions');		
			break;
	}
	update_option('SkMenuMode',$SkMenuMode);
}

function SkRNOptions() {
	global $SkRNDomain;

	if ($_POST['updated'] == 'true') SkRN_loader();
?>
	<div class="wrap">
	<h2>Skloogs ReverbNation</h2>
	
	<form method="post" action="options.php">
	<?php settings_fields('SkRNOptions'); ?>
	
	<table class="form-table">
	
	<!-- -->
	<tr valign="top">
	<th scope="row"><?php echo __('Configuration Menu',$SkRNDomain); ?></th>
	<td><input type="radio" name="SkMenuMode" value="Settings"<?php if (get_option('SkMenuMode')=='Settings') echo ' checked'; ?> /><?php echo __('Settings',$SkRNDomain); ?><br />
	<input type="radio" name="SkMenuMode" value="Skloogs"<?php if (get_option('SkMenuMode')=='Skloogs') echo ' checked'; ?> /><?php echo __('Top Level',$SkRNDomain); ?>
	</td>
	</tr>
	<!-- -->
	 
	<tr valign="top">
	<th scope="row"><?php echo __('URL',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNUrl" value="<?php echo get_option('SkRNUrl'); ?>" />
	<?php echo __('Your ReverbNation URL',$SkRNDomain).' (http://www.reverbnation.com/...)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Label ID',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNLabelID" value="<?php echo get_option('SkRNLabelID'); ?>" />
	<?php echo __('Your Label ID',$SkRNDomain).' (number)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Artist ID',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNArtistID" value="<?php echo get_option('SkRNArtistID'); ?>" />
	<?php echo __('Your Artist ID',$SkRNDomain).' (number)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Venue ID',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNVenueID" value="<?php echo get_option('SkRNVenueID'); ?>" />
	<?php echo __('Your Venue ID',$SkRNDomain).' (number)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Store ID',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNStoreID" value="<?php echo get_option('SkRNStoreID'); ?>" />
	<?php echo __('Your Store ID',$SkRNDomain).' (number)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Fan ID',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNFanID" value="<?php echo get_option('SkRNFanID'); ?>" />
	<?php echo __('Your Fan ID',$SkRNDomain).' (number)'; ?></td>
	</tr>
	 
	<tr valign="top">
	<th scope="row"><?php echo __('Height',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNDefHeight" value="<?php echo get_option('SkRNDefHeight'); ?>" />
	<?php echo __('Default Widget Height in pixels',$SkRNDomain).' (nnn)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Width',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNDefWidth" value="<?php echo get_option('SkRNDefWidth'); ?>" />
	<?php echo __('Default Widget Width in pixels',$SkRNDomain).' (nnn)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Size',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNDefSize" value="<?php echo get_option('SkRNDefSize'); ?>" />
	<?php echo __('Default Widget Size',$SkRNDomain).' (standard|blog|mini|micro|custom)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Background Color',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNBgColor" value="<?php echo get_option('SkRNBgColor'); ?>" />
	<?php echo __('RGB Hex Value',$SkRNDomain). ' (xxxxxx)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Border Color',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNBdColor" value="<?php echo get_option('SkRNBdColor'); ?>" />
	<?php echo __('RGB Hex Value',$SkRNDomain). ' (xxxxxx)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Text Color',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNTxtColor" value="<?php echo get_option('SkRNTxtColor'); ?>" />
	<?php echo __('RGB Hex Value',$SkRNDomain). ' (xxxxxx)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Autoplay',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNAutoplay" value="<?php echo get_option('SkRNAutoplay'); ?>" />
	<?php echo __('Default Autoplay Mode',$SkRNDomain). ' (true|false)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Popup',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNPopup" value="<?php echo get_option('SkRNPopup'); ?>" />
	<?php echo __('Default Popup Mode',$SkRNDomain). ' (true|false)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Shuffle',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNShuffle" value="<?php echo get_option('SkRNShuffle'); ?>" />
	<?php echo __('Default Shuffle Mode',$SkRNDomain). ' (true|false)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Blog/Buzz',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNBlogBuzz" value="<?php echo get_option('SkRNBlogBuzz'); ?>" />
	<?php echo __('Default Blog/Buzz Mode',$SkRNDomain). ' (blog|buzz)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Shows Display Mode',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNDispMode" value="<?php echo get_option('SkRNDispMode'); ?>" />
	<?php echo __('Default Show Display Mode',$SkRNDomain). ' (list|details|smart)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Street Team in FanReach',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNStreetTeam" value="<?php echo get_option('SkRNStreeTeam'); ?>" />
	<?php echo __('Default Map Display',$SkRNDomain). ' (false|true)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Map Display for Shows',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNShowMap" value="<?php echo get_option('SkRNShowMap'); ?>" />
	<?php echo __('Default Map Display',$SkRNDomain). ' (false|true)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Widget Display Mode',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNWinMode" value="<?php echo get_option('SkRNWinMode'); ?>" />
	<?php echo __('Default Widget Display Mode',$SkRNDomain). ' (opaque|transparent)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Skin',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNSkin" value="<?php echo get_option('SkRNSkin'); ?>" />
	<?php echo __('Default Skin',$SkRNDomain). ' (classic|seamless|tiny|strong|green|sketched|bigbutton|biglight)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Title',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNChartsTitle" value="<?php echo get_option('SkRNChartsTitle'); ?>" />
	<?php echo __('Charts Title',$SkRNDomain). ' (text)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Subtitle',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNChartsSubtitle" value="<?php echo get_option('SkRNChartsSubtitle'); ?>" />
	<?php echo __('Charts Subtitle',$SkRNDomain). ' (text)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Country',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNCountry" value="<?php echo get_option('SkRNCountry'); ?>" />
	<?php echo __('Charts Country',$SkRNDomain). ' (two letters code)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Distance',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNDistance" value="<?php echo get_option('SkRNDistance'); ?>" />
	<?php echo __('Distance from you',$SkRNDomain). ' (Km)'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Longitude',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNLongitude" value="<?php echo get_option('SkRNLongitude'); ?>" />
	<?php echo __('Your Longitude',$SkRNDomain). ' (decimal [E:positive|W:negative])'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Latitude',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNLatitude" value="<?php echo get_option('SkRNLatitude'); ?>" />
	<?php echo __('Your Latitude',$SkRNDomain). ' (decimal [N:positive|S:negative])'; ?></td>
	</tr>

	<tr valign="top">
	<th scope="row"><?php echo __('Genres',$SkRNDomain); ?></th>
	<td><input type="text" name="SkRNGenres" value="<?php echo get_option('SkRNGenres'); ?>" />
	<?php echo __('Music Genres',$SkRNDomain). ' ("All" or any comma separated combination of: Alternative,Blues,ChristianGospel,Classical,Comedy,Country,DJ,ElectronicaDance,Folk,HipHop,Jazz,Latin,Metal,Other,Pop,RBSoul,Rock,WorldReggae)'; ?></td>
	</tr>

	</table>
	
	<p class="submit">
	<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
	
	</form>
	</div>
<?php

}

function SkRN_getID() {
	
}

function SkRN_admin_init() {
	register_setting( 'SkRNOptions', 'SkRNUrl' );
	register_setting( 'SkRNOptions', 'SkRNChartsTitle' );
	register_setting( 'SkRNOptions', 'SkRNChartsSubtitle' );
	register_setting( 'SkRNOptions', 'SkRNLabelID' );
	register_setting( 'SkRNOptions', 'SkRNArtistID' );
	register_setting( 'SkRNOptions', 'SkRNVenueID' );
	register_setting( 'SkRNOptions', 'SkRNStoreID' );
	register_setting( 'SkRNOptions', 'SkRNFanID' );
	register_setting( 'SkRNOptions', 'SkRNDefWidth' );
	register_setting( 'SkRNOptions', 'SkRNDefHeight' );
	register_setting( 'SkRNOptions', 'SkRNDefSize' );
	register_setting( 'SkRNOptions', 'SkRNBgColor' );
	register_setting( 'SkRNOptions', 'SkRNBdColor' );
	register_setting( 'SkRNOptions', 'SkRNTxtColor' );
	register_setting( 'SkRNOptions', 'SkRNAutoplay' );
	register_setting( 'SkRNOptions', 'SkRNPopup' );
	register_setting( 'SkRNOptions', 'SkRNShuffle' );
	register_setting( 'SkRNOptions', 'SkRNBlogBuzz' );
	register_setting( 'SkRNOptions', 'SkRNShowMap' );
	register_setting( 'SkRNOptions', 'SkRNWinMode' );
	register_setting( 'SkRNOptions', 'SkRNSkin' );
	register_setting( 'SkRNOptions', 'SkRNStreetTeam' );
	register_setting( 'SkRNOptions', 'SkMenuMode' );
	register_setting( 'SkRNOptions', 'SkRNCountry' );
	register_setting( 'SkRNOptions', 'SkRNDistance' );
	register_setting( 'SkRNOptions', 'SkRNLongitude' );
	register_setting( 'SkRNOptions', 'SkRNLatitude' );
	register_setting( 'SkRNOptions', 'SkRNGenres' );
}

add_action('plugins_loaded', 'SkRN_loader');
add_filter('the_content', 'SkRN_filter');
add_filter('comment_text', 'SkRN_filter');

//add_filter('whitelist_options', 'SkRNWhitelist');
add_action('wp_head','SkRN_style');
if ( is_admin() ){ // admin actions
	add_action('admin_head','SkRN_style');
	//register_activation_hook(__FILE__,'SkRN_install');
	//register_deactivation_hook(__FILE__,'SkRN_uninstall');
	add_action('admin_menu', 'SkRN_menu');
	add_action('admin_init', 'SkRN_admin_init');
}
?>
