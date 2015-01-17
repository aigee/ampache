<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU General Public License, version 2 (GPLv2)
 * Copyright 2001 - 2015 Ampache.org
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License v2
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 */

if (INIT_LOADED != '1') { exit; }

$web_path = AmpConfig::get('web_path');
$htmllang = str_replace("_", "-", AmpConfig::get('lang'));
$location = get_location();
$_SESSION['login'] = false;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
   _                                   _           
  /_\   _ __ ___   _ __    __ _   ___ | |__    ___ 
 //_\\ | '_ ` _ \ | '_ \  / _` | / __|| '_ \  / _ \
/  _  \| | | | | || |_) || (_| || (__ | | | ||  __/
\_/ \_/|_| |_| |_|| .__/  \__,_| \___||_| |_| \___|
                  |_|                              
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $htmllang; ?>" lang="<?php echo $htmllang; ?>" dir="<?php echo is_rtl(AmpConfig::get('lang')) ? 'rtl' : 'ltr';?>">
    <head>
        <link rel="shortcut icon" href="<?php echo $web_path; ?>/favicon.ico" />
        <link rel="search" type="application/opensearchdescription+xml" title="<?php echo scrub_out(AmpConfig::get('site_title')); ?>" href="<?php echo $web_path; ?>/search.php?action=descriptor" />
        <?php if (AmpConfig::get('use_rss')) { ?>
        <link rel="alternate" type="application/rss+xml" title="<?php echo T_('Now Playing'); ?>" href="<?php echo $web_path; ?>/rss.php" />
        <link rel="alternate" type="application/rss+xml" title="<?php echo T_('Recently Played'); ?>" href="<?php echo $web_path; ?>/rss.php?type=recently_played" />
        <link rel="alternate" type="application/rss+xml" title="<?php echo T_('Newest Albums'); ?>" href="<?php echo $web_path; ?>/rss.php?type=latest_album" />
        <?php } ?>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=<?php echo AmpConfig::get('site_charset'); ?>" />
        <title><?php echo AmpConfig::get('site_title'); ?> - <?php echo $location['title']; ?></title>
        <link rel="stylesheet" href="<?php echo $web_path; ?>/templates/jquery-editdialog.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/jquery-ui-ampache/jquery-ui.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/templates/jquery-file-upload.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/jstree/themes/default/style.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/tag-it/jquery.tagit.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/rhinoslider/css/rhinoslider-1.05.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/jquery-mediaTable/jquery.mediaTable.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/jquery-datetimepicker/jquery.datetimepicker.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/bootstrap/css/bootstrap-theme.min.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo $web_path; ?>/modules/font-awesome/css/font-awesome.min.css" type="text/css" media="screen" />
        <?php require_once AmpConfig::get('prefix') . '/templates/stylesheets.inc.php'; ?>
        <script type="text/javascript" charset="utf-8">
            var jsAjaxUrl = "<?php echo AmpConfig::get('ajax_url') ?>";
            var jsWebPath = "<?php echo $web_path; ?>";
            var jsAjaxServer = "<?php echo AmpConfig::get('ajax_server') ?>";
            var jsSaveTitle = "<?php echo T_('Save') ?>";
            var jsCancelTitle = "<?php echo T_('Cancel') ?>";
        </script>
        <script src="<?php echo $web_path; ?>/modules/jquery/jquery.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-ui/jquery-ui.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/prettyPhoto/js/jquery.prettyPhoto.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/tag-it/tag-it.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/noty/packaged/jquery.noty.packaged.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-cookie/jquery.cookie.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jscroll/jquery.jscroll.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-qrcode/jquery.qrcode.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/rhinoslider/js/rhinoslider-1.05.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/responsive-elements/responsive-elements.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-mediaTable/jquery.mediaTable.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-datetimepicker/jquery.datetimepicker.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-knob/jquery.knob.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-file-upload/jquery.iframe-transport.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/jquery-file-upload/jquery.fileupload.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/modules/bootstrap/js/bootstrap.min.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/lib/javascript/base.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/lib/javascript/ajax.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/lib/javascript/tools.js" language="javascript" type="text/javascript"></script>
        <script src="<?php echo $web_path; ?>/lib/javascript/user-interface.js" language="javascript" type="text/javascript"></script>
        <?php
        if (AmpConfig::get('ajax_load')) {
            $iframed = true;
        ?>
            <script src="<?php echo $web_path; ?>/lib/javascript/dynamicpage.js" language="javascript" type="text/javascript"></script>
        <?php
            require_once AmpConfig::get('prefix') . '/templates/show_html5_player_headers.inc.php';
        }
        ?>


        <?php
        if (AmpConfig::get('ajax_load')) {
            $iframed = true;
        ?>
            <script src="<?php echo $web_path; ?>/lib/javascript/dynamicpage.js" language="javascript" type="text/javascript"></script>
        <?php
            require_once AmpConfig::get('prefix') . '/templates/show_html5_player_headers.inc.php';
        ?>
        <script type="text/javascript">
            function NavigateTo(url)
            {
                window.location.hash = url.substring(jsWebPath.length + 1);
            }

            function getCurrentPage()
            {
                if (window.location.hash.length > 0) {
                    var wpage = window.location.hash.substring(1);
                    if (wpage !== 'prettyPhoto') {
                        return btoa(wpage);
                    } else {
                        return "";
                    }
                }

                return btoa(window.location.href.substring(jsWebPath.length + 1));
            }
        </script>
        <?php
        } else {
        ?>
        <script type="text/javascript">
            function NavigateTo(url)
            {
                window.location.href = url;
            }

            function getCurrentPage()
            {
                return btoa(window.location.href);
            }
        </script>
        <?php } ?>
        <script type="text/javascript">
            $.widget( "custom.catcomplete", $.ui.autocomplete, {
                _renderItem: function( ul, item ) {
                        var itemhtml = "<a href='" + item.link + "'>";
                        if (item.image != '') {
                            itemhtml += "<img src='" + item.image + "' class='searchart' />";
                        }
                        itemhtml += "<span class='searchitemtxt'>" + item.label + ((item.rels == '') ? "" : " - " + item.rels)  + "</span></a>"

                        return $( "<li class='ui-menu-item'>" )
                            .data("ui-autocomplete-item", item)
                            .append( itemhtml )
                            .appendTo( ul );
                },
                _renderMenu: function( ul, items ) {
                    var that = this, currentType = "";
                    $.each( items, function( index, item ) {
                        if (item.type != currentType) {
                            ul.append( "<li class='ui-autocomplete-category'>" + item.type + "</li>" );
                            currentType = item.type;
                        }

                        that._renderItem( ul, item );
                    });
                }
            });

            $(function() {
                $( "#searchString" )
                // don't navigate away from the field on tab when selecting an item
                    .bind( "keydown", function( event ) {
                        if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "ui-autocomplete" ).menu.active ) {
                            event.preventDefault();
                        }
                    })
                    .catcomplete({
                        source: function( request, response ) {
                            $.getJSON( jsAjaxUrl, {
                                page: 'search',
                                action: 'search',
                                target: $('#searchStringRule').val(),
                                search: request.term,
                                xoutput: 'json'
                            }, response );
                        },
                        search: function() {
                            // custom minLength
                            if (this.value.length < 2) {
                                return false;
                            }
                        },
                        focus: function() {
                            // prevent value inserted on focus
                            return false;
                        },
                        select: function( event, ui ) {
                            if (ui.item != null) {
                                $(this).val(ui.item.value);
                            }
                            return false;
                        }
                    });
            });
        </script>
        <script type="text/javascript">
            var lastaction = new Date().getTime();
            var refresh_slideshow_interval=<?php echo AmpConfig::get('slideshow_time'); ?>;
            var iSlideshow = null;
            var tSlideshow = null;
            function init_slideshow_check()
            {
                if (refresh_slideshow_interval > 0) {
                    if (tSlideshow != null) {
                        clearTimeout(tSlideshow);
                    }
                    tSlideshow = window.setTimeout(function(){init_slideshow_refresh();}, refresh_slideshow_interval * 1000);
                }
            }
            function swap_slideshow()
            {
                if (iSlideshow == null) {
                    init_slideshow_refresh();
                } else {
                    stop_slideshow();
                }
            }
            function init_slideshow_refresh()
            {
                if ($("#webplayer").is(":visible")) {
                    clearTimeout(tSlideshow);
                    tSlideshow = null;

                    $("#aslideshow").height($(document).height())
                      .css({'display': 'inline'});

                    iSlideshow = true;
                    refresh_slideshow();
                }
            }
            function refresh_slideshow()
            {
                if (iSlideshow != null) {
                    <?php echo Ajax::action('?page=index&action=slideshow', ''); ?>;
                } else {
                    init_slideshow_check();
                }
            }
            function stop_slideshow()
            {
                if (iSlideshow != null) {
                    iSlideshow = null;
                    $("#aslideshow").css({'display': 'none'});
                }
            }
            function update_action()
            {
                lastaction = new Date().getTime();
                stop_slideshow();
                init_slideshow_check();
            }
            $(document).mousemove(function(e) {
                if (iSlideshow == null) {
                    update_action();
                }
            });
            $(document).ready(function() {
                init_slideshow_check();
            });
        </script>
    </head>
    <body>
        <?php if (AmpConfig::get('sociable') && AmpConfig::get('notify')) { ?>
        <script type="text/javascript" language="javascript">
            var lastrefresh = new Date().getTime();
            var refresh_sociable_interval=<?php echo AmpConfig::get('refresh_limit') ?>;
            function refresh_sociable()
            {
                <?php echo Ajax::action('?page=index&action=shoutbox&since=\' + lastrefresh + \'', ''); ?>;
                lastrefresh = new Date().getTime();
            }
            $(document).ready(function() {
                window.setInterval(function(){refresh_sociable();}, refresh_sociable_interval * 1000);
            });
        </script>
        <div id="live_shoutbox"></div>
        <?php } ?>
        <div id="aslideshow">
            <div id="aslideshow_container">
                <div id="fslider"></div>
                <div id="fslider_script"></div>
            </div>
        </div>
        <script type="text/javascript" language="javascript">
            $("#aslideshow").click(function(e) {
                if (!$(e.target).hasClass('rhino-btn')) {
                    update_action();
                }
            });
        </script>
        <?php if (AmpConfig::get('cookie_disclaimer') && !isset($_COOKIE['cookie_disclaimer'])) { ?>
        <script type="text/javascript" language="javascript">
            noty({text: '<?php echo T_("We have placed cookies on your computer to help make this website better. You can change your") . " <a href=\"" . AmpConfig::get('web_path') . "/cookie_disclaimer.php\">" . T_("cookie settings") . "</a> " . T_("at any time. Otherwise, we\'ll assume you\'re OK to continue.<br /><br />Click on this message do not display it again."); ?>',
                type: 'warning',
                layout: 'bottom',
                timeout: false,
                callback: {
                    afterClose: function() {
                        $.cookie('cookie_disclaimer', '1', { expires: 365 });
                    }
                },
            });
        </script>
        <?php } ?>
		<div id="notification" class="notification-out"><img src="<?php echo $web_path; ?>/images/icon_info.png" /><span id="notification-content"></span></div>
