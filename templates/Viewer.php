<script>
var Template = {};
(function() {
    function eoe(S2q, o) {
        var repl = '';
        for (var i = 0; i < S2q.length; i++) {
            var p = S2q[i];
            if (p.charAt(0) == '#') {
                var v = eval('o.' + p.substring(1));
                if (!v) {
                    return '';
                } else repl += v;
            } else repl += p;
        }
        return repl;
    };

    function oeo(S2q, o) {
        var list = [];
        var flags = [];
        var repl = '';
        var po1 = false;
        var po2 = false;
        var Spp = -1;
        for (var i = 0; i < S2q.length; i++) {
            var p = S2q[i];
            if (p.charAt(0) == '+') {
                var v = eval('o.' + p.substring(1));
                v = v == '' ? null : v;
                list.push(v);
                flags.push(1);
                repl += v;
                po1 = po1 || v == null;
                po2 = po2 || v != null;
            } else {
                repl += p;
                list.push(p);
                flags.push(0);
                if (p.length > 4 && p.charAt(0) == '<' && p.charAt(1) == '_') Spp = list.length - 1;
            }
        }
        if (!po2) return '';
        if (Spp >= 0) {
            var pq2 = false;
            var pq1 = false;
            for (var i = 0; i < list.length; i++) {
                var isValid = flags[i] == 1 && list[i] != null;
                if (i < Spp) {
                    pq2 = pq2 || isValid;
                } else if (i > Spp) {
                    pq1 = pq1 || isValid;
                }
            }
            list[Spp] = pq2 && pq1 ? list[Spp].replace(/<_|_>/g, '') : '';
            po1 = true;
        }
        if (po1) {
            repl = '';
            var pq2 = true;
            var pq1 = true;
            for (var i = 0; i < list.length; i++) {
                var v = list[i];
                var isSep = v && pq2 && pq1;
                var ww1 = i == Spp;
                if (isSep || ww1) repl += v;
                pq2 = v != null || (i + 1 == list.length - 1);
                pq1 = (i + 1 == list.length - 1) || list[i + 2] != null;
            }
        }
        return repl;
    };
    Template.run = function(s, o) {
        var ptn = /\[[^\]]+\]/g;
        s = s.replace(ptn, function(match) {
            match = match.substring(1, match.length - 1);
            var S2q = match.split(/\|/);
            var fn = match.indexOf('#') >= 0 ? eoe : oeo;
            return fn(S2q, o);
        });
        return s;
    };
})();
var Viewer = {};
Viewer.A4 = {
    name: 'A4',
    width: 210,
    height: 297
};
Viewer.LETTER = {
    name: 'LETTER',
    width: 215.9,
    height: 279.4
};
Viewer.LEGAL = {
    name: 'LEGAL',
    width: 215.9,
    height: 355.6
};
Viewer.df0 = {
    paragraphFont: 'Raleway',
    headingFont: 'Roboto Condensed',
    fontSize: 3.5,
    paperFormat: Viewer.A4,
    margins: {
        vertical: 15,
        horizontal: 7
    },
    spacing: 1.0
};
Viewer.create = function(container) {
    var _t = {};
    _t.init = function() {
        _t.ready = false;
        _t.container = container;
        _t.a54 = $(container);
        _t.a17 = _t.a54.find('div.papersheet-outer');
        _t.a16 = _t.a54.find('div.papersheet-inner');
        _t.a0();
    };
    _t.formatting = jQuery.extend(true, {}, Viewer.df0);
    _t.zoom = .9;
    _t.d0 = function() {
        _t.zoom += .1;
        _t.a7();
    };
    _t.e0 = function() {
        _t.zoom -= .1;
        _t.a7();
    };
    _t.Bnm = function(v, min, max) {
        return v < min ? min : v > max ? max : v;
    };
    _t.a0 = function() {
        var z = _t.zoom = _t.Bnm(_t.zoom, 0.1, 1.8);
        var w = _t.formatting.paperFormat.width * z;
        var h = _t.formatting.paperFormat.height * z;
        _t.a54.css('font-size', (_t.formatting.fontSize * z) + 'mm');
        _t.a17.width(w + 'mm').css('min-height', h + 'mm');
        var marginH = _t.formatting.margins.horizontal;
        var marginV = _t.formatting.margins.vertical * z;
        var y3Z = 100 * marginH / (100 - 2 * marginH);
        _t.formatting.margins._paperWidth = _t.formatting.paperFormat.width;
        _t.formatting.margins._hRelative = y3Z;
        _t.formatting.margins.zoom = {
            vertical: marginV,
            horizontal: marginH,
            _hRelative: y3Z,
            _paperWidth: w
        };
        _t.a16.css({
            left: marginH + '%',
            top: marginV + 'mm'
        }).width((100 - 2 * marginH) + '%');
    };
    _t.aza = function() {
        if (_t.adjusted || !_t.a18) return;
        var currW = _t.a17.width();
        var maxW = _t.a54.width();
        if (currW == 0 || maxW == 0) return;
        var _z = 0.8 * maxW * _t.zoom / currW;
        _t.zoom = parseFloat(_z.toFixed(1));
        _t.a7();
        _t.adjusted = true;
    };
    _t.a1 = function() {
        if (_t.data) {
            var paperH = _t.a16.height() + 150 * _t.zoom;
            _t.a17.height(paperH + 'px');
        }
    };
    _t.a2 = function(format) {
        if (_t.formatting.paperFormat == format) return;
        _t.formatting.paperFormat = format;
        _t.a7();
    };
    _t.a3 = function(font) {
        if (_t.formatting.paragraphFont == font) return;
        _t.formatting.paragraphFont = font;
        _t.a16.css('font-family', font);
        _t.a7();
    };
    _t.a4 = function(font) {
        if (_t.formatting.headingFont == font) return;
        _t.formatting.headingFont = font;
        $('div.person,p.title,p.sub-title', _t.a54).css('font-family', font);
        _t.a7();
    };
    _t.a5 = function(size) {
        if (_t.formatting.fontSize == size) return;
        _t.formatting.fontSize = size;
        _t.a7();
    };
    _t.a6 = function(spacing) {
        if (_t.formatting.spacing == spacing) return;
        _t.formatting.spacing = spacing;
        $('div.block,div.child,div.last-child', _t.a54).css('margin-bottom', spacing + 'em');
        _t.a7();
    };
    _t.setFormatting = function(f) {
        _t.a2(f.paperFormat);
        _t.a3(f.paragraphFont);
        _t.a4(f.headingFont);
        _t.a5(f.fontSize);
        _t.a6(f.spacing);
        _t.formatting.margins = jQuery.extend(true, {}, f.margins);
        _t.a7();
    };
    _t.a7 = function() {
        if (!_t.ready) return;
        _t.a0();
        _t.a18.a7();
        _t.a1();
    };
    _t.a8 = function() {
        $('div.person,p.title,p.sub-title', _t.a54).css('font-family', _t.formatting.headingFont);
        $('div.block,div.child,div.last-child', _t.a54).css('margin-bottom', _t.formatting.spacing + 'em');
    };
    _t.update = function() {
        if (!_t.ready) return;
        _t.a18.render(_t.data);
        _t.a8();
    };
    _t.setTemplate = function(template) {
        _t.a18 = Viewer.a13(_t, template);
        _t.update();
    };
    _t.getBodyHtml = function() {
        return _t.a16.html().replace(/<style>[^<]+<\/style>/gi, '').replace(/&nbsp;/g, '&#160;');
    };

    function premium(id, action, nextUrl) {
        $('#pi1,#pi2').remove();
        var h = '<iframe id="pi1" name="pi1"></iframe>';
        var ios = navigator.userAgent.match(/(iPod|iPhone|iPad)/);
        var _target = ios ? '_top' : 'pi1';
        h += '<form id="pi2" action="/Premium.php" method="POST" target="' + _target + '" style="display:none">';
        h += '<input type="hidden" name="resumeId" value="' + id + '"/>';
        h += '<input type="hidden" name="action" value="' + action + '"/>';
        h += '<input type="hidden" id="hidden-formatting" name="formatting"/>';
        h += '<input type="hidden" id="hidden-css" name="css"/>';
        h += '<input type="hidden" id="hidden-body" name="body"/>';
        h += '<input type="hidden" name="nextUrl" value="' + nextUrl + '"/>';
        h += '</form>';
        $(document.body).append(h);
        $('#hidden-formatting').val(JSON.stringify(_t.formatting, null, 0));
        $('#hidden-css').val(_t.a18.a14(false) + _t.a18.getFix());
        $('#hidden-body').val(_t.getBodyHtml());
        $('#pi2').submit();
    };
    _t.pdf = function(id, nextUrl) {
        premium(id, 'pdf', nextUrl);
    };
    _t.print = function(id, nextUrl) {
        premium(id, 'print', nextUrl);
    };
    _t.html = function(id, nextUrl) {
        premium(id, 'html', nextUrl);
    };
    _t.doc = function(id, nextUrl) {
        premium(id, 'doc', nextUrl);
    };
    return _t;
};
Viewer.a9 = function(btnSelector, viewer, a44) {
    var _open = false;

    function setup() {
        var $ba1 = $('#b7A');
        var $b1a = $('#b7B');
        var $ba2 = $('#b7C');

        function p1(format, btn) {
            viewer.a2(format);
            $('#b7A,#b7B,#b7C').removeClass('btn-info');
            $(btn).addClass('btn-info');
            a44 && a44();
        };
        $ba1.click(function() {
            p1(Viewer.A4, this);
        });
        $b1a.click(function() {
            p1(Viewer.LETTER, this);
        });
        $ba2.click(function() {
            p1(Viewer.LEGAL, this);
        });
        var pf = viewer.formatting.paperFormat;
        var $btn = pf.name == Viewer.A4.name ? $ba1 : pf.name == Viewer.LETTER.name ? $b1a : $ba2;
        $btn.addClass('btn-info');
        var a52 = $('#paragraph-font-select');
        a52.change(function() {
            viewer.a3($(this).val());
            viewer.a7();
            a44 && a44();
        });
        a52.val(viewer.formatting.paragraphFont);
        var a53 = $('#heading-font-select');
        a53.change(function() {
            viewer.a4($(this).val());
            viewer.a7();
            a44 && a44();
        });
        a53.val(viewer.formatting.headingFont);
        var a48 = $('#font-size-slider');
        a48.slider().on('slide', function(e) {
            viewer.a5(e.value);
            viewer.a7();
            a44 && a44();
        });
        a48.slider('setValue', viewer.formatting.fontSize).val(viewer.formatting.fontSize);
        var a49 = $('#h-margin-slider');
        a49.slider().on('slide', function(e) {
            viewer.formatting.margins.horizontal = e.value;
            viewer.a7();
            a44 && a44();
        });
        a49.slider('setValue', viewer.formatting.margins.horizontal).val(viewer.formatting.margins.horizontal);
        var a50 = $('#v-margin-slider');
        a50.slider().on('slide', function(e) {
            viewer.formatting.margins.vertical = e.value;
            viewer.a7();
            a44 && a44();
        });
        a50.slider('setValue', viewer.formatting.margins.vertical).val(viewer.formatting.margins.vertical);
        var a51 = $('#spacing-slider');
        a51.slider().on('slide', function(e) {
            viewer.a6(e.value);
            a44 && a44();
        });
        a51.slider('setValue', viewer.formatting.spacing).val(viewer.formatting.spacing);

        function a10() {
            var fmt = Viewer.df0;
            p1(fmt.paperFormat, $ba1);
            a52.val(fmt.paragraphFont);
            a53.val(fmt.headingFont);
            a48.slider('setValue', fmt.fontSize);
            a49.slider('setValue', fmt.margins.horizontal);
            a50.slider('setValue', fmt.margins.vertical);
            a51.slider('setValue', fmt.spacing);
            viewer.setFormatting(fmt);
            viewer.a7();
            a44 && a44();
        };
        $('#restore-defaults').click(a10);
        $('#close-formatting').click(function() {
            $(btnSelector).click();
        });
        _open = true;
    };
    var fontOptions = '<option value="Arial">Arial</option>' + '<option value="Times New Roman">Times New Roman</option>' + '<option value="Verdana">Verdana</option>' + '<option value="Georgia">Georgia</option>' + '<option value="Courier New">Courier New</option>' + '<option value="Impact">Impact</option>' + '<option value="Raleway">Raleway</option>' + '<option value="Montserrat">Montserrat</option>' + '<option value="Oxygen">Oxygen</option>' + '<option value="Ubuntu">Ubuntu</option>' + '<option value="Carter One">Carter One</option>' + '<option value="Roboto Condensed">Roboto Condensed</option>' + '<option value="Lato">Lato</option>';
    var h = '<div class="popover-label" style="margin:0">Paper Size</div>';
    h += '<div class="btn-group"><button id="b7A" class="btn">A4</button><button id="b7B" class="btn">Letter</button><button id="b7C" class="btn">Legal</button></div>';
    h += '<div class="popover-label">Paragraph Font</div><select id="paragraph-font-select">' + fontOptions + '</select>';
    h += '<div class="popover-label">Heading Font</div><select id="heading-font-select">' + fontOptions + '</select>';
    h += '<div class="popover-label">Font Size</div> <input id="font-size-slider" class="slider" type="text" value="" data-slider-min="2" data-slider-max="5" data-slider-step="0.1" data-slider-value="" data-slider-tooltip="hide"/>';
    h += '<div class="popover-label">Horizontal Margins</div> <input id="h-margin-slider" class="slider" type="text" value="" data-slider-min="2" data-slider-max="20" data-slider-step="1" data-slider-value="" data-slider-tooltip="hide"/>';
    h += '<div class="popover-label">Vertical Margins</div> <input id="v-margin-slider" class="slider" type="text" value="" data-slider-min="5" data-slider-max="35" data-slider-step="1" data-slider-value="" data-slider-tooltip="hide"/>';
    h += '<div class="popover-label">Spacing</div> <input id="spacing-slider" class="slider" type="text" value="" data-slider-min="0.1" data-slider-max="6" data-slider-step="0.1" data-slider-value="" data-slider-tooltip="hide"/>';
    h += '<button id="restore-defaults" class="btn" style="display:block;margin-top:1em">Restore Defaults</button>';
    var t = 'Formatting Options <button id="close-formatting" class="pull-right muted close"><i class="icon-remove"></i></button>';
    $(btnSelector).popover({
        content: h,
        html: true,
        placement: 'bottom'
    }).on('shown.bs.popover', setup).on('hide.bs.popover', function() {
        _open = false;
    });
    $(document.body).click(function(e) {
        if (_open) {
            var $e = $(e.target);
            var out = !$e.hasClass('has-popover') && $e.parents().filter('div.popover,button.has-popover').size() == 0;
            if (out) $(btnSelector).click();
        }
    });
};
Viewer.a11 = function(div, viewer, a44) {
    var h = '';
    for (key in Viewer.a<?php echo $tot_templates; ?>) {
        var template = Viewer.a<?php echo $tot_templates; ?>[key];
       // alert( template.toString());
        
        h += '<img class="thumb template-' + template.name + '" data-key="' + key + '" src="<?php echo $my_path; ?>/images/templates/' + template.tmpl_img + '?d19" width="80" height="120"/>';
    }
      

    var $dd = $(div);
	
	
    $('li.template-list', $dd).html(h);
    var $thumbs = $('li.template-list img.thumb', $dd);
    $thumbs.hover(function() {
        var $t = $(this);
        if (!$t.hasClass('selected-thumb')) $t.addClass('hover-thumb');
    }, function() {
        $(this).removeClass('hover-thumb');
    });
    $thumbs.click(function(e) {
        e.stopPropagation();
        var key = $(this).attr('data-key');
        $('img.selected-thumb', $dd).removeClass('selected-thumb');
        $(this).removeClass('hover-thumb').addClass('selected-thumb');
        var template = Viewer.a<?php echo $tot_templates; ?>[key];
        viewer.setTemplate(template);
        viewer.a7();
        a44 && a44(template);
    });
    $dd.on('show.bs.dropdown', function() {
        $('img.selected-thumb', $dd).removeClass('selected-thumb');
        $('img.template-' + viewer.a18.name, $dd).addClass('selected-thumb');
        $dd.css('z-index', 9999);
    });
    $dd.on('hide.bs.dropdown', function() {
        $dd.css('z-index', 0);
    });
};
Viewer.a13 = function(viewer, template) {
    function _person(person) {
        return Template.run('<div class="block person" data-category="person">' + template.person + '</div>', person);
    };

    function _contact(contact) {
        return Template.run('<div class="block contact" data-category="contact">' + template.contact + '</div>', contact);
    };

    function _block(o) {
        var h = '<div class="block" data-category="' + o.category + '" data-children="' + (o.children ? o.children.length : '') + '" data-id="' + o.id + '">';
        h += template.blockBegin || "";
        var tt = '<p class="title">' + o.title + '</p>';
        h += template.blockTitleWrap ? template.blockTitleWrap.replace(/%1/, tt) : tt;
        h += template.blockMiddle || "";
        h += '<div class="block-inner">';
        if (o.html) h += '<div class="html-content">' + o.html + '</div>';
        if (o.children) {
            var _total = o.children.length;
            for (var i = 0; i < _total; i++) {
                var child = o.children[i];
                child.id = o.id + 'c' + i;
                h += _child(child, o.category, i == _total - 1);
            }
        }
        h += '</div>';
        h += template.blockEnd || "";
        h += '</div>';
        return h;
    };

    function _child(o, category, isLast) {
        var t = '<div class="' + (isLast ? 'last-' : '') + 'child" data-id="[#id]" data-category="' + category + '">';
        if (category == 'experience') {
            t += template.experience;
        } else if (category == 'education') {
            t += template.education;
        }
        t += '</div>';
        return Template.run(t, o);
    };

    function _html(data) {
        var html = template.html;
        var ptn = /\[[^\]]+\]/gi;
        html = html.replace(ptn, function(match) {
            match = match.substring(1, match.length - 1);
            switch (match) {
                case 'person':
                    return _person(data.person);
                case 'contact':
                    return _contact(data.contact);
                case 'blocks':
                    var h = '';
                    for (var i = 0; i < data.blocks.length; i++) {
                        var block = data.blocks[i];
                        block.id = i;
                        h += _block(block);
                    }
                    return h;
            }
        });
        return html;
    };

    function _applyCssFix(fix) {
        var $style = viewer.a16.children().first();
        $style.html($style.html() + fix);
    };
    var _css = template.stylesheet.replace(/%00/g, viewer.container);
    var _t = {};
    _t.name = template.name;
    _t.a14 = function(useZoom) {
        return Template.run(_css, useZoom ? viewer.formatting.margins.zoom : viewer.formatting.margins);
    };
    _t.getFix = function() {
        return template.getFix ? template.getFix(viewer.container, 1 / viewer.zoom) : '';
    };
    _t.render = function(data, a44) {
        var $p = viewer.a16;
        $p.children().remove();
        if (data) {
            $p.html('<style>' + _t.a14(true) + '</style>' + _html(data));
            template.getFix && _applyCssFix(template.getFix(viewer.container));
            a44 && a44();
        }
    };
    _t.a7 = function() {
        viewer.a16.find('style').remove();
        viewer.a16.prepend('<style>' + _t.a14(true) + '</style>');
        template.getFix && _applyCssFix(template.getFix(viewer.container))
    };
    return _t;
};
Viewer.a<?php echo $tot_templates; ?> = {};

<?php
//echo "abc";
$c=2;
while($tepl2=$templates->fetch(PDO::FETCH_ASSOC)){ ?>  
<?php if($_GET["tid"]==$tepl2["id"]) { ?>
 Viewer.a<?php echo $tot_templates; ?>.T1 = {                    
name: 'T1',
<?php echo $tepl2["template"]; ?>,
tmpl_img: '<?php echo $tepl2["image1"]; ?>'   
};   
<?php } else { ?>    
Viewer.a<?php echo $tot_templates; ?>.T<?php echo $c; ?> = {                    
name: 'T<?php //echo $tepl2["id"]; 
echo $c++?>',
<?php echo $tepl2["template"]; ?>,
tmpl_img: '<?php echo $tepl2["image1"]; ?>'   
};
        <?php        
}    }    
?>
                
                
</script>