/**
 * Jon Chambers
 * jchambers.dev@gmail.com
 *
 */

/**
 *
 */
var CmsMedia = (function () {
    "use strict";
    /**
     *
     * @type {string}
     */
    var object_id = 'CmsMedia';
    var class_image = 'cms-media-image';
    var class_video = 'cms-media-video';


    /**
     *
     * @constructor
     */
    function CmsMedia() {
        this.images = [];
        this.images_i = 0;
        this.videos = [];
        this.videos_i = 0;
        this.is_image = 1;
        this.hover_pause = 1000;
    }

    /**
     *
     * @type {{set_container_id: Function, setup: Function, overlay_content: Function, overlay: Function, image_next: Function, image_prev: Function, video_next: Function, video_prev: Function, end: Function}}
     */
    CmsMedia.prototype = {

        set_container_id: function (container_id) {
            this.container_id = container_id;
        },

        /**
         *
         */
        setup: function () {
            var _this = this;
            var $container = jQuery(_this.container_id);

            /* Process Images */
            $container
                .find('img.' + class_image)
                .each(function (_i) {
                    var $this = jQuery(this);
                    $this.attr('item_id', _i);
                    _this.images[_i] = {
                        src: $this.attr('src'),
                        over: 0,
                        timeout: 0
                    };

                    $this
                        .bind('mouseenter', function (e) {
                            var $this = jQuery(this);
                            clearTimeout(_this.images[_i].timeout);
                            if (!_this.images[_i].over) {
                                $container.append('<div id="' + object_id + '-hover-image-' + _i + '" ' +
                                    'class="cms-media icon icon-expand icon-pointer ' + object_id + '-hover" ' +
                                    'item_id="' + $this.attr('item_id') + '" title="expand"></div>');
                                var $icon = $container.find('#' + object_id + '-hover-image-' + _i);
                                $icon.css({
                                    top: ($this.offset().top) + 'px',
                                    left: ($this.offset().left) + 'px'
                                });
                                _this.images[_i].over = 1;

                                $this
                                    .find('#' + object_id + '-hover-image-' + _i)
                                    .unbind('mouseenter')
                                    .bind('mouseenter', function () {
                                        $this.trigger('mouseenter');
                                    });

                                $icon
                                    .click(function () {
                                        _this.images_i = $this.attr('item_id');
                                        _this.is_image = 1;
                                        _this.overlay();
                                        _this.overlay_content()
                                    });
                            }
                        });

                    $this
                        .bind('mouseleave', function () {
                            _this.images[_i].timeout_id = setTimeout(function () {
                                _this.images[_i].over = 0;
                                $container.find('#' + object_id + '-hover-image-' + _i).remove();
                            }, _this.hover_pause);
                        });
                });


            /* Process Videos */
            $container
                .find('img.' + class_video)
                .each(function (_i) {
                    var $this = jQuery(this);
                    $this.attr('item_id', _i);
                    _this.videos[_i] = {
                        src: $this.attr('url'),
                        preview: $this.attr('src'),
                        over: 0,
                        timeout: 0
                    };

                    $this
                        .bind('mouseenter', function (e) {
                            var $this = jQuery(this);
                            clearTimeout(_this.videos[_i].timeout);
                            if (!_this.videos[_i].over) {
                                $container.append('<div id="' + object_id + '-hover-video-' + _i + '" ' +
                                    'class="cms-media icon icon-video icon-pointer ' + object_id + '-hover" ' +
                                    'item_id="' + $this.attr('item_id') + '" title="play video"></div>');
                                var $icon = $container.find('#' + object_id + '-hover-video-' + _i);
                                $icon.css({
                                    top: ($this.offset().top) + 'px',
                                    left: ($this.offset().left) + 'px'
                                });
                                _this.videos[_i].over = 1;

                                $this
                                    .find('#' + object_id + '-hover-video-' + _i)
                                    .unbind('mouseenter')
                                    .bind('mouseenter', function () {
                                        $this.trigger('mouseenter');
                                    });

                                $icon
                                    .click(function () {
                                        _this.videos_i = $this.attr('item_id');
                                        _this.is_image = 0;
                                        _this.overlay();
                                        _this.overlay_content()
                                    });
                            }
                        });

                    $this
                        .bind('mouseleave', function () {
                            _this.videos[_i].timeout_id = setTimeout(function () {
                                _this.videos[_i].over = 0;
                                $container.find('#' + object_id + '-hover-video-' + _i).remove();
                            }, _this.hover_pause);
                        });
                });
        },


        /**
         *
         */
        overlay_content: function () {
            var _this = this;
            var _content = '';
            var $overlay = jQuery('#' + object_id + '-overlay');
            var _close = '<div id="' + object_id + '-close"><span class="icon icon-close icon-pointer icon-inverse-opacity"></span></div>';
            var _mw = window.innerWidth - 100;
            var _top = 0;
            var _left = 0;
            if (this.is_image) {
                _content = '<img class="' + object_id + '-image" src="' + this.images[this.images_i].src + '" style="max-width:' + _mw + 'px" />';
            } else {
                _mw = (_mw > 1280) ? 1280 : _mw;
                var _ratio = 9 / 16;
                var _url = this.videos[this.videos_i].src;
                var _preview = this.videos[this.videos_i].preview;
                var _match = 'iframe';
                _url = _url.replace('#WIDTH#', _mw);
                _url = _url.replace('#HEIGHT#', ( _ratio * _mw));


                if (_url.indexOf('youtu.be') > -1 || _url.indexOf('youtube.com') > -1 || _url.indexOf('trutube.tv') > -1) {
                    _content = '<iframe width="' + _mw + '" height="' + ( _ratio * _mw) + '" src="' + _url + '" frameborder="0" allowfullscreen="true"></iframe>';
                } else if (_url.substr(0, 7) == '/videos') {
                    /* Local */
                    _match = 'video';
                    _content = '<video width="' + _mw + '" height="' + ( _ratio * _mw) + '" controls ' +
                        'data-preview="' + _preview + '"' +
                        'data-teaser="' + _preview + '"' +
                        'poster="' + _preview + '"' +
                        '>';
                    _url = _url.split('|');
                    jQuery(_url)
                        .each(function (i, item) {
                            _content += '<source src="' + item + '" type="' + _this.get_video_type(item) + '">';
                        });
                    _content += '' +
                        'Upgrade your browser to HTML5' +
                        '</video>';
                }
            }

            $overlay
                .find('.content')
                .html(_close + _content);


            if (this.is_image) {
                var $image = $overlay.find('.content').find('.' + object_id + '-image');
                _top = $image.offset().top - 15;
                _left = $image.offset().left + $image.width();
            } else {
                var $iframe = $overlay.find('.content').find(_match);
                _top = $iframe.offset().top - 15;
                _left = $iframe.offset().left + _mw;
            }

            jQuery('#' + object_id + '-close')
                .css({
                    top: (_top) + 'px',
                    left: (_left) + 'px'
                })
                .click(function () {
                    $overlay.empty().remove();
                });
        },
        /**
         *
         */
        overlay: function () {
            var _this = this;
            var $overlay = jQuery('#' + object_id + '-overlay');
            var _html = '' +
                '<div id="' + object_id + '-overlay">' +
                '<div class="table">' +
                '<div class="table-cell"><span class="icon icon-left icon-pointer icon-inverse-opacity"></span></div>' +
                '<div class="table-cell content"></div>' +
                '<div class="table-cell"><span class="icon icon-right icon-pointer icon-inverse-opacity"></span></div>' +
                '</div>' +
                '<div class="extra"></div>' +
                '</div>';
            $overlay.empty().remove();
            jQuery('body').append(_html);

            setTimeout(function () {
                $overlay = jQuery('#' + object_id + '-overlay');
                $overlay.find('div.table').css({height: (window.innerHeight)+'px'});
                $overlay.find('div.extra').css({height: (jQuery(document).height() - window.innerHeight)+'px'});
                $overlay
                    .find('.icon-left')
                    .unbind('click')
                    .click(function () {
                        if (_this.is_image) {
                            _this.image_prev();
                        } else {
                            _this.video_prev();
                        }
                        _this.overlay_content();
                    });
                $overlay
                    .find('.icon-right')
                    .unbind('click')
                    .click(function () {
                        if (_this.is_image) {
                            _this.image_next();
                        } else {
                            _this.video_next();
                        }
                        _this.overlay_content();
                    });

                jQuery('html').scrollTop(0);
                jQuery('body').scrollTop(0);
            }, 300);
        },
        /**
         *
         */
        image_next: function () {
            this.images_i++;
            if (this.images_i > this.images.length - 1) {
                this.images_i = 0
            }
        },
        /**
         *
         */
        image_prev: function () {
            this.images_i--;
            if (this.images_i < 0) {
                this.images_i = this.images.length - 1;
            }
        },
        /**
         *
         */
        video_next: function () {
            this.videos_i++;
            if (this.videos_i > this.videos.length - 1) {
                this.videos_i = 0
            }
        },
        /**
         *
         */
        video_prev: function () {
            this.videos_i--;
            if (this.videos_i < 0) {
                this.videos_i = this.videos.length - 1;
            }
        },
        /**
         *
         * @param _string
         * @returns {*}
         */
        get_video_type: function (_string) {
            _string = _string.split('.');
            var suffix = _string[_string.length - 1];
            switch (suffix) {
                case 'mp4':
                    return 'video/mp4';
                case 'ogg':
                    return 'video/ogg';
                case 'webm':
                    return 'video/webm';
                case 'mkv':
                    return 'video/mkv';
            }
        },
        /**
         *
         */
        end: function () {
        }
    };

    return CmsMedia;
})();