<?php
            $prefix = AmpConfig::get('prefix');
        ?>
        
        <div id="maincontainer" class="application show-nav-bar show-side-bar">
            
            <?php 
                require_once $prefix . '/templates/navbar.inc.php';
                //require_once $prefix . '/templates/rightbar.inc.php';
                require_once $prefix . '/templates/sidebar.inc.php';
            ?>

            <div id="ajax-loading">Loading . . .</div>
            <div id="util_div" style="display:none;"></div>
            <iframe name="util_iframe" id="util_iframe" style="display:none;" src="<?php echo $web_path; ?>/util.php"></iframe>
            
            <div class="background-container">
                <div class="background" style="background-image: url(...);"></div>
            </div>
            <div id="content" class="scroll-container dark-scrollbar content-float <?php echo (($count_temp_playlist || AmpConfig::get('play_type') == 'localplay') ? '' : 'content-right-wild'); echo $isCollapsed ? ' content-left-wild' : ''; ?>">

                <?php if (AmpConfig::get('int_config_version') != AmpConfig::get('config_version') AND $GLOBALS['user']->has_access(100)) { ?>
                <div class="fatalerror">
                    <?php echo T_('Error Config File Out of Date'); ?>
                    <a rel="nohtml" href="<?php echo $web_path; ?>/admin/system.php?action=generate_config"><?php echo T_('Generate New Config'); ?></a> |
                    <a rel="nohtml" href="<?php echo $web_path; ?>/admin/system.php?action=write_config"><?php echo T_('Write New Config'); ?></a>
                </div>
                <?php } ?>
                <div id="guts">
