(function () {
var autosave = (function () {
  'use strict';

  var Cell = function (initial) {
    var value = initial;
    var get = function () {
      return value;
    };
    var set = function (v) {
      value = v;
    };
    var clone = function () {
      return Cell(get());
    };
    return {
      get: get,
      set: set,
      clone: clone
    };
  };

  var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

  var global$1 = tinymce.util.Tools.resolve('tinymce.util.LocalStorage');

  var global$2 = tinymce.util.Tools.resolve('tinymce.util.Tools');

  var fireRestoreDraft = function (editor) {
    return editor.fire('RestoreDraft');
  };
  var fireStoreDraft = function (editor) {
    return editor.fire('StoreDraft');
  };
  var fireRemoveDraft = function (editor) {
    return editor.fire('RemoveDraft');
  };
  var $_bu9mq19bjk26ig6e = {
    fireRestoreDraft: fireRestoreDraft,
    fireStoreDraft: fireStoreDraft,
    fireRemoveDraft: fireRemoveDraft
  };

  var parse = function (time, defaultTime) {
    var multiples = {
      s: 1000,
      m: 60000
    };
    time = /^(\d+)([ms]?)$/.exec('' + (time || defaultTime));
    return (time[2] ? multiples[time[2]] : 1) * parseInt(time, 10);
  };
  var $_4kpfi99djk26ig6i = { parse: parse };

  var shouldAskBeforeUnload = function (editor) {
    return editor.getParam('autosave_ask_before_unload', true);
  };
  var getAutoSavePrefix = function (editor) {
    var prefix = editor.getParam('autosave_prefix', 'tinymce-autosave-{path}{query}{hash}-{id}-');
    prefix = prefix.replace(/\{path\}/g, document.location.pathname);
    prefix = prefix.replace(/\{query\}/g, document.location.search);
    prefix = prefix.replace(/\{hash\}/g, document.location.hash);
    prefix = prefix.replace(/\{id\}/g, editor.id);
    return prefix;
  };
  var shouldRestoreWhenEmpty = function (editor) {
    return editor.getParam('autosave_restore_when_empty', false);
  };
  var getAutoSaveInterval = function (editor) {
    return $_4kpfi99djk26ig6i.parse(editor.settings.autosave_interval, '30s');
  };
  var getAutoSaveRetention = function (editor) {
    return $_4kpfi99djk26ig6i.parse(editor.settings.autosave_retention, '20m');
  };
  var $_fkbl3a9cjk26ig6g = {
    shouldAskBeforeUnload: shouldAskBeforeUnload,
    getAutoSavePrefix: getAutoSavePrefix,
    shouldRestoreWhenEmpty: shouldRestoreWhenEmpty,
    getAutoSaveInterval: getAutoSaveInterval,
    getAutoSaveRetention: getAutoSaveRetention
  };

  var isEmpty = function (editor, html) {
    var forcedRootBlockName = editor.settings.forced_root_block;
    html = global$2.trim(typeof html === 'undefined' ? editor.getBody().innerHTML : html);
    return html === '' || new RegExp('^<' + forcedRootBlockName + '[^>]*>((\xA0|&nbsp;|[ \t]|<br[^>]*>)+?|)</' + forcedRootBlockName + '>|<br>$', 'i').test(html);
  };
  var hasDraft = function (editor) {
    var time = parseInt(global$1.getItem($_fkbl3a9cjk26ig6g.getAutoSavePrefix(editor) + 'time'), 10) || 0;
    if (new Date().getTime() - time > $_fkbl3a9cjk26ig6g.getAutoSaveRetention(editor)) {
      removeDraft(editor, false);
      return false;
    }
    return true;
  };
  var removeDraft = function (editor, fire) {
    var prefix = $_fkbl3a9cjk26ig6g.getAutoSavePrefix(editor);
    global$1.removeItem(prefix + 'draft');
    global$1.removeItem(prefix + 'time');
    if (fire !== false) {
      $_bu9mq19bjk26ig6e.fireRemoveDraft(editor);
    }
  };
  var storeDraft = function (editor) {
    var prefix = $_fkbl3a9cjk26ig6g.getAutoSavePrefix(editor);
    if (!isEmpty(editor) && editor.isDirty()) {
      global$1.setItem(prefix + 'draft', editor.getContent({
        format: 'raw',
        no_events: true
      }));
      global$1.setItem(prefix + 'time', new Date().getTime().toString());
      $_bu9mq19bjk26ig6e.fireStoreDraft(editor);
    }
  };
  var restoreDraft = function (editor) {
    var prefix = $_fkbl3a9cjk26ig6g.getAutoSavePrefix(editor);
    if (hasDraft(editor)) {
      editor.setContent(global$1.getItem(prefix + 'draft'), { format: 'raw' });
      $_bu9mq19bjk26ig6e.fireRestoreDraft(editor);
    }
  };
  var startStoreDraft = function (editor, started) {
    var interval = $_fkbl3a9cjk26ig6g.getAutoSaveInterval(editor);
    if (!started.get()) {
      setInterval(function () {
        if (!editor.removed) {
          storeDraft(editor);
        }
      }, interval);
      started.set(true);
    }
  };
  var restoreLastDraft = function (editor) {
    editor.undoManager.transact(function () {
      restoreDraft(editor);
      removeDraft(editor);
    });
    editor.focus();
  };
  var $_dcbmj198jk26ig6b = {
    isEmpty: isEmpty,
    hasDraft: hasDraft,
    removeDraft: removeDraft,
    storeDraft: storeDraft,
    restoreDraft: restoreDraft,
    startStoreDraft: startStoreDraft,
    restoreLastDraft: restoreLastDraft
  };

  var curry = function (f, editor) {
    return function () {
      var args = Array.prototype.slice.call(arguments);
      return f.apply(null, [editor].concat(args));
    };
  };
  var get = function (editor) {
    return {
      hasDraft: curry($_dcbmj198jk26ig6b.hasDraft, editor),
      storeDraft: curry($_dcbmj198jk26ig6b.storeDraft, editor),
      restoreDraft: curry($_dcbmj198jk26ig6b.restoreDraft, editor),
      removeDraft: curry($_dcbmj198jk26ig6b.removeDraft, editor),
      isEmpty: curry($_dcbmj198jk26ig6b.isEmpty, editor)
    };
  };
  var $_dp9bi297jk26ig6a = { get: get };

  var global$3 = tinymce.util.Tools.resolve('tinymce.EditorManager');

  global$3._beforeUnloadHandler = function () {
    var msg;
    global$2.each(global$3.get(), function (editor) {
      if (editor.plugins.autosave) {
        editor.plugins.autosave.storeDraft();
      }
      if (!msg && editor.isDirty() && $_fkbl3a9cjk26ig6g.shouldAskBeforeUnload(editor)) {
        msg = editor.translate('You have unsaved changes are you sure you want to navigate away?');
      }
    });
    return msg;
  };
  var setup = function (editor) {
    window.onbeforeunload = global$3._beforeUnloadHandler;
  };
  var $_r9h6y9fjk26ig6x = { setup: setup };

  var postRender = function (editor, started) {
    return function (e) {
      var ctrl = e.control;
      ctrl.disabled(!$_dcbmj198jk26ig6b.hasDraft(editor));
      editor.on('StoreDraft RestoreDraft RemoveDraft', function () {
        ctrl.disabled(!$_dcbmj198jk26ig6b.hasDraft(editor));
      });
      $_dcbmj198jk26ig6b.startStoreDraft(editor, started);
    };
  };
  var register = function (editor, started) {
    editor.addButton('restoredraft', {
      title: 'Restore last draft',
      onclick: function () {
        $_dcbmj198jk26ig6b.restoreLastDraft(editor);
      },
      onPostRender: postRender(editor, started)
    });
    editor.addMenuItem('restoredraft', {
      text: 'Restore last draft',
      onclick: function () {
        $_dcbmj198jk26ig6b.restoreLastDraft(editor);
      },
      onPostRender: postRender(editor, started),
      context: 'file'
    });
  };
  var $_7tvfci9hjk26ig70 = { register: register };

  global.add('autosave', function (editor) {
    var started = Cell(false);
    $_r9h6y9fjk26ig6x.setup(editor);
    $_7tvfci9hjk26ig70.register(editor, started);
    return $_dp9bi297jk26ig6a.get(editor);
  });
  function Plugin () {
  }

  return Plugin;

}());
})();