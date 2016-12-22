var Editor = {};
Editor.create = function(viewer) {
    var _t = {};
    _t.init = function() {
        _t.viewer = viewer;
        _t.a31();
        _t.a32();
    };
    _t.a31 = function() {
        var h = '<div id="section-toolbar" class="section-toolbar">';
        h += '<button class="btn btn-mini btn-default edit">Edit</button>';
        h += '<button class="btn btn-mini btn-default rename">Edit Title</button>';
        h += '<button class="btn btn-mini btn-default add-new">Add Subsection</button>';
        h += '<button class="btn btn-mini btn-default move-section">Move</button>';
        h += '<button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button>';
        h += '</div>';
        $(viewer.a16.parent()).append(h);
        _t.a27 = $('div.section-toolbar');
    };
    _t.a32 = function() {
        var h = '<div id="subsection-toolbar" class="subsection-toolbar">';
        h += '<button class="btn btn-mini btn-default edit">Edit</button>';
        h += '<button class="btn btn-mini btn-default move-subsection">Move</button>';
        h += '<button class="btn btn-mini btn-default delete"><i class="fa fa-trash-o"></i></button>';
        h += '</div>';
        $(viewer.a16.parent()).append(h);
        _t.a28 = $('#subsection-toolbar');
    };
    var xo1 = viewer.a7;
    viewer.a7 = function() {
        if (!_t.ready) return;
        xo1();
        _t.a33();
        _t.a34();
    };
    viewer.update = function() {
        if (!_t.ready || !viewer.ready) return;
        _t.a27.hide();
        _t.a28.hide();
        $(document.body).prepend(_t.a27).prepend(_t.a28);
        viewer.a18.render(viewer.data, function() {
            $('.block', viewer.a16).hover(function(e) {
                e.stopPropagation();
                _t.a19(this);
            }, function() {
                _t.a21();
            });
            var _89 = $('div.child,div.last-child', viewer.a16);
            _89.hover(function() {
                _t.a20(this);
            }, function() {
                _t.a22();
            });
        });
        viewer.a8();
    };
    var xo2 = viewer.getBodyHtml;
    viewer.getBodyHtml = function() {
        var $p1 = _t.a27.parent();
        viewer.a17.append(_t.a27);
        var $p2 = _t.a28.parent();
        viewer.a17.append(_t.a28);
        var r = xo2();
        $p1.prepend(_t.a27);
        $p2.prepend(_t.a28);
        return r;
    };
    _t.getBlockOf = function(elem) {
        var a47 = $(elem);
        while (a47.get(0) != viewer.a16.get(0)) {
            if (a47.hasClass('block')) {
                return a47;
            }
            a47 = a47.parent();
        }
        return null;
    };
    _t.Idf = function(id) {
        var list = _t.a29();
        for (var i = 0; i < list.length; i++) {
            var oid = list[i].id;
            if (!oid) continue;
            if (oid == id) {
                return list[i];
            }
        }
        return null;
    };
    _t.a19 = function(elem) {
        var aqa = _t.getBlockOf(elem);
        if (aqa) {
            _t.a23 = aqa;
            aqa.removeClass('hover-block');
            aqa.addClass('selected-block');
            _t.a33();
        }
    };
    _t.a21 = function() {
        _t.a23 = null;
        $('.selected-block').removeClass('selected-block');
        _t.a27.hide();
    };
    _t.a20 = function(elem) {
        $(elem).addClass('selected-subsection');
        _t.a24 = $(elem);
        _t.a34();
    };
    _t.a22 = function() {
        _t.a24 = null;
        $('div.selected-subsection').removeClass('selected-subsection');
        _t.a28.hide();
    };
    _t.a33 = function() {
        if (_t.a23) {
            _t.a23.prepend(_t.a27);
            _t.a27.show();
            _t.a35();
            _t.a27.width((_t.a23.width() - 5) + 'px');
            var left = _t.a23.position().left;
            var mtop = -_t.a27.outerHeight() * 0.7;
            var mright = viewer.a16.width() - (left + _t.a23.width()) - 10;
            _t.a27.css({
                marginTop: mtop + 'px',
                marginRight: mright + 'px',
                right: 0,
                left: left
            });
            _t.a27.show();
            if (_t.a27.position().left < 0) {
                _t.a27.css({
                    left: 0,
                    right: 'auto'
                });
            }
        }
    };
    _t.a34 = function() {
        var ch = _t.a24;
        if (ch) {
            ch.prepend(_t.a28);
            _t.a28.show();
            var top = ch.position().top;
            _t.a28.css('top', top + 7);
            _t.a28.show();
        }
    };
    _t.a35 = function() {
        var o1o = _t.a23.hasClass('person');
        var oo1 = _t.a23.hasClass('contact');
        var a46 = $('button.delete', _t.a27);
        var wr2 = $('button.move-section', _t.a27);
        o1o || oo1 ? a46.hide() : a46.show();
        o1o || oo1 ? wr2.hide() : wr2.show();
        var _39 = _t.a23.attr('data-children');
        var _79 = _39 && _39 != '';
        var _0l = $('button.edit', _t.a27);
        var rrz = $('button.rename', _t.a27);
        var w2r = $('button.add-new', _t.a27);
        if (_79) {
            _0l.hide();
            rrz.show();
            w2r.show();
        } else {
            _0l.show();
            rrz.hide();
            w2r.hide();
        }
    };
    _t._list = null;
    _t.a29 = function() {
        if (!_t._list) {
            var d = viewer.data;
            d.person.category = 'person';
            d.contact.category = 'contact';
            var list = [d.person, d.contact];
            for (var i = 0; i < d.blocks.length; i++) {
                var block = d.blocks[i];
                list.push(block);
                if (block.children) {
                    for (var j = 0; j < block.children.length; j++) {
                        var b = block.children[j];
                        b.category = block.category;
                        list.push(b);
                    }
                }
            }
            _t._list = list;
        }
        return _t._list;
    };
    _t.b93 = function(o) {
        var list = _t.a29();
        for (var i = 0; i < list.length; i++) {
            var o1 = list[i];
            if (o1.category == o.category && (o.id == null || o1.id == o.id)) return i;
        }
        return -1;
    };
    _t.a43 = function() {
        if (_t.editing) return _t.b93(_t.editing);
        var _o = {
            category: _t.a23.attr('data-category'),
            id: _t.a23.attr('data-id')
        };
        return _t.b93(_o);
    };
    _t.q1a = function(o) {
        var blocks = viewer.data.blocks;
        for (var i = 0; i < blocks.length; i++) {
            var ch = blocks[i].children;
            if (ch) {
                for (var j = 0; j < ch.length; j++)
                    if (ch[j] == o) return blocks[i];
            }
        }
        return null;
    };
    _t.cQ0 = null;
    _t.z12 = function() {
        _t.cQ0 = viewer.data;
        viewer.data = jQuery.extend(true, {}, viewer.data);
        _t.editing = null;
        _t._list = null;
    };
    _t._49 = function() {
        viewer.data = _t.cQ0;
        _t.a41();
    };
    _t.a41 = function() {
        _t.cQ0 = null;
        _t.editing = null;
        _t._list = null;
    };
    _t.a42 = function(selector) {
        setTimeout(function() {
            var $f = $(selector + ' input:first');
            $f = $f.size() == 0 ? $(selector + ' div.rich-edit') : $f;
            $f.focus();
        }, 250);
    };
    _t.a30 = null;
    _t.a25 = function() {
        _t.a30 && _t.a30();
    };
    _t.editThis = function() {};
    return _t;
};
Editor.windows = {};
Editor.windows.editSection = function(editor, ll5) {
    var _t = {};
    _t._99 = false;
    _t.install = function() {
        _t.a45 = $('#edit-window');
        $('#btn-save').click(_t.save);
        $('.btn-close', _t.a45).click(function() {
            _t.close(false);
        });
        _t.a45.on('shown.bs.modal', function() {
            editor.a42('#edit-window-body');
        });
        _t._99 = true;
    };
    _t.open = function() {
        !_t._99 && _t.install();
        editor.z12();
        var index = editor.a43();
        var obj = editor.a29()[index];
        _t._19(obj);
        _t.a45.modal('show');
    };
    _t.l_0 = function() {
        !_t._99 && _t.install();
        editor.z12();
        var index = editor.a43();
        var obj = editor.a29()[index];
        if (ll5 && ll5(obj.children.length)) {
            editor._49();
            return;
        }
        var newChild = {
            category: obj.category
        };
        obj.children.push(newChild);
        _t._19(newChild);
        _t.a45.modal('show');
    };
    editor.editThis = function(o) {
        !_t._99 && _t.install();
        editor.a29();
        _t._19(o);
        _t.a45.modal('show');
    };
    _t.close = function(apply) {
        !apply && editor._49();
        _t.a45.modal('hide');
        editor.viewer.update();
        editor.a41();
    };
    _t.save = function() {
        _t.rt2();
        editor.a25();
        _t.close(true);
    };
    _t._19 = function(o) {
        var $tpl = $('#tpl_' + o.category);
        $('#edit-window-body').html($tpl.html());
        var parent = editor.q1a(o);
        var _69 = parent ? parent.title : null;
        var title = $tpl.attr('data-title') || _69 || _t.capitalize(o.category);
        $('#edit-window-title').html(title);
        var css = $tpl.attr('data-class');
        $('#edit-window').attr('class', 'modal fade ' + (css ? css : ''));
        editor.editing = o;
        _t._59();
        var script = $tpl.attr('data-script');
        if (script) eval(script);
        Product.ga("started editing");
    };
    _t.capitalize = function(s) {
        return s.substring(0, 1).toUpperCase() + s.substring(1);
    };
    _t._59 = function() {
        for (var key in editor.editing) {
            var TTz = $('#' + key);
            var v = editor.editing[key];
            key == 'html' ? TTz.html(v) : TTz.val(v);
        }
    };
    var _regex1 = /<li>(<br\/?>)?<\/li>/gi;
    var _regex2 = /^(<div>(<[^>]+>)?<br\/?>(<\/[^>]+>)?<\/div>)+|(<div>(<[^>]+>)?<br\/?>(<\/[^>]+>)?<\/div>)+$/gi;
    var _regex3 = /^(<p>(<[^>]+>)?<br\/?>(<\/[^>]+>)?<\/p>)+|(<p>(<[^>]+>)?<br\/?>(<\/[^>]+>)?<\/p>)+$/gi;
    var _regex4 = /^(<br\/?>)+|(<br\/?>)+$/gi;
    _t.i1i = function(html) {
        html = html.replace(_regex1, '');
        html = html.replace(_regex2, '');
        html = html.replace(_regex3, '');
        html = html.replace(_regex4, '');
        return html;
    };
    _t.rt2 = function() {
        $('input,select,div.note-editable', '#edit-window-body').each(function() {
            var key = $(this).attr('id');
            editor.editing[key] = key == 'html' ? _t.i1i($(this).html()) : $(this).val();
        });
    };
    $('#section-toolbar button.edit').click(_t.open);
    $('#section-toolbar button.add-new').click(_t.l_0);
};
Editor.windows.a36 = function(editor) {
    var _t = {};
    _t.a38 = null;
    _t._99 = false;
    _t.install = function() {
        _t.a45 = $('#delete-section-confirm-window');
        $('button.delete', _t.a45).click(_t.a36);
        $('button.btn-close', _t.a45).click(_t.cc0);
        _t._99 = true;
    };
    _t.a39 = function() {
        !_t._99 && _t.install();
        var index = editor.a43();
        var obj = editor.a29()[index];
        var parent = editor.q1a(obj);
        var _69 = parent ? parent.title : null;
        var _29 = _69 || obj.title || obj.category;
        _t.a38 = parent ? parent : obj;
        $('#section-name').html(_29);
        _t.a45.modal('show');
    };
    _t.cc0 = function() {
        _t.a38 = null;
        _t.a45.modal('hide');
    };
    _t.a36 = function() {
        var o = _t.a38;
        var d = editor.viewer.data;
        for (var i = 0; i < d.blocks.length; i++) {
            if (d.blocks[i] == o) {
                d.blocks.splice(i, 1);
                break;
            }
        }
        editor.a25();
        _t.cc0();
        editor.a41();
        editor.viewer.update();
    };
    $('#section-toolbar button.delete').click(_t.a39);
};
Editor.windows.RE0 = function(editor) {
    var _t = {};
    _t.a38 = null;
    _t._99 = false;
    _t.install = function() {
        _t.a45 = $('#delete-subsection-confirm-window');
        $('button.delete', _t.a45).click(_t.a37);
        $('button.btn-close', _t.a45).click(_t.cc0);
        _t._99 = true;
    };
    _t.RE0 = function() {
        editor.z12();
        var id = editor.a24.attr('data-id');
        var o = editor.Idf(id);
        editor.editThis(o);
    };
    _t.a39 = function(e) {
        !_t._99 && _t.install();
        var id = editor.a24.attr('data-id');
        _t.a38 = editor.Idf(id);
        $('#subsection-name').html(_t.a38.title);
        _t.a45.modal('show');
    };
    _t.cc0 = function() {
        _t.a38 = null;
        _t.a45.modal('hide');
    };
    _t.a37 = function() {
        var o = _t.a38;
        var d = editor.viewer.data;
        for (var i = 0; i < d.blocks.length; i++) {
            var ch = d.blocks[i].children;
            if (ch) {
                for (var j = 0; j < ch.length; j++) {
                    if (ch[j].id == o.id) {
                        ch.splice(j, 1);
                        if (ch.length == 0) {
                            d.blocks.splice(i, 1);
                        }
                        break;
                    }
                }
            }
        }
        editor.a25();
        _t.cc0();
        editor.viewer.update();
    };
    $('#subsection-toolbar button.edit').click(_t.RE0);
    $('#subsection-toolbar button.delete').click(_t.a39);
};
Editor.windows.renameSection = function(editor) {
    var _t = {};
    _t.object = null;
    _t._99 = false;
    _t.install = function() {
        _t.a45 = $('#rename-window');
        $('button.save', _t.a45).click(_t.save);
        $('button.btn-close', _t.a45).click(_t.close);
        _t._99 = true;
    };
    _t.open = function(e) {
        !_t._99 && _t.install();
        var id = editor.a23.attr('data-id');
        var bls = editor.viewer.data.blocks;
        for (var i = 0; i < bls.length; i++) {
            if (bls[i].id == id) {
                _t.object = bls[i];
                break;
            }
        }
        $('#section-title').val(_t.object.title);
        _t.a45.modal('show');
        editor.a42('#rename-window');
    };
    _t.close = function() {
        _t.object = null;
        _t.a45.modal('hide');
    };
    _t.save = function() {
        var title = $('#section-title').val();
        _t.object.title = title;
        editor.a25();
        editor.viewer.update();
        _t.close();
    };
    $('#section-toolbar button.rename').click(_t.open);
};
Editor.windows.moveSections = function(editor) {
    var _t = {};
    _t._l0 = null;
    _t._99 = false;
    _t.install = function() {
        _t.a45 = $('#move-sections-window');
        $('button.save', _t.a45).click(_t.save);
        $('button.btn-close', _t.a45).click(_t.close);
        $('button.move-up', _t.a45).click(_t.moveUp);
        $('button.move-down', _t.a45).click(_t.moveDown);
        _t._99 = true;
    };
    _t.buildSections = function() {
        var d = editor.viewer.data;
        var h = '';
        for (var i = 0; i < d.blocks.length; i++) {
            h += '<div data-level="1" data-id="' + d.blocks[i].id + '"><div class="section-row1">' + d.blocks[i].title + '</div>';
            var ch = d.blocks[i].children;
            if (ch) {
                for (var j = 0; j < ch.length; j++) {
                    var text = ch[j].title;
                    if (ch[j].where) text += ' / ' + ch[j].where;
                    h += '<div class="section-row2" data-level="2" data-id="' + ch[j].id + '" data-parent="' + d.blocks[i].id + '">' + text + '</div>';
                }
            }
            h += '</div>';
        }
        $('#section-list').html(h);
    };
    _t.addEvents = function() {
        $('div.section-row1,div.section-row2', _t.a45).click(function() {
            $('.section-selected-row', _t.a45).removeClass('section-selected-row');
            $(this).addClass('section-selected-row');
            _t._l0 = $('.section-selected-row', _t.a45);
            _t._l0 = _t._l0.attr('data-level') ? _t._l0 : _t._l0.parent();
            _t.a40();
        }).hover(function() {
            $(this).addClass('section-hover-row');
        }, function() {
            $('.section-hover-row', _t.a45).removeClass('section-hover-row');
        });
    };
    _t.a40 = function() {
        var level = _t._l0.attr('data-level');
        var pq2 = _t._l0.prev().attr('data-level') == level;
        var po5 = $('button.move-up', _t.a45);
        pq2 ? po5.removeClass('disabled').removeAttr('disabled') : po5.addClass('disabled').attr('disabled', true);
        var pq1 = _t._l0.next().attr('data-level') == level;
        var p5o = $('button.move-down', _t.a45);
        pq1 ? p5o.removeClass('disabled').removeAttr('disabled') : p5o.addClass('disabled').attr('disabled', true);
    };
    _t.selectRow = function() {
        var section = editor.a24 || editor.a23;
        var _l0 = $('#section-list div[data-id="' + section.attr('data-id') + '"]');
        _l0 = _l0.hasClass('section-row2') ? _l0 : $('div.section-row1', _l0);
        _l0.click();
    };
    _t.open = function() {
        !_t._99 && _t.install();
        $('button.move-up, button.move-down', _t.a45).addClass('disabled').attr('disabled', true);
        editor.z12();
        _t.buildSections();
        _t.addEvents();
        _t.selectRow();
        _t.a45.modal('show');
    };
    _t.close = function() {
        editor._49();
        _t.a45.modal('hide');
    };
    _t.a26 = function() {
        var d = editor.viewer.data;
        var list = d.blocks;
        var level = _t._l0.attr('data-level');
        var id = _t._l0.attr('data-id');
        if (level == 2) {
            var parentId = _t._l0.attr('data-parent');
            for (var i = 0; i < d.blocks.length; i++) {
                if (d.blocks[i].id == parentId) {
                    list = d.blocks[i].children;
                    break;
                }
            }
        }
        var index = -1;
        for (var i = 0; i < list.length; i++) {
            if (list[i].id == id) {
                index = i;
                break;
            }
        }
        return {
            list: list,
            index: index
        };
    };
    _t.moveUp = function() {
        _t._l0.prev().before(_t._l0);
        _t.a40();
        var t = _t.a26();
        var o = t.list[t.index];
        t.list.splice(t.index, 1);
        t.list.splice(t.index - 1, 0, o);
    };
    _t.moveDown = function() {
        _t._l0.next().after(_t._l0);
        _t.a40();
        var t = _t.a26();
        var o = t.list[t.index];
        t.list.splice(t.index, 1);
        t.list.splice(t.index + 1, 0, o);
    };
    _t.save = function() {
        _t.a45.modal('hide');
        editor.a25();
        editor.a41();
        editor.viewer.update();
    };
    $('button.move-section,button.move-subsection').click(_t.open);
};
Editor.windows.addSection = function(editor, ll5) {
    var _t = {};
    _t._99 = false;
    _t.buildSections = function() {
        var ui = '';
        for (var i = 0; i < Editor.sections.length; i++) {
            var s = Editor.sections[i];
            var hint = s.hint ? '<span class="hint"><i class="icon-angle-right"></i> ' + s.hint + '</span>' : '';
            ui += '<label class="radio category"><input type="radio" name="category" value="' + s.category + '"/>' + s.title + hint + '</label>';
        }
        return ui;
    };
    _t.install = function() {
        _t.a45 = $('#add-section-window');
        $('button.btn-close', _t.a45).click(_t.close);
        $('button.add-selected-section').click(_t.save);
        _t._99 = true;
    };
    _t.close = function() {
        _t.a45.modal('hide');
    };
    _t.open = function() {
        !_t._99 && _t.install();
        if (ll5 && ll5(editor.viewer.data.blocks.length)) return;
        $('#section-options').html(_t.buildSections());
        _t.a45.modal('show');
        $('input[type=radio]:first', _t.a45).click();
    };
    _t.save = function() {
        editor.z12();
        var Xo9 = $('input[type=radio]', _t.a45).filter(':checked');
        var category = Xo9.val();
        var title = category == 'custom' ? $('#custom-title-input').val() : Xo9.parent().text();
        category = category == 'custom' ? 'text' : category;
        var created = {
            title: title,
            category: category
        };
        if (category == 'text') created.html = '';
        else created.children = [{
            category: category,
            title: ''
        }];
        editor.viewer.data.blocks.push(created);
        editor.viewer.update();
        editor.viewer.a7();
        _t.close();
        editor.editThis(created.children ? created.children[0] : created);
    };
    $('button.add-section').click(_t.open);
};
Editor.sections = [{
    title: 'Accomplishments',
    category: 'text'
}, {
    title: 'Additional Information',
    category: 'text'
}, {
    title: 'Affiliations',
    category: 'text'
}, {
    title: 'Awards',
    category: 'text'
}, {
    title: 'Certifications',
    category: 'text'
}, {
    title: 'Education',
    category: 'education'
}, {
    title: 'Work Experience',
    category: 'experience'
}, {
    title: 'Interests',
    category: 'text'
}, {
    title: 'Languages',
    category: 'text'
}, {
    title: 'Objective',
    category: 'text'
}, {
    title: 'Portfolio',
    category: 'text'
}, {
    title: 'Publications',
    category: 'text'
}, {
    title: 'References',
    category: 'text'
}, {
    title: 'Skills',
    category: 'text'
}];