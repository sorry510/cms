(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory(require("jquery"));
	else if(typeof define === 'function' && define.amd)
		define(["jquery"], factory);
	else if(typeof exports === 'object')
		exports["AMUI"] = factory(require("jquery"));
	else
		root["AMUI"] = factory(root["jQuery"]);
})(this, function(__WEBPACK_EXTERNAL_MODULE_1__) {
	return /******/ (function(modules) { // webpackBootstrap
	/******/ 	// The module cache
	/******/ 	var installedModules = {};

	/******/ 	// The require function
	/******/ 	function __webpack_require__(moduleId) {

	/******/ 		// Check if module is in cache
	/******/ 		if(installedModules[moduleId])
	/******/ 			return installedModules[moduleId].exports;

	/******/ 		// Create a new module (and put it into the cache)
	/******/ 		var module = installedModules[moduleId] = {
	/******/ 			exports: {},
	/******/ 			id: moduleId,
	/******/ 			loaded: false
	/******/ 		};

	/******/ 		// Execute the module function
	/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

	/******/ 		// Flag the module as loaded
	/******/ 		module.loaded = true;

	/******/ 		// Return the exports of the module
	/******/ 		return module.exports;
	/******/ 	}


	/******/ 	// expose the modules object (__webpack_modules__)
	/******/ 	__webpack_require__.m = modules;

	/******/ 	// expose the module cache
	/******/ 	__webpack_require__.c = installedModules;

	/******/ 	// __webpack_public_path__
	/******/ 	__webpack_require__.p = "";

	/******/ 	// Load entry module and return exports
	/******/ 	return __webpack_require__(0);
	/******/ })

	/***********************************************************************/
	([
		/* 0 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			__webpack_require__(3);
			__webpack_require__(4);
			__webpack_require__(5);
			__webpack_require__(6);
			__webpack_require__(7);
			__webpack_require__(8);
			__webpack_require__(9);
			__webpack_require__(10);
			__webpack_require__(11);
			__webpack_require__(14);
			__webpack_require__(15);
			__webpack_require__(16);
			__webpack_require__(17);
			__webpack_require__(18);
			__webpack_require__(19);
			__webpack_require__(20);
			__webpack_require__(21);
			__webpack_require__(22);
			__webpack_require__(24);
			__webpack_require__(25);
			__webpack_require__(23);
			__webpack_require__(27);
			__webpack_require__(28);
			__webpack_require__(29);
			__webpack_require__(30);
			__webpack_require__(31);
			__webpack_require__(32);
			__webpack_require__(33);
			__webpack_require__(26);
			__webpack_require__(34);
			__webpack_require__(35);
			__webpack_require__(36);
			__webpack_require__(37);
			__webpack_require__(38);
			__webpack_require__(39);
			__webpack_require__(40);
			__webpack_require__(41);
			__webpack_require__(42);
			__webpack_require__(43);
			__webpack_require__(44);
			__webpack_require__(45);
			__webpack_require__(46);
			__webpack_require__(47);
			__webpack_require__(48);
			__webpack_require__(49);
			__webpack_require__(50);
			__webpack_require__(51);
			__webpack_require__(52);
			__webpack_require__(53);
			__webpack_require__(54);

			module.exports = $.AMUI = UI;


		/***/ },
		/* 1 */
		/***/ function(module, exports) {

			module.exports = __WEBPACK_EXTERNAL_MODULE_1__;

		/***/ },
		/* 2 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);

			if (typeof $ === 'undefined') {
			  throw new Error('Amaze UI 2.x requires jQuery :-(\n' +
			  '\u7231\u4e0a\u4e00\u5339\u91ce\u9a6c\uff0c\u53ef\u4f60' +
			  '\u7684\u5bb6\u91cc\u6ca1\u6709\u8349\u539f\u2026');
			}

			var UI = $.AMUI || {};
			var $win = $(window);
			var doc = window.document;
			var $html = $('html');

			UI.VERSION = '2.7.2';

			UI.support = {};

			UI.support.transition = (function() {
			  var transitionEnd = (function() {
			    // https://developer.mozilla.org/en-US/docs/Web/Events/transitionend#Browser_compatibility
			    var element = doc.body || doc.documentElement;
			    var transEndEventNames = {
			      WebkitTransition: 'webkitTransitionEnd',
			      MozTransition: 'transitionend',
			      OTransition: 'oTransitionEnd otransitionend',
			      transition: 'transitionend'
			    };

			    for (var name in transEndEventNames) {
			      if (element.style[name] !== undefined) {
			        return transEndEventNames[name];
			      }
			    }
			  })();

			  return transitionEnd && {end: transitionEnd};
			})();

			UI.support.animation = (function() {
			  var animationEnd = (function() {
			    var element = doc.body || doc.documentElement;
			    var animEndEventNames = {
			      WebkitAnimation: 'webkitAnimationEnd',
			      MozAnimation: 'animationend',
			      OAnimation: 'oAnimationEnd oanimationend',
			      animation: 'animationend'
			    };

			    for (var name in animEndEventNames) {
			      if (element.style[name] !== undefined) {
			        return animEndEventNames[name];
			      }
			    }
			  })();

			  return animationEnd && {end: animationEnd};
			})();

			/* eslint-disable dot-notation */
			UI.support.touch = (
			('ontouchstart' in window &&
			navigator.userAgent.toLowerCase().match(/mobile|tablet/)) ||
			(window.DocumentTouch && document instanceof window.DocumentTouch) ||
			(window.navigator['msPointerEnabled'] &&
			window.navigator['msMaxTouchPoints'] > 0) || // IE 10
			(window.navigator['pointerEnabled'] &&
			window.navigator['maxTouchPoints'] > 0) || // IE >=11
			false);
			/* eslint-enable dot-notation */

			// https://developer.mozilla.org/zh-CN/docs/DOM/MutationObserver
			UI.support.mutationobserver = (window.MutationObserver ||
			window.WebKitMutationObserver || null);

			// https://github.com/Modernizr/Modernizr/blob/924c7611c170ef2dc502582e5079507aff61e388/feature-detects/forms/validation.js#L20
			UI.support.formValidation = (typeof document.createElement('form').
			  checkValidity === 'function');

			UI.utils = {};

			/**
			 * Debounce function
			 *
			 * @param {function} func  Function to be debounced
			 * @param {number} wait Function execution threshold in milliseconds
			 * @param {bool} immediate  Whether the function should be called at
			 *                          the beginning of the delay instead of the
			 *                          end. Default is false.
			 * @description Executes a function when it stops being invoked for n seconds
			 * @see  _.debounce() http://underscorejs.org
			 */
			UI.utils.debounce = function(func, wait, immediate) {
			  var timeout;
			  return function() {
			    var context = this;
			    var args = arguments;
			    var later = function() {
			      timeout = null;
			      if (!immediate) {
			        func.apply(context, args);
			      }
			    };
			    var callNow = immediate && !timeout;

			    clearTimeout(timeout);
			    timeout = setTimeout(later, wait);

			    if (callNow) {
			      func.apply(context, args);
			    }
			  };
			};

			UI.utils.isInView = function(element, options) {
			  var $element = $(element);
			  var visible = !!($element.width() || $element.height()) &&
			    $element.css('display') !== 'none';

			  if (!visible) {
			    return false;
			  }

			  var windowLeft = $win.scrollLeft();
			  var windowTop = $win.scrollTop();
			  var offset = $element.offset();
			  var left = offset.left;
			  var top = offset.top;

			  options = $.extend({topOffset: 0, leftOffset: 0}, options);

			  return (top + $element.height() >= windowTop &&
			  top - options.topOffset <= windowTop + $win.height() &&
			  left + $element.width() >= windowLeft &&
			  left - options.leftOffset <= windowLeft + $win.width());
			};

			UI.utils.parseOptions = UI.utils.options = function(string) {
			  if ($.isPlainObject(string)) {
			    return string;
			  }

			  var start = (string ? string.indexOf('{') : -1);
			  var options = {};

			  if (start != -1) {
			    try {
			      options = (new Function('',
			        'var json = ' + string.substr(start) +
			        '; return JSON.parse(JSON.stringify(json));'))();
			    } catch (e) {
			    }
			  }

			  return options;
			};

			UI.utils.generateGUID = function(namespace) {
			  var uid = namespace + '-' || 'am-';

			  do {
			    uid += Math.random().toString(36).substring(2, 7);
			  } while (document.getElementById(uid));

			  return uid;
			};

			// @see https://davidwalsh.name/get-absolute-url
			UI.utils.getAbsoluteUrl = (function() {
			  var a;

			  return function(url) {
			    if (!a) {
			      a = document.createElement('a');
			    }

			    a.href = url;

			    return a.href;
			  };
			})();

			/**
			 * Plugin AMUI Component to jQuery
			 *
			 * @param {String} name - plugin name
			 * @param {Function} Component - plugin constructor
			 * @param {Object} [pluginOption]
			 * @param {String} pluginOption.dataOptions
			 * @param {Function} pluginOption.methodCall - custom method call
			 * @param {Function} pluginOption.before
			 * @param {Function} pluginOption.after
			 * @since v2.4.1
			 */
			UI.plugin = function UIPlugin(name, Component, pluginOption) {
			  var old = $.fn[name];
			  pluginOption = pluginOption || {};

			  $.fn[name] = function(option) {
			    var allArgs = Array.prototype.slice.call(arguments, 0);
			    var args = allArgs.slice(1);
			    var propReturn;
			    var $set = this.each(function() {
			      var $this = $(this);
			      var dataName = 'amui.' + name;
			      var dataOptionsName = pluginOption.dataOptions || ('data-am-' + name);
			      var instance = $this.data(dataName);
			      var options = $.extend({},
			        UI.utils.parseOptions($this.attr(dataOptionsName)),
			        typeof option === 'object' && option);

			      if (!instance && option === 'destroy') {
			        return;
			      }

			      if (!instance) {
			        $this.data(dataName, (instance = new Component(this, options)));
			      }

			      // custom method call
			      if (pluginOption.methodCall) {
			        pluginOption.methodCall.call($this, allArgs, instance);
			      } else {
			        // before method call
			        pluginOption.before &&
			        pluginOption.before.call($this, allArgs, instance);

			        if (typeof option === 'string') {
			          propReturn = typeof instance[option] === 'function' ?
			            instance[option].apply(instance, args) : instance[option];
			        }

			        // after method call
			        pluginOption.after && pluginOption.after.call($this, allArgs, instance);
			      }
			    });

			    return (propReturn === undefined) ? $set : propReturn;
			  };

			  $.fn[name].Constructor = Component;

			  // no conflict
			  $.fn[name].noConflict = function() {
			    $.fn[name] = old;
			    return this;
			  };

			  UI[name] = Component;
			};

			// http://blog.alexmaccaw.com/css-transitions
			$.fn.emulateTransitionEnd = function(duration) {
			  var called = false;
			  var $el = this;

			  $(this).one(UI.support.transition.end, function() {
			    called = true;
			  });

			  var callback = function() {
			    if (!called) {
			      $($el).trigger(UI.support.transition.end);
			    }
			    $el.transitionEndTimmer = undefined;
			  };
			  this.transitionEndTimmer = setTimeout(callback, duration);
			  return this;
			};

			$.fn.redraw = function() {
			  return this.each(function() {
			    /* eslint-disable */
			    var redraw = this.offsetHeight;
			    /* eslint-enable */
			  });
			};

			$.fn.transitionEnd = function(callback) {
			  var endEvent = UI.support.transition.end;
			  var dom = this;

			  function fireCallBack(e) {
			    callback.call(this, e);
			    endEvent && dom.off(endEvent, fireCallBack);
			  }

			  if (callback && endEvent) {
			    dom.on(endEvent, fireCallBack);
			  }

			  return this;
			};

			$.fn.removeClassRegEx = function() {
			  return this.each(function(regex) {
			    var classes = $(this).attr('class');

			    if (!classes || !regex) {
			      return false;
			    }

			    var classArray = [];
			    classes = classes.split(' ');

			    for (var i = 0, len = classes.length; i < len; i++) {
			      if (!classes[i].match(regex)) {
			        classArray.push(classes[i]);
			      }
			    }

			    $(this).attr('class', classArray.join(' '));
			  });
			};

			//
			$.fn.alterClass = function(removals, additions) {
			  var self = this;

			  if (removals.indexOf('*') === -1) {
			    // Use native jQuery methods if there is no wildcard matching
			    self.removeClass(removals);
			    return !additions ? self : self.addClass(additions);
			  }

			  var classPattern = new RegExp('\\s' +
			  removals.
			    replace(/\*/g, '[A-Za-z0-9-_]+').
			    split(' ').
			    join('\\s|\\s') +
			  '\\s', 'g');

			  self.each(function(i, it) {
			    var cn = ' ' + it.className + ' ';
			    while (classPattern.test(cn)) {
			      cn = cn.replace(classPattern, ' ');
			    }
			    it.className = $.trim(cn);
			  });

			  return !additions ? self : self.addClass(additions);
			};

			// handle multiple browsers for requestAnimationFrame()
			// http://www.paulirish.com/2011/requestanimationframe-for-smart-animating/
			// https://github.com/gnarf/jquery-requestAnimationFrame
			UI.utils.rAF = (function() {
			  return window.requestAnimationFrame ||
			    window.webkitRequestAnimationFrame ||
			    window.mozRequestAnimationFrame ||
			    window.oRequestAnimationFrame ||
			      // if all else fails, use setTimeout
			    function(callback) {
			      return window.setTimeout(callback, 1000 / 60); // shoot for 60 fps
			    };
			})();

			// handle multiple browsers for cancelAnimationFrame()
			UI.utils.cancelAF = (function() {
			  return window.cancelAnimationFrame ||
			    window.webkitCancelAnimationFrame ||
			    window.mozCancelAnimationFrame ||
			    window.oCancelAnimationFrame ||
			    function(id) {
			      window.clearTimeout(id);
			    };
			})();

			// via http://davidwalsh.name/detect-scrollbar-width
			UI.utils.measureScrollbar = function() {
			  if (document.body.clientWidth >= window.innerWidth) {
			    return 0;
			  }

			  // if ($html.width() >= window.innerWidth) return;
			  // var scrollbarWidth = window.innerWidth - $html.width();
			  var $measure = $('<div ' +
			  'style="width: 100px;height: 100px;overflow: scroll;' +
			  'position: absolute;top: -9999px;"></div>');

			  $(document.body).append($measure);

			  var scrollbarWidth = $measure[0].offsetWidth - $measure[0].clientWidth;

			  $measure.remove();

			  return scrollbarWidth;
			};

			UI.utils.imageLoader = function($image, callback) {
			  function loaded() {
			    callback($image[0]);
			  }

			  function bindLoad() {
			    this.one('load', loaded);
			    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) {
			      var src = this.attr('src');
			      var param = src.match(/\?/) ? '&' : '?';

			      param += 'random=' + (new Date()).getTime();
			      this.attr('src', src + param);
			    }
			  }

			  if (!$image.attr('src')) {
			    loaded();
			    return;
			  }

			  if ($image[0].complete || $image[0].readyState === 4) {
			    loaded();
			  } else {
			    bindLoad.call($image);
			  }
			};

			/**
			 * @see https://github.com/cho45/micro-template.js
			 * (c) cho45 http://cho45.github.com/mit-license
			 */
			UI.template = function(id, data) {
			  var me = UI.template;

			  if (!me.cache[id]) {
			    me.cache[id] = (function() {
			      var name = id;
			      var string = /^[\w\-]+$/.test(id) ?
			        me.get(id) : (name = 'template(string)', id); // no warnings

			      var line = 1;
			      /* eslint-disable max-len, quotes */
			      var body = ('try { ' + (me.variable ?
			      'var ' + me.variable + ' = this.stash;' : 'with (this.stash) { ') +
			      "this.ret += '" +
			      string.
			        replace(/<%/g, '\x11').replace(/%>/g, '\x13'). // if you want other tag, just edit this line
			        replace(/'(?![^\x11\x13]+?\x13)/g, '\\x27').
			        replace(/^\s*|\s*$/g, '').
			        replace(/\n/g, function() {
			          return "';\nthis.line = " + (++line) + "; this.ret += '\\n";
			        }).
			        replace(/\x11-(.+?)\x13/g, "' + ($1) + '").
			        replace(/\x11=(.+?)\x13/g, "' + this.escapeHTML($1) + '").
			        replace(/\x11(.+?)\x13/g, "'; $1; this.ret += '") +
			      "'; " + (me.variable ? "" : "}") + "return this.ret;" +
			      "} catch (e) { throw 'TemplateError: ' + e + ' (on " + name +
			      "' + ' line ' + this.line + ')'; } " +
			      "//@ sourceURL=" + name + "\n" // source map
			      ).replace(/this\.ret \+= '';/g, '');
			      /* eslint-enable max-len, quotes */
			      var func = new Function(body);
			      var map = {
			        '&': '&amp;',
			        '<': '&lt;',
			        '>': '&gt;',
			        '\x22': '&#x22;',
			        '\x27': '&#x27;'
			      };
			      var escapeHTML = function(string) {
			        return ('' + string).replace(/[&<>\'\"]/g, function(_) {
			          return map[_];
			        });
			      };

			      return function(stash) {
			        return func.call(me.context = {
			          escapeHTML: escapeHTML,
			          line: 1,
			          ret: '',
			          stash: stash
			        });
			      };
			    })();
			  }

			  return data ? me.cache[id](data) : me.cache[id];
			};

			UI.template.cache = {};

			UI.template.get = function(id) {
			  if (id) {
			    var element = document.getElementById(id);
			    return element && element.innerHTML || '';
			  }
			};

			// Dom mutation watchers
			UI.DOMWatchers = [];
			UI.DOMReady = false;
			UI.ready = function(callback) {
			  UI.DOMWatchers.push(callback);
			  if (UI.DOMReady) {
			    // console.log('Ready call');
			    callback(document);
			  }
			};

			UI.DOMObserve = function(elements, options, callback) {
			  var Observer = UI.support.mutationobserver;
			  if (!Observer) {
			    return;
			  }

			  options = $.isPlainObject(options) ?
			    options : {childList: true, subtree: true};

			  callback = typeof callback === 'function' && callback || function() {
			  };

			  $(elements).each(function() {
			    var element = this;
			    var $element = $(element);

			    if ($element.data('am.observer')) {
			      return;
			    }

			    try {
			      var observer = new Observer(UI.utils.debounce(
			        function(mutations, instance) {
			          callback.call(element, mutations, instance);
			          // trigger this event manually if MutationObserver not supported
			          $element.trigger('changed.dom.amui');
			        }, 50));

			      observer.observe(element, options);

			      $element.data('am.observer', observer);
			    } catch (e) {
			    }
			  });
			};

			$.fn.DOMObserve = function(options, callback) {
			  return this.each(function() {
			    /* eslint-disable new-cap */
			    UI.DOMObserve(this, options, callback);
			    /* eslint-enable new-cap */
			  });
			};

			if (UI.support.touch) {
			  $html.addClass('am-touch');
			}

			$(document).on('changed.dom.amui', function(e) {
			  var element = e.target;

			  // TODO: just call changed element's watcher
			  //       every watcher callback should have a key
			  //       use like this: <div data-am-observe='key1, key2'>
			  //       get keys via $(element).data('amObserve')
			  //       call functions store with these keys
			  $.each(UI.DOMWatchers, function(i, watcher) {
			    watcher(element);
			  });
			});

			$(function() {
			  var $body = $(document.body);

			  UI.DOMReady = true;

			  // Run default init
			  $.each(UI.DOMWatchers, function(i, watcher) {
			    watcher(document);
			  });

			  // watches DOM
			  /* eslint-disable new-cap */
			  UI.DOMObserve('[data-am-observe]');
			  /* eslint-enable */

			  $html.removeClass('no-js').addClass('js');

			  UI.support.animation && $html.addClass('cssanimations');

			  // iOS standalone mode
			  if (window.navigator.standalone) {
			    $html.addClass('am-standalone');
			  }

			  $('.am-topbar-fixed-top').length &&
			  $body.addClass('am-with-topbar-fixed-top');

			  $('.am-topbar-fixed-bottom').length &&
			  $body.addClass('am-with-topbar-fixed-bottom');

			  // Remove responsive classes in .am-layout
			  var $layout = $('.am-layout');
			  $layout.find('[class*="md-block-grid"]').alterClass('md-block-grid-*');
			  $layout.find('[class*="lg-block-grid"]').alterClass('lg-block-grid');

			  // widgets not in .am-layout
			  $('[data-am-widget]').each(function() {
			    var $widget = $(this);
			    // console.log($widget.parents('.am-layout').length)
			    if ($widget.parents('.am-layout').length === 0) {
			      $widget.addClass('am-no-layout');
			    }
			  });
			});

			module.exports = UI;


		/***/ },
		/* 3 */
		/***/ function(module, exports, __webpack_require__) {

			/*! Hammer.JS - v2.0.8 - 2016-04-22
			 * http://hammerjs.github.io/
			 *
			 * Copyright (c) 2016 Jorik Tangelder;
			 * Licensed under the MIT license */

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);

			var VENDOR_PREFIXES = ['', 'webkit', 'Moz', 'MS', 'ms', 'o'];
			var TEST_ELEMENT = document.createElement('div');

			var TYPE_FUNCTION = 'function';

			var round = Math.round;
			var abs = Math.abs;
			var now = Date.now;

			/**
			 * set a timeout with a given scope
			 * @param {Function} fn
			 * @param {Number} timeout
			 * @param {Object} context
			 * @returns {number}
			 */
			function setTimeoutContext(fn, timeout, context) {
			  return setTimeout(bindFn(fn, context), timeout);
			}

			/**
			 * if the argument is an array, we want to execute the fn on each entry
			 * if it aint an array we don't want to do a thing.
			 * this is used by all the methods that accept a single and array argument.
			 * @param {*|Array} arg
			 * @param {String} fn
			 * @param {Object} [context]
			 * @returns {Boolean}
			 */
			function invokeArrayArg(arg, fn, context) {
			  if (Array.isArray(arg)) {
			    each(arg, context[fn], context);
			    return true;
			  }
			  return false;
			}

			/**
			 * walk objects and arrays
			 * @param {Object} obj
			 * @param {Function} iterator
			 * @param {Object} context
			 */
			function each(obj, iterator, context) {
			  var i;

			  if (!obj) {
			    return;
			  }

			  if (obj.forEach) {
			    obj.forEach(iterator, context);
			  } else if (obj.length !== undefined) {
			    i = 0;
			    while (i < obj.length) {
			      iterator.call(context, obj[i], i, obj);
			      i++;
			    }
			  } else {
			    for (i in obj) {
			      obj.hasOwnProperty(i) && iterator.call(context, obj[i], i, obj);
			    }
			  }
			}

			/**
			 * wrap a method with a deprecation warning and stack trace
			 * @param {Function} method
			 * @param {String} name
			 * @param {String} message
			 * @returns {Function} A new function wrapping the supplied method.
			 */
			function deprecate(method, name, message) {
			  var deprecationMessage = 'DEPRECATED METHOD: ' + name + '\n' + message + ' AT \n';
			  return function() {
			    var e = new Error('get-stack-trace');
			    var stack = e && e.stack ? e.stack.replace(/^[^\(]+?[\n$]/gm, '')
			      .replace(/^\s+at\s+/gm, '')
			      .replace(/^Object.<anonymous>\s*\(/gm, '{anonymous}()@') : 'Unknown Stack Trace';

			    var log = window.console && (window.console.warn || window.console.log);
			    if (log) {
			      log.call(window.console, deprecationMessage, stack);
			    }
			    return method.apply(this, arguments);
			  };
			}

			/**
			 * extend object.
			 * means that properties in dest will be overwritten by the ones in src.
			 * @param {Object} target
			 * @param {...Object} objects_to_assign
			 * @returns {Object} target
			 */
			var assign;
			if (typeof Object.assign !== 'function') {
			  assign = function assign(target) {
			    if (target === undefined || target === null) {
			      throw new TypeError('Cannot convert undefined or null to object');
			    }

			    var output = Object(target);
			    for (var index = 1; index < arguments.length; index++) {
			      var source = arguments[index];
			      if (source !== undefined && source !== null) {
			        for (var nextKey in source) {
			          if (source.hasOwnProperty(nextKey)) {
			            output[nextKey] = source[nextKey];
			          }
			        }
			      }
			    }
			    return output;
			  };
			} else {
			  assign = Object.assign;
			}

			/**
			 * extend object.
			 * means that properties in dest will be overwritten by the ones in src.
			 * @param {Object} dest
			 * @param {Object} src
			 * @param {Boolean} [merge=false]
			 * @returns {Object} dest
			 */
			var extend = deprecate(function extend(dest, src, merge) {
			  var keys = Object.keys(src);
			  var i = 0;
			  while (i < keys.length) {
			    if (!merge || (merge && dest[keys[i]] === undefined)) {
			      dest[keys[i]] = src[keys[i]];
			    }
			    i++;
			  }
			  return dest;
			}, 'extend', 'Use `assign`.');

			/**
			 * merge the values from src in the dest.
			 * means that properties that exist in dest will not be overwritten by src
			 * @param {Object} dest
			 * @param {Object} src
			 * @returns {Object} dest
			 */
			var merge = deprecate(function merge(dest, src) {
			  return extend(dest, src, true);
			}, 'merge', 'Use `assign`.');

			/**
			 * simple class inheritance
			 * @param {Function} child
			 * @param {Function} base
			 * @param {Object} [properties]
			 */
			function inherit(child, base, properties) {
			  var baseP = base.prototype,
			    childP;

			  childP = child.prototype = Object.create(baseP);
			  childP.constructor = child;
			  childP._super = baseP;

			  if (properties) {
			    assign(childP, properties);
			  }
			}

			/**
			 * simple function bind
			 * @param {Function} fn
			 * @param {Object} context
			 * @returns {Function}
			 */
			function bindFn(fn, context) {
			  return function boundFn() {
			    return fn.apply(context, arguments);
			  };
			}

			/**
			 * let a boolean value also be a function that must return a boolean
			 * this first item in args will be used as the context
			 * @param {Boolean|Function} val
			 * @param {Array} [args]
			 * @returns {Boolean}
			 */
			function boolOrFn(val, args) {
			  if (typeof val == TYPE_FUNCTION) {
			    return val.apply(args ? args[0] || undefined : undefined, args);
			  }
			  return val;
			}

			/**
			 * use the val2 when val1 is undefined
			 * @param {*} val1
			 * @param {*} val2
			 * @returns {*}
			 */
			function ifUndefined(val1, val2) {
			  return (val1 === undefined) ? val2 : val1;
			}

			/**
			 * addEventListener with multiple events at once
			 * @param {EventTarget} target
			 * @param {String} types
			 * @param {Function} handler
			 */
			function addEventListeners(target, types, handler) {
			  each(splitStr(types), function(type) {
			    target.addEventListener(type, handler, false);
			  });
			}

			/**
			 * removeEventListener with multiple events at once
			 * @param {EventTarget} target
			 * @param {String} types
			 * @param {Function} handler
			 */
			function removeEventListeners(target, types, handler) {
			  each(splitStr(types), function(type) {
			    target.removeEventListener(type, handler, false);
			  });
			}

			/**
			 * find if a node is in the given parent
			 * @method hasParent
			 * @param {HTMLElement} node
			 * @param {HTMLElement} parent
			 * @return {Boolean} found
			 */
			function hasParent(node, parent) {
			  while (node) {
			    if (node == parent) {
			      return true;
			    }
			    node = node.parentNode;
			  }
			  return false;
			}

			/**
			 * small indexOf wrapper
			 * @param {String} str
			 * @param {String} find
			 * @returns {Boolean} found
			 */
			function inStr(str, find) {
			  return str.indexOf(find) > -1;
			}

			/**
			 * split string on whitespace
			 * @param {String} str
			 * @returns {Array} words
			 */
			function splitStr(str) {
			  return str.trim().split(/\s+/g);
			}

			/**
			 * find if a array contains the object using indexOf or a simple polyFill
			 * @param {Array} src
			 * @param {String} find
			 * @param {String} [findByKey]
			 * @return {Boolean|Number} false when not found, or the index
			 */
			function inArray(src, find, findByKey) {
			  if (src.indexOf && !findByKey) {
			    return src.indexOf(find);
			  } else {
			    var i = 0;
			    while (i < src.length) {
			      if ((findByKey && src[i][findByKey] == find) || (!findByKey && src[i] === find)) {
			        return i;
			      }
			      i++;
			    }
			    return -1;
			  }
			}

			/**
			 * convert array-like objects to real arrays
			 * @param {Object} obj
			 * @returns {Array}
			 */
			function toArray(obj) {
			  return Array.prototype.slice.call(obj, 0);
			}

			/**
			 * unique array with objects based on a key (like 'id') or just by the array's value
			 * @param {Array} src [{id:1},{id:2},{id:1}]
			 * @param {String} [key]
			 * @param {Boolean} [sort=False]
			 * @returns {Array} [{id:1},{id:2}]
			 */
			function uniqueArray(src, key, sort) {
			  var results = [];
			  var values = [];
			  var i = 0;

			  while (i < src.length) {
			    var val = key ? src[i][key] : src[i];
			    if (inArray(values, val) < 0) {
			      results.push(src[i]);
			    }
			    values[i] = val;
			    i++;
			  }

			  if (sort) {
			    if (!key) {
			      results = results.sort();
			    } else {
			      results = results.sort(function sortUniqueArray(a, b) {
			        return a[key] > b[key];
			      });
			    }
			  }

			  return results;
			}

			/**
			 * get the prefixed property
			 * @param {Object} obj
			 * @param {String} property
			 * @returns {String|Undefined} prefixed
			 */
			function prefixed(obj, property) {
			  var prefix, prop;
			  var camelProp = property[0].toUpperCase() + property.slice(1);

			  var i = 0;
			  while (i < VENDOR_PREFIXES.length) {
			    prefix = VENDOR_PREFIXES[i];
			    prop = (prefix) ? prefix + camelProp : property;

			    if (prop in obj) {
			      return prop;
			    }
			    i++;
			  }
			  return undefined;
			}

			/**
			 * get a unique id
			 * @returns {number} uniqueId
			 */
			var _uniqueId = 1;
			function uniqueId() {
			  return _uniqueId++;
			}

			/**
			 * get the window object of an element
			 * @param {HTMLElement} element
			 * @returns {DocumentView|Window}
			 */
			function getWindowForElement(element) {
			  var doc = element.ownerDocument || element;
			  return (doc.defaultView || doc.parentWindow || window);
			}

			var MOBILE_REGEX = /mobile|tablet|ip(ad|hone|od)|android/i;

			var SUPPORT_TOUCH = ('ontouchstart' in window);
			var SUPPORT_POINTER_EVENTS = prefixed(window, 'PointerEvent') !== undefined;
			var SUPPORT_ONLY_TOUCH = SUPPORT_TOUCH && MOBILE_REGEX.test(navigator.userAgent);

			var INPUT_TYPE_TOUCH = 'touch';
			var INPUT_TYPE_PEN = 'pen';
			var INPUT_TYPE_MOUSE = 'mouse';
			var INPUT_TYPE_KINECT = 'kinect';

			var COMPUTE_INTERVAL = 25;

			var INPUT_START = 1;
			var INPUT_MOVE = 2;
			var INPUT_END = 4;
			var INPUT_CANCEL = 8;

			var DIRECTION_NONE = 1;
			var DIRECTION_LEFT = 2;
			var DIRECTION_RIGHT = 4;
			var DIRECTION_UP = 8;
			var DIRECTION_DOWN = 16;

			var DIRECTION_HORIZONTAL = DIRECTION_LEFT | DIRECTION_RIGHT;
			var DIRECTION_VERTICAL = DIRECTION_UP | DIRECTION_DOWN;
			var DIRECTION_ALL = DIRECTION_HORIZONTAL | DIRECTION_VERTICAL;

			var PROPS_XY = ['x', 'y'];
			var PROPS_CLIENT_XY = ['clientX', 'clientY'];

			/**
			 * create new input type manager
			 * @param {Manager} manager
			 * @param {Function} callback
			 * @returns {Input}
			 * @constructor
			 */
			function Input(manager, callback) {
			  var self = this;
			  this.manager = manager;
			  this.callback = callback;
			  this.element = manager.element;
			  this.target = manager.options.inputTarget;

			  // smaller wrapper around the handler, for the scope and the enabled state of the manager,
			  // so when disabled the input events are completely bypassed.
			  this.domHandler = function(ev) {
			    if (boolOrFn(manager.options.enable, [manager])) {
			      self.handler(ev);
			    }
			  };

			  this.init();

			}

			Input.prototype = {
			  /**
			   * should handle the inputEvent data and trigger the callback
			   * @virtual
			   */
			  handler: function() { },

			  /**
			   * bind the events
			   */
			  init: function() {
			    this.evEl && addEventListeners(this.element, this.evEl, this.domHandler);
			    this.evTarget && addEventListeners(this.target, this.evTarget, this.domHandler);
			    this.evWin && addEventListeners(getWindowForElement(this.element), this.evWin, this.domHandler);
			  },

			  /**
			   * unbind the events
			   */
			  destroy: function() {
			    this.evEl && removeEventListeners(this.element, this.evEl, this.domHandler);
			    this.evTarget && removeEventListeners(this.target, this.evTarget, this.domHandler);
			    this.evWin && removeEventListeners(getWindowForElement(this.element), this.evWin, this.domHandler);
			  }
			};

			/**
			 * create new input type manager
			 * called by the Manager constructor
			 * @param {Hammer} manager
			 * @returns {Input}
			 */
			function createInputInstance(manager) {
			  var Type;
			  var inputClass = manager.options.inputClass;

			  if (inputClass) {
			    Type = inputClass;
			  } else if (SUPPORT_POINTER_EVENTS) {
			    Type = PointerEventInput;
			  } else if (SUPPORT_ONLY_TOUCH) {
			    Type = TouchInput;
			  } else if (!SUPPORT_TOUCH) {
			    Type = MouseInput;
			  } else {
			    Type = TouchMouseInput;
			  }
			  return new (Type)(manager, inputHandler);
			}

			/**
			 * handle input events
			 * @param {Manager} manager
			 * @param {String} eventType
			 * @param {Object} input
			 */
			function inputHandler(manager, eventType, input) {
			  var pointersLen = input.pointers.length;
			  var changedPointersLen = input.changedPointers.length;
			  var isFirst = (eventType & INPUT_START && (pointersLen - changedPointersLen === 0));
			  var isFinal = (eventType & (INPUT_END | INPUT_CANCEL) && (pointersLen - changedPointersLen === 0));

			  input.isFirst = !!isFirst;
			  input.isFinal = !!isFinal;

			  if (isFirst) {
			    manager.session = {};
			  }

			  // source event is the normalized value of the domEvents
			  // like 'touchstart, mouseup, pointerdown'
			  input.eventType = eventType;

			  // compute scale, rotation etc
			  computeInputData(manager, input);

			  // emit secret event
			  manager.emit('hammer.input', input);

			  manager.recognize(input);
			  manager.session.prevInput = input;
			}

			/**
			 * extend the data with some usable properties like scale, rotate, velocity etc
			 * @param {Object} manager
			 * @param {Object} input
			 */
			function computeInputData(manager, input) {
			  var session = manager.session;
			  var pointers = input.pointers;
			  var pointersLength = pointers.length;

			  // store the first input to calculate the distance and direction
			  if (!session.firstInput) {
			    session.firstInput = simpleCloneInputData(input);
			  }

			  // to compute scale and rotation we need to store the multiple touches
			  if (pointersLength > 1 && !session.firstMultiple) {
			    session.firstMultiple = simpleCloneInputData(input);
			  } else if (pointersLength === 1) {
			    session.firstMultiple = false;
			  }

			  var firstInput = session.firstInput;
			  var firstMultiple = session.firstMultiple;
			  var offsetCenter = firstMultiple ? firstMultiple.center : firstInput.center;

			  var center = input.center = getCenter(pointers);
			  input.timeStamp = now();
			  input.deltaTime = input.timeStamp - firstInput.timeStamp;

			  input.angle = getAngle(offsetCenter, center);
			  input.distance = getDistance(offsetCenter, center);

			  computeDeltaXY(session, input);
			  input.offsetDirection = getDirection(input.deltaX, input.deltaY);

			  var overallVelocity = getVelocity(input.deltaTime, input.deltaX, input.deltaY);
			  input.overallVelocityX = overallVelocity.x;
			  input.overallVelocityY = overallVelocity.y;
			  input.overallVelocity = (abs(overallVelocity.x) > abs(overallVelocity.y)) ? overallVelocity.x : overallVelocity.y;

			  input.scale = firstMultiple ? getScale(firstMultiple.pointers, pointers) : 1;
			  input.rotation = firstMultiple ? getRotation(firstMultiple.pointers, pointers) : 0;

			  input.maxPointers = !session.prevInput ? input.pointers.length : ((input.pointers.length >
			  session.prevInput.maxPointers) ? input.pointers.length : session.prevInput.maxPointers);

			  computeIntervalInputData(session, input);

			  // find the correct target
			  var target = manager.element;
			  if (hasParent(input.srcEvent.target, target)) {
			    target = input.srcEvent.target;
			  }
			  input.target = target;
			}

			function computeDeltaXY(session, input) {
			  var center = input.center;
			  var offset = session.offsetDelta || {};
			  var prevDelta = session.prevDelta || {};
			  var prevInput = session.prevInput || {};

			  if (input.eventType === INPUT_START || prevInput.eventType === INPUT_END) {
			    prevDelta = session.prevDelta = {
			      x: prevInput.deltaX || 0,
			      y: prevInput.deltaY || 0
			    };

			    offset = session.offsetDelta = {
			      x: center.x,
			      y: center.y
			    };
			  }

			  input.deltaX = prevDelta.x + (center.x - offset.x);
			  input.deltaY = prevDelta.y + (center.y - offset.y);
			}

			/**
			 * velocity is calculated every x ms
			 * @param {Object} session
			 * @param {Object} input
			 */
			function computeIntervalInputData(session, input) {
			  var last = session.lastInterval || input,
			    deltaTime = input.timeStamp - last.timeStamp,
			    velocity, velocityX, velocityY, direction;

			  if (input.eventType != INPUT_CANCEL && (deltaTime > COMPUTE_INTERVAL || last.velocity === undefined)) {
			    var deltaX = input.deltaX - last.deltaX;
			    var deltaY = input.deltaY - last.deltaY;

			    var v = getVelocity(deltaTime, deltaX, deltaY);
			    velocityX = v.x;
			    velocityY = v.y;
			    velocity = (abs(v.x) > abs(v.y)) ? v.x : v.y;
			    direction = getDirection(deltaX, deltaY);

			    session.lastInterval = input;
			  } else {
			    // use latest velocity info if it doesn't overtake a minimum period
			    velocity = last.velocity;
			    velocityX = last.velocityX;
			    velocityY = last.velocityY;
			    direction = last.direction;
			  }

			  input.velocity = velocity;
			  input.velocityX = velocityX;
			  input.velocityY = velocityY;
			  input.direction = direction;
			}

			/**
			 * create a simple clone from the input used for storage of firstInput and firstMultiple
			 * @param {Object} input
			 * @returns {Object} clonedInputData
			 */
			function simpleCloneInputData(input) {
			  // make a simple copy of the pointers because we will get a reference if we don't
			  // we only need clientXY for the calculations
			  var pointers = [];
			  var i = 0;
			  while (i < input.pointers.length) {
			    pointers[i] = {
			      clientX: round(input.pointers[i].clientX),
			      clientY: round(input.pointers[i].clientY)
			    };
			    i++;
			  }

			  return {
			    timeStamp: now(),
			    pointers: pointers,
			    center: getCenter(pointers),
			    deltaX: input.deltaX,
			    deltaY: input.deltaY
			  };
			}

			/**
			 * get the center of all the pointers
			 * @param {Array} pointers
			 * @return {Object} center contains `x` and `y` properties
			 */
			function getCenter(pointers) {
			  var pointersLength = pointers.length;

			  // no need to loop when only one touch
			  if (pointersLength === 1) {
			    return {
			      x: round(pointers[0].clientX),
			      y: round(pointers[0].clientY)
			    };
			  }

			  var x = 0, y = 0, i = 0;
			  while (i < pointersLength) {
			    x += pointers[i].clientX;
			    y += pointers[i].clientY;
			    i++;
			  }

			  return {
			    x: round(x / pointersLength),
			    y: round(y / pointersLength)
			  };
			}

			/**
			 * calculate the velocity between two points. unit is in px per ms.
			 * @param {Number} deltaTime
			 * @param {Number} x
			 * @param {Number} y
			 * @return {Object} velocity `x` and `y`
			 */
			function getVelocity(deltaTime, x, y) {
			  return {
			    x: x / deltaTime || 0,
			    y: y / deltaTime || 0
			  };
			}

			/**
			 * get the direction between two points
			 * @param {Number} x
			 * @param {Number} y
			 * @return {Number} direction
			 */
			function getDirection(x, y) {
			  if (x === y) {
			    return DIRECTION_NONE;
			  }

			  if (abs(x) >= abs(y)) {
			    return x < 0 ? DIRECTION_LEFT : DIRECTION_RIGHT;
			  }
			  return y < 0 ? DIRECTION_UP : DIRECTION_DOWN;
			}

			/**
			 * calculate the absolute distance between two points
			 * @param {Object} p1 {x, y}
			 * @param {Object} p2 {x, y}
			 * @param {Array} [props] containing x and y keys
			 * @return {Number} distance
			 */
			function getDistance(p1, p2, props) {
			  if (!props) {
			    props = PROPS_XY;
			  }
			  var x = p2[props[0]] - p1[props[0]],
			    y = p2[props[1]] - p1[props[1]];

			  return Math.sqrt((x * x) + (y * y));
			}

			/**
			 * calculate the angle between two coordinates
			 * @param {Object} p1
			 * @param {Object} p2
			 * @param {Array} [props] containing x and y keys
			 * @return {Number} angle
			 */
			function getAngle(p1, p2, props) {
			  if (!props) {
			    props = PROPS_XY;
			  }
			  var x = p2[props[0]] - p1[props[0]],
			    y = p2[props[1]] - p1[props[1]];
			  return Math.atan2(y, x) * 180 / Math.PI;
			}

			/**
			 * calculate the rotation degrees between two pointersets
			 * @param {Array} start array of pointers
			 * @param {Array} end array of pointers
			 * @return {Number} rotation
			 */
			function getRotation(start, end) {
			  return getAngle(end[1], end[0], PROPS_CLIENT_XY) + getAngle(start[1], start[0], PROPS_CLIENT_XY);
			}

			/**
			 * calculate the scale factor between two pointersets
			 * no scale is 1, and goes down to 0 when pinched together, and bigger when pinched out
			 * @param {Array} start array of pointers
			 * @param {Array} end array of pointers
			 * @return {Number} scale
			 */
			function getScale(start, end) {
			  return getDistance(end[0], end[1], PROPS_CLIENT_XY) / getDistance(start[0], start[1], PROPS_CLIENT_XY);
			}

			var MOUSE_INPUT_MAP = {
			  mousedown: INPUT_START,
			  mousemove: INPUT_MOVE,
			  mouseup: INPUT_END
			};

			var MOUSE_ELEMENT_EVENTS = 'mousedown';
			var MOUSE_WINDOW_EVENTS = 'mousemove mouseup';

			/**
			 * Mouse events input
			 * @constructor
			 * @extends Input
			 */
			function MouseInput() {
			  this.evEl = MOUSE_ELEMENT_EVENTS;
			  this.evWin = MOUSE_WINDOW_EVENTS;

			  this.pressed = false; // mousedown state

			  Input.apply(this, arguments);
			}

			inherit(MouseInput, Input, {
			  /**
			   * handle mouse events
			   * @param {Object} ev
			   */
			  handler: function MEhandler(ev) {
			    var eventType = MOUSE_INPUT_MAP[ev.type];

			    // on start we want to have the left mouse button down
			    if (eventType & INPUT_START && ev.button === 0) {
			      this.pressed = true;
			    }

			    if (eventType & INPUT_MOVE && ev.which !== 1) {
			      eventType = INPUT_END;
			    }

			    // mouse must be down
			    if (!this.pressed) {
			      return;
			    }

			    if (eventType & INPUT_END) {
			      this.pressed = false;
			    }

			    this.callback(this.manager, eventType, {
			      pointers: [ev],
			      changedPointers: [ev],
			      pointerType: INPUT_TYPE_MOUSE,
			      srcEvent: ev
			    });
			  }
			});

			var POINTER_INPUT_MAP = {
			  pointerdown: INPUT_START,
			  pointermove: INPUT_MOVE,
			  pointerup: INPUT_END,
			  pointercancel: INPUT_CANCEL,
			  pointerout: INPUT_CANCEL
			};

			// in IE10 the pointer types is defined as an enum
			var IE10_POINTER_TYPE_ENUM = {
			  2: INPUT_TYPE_TOUCH,
			  3: INPUT_TYPE_PEN,
			  4: INPUT_TYPE_MOUSE,
			  5: INPUT_TYPE_KINECT // see https://twitter.com/jacobrossi/status/480596438489890816
			};

			var POINTER_ELEMENT_EVENTS = 'pointerdown';
			var POINTER_WINDOW_EVENTS = 'pointermove pointerup pointercancel';

			// IE10 has prefixed support, and case-sensitive
			if (window.MSPointerEvent && !window.PointerEvent) {
			  POINTER_ELEMENT_EVENTS = 'MSPointerDown';
			  POINTER_WINDOW_EVENTS = 'MSPointerMove MSPointerUp MSPointerCancel';
			}

			/**
			 * Pointer events input
			 * @constructor
			 * @extends Input
			 */
			function PointerEventInput() {
			  this.evEl = POINTER_ELEMENT_EVENTS;
			  this.evWin = POINTER_WINDOW_EVENTS;

			  Input.apply(this, arguments);

			  this.store = (this.manager.session.pointerEvents = []);
			}

			inherit(PointerEventInput, Input, {
			  /**
			   * handle mouse events
			   * @param {Object} ev
			   */
			  handler: function PEhandler(ev) {
			    var store = this.store;
			    var removePointer = false;

			    var eventTypeNormalized = ev.type.toLowerCase().replace('ms', '');
			    var eventType = POINTER_INPUT_MAP[eventTypeNormalized];
			    var pointerType = IE10_POINTER_TYPE_ENUM[ev.pointerType] || ev.pointerType;

			    var isTouch = (pointerType == INPUT_TYPE_TOUCH);

			    // get index of the event in the store
			    var storeIndex = inArray(store, ev.pointerId, 'pointerId');

			    // start and mouse must be down
			    if (eventType & INPUT_START && (ev.button === 0 || isTouch)) {
			      if (storeIndex < 0) {
			        store.push(ev);
			        storeIndex = store.length - 1;
			      }
			    } else if (eventType & (INPUT_END | INPUT_CANCEL)) {
			      removePointer = true;
			    }

			    // it not found, so the pointer hasn't been down (so it's probably a hover)
			    if (storeIndex < 0) {
			      return;
			    }

			    // update the event in the store
			    store[storeIndex] = ev;

			    this.callback(this.manager, eventType, {
			      pointers: store,
			      changedPointers: [ev],
			      pointerType: pointerType,
			      srcEvent: ev
			    });

			    if (removePointer) {
			      // remove from the store
			      store.splice(storeIndex, 1);
			    }
			  }
			});

			var SINGLE_TOUCH_INPUT_MAP = {
			  touchstart: INPUT_START,
			  touchmove: INPUT_MOVE,
			  touchend: INPUT_END,
			  touchcancel: INPUT_CANCEL
			};

			var SINGLE_TOUCH_TARGET_EVENTS = 'touchstart';
			var SINGLE_TOUCH_WINDOW_EVENTS = 'touchstart touchmove touchend touchcancel';

			/**
			 * Touch events input
			 * @constructor
			 * @extends Input
			 */
			function SingleTouchInput() {
			  this.evTarget = SINGLE_TOUCH_TARGET_EVENTS;
			  this.evWin = SINGLE_TOUCH_WINDOW_EVENTS;
			  this.started = false;

			  Input.apply(this, arguments);
			}

			inherit(SingleTouchInput, Input, {
			  handler: function TEhandler(ev) {
			    var type = SINGLE_TOUCH_INPUT_MAP[ev.type];

			    // should we handle the touch events?
			    if (type === INPUT_START) {
			      this.started = true;
			    }

			    if (!this.started) {
			      return;
			    }

			    var touches = normalizeSingleTouches.call(this, ev, type);

			    // when done, reset the started state
			    if (type & (INPUT_END | INPUT_CANCEL) && touches[0].length - touches[1].length === 0) {
			      this.started = false;
			    }

			    this.callback(this.manager, type, {
			      pointers: touches[0],
			      changedPointers: touches[1],
			      pointerType: INPUT_TYPE_TOUCH,
			      srcEvent: ev
			    });
			  }
			});

			/**
			 * @this {TouchInput}
			 * @param {Object} ev
			 * @param {Number} type flag
			 * @returns {undefined|Array} [all, changed]
			 */
			function normalizeSingleTouches(ev, type) {
			  var all = toArray(ev.touches);
			  var changed = toArray(ev.changedTouches);

			  if (type & (INPUT_END | INPUT_CANCEL)) {
			    all = uniqueArray(all.concat(changed), 'identifier', true);
			  }

			  return [all, changed];
			}

			var TOUCH_INPUT_MAP = {
			  touchstart: INPUT_START,
			  touchmove: INPUT_MOVE,
			  touchend: INPUT_END,
			  touchcancel: INPUT_CANCEL
			};

			var TOUCH_TARGET_EVENTS = 'touchstart touchmove touchend touchcancel';

			/**
			 * Multi-user touch events input
			 * @constructor
			 * @extends Input
			 */
			function TouchInput() {
			  this.evTarget = TOUCH_TARGET_EVENTS;
			  this.targetIds = {};

			  Input.apply(this, arguments);
			}

			inherit(TouchInput, Input, {
			  handler: function MTEhandler(ev) {
			    var type = TOUCH_INPUT_MAP[ev.type];
			    var touches = getTouches.call(this, ev, type);
			    if (!touches) {
			      return;
			    }

			    this.callback(this.manager, type, {
			      pointers: touches[0],
			      changedPointers: touches[1],
			      pointerType: INPUT_TYPE_TOUCH,
			      srcEvent: ev
			    });
			  }
			});

			/**
			 * @this {TouchInput}
			 * @param {Object} ev
			 * @param {Number} type flag
			 * @returns {undefined|Array} [all, changed]
			 */
			function getTouches(ev, type) {
			  var allTouches = toArray(ev.touches);
			  var targetIds = this.targetIds;

			  // when there is only one touch, the process can be simplified
			  if (type & (INPUT_START | INPUT_MOVE) && allTouches.length === 1) {
			    targetIds[allTouches[0].identifier] = true;
			    return [allTouches, allTouches];
			  }

			  var i,
			    targetTouches,
			    changedTouches = toArray(ev.changedTouches),
			    changedTargetTouches = [],
			    target = this.target;

			  // get target touches from touches
			  targetTouches = allTouches.filter(function(touch) {
			    return hasParent(touch.target, target);
			  });

			  // collect touches
			  if (type === INPUT_START) {
			    i = 0;
			    while (i < targetTouches.length) {
			      targetIds[targetTouches[i].identifier] = true;
			      i++;
			    }
			  }

			  // filter changed touches to only contain touches that exist in the collected target ids
			  i = 0;
			  while (i < changedTouches.length) {
			    if (targetIds[changedTouches[i].identifier]) {
			      changedTargetTouches.push(changedTouches[i]);
			    }

			    // cleanup removed touches
			    if (type & (INPUT_END | INPUT_CANCEL)) {
			      delete targetIds[changedTouches[i].identifier];
			    }
			    i++;
			  }

			  if (!changedTargetTouches.length) {
			    return;
			  }

			  return [
			    // merge targetTouches with changedTargetTouches so it contains ALL touches, including 'end' and 'cancel'
			    uniqueArray(targetTouches.concat(changedTargetTouches), 'identifier', true),
			    changedTargetTouches
			  ];
			}

			/**
			 * Combined touch and mouse input
			 *
			 * Touch has a higher priority then mouse, and while touching no mouse events are allowed.
			 * This because touch devices also emit mouse events while doing a touch.
			 *
			 * @constructor
			 * @extends Input
			 */

			var DEDUP_TIMEOUT = 2500;
			var DEDUP_DISTANCE = 25;

			function TouchMouseInput() {
			  Input.apply(this, arguments);

			  var handler = bindFn(this.handler, this);
			  this.touch = new TouchInput(this.manager, handler);
			  this.mouse = new MouseInput(this.manager, handler);

			  this.primaryTouch = null;
			  this.lastTouches = [];
			}

			inherit(TouchMouseInput, Input, {
			  /**
			   * handle mouse and touch events
			   * @param {Hammer} manager
			   * @param {String} inputEvent
			   * @param {Object} inputData
			   */
			  handler: function TMEhandler(manager, inputEvent, inputData) {
			    var isTouch = (inputData.pointerType == INPUT_TYPE_TOUCH),
			      isMouse = (inputData.pointerType == INPUT_TYPE_MOUSE);

			    if (isMouse && inputData.sourceCapabilities && inputData.sourceCapabilities.firesTouchEvents) {
			      return;
			    }

			    // when we're in a touch event, record touches to  de-dupe synthetic mouse event
			    if (isTouch) {
			      recordTouches.call(this, inputEvent, inputData);
			    } else if (isMouse && isSyntheticEvent.call(this, inputData)) {
			      return;
			    }

			    this.callback(manager, inputEvent, inputData);
			  },

			  /**
			   * remove the event listeners
			   */
			  destroy: function destroy() {
			    this.touch.destroy();
			    this.mouse.destroy();
			  }
			});

			function recordTouches(eventType, eventData) {
			  if (eventType & INPUT_START) {
			    this.primaryTouch = eventData.changedPointers[0].identifier;
			    setLastTouch.call(this, eventData);
			  } else if (eventType & (INPUT_END | INPUT_CANCEL)) {
			    setLastTouch.call(this, eventData);
			  }
			}

			function setLastTouch(eventData) {
			  var touch = eventData.changedPointers[0];

			  if (touch.identifier === this.primaryTouch) {
			    var lastTouch = {x: touch.clientX, y: touch.clientY};
			    this.lastTouches.push(lastTouch);
			    var lts = this.lastTouches;
			    var removeLastTouch = function() {
			      var i = lts.indexOf(lastTouch);
			      if (i > -1) {
			        lts.splice(i, 1);
			      }
			    };
			    setTimeout(removeLastTouch, DEDUP_TIMEOUT);
			  }
			}

			function isSyntheticEvent(eventData) {
			  var x = eventData.srcEvent.clientX, y = eventData.srcEvent.clientY;
			  for (var i = 0; i < this.lastTouches.length; i++) {
			    var t = this.lastTouches[i];
			    var dx = Math.abs(x - t.x), dy = Math.abs(y - t.y);
			    if (dx <= DEDUP_DISTANCE && dy <= DEDUP_DISTANCE) {
			      return true;
			    }
			  }
			  return false;
			}

			var PREFIXED_TOUCH_ACTION = prefixed(TEST_ELEMENT.style, 'touchAction');
			var NATIVE_TOUCH_ACTION = PREFIXED_TOUCH_ACTION !== undefined;

			// magical touchAction value
			var TOUCH_ACTION_COMPUTE = 'compute';
			var TOUCH_ACTION_AUTO = 'auto';
			var TOUCH_ACTION_MANIPULATION = 'manipulation'; // not implemented
			var TOUCH_ACTION_NONE = 'none';
			var TOUCH_ACTION_PAN_X = 'pan-x';
			var TOUCH_ACTION_PAN_Y = 'pan-y';
			var TOUCH_ACTION_MAP = getTouchActionProps();

			/**
			 * Touch Action
			 * sets the touchAction property or uses the js alternative
			 * @param {Manager} manager
			 * @param {String} value
			 * @constructor
			 */
			function TouchAction(manager, value) {
			  this.manager = manager;
			  this.set(value);
			}

			TouchAction.prototype = {
			  /**
			   * set the touchAction value on the element or enable the polyfill
			   * @param {String} value
			   */
			  set: function(value) {
			    // find out the touch-action by the event handlers
			    if (value == TOUCH_ACTION_COMPUTE) {
			      value = this.compute();
			    }

			    if (NATIVE_TOUCH_ACTION && this.manager.element.style && TOUCH_ACTION_MAP[value]) {
			      this.manager.element.style[PREFIXED_TOUCH_ACTION] = value;
			    }
			    this.actions = value.toLowerCase().trim();
			  },

			  /**
			   * just re-set the touchAction value
			   */
			  update: function() {
			    this.set(this.manager.options.touchAction);
			  },

			  /**
			   * compute the value for the touchAction property based on the recognizer's settings
			   * @returns {String} value
			   */
			  compute: function() {
			    var actions = [];
			    each(this.manager.recognizers, function(recognizer) {
			      if (boolOrFn(recognizer.options.enable, [recognizer])) {
			        actions = actions.concat(recognizer.getTouchAction());
			      }
			    });
			    return cleanTouchActions(actions.join(' '));
			  },

			  /**
			   * this method is called on each input cycle and provides the preventing of the browser behavior
			   * @param {Object} input
			   */
			  preventDefaults: function(input) {
			    var srcEvent = input.srcEvent;
			    var direction = input.offsetDirection;

			    // if the touch action did prevented once this session
			    if (this.manager.session.prevented) {
			      srcEvent.preventDefault();
			      return;
			    }

			    var actions = this.actions;
			    var hasNone = inStr(actions, TOUCH_ACTION_NONE) && !TOUCH_ACTION_MAP[TOUCH_ACTION_NONE];
			    var hasPanY = inStr(actions, TOUCH_ACTION_PAN_Y) && !TOUCH_ACTION_MAP[TOUCH_ACTION_PAN_Y];
			    var hasPanX = inStr(actions, TOUCH_ACTION_PAN_X) && !TOUCH_ACTION_MAP[TOUCH_ACTION_PAN_X];

			    if (hasNone) {
			      //do not prevent defaults if this is a tap gesture

			      var isTapPointer = input.pointers.length === 1;
			      var isTapMovement = input.distance < 2;
			      var isTapTouchTime = input.deltaTime < 250;

			      if (isTapPointer && isTapMovement && isTapTouchTime) {
			        return;
			      }
			    }

			    if (hasPanX && hasPanY) {
			      // `pan-x pan-y` means browser handles all scrolling/panning, do not prevent
			      return;
			    }

			    if (hasNone ||
			      (hasPanY && direction & DIRECTION_HORIZONTAL) ||
			      (hasPanX && direction & DIRECTION_VERTICAL)) {
			      return this.preventSrc(srcEvent);
			    }
			  },

			  /**
			   * call preventDefault to prevent the browser's default behavior (scrolling in most cases)
			   * @param {Object} srcEvent
			   */
			  preventSrc: function(srcEvent) {
			    this.manager.session.prevented = true;
			    srcEvent.preventDefault();
			  }
			};

			/**
			 * when the touchActions are collected they are not a valid value, so we need to clean things up. *
			 * @param {String} actions
			 * @returns {*}
			 */
			function cleanTouchActions(actions) {
			  // none
			  if (inStr(actions, TOUCH_ACTION_NONE)) {
			    return TOUCH_ACTION_NONE;
			  }

			  var hasPanX = inStr(actions, TOUCH_ACTION_PAN_X);
			  var hasPanY = inStr(actions, TOUCH_ACTION_PAN_Y);

			  // if both pan-x and pan-y are set (different recognizers
			  // for different directions, e.g. horizontal pan but vertical swipe?)
			  // we need none (as otherwise with pan-x pan-y combined none of these
			  // recognizers will work, since the browser would handle all panning
			  if (hasPanX && hasPanY) {
			    return TOUCH_ACTION_NONE;
			  }

			  // pan-x OR pan-y
			  if (hasPanX || hasPanY) {
			    return hasPanX ? TOUCH_ACTION_PAN_X : TOUCH_ACTION_PAN_Y;
			  }

			  // manipulation
			  if (inStr(actions, TOUCH_ACTION_MANIPULATION)) {
			    return TOUCH_ACTION_MANIPULATION;
			  }

			  return TOUCH_ACTION_AUTO;
			}

			function getTouchActionProps() {
			  if (!NATIVE_TOUCH_ACTION) {
			    return false;
			  }
			  var touchMap = {};
			  var cssSupports = window.CSS && window.CSS.supports;
			  ['auto', 'manipulation', 'pan-y', 'pan-x', 'pan-x pan-y', 'none'].forEach(function(val) {

			    // If css.supports is not supported but there is native touch-action assume it supports
			    // all values. This is the case for IE 10 and 11.
			    touchMap[val] = cssSupports ? window.CSS.supports('touch-action', val) : true;
			  });
			  return touchMap;
			}

			/**
			 * Recognizer flow explained; *
			 * All recognizers have the initial state of POSSIBLE when a input session starts.
			 * The definition of a input session is from the first input until the last input, with all it's movement in it. *
			 * Example session for mouse-input: mousedown -> mousemove -> mouseup
			 *
			 * On each recognizing cycle (see Manager.recognize) the .recognize() method is executed
			 * which determines with state it should be.
			 *
			 * If the recognizer has the state FAILED, CANCELLED or RECOGNIZED (equals ENDED), it is reset to
			 * POSSIBLE to give it another change on the next cycle.
			 *
			 *               Possible
			 *                  |
			 *            +-----+---------------+
			 *            |                     |
			 *      +-----+-----+               |
			 *      |           |               |
			 *   Failed      Cancelled          |
			 *                          +-------+------+
			 *                          |              |
			 *                      Recognized       Began
			 *                                         |
			 *                                      Changed
			 *                                         |
			 *                                  Ended/Recognized
			 */
			var STATE_POSSIBLE = 1;
			var STATE_BEGAN = 2;
			var STATE_CHANGED = 4;
			var STATE_ENDED = 8;
			var STATE_RECOGNIZED = STATE_ENDED;
			var STATE_CANCELLED = 16;
			var STATE_FAILED = 32;

			/**
			 * Recognizer
			 * Every recognizer needs to extend from this class.
			 * @constructor
			 * @param {Object} options
			 */
			function Recognizer(options) {
			  this.options = assign({}, this.defaults, options || {});

			  this.id = uniqueId();

			  this.manager = null;

			  // default is enable true
			  this.options.enable = ifUndefined(this.options.enable, true);

			  this.state = STATE_POSSIBLE;

			  this.simultaneous = {};
			  this.requireFail = [];
			}

			Recognizer.prototype = {
			  /**
			   * @virtual
			   * @type {Object}
			   */
			  defaults: {},

			  /**
			   * set options
			   * @param {Object} options
			   * @return {Recognizer}
			   */
			  set: function(options) {
			    assign(this.options, options);

			    // also update the touchAction, in case something changed about the directions/enabled state
			    this.manager && this.manager.touchAction.update();
			    return this;
			  },

			  /**
			   * recognize simultaneous with an other recognizer.
			   * @param {Recognizer} otherRecognizer
			   * @returns {Recognizer} this
			   */
			  recognizeWith: function(otherRecognizer) {
			    if (invokeArrayArg(otherRecognizer, 'recognizeWith', this)) {
			      return this;
			    }

			    var simultaneous = this.simultaneous;
			    otherRecognizer = getRecognizerByNameIfManager(otherRecognizer, this);
			    if (!simultaneous[otherRecognizer.id]) {
			      simultaneous[otherRecognizer.id] = otherRecognizer;
			      otherRecognizer.recognizeWith(this);
			    }
			    return this;
			  },

			  /**
			   * drop the simultaneous link. it doesnt remove the link on the other recognizer.
			   * @param {Recognizer} otherRecognizer
			   * @returns {Recognizer} this
			   */
			  dropRecognizeWith: function(otherRecognizer) {
			    if (invokeArrayArg(otherRecognizer, 'dropRecognizeWith', this)) {
			      return this;
			    }

			    otherRecognizer = getRecognizerByNameIfManager(otherRecognizer, this);
			    delete this.simultaneous[otherRecognizer.id];
			    return this;
			  },

			  /**
			   * recognizer can only run when an other is failing
			   * @param {Recognizer} otherRecognizer
			   * @returns {Recognizer} this
			   */
			  requireFailure: function(otherRecognizer) {
			    if (invokeArrayArg(otherRecognizer, 'requireFailure', this)) {
			      return this;
			    }

			    var requireFail = this.requireFail;
			    otherRecognizer = getRecognizerByNameIfManager(otherRecognizer, this);
			    if (inArray(requireFail, otherRecognizer) === -1) {
			      requireFail.push(otherRecognizer);
			      otherRecognizer.requireFailure(this);
			    }
			    return this;
			  },

			  /**
			   * drop the requireFailure link. it does not remove the link on the other recognizer.
			   * @param {Recognizer} otherRecognizer
			   * @returns {Recognizer} this
			   */
			  dropRequireFailure: function(otherRecognizer) {
			    if (invokeArrayArg(otherRecognizer, 'dropRequireFailure', this)) {
			      return this;
			    }

			    otherRecognizer = getRecognizerByNameIfManager(otherRecognizer, this);
			    var index = inArray(this.requireFail, otherRecognizer);
			    if (index > -1) {
			      this.requireFail.splice(index, 1);
			    }
			    return this;
			  },

			  /**
			   * has require failures boolean
			   * @returns {boolean}
			   */
			  hasRequireFailures: function() {
			    return this.requireFail.length > 0;
			  },

			  /**
			   * if the recognizer can recognize simultaneous with an other recognizer
			   * @param {Recognizer} otherRecognizer
			   * @returns {Boolean}
			   */
			  canRecognizeWith: function(otherRecognizer) {
			    return !!this.simultaneous[otherRecognizer.id];
			  },

			  /**
			   * You should use `tryEmit` instead of `emit` directly to check
			   * that all the needed recognizers has failed before emitting.
			   * @param {Object} input
			   */
			  emit: function(input) {
			    var self = this;
			    var state = this.state;

			    function emit(event) {
			      self.manager.emit(event, input);
			    }

			    // 'panstart' and 'panmove'
			    if (state < STATE_ENDED) {
			      emit(self.options.event + stateStr(state));
			    }

			    emit(self.options.event); // simple 'eventName' events

			    if (input.additionalEvent) { // additional event(panleft, panright, pinchin, pinchout...)
			      emit(input.additionalEvent);
			    }

			    // panend and pancancel
			    if (state >= STATE_ENDED) {
			      emit(self.options.event + stateStr(state));
			    }
			  },

			  /**
			   * Check that all the require failure recognizers has failed,
			   * if true, it emits a gesture event,
			   * otherwise, setup the state to FAILED.
			   * @param {Object} input
			   */
			  tryEmit: function(input) {
			    if (this.canEmit()) {
			      return this.emit(input);
			    }
			    // it's failing anyway
			    this.state = STATE_FAILED;
			  },

			  /**
			   * can we emit?
			   * @returns {boolean}
			   */
			  canEmit: function() {
			    var i = 0;
			    while (i < this.requireFail.length) {
			      if (!(this.requireFail[i].state & (STATE_FAILED | STATE_POSSIBLE))) {
			        return false;
			      }
			      i++;
			    }
			    return true;
			  },

			  /**
			   * update the recognizer
			   * @param {Object} inputData
			   */
			  recognize: function(inputData) {
			    // make a new copy of the inputData
			    // so we can change the inputData without messing up the other recognizers
			    var inputDataClone = assign({}, inputData);

			    // is is enabled and allow recognizing?
			    if (!boolOrFn(this.options.enable, [this, inputDataClone])) {
			      this.reset();
			      this.state = STATE_FAILED;
			      return;
			    }

			    // reset when we've reached the end
			    if (this.state & (STATE_RECOGNIZED | STATE_CANCELLED | STATE_FAILED)) {
			      this.state = STATE_POSSIBLE;
			    }

			    this.state = this.process(inputDataClone);

			    // the recognizer has recognized a gesture
			    // so trigger an event
			    if (this.state & (STATE_BEGAN | STATE_CHANGED | STATE_ENDED | STATE_CANCELLED)) {
			      this.tryEmit(inputDataClone);
			    }
			  },

			  /**
			   * return the state of the recognizer
			   * the actual recognizing happens in this method
			   * @virtual
			   * @param {Object} inputData
			   * @returns {Const} STATE
			   */
			  process: function(inputData) { }, // jshint ignore:line

			  /**
			   * return the preferred touch-action
			   * @virtual
			   * @returns {Array}
			   */
			  getTouchAction: function() { },

			  /**
			   * called when the gesture isn't allowed to recognize
			   * like when another is being recognized or it is disabled
			   * @virtual
			   */
			  reset: function() { }
			};

			/**
			 * get a usable string, used as event postfix
			 * @param {Const} state
			 * @returns {String} state
			 */
			function stateStr(state) {
			  if (state & STATE_CANCELLED) {
			    return 'cancel';
			  } else if (state & STATE_ENDED) {
			    return 'end';
			  } else if (state & STATE_CHANGED) {
			    return 'move';
			  } else if (state & STATE_BEGAN) {
			    return 'start';
			  }
			  return '';
			}

			/**
			 * direction cons to string
			 * @param {Const} direction
			 * @returns {String}
			 */
			function directionStr(direction) {
			  if (direction == DIRECTION_DOWN) {
			    return 'down';
			  } else if (direction == DIRECTION_UP) {
			    return 'up';
			  } else if (direction == DIRECTION_LEFT) {
			    return 'left';
			  } else if (direction == DIRECTION_RIGHT) {
			    return 'right';
			  }
			  return '';
			}

			/**
			 * get a recognizer by name if it is bound to a manager
			 * @param {Recognizer|String} otherRecognizer
			 * @param {Recognizer} recognizer
			 * @returns {Recognizer}
			 */
			function getRecognizerByNameIfManager(otherRecognizer, recognizer) {
			  var manager = recognizer.manager;
			  if (manager) {
			    return manager.get(otherRecognizer);
			  }
			  return otherRecognizer;
			}

			/**
			 * This recognizer is just used as a base for the simple attribute recognizers.
			 * @constructor
			 * @extends Recognizer
			 */
			function AttrRecognizer() {
			  Recognizer.apply(this, arguments);
			}

			inherit(AttrRecognizer, Recognizer, {
			  /**
			   * @namespace
			   * @memberof AttrRecognizer
			   */
			  defaults: {
			    /**
			     * @type {Number}
			     * @default 1
			     */
			    pointers: 1
			  },

			  /**
			   * Used to check if it the recognizer receives valid input, like input.distance > 10.
			   * @memberof AttrRecognizer
			   * @param {Object} input
			   * @returns {Boolean} recognized
			   */
			  attrTest: function(input) {
			    var optionPointers = this.options.pointers;
			    return optionPointers === 0 || input.pointers.length === optionPointers;
			  },

			  /**
			   * Process the input and return the state for the recognizer
			   * @memberof AttrRecognizer
			   * @param {Object} input
			   * @returns {*} State
			   */
			  process: function(input) {
			    var state = this.state;
			    var eventType = input.eventType;

			    var isRecognized = state & (STATE_BEGAN | STATE_CHANGED);
			    var isValid = this.attrTest(input);

			    // on cancel input and we've recognized before, return STATE_CANCELLED
			    if (isRecognized && (eventType & INPUT_CANCEL || !isValid)) {
			      return state | STATE_CANCELLED;
			    } else if (isRecognized || isValid) {
			      if (eventType & INPUT_END) {
			        return state | STATE_ENDED;
			      } else if (!(state & STATE_BEGAN)) {
			        return STATE_BEGAN;
			      }
			      return state | STATE_CHANGED;
			    }
			    return STATE_FAILED;
			  }
			});

			/**
			 * Pan
			 * Recognized when the pointer is down and moved in the allowed direction.
			 * @constructor
			 * @extends AttrRecognizer
			 */
			function PanRecognizer() {
			  AttrRecognizer.apply(this, arguments);

			  this.pX = null;
			  this.pY = null;
			}

			inherit(PanRecognizer, AttrRecognizer, {
			  /**
			   * @namespace
			   * @memberof PanRecognizer
			   */
			  defaults: {
			    event: 'pan',
			    threshold: 10,
			    pointers: 1,
			    direction: DIRECTION_ALL
			  },

			  getTouchAction: function() {
			    var direction = this.options.direction;
			    var actions = [];
			    if (direction & DIRECTION_HORIZONTAL) {
			      actions.push(TOUCH_ACTION_PAN_Y);
			    }
			    if (direction & DIRECTION_VERTICAL) {
			      actions.push(TOUCH_ACTION_PAN_X);
			    }
			    return actions;
			  },

			  directionTest: function(input) {
			    var options = this.options;
			    var hasMoved = true;
			    var distance = input.distance;
			    var direction = input.direction;
			    var x = input.deltaX;
			    var y = input.deltaY;

			    // lock to axis?
			    if (!(direction & options.direction)) {
			      if (options.direction & DIRECTION_HORIZONTAL) {
			        direction = (x === 0) ? DIRECTION_NONE : (x < 0) ? DIRECTION_LEFT : DIRECTION_RIGHT;
			        hasMoved = x != this.pX;
			        distance = Math.abs(input.deltaX);
			      } else {
			        direction = (y === 0) ? DIRECTION_NONE : (y < 0) ? DIRECTION_UP : DIRECTION_DOWN;
			        hasMoved = y != this.pY;
			        distance = Math.abs(input.deltaY);
			      }
			    }
			    input.direction = direction;
			    return hasMoved && distance > options.threshold && direction & options.direction;
			  },

			  attrTest: function(input) {
			    return AttrRecognizer.prototype.attrTest.call(this, input) &&
			      (this.state & STATE_BEGAN || (!(this.state & STATE_BEGAN) && this.directionTest(input)));
			  },

			  emit: function(input) {

			    this.pX = input.deltaX;
			    this.pY = input.deltaY;

			    var direction = directionStr(input.direction);

			    if (direction) {
			      input.additionalEvent = this.options.event + direction;
			    }
			    this._super.emit.call(this, input);
			  }
			});

			/**
			 * Pinch
			 * Recognized when two or more pointers are moving toward (zoom-in) or away from each other (zoom-out).
			 * @constructor
			 * @extends AttrRecognizer
			 */
			function PinchRecognizer() {
			  AttrRecognizer.apply(this, arguments);
			}

			inherit(PinchRecognizer, AttrRecognizer, {
			  /**
			   * @namespace
			   * @memberof PinchRecognizer
			   */
			  defaults: {
			    event: 'pinch',
			    threshold: 0,
			    pointers: 2
			  },

			  getTouchAction: function() {
			    return [TOUCH_ACTION_NONE];
			  },

			  attrTest: function(input) {
			    return this._super.attrTest.call(this, input) &&
			      (Math.abs(input.scale - 1) > this.options.threshold || this.state & STATE_BEGAN);
			  },

			  emit: function(input) {
			    if (input.scale !== 1) {
			      var inOut = input.scale < 1 ? 'in' : 'out';
			      input.additionalEvent = this.options.event + inOut;
			    }
			    this._super.emit.call(this, input);
			  }
			});

			/**
			 * Press
			 * Recognized when the pointer is down for x ms without any movement.
			 * @constructor
			 * @extends Recognizer
			 */
			function PressRecognizer() {
			  Recognizer.apply(this, arguments);

			  this._timer = null;
			  this._input = null;
			}

			inherit(PressRecognizer, Recognizer, {
			  /**
			   * @namespace
			   * @memberof PressRecognizer
			   */
			  defaults: {
			    event: 'press',
			    pointers: 1,
			    time: 251, // minimal time of the pointer to be pressed
			    threshold: 9 // a minimal movement is ok, but keep it low
			  },

			  getTouchAction: function() {
			    return [TOUCH_ACTION_AUTO];
			  },

			  process: function(input) {
			    var options = this.options;
			    var validPointers = input.pointers.length === options.pointers;
			    var validMovement = input.distance < options.threshold;
			    var validTime = input.deltaTime > options.time;

			    this._input = input;

			    // we only allow little movement
			    // and we've reached an end event, so a tap is possible
			    if (!validMovement || !validPointers || (input.eventType & (INPUT_END | INPUT_CANCEL) && !validTime)) {
			      this.reset();
			    } else if (input.eventType & INPUT_START) {
			      this.reset();
			      this._timer = setTimeoutContext(function() {
			        this.state = STATE_RECOGNIZED;
			        this.tryEmit();
			      }, options.time, this);
			    } else if (input.eventType & INPUT_END) {
			      return STATE_RECOGNIZED;
			    }
			    return STATE_FAILED;
			  },

			  reset: function() {
			    clearTimeout(this._timer);
			  },

			  emit: function(input) {
			    if (this.state !== STATE_RECOGNIZED) {
			      return;
			    }

			    if (input && (input.eventType & INPUT_END)) {
			      this.manager.emit(this.options.event + 'up', input);
			    } else {
			      this._input.timeStamp = now();
			      this.manager.emit(this.options.event, this._input);
			    }
			  }
			});

			/**
			 * Rotate
			 * Recognized when two or more pointer are moving in a circular motion.
			 * @constructor
			 * @extends AttrRecognizer
			 */
			function RotateRecognizer() {
			  AttrRecognizer.apply(this, arguments);
			}

			inherit(RotateRecognizer, AttrRecognizer, {
			  /**
			   * @namespace
			   * @memberof RotateRecognizer
			   */
			  defaults: {
			    event: 'rotate',
			    threshold: 0,
			    pointers: 2
			  },

			  getTouchAction: function() {
			    return [TOUCH_ACTION_NONE];
			  },

			  attrTest: function(input) {
			    return this._super.attrTest.call(this, input) &&
			      (Math.abs(input.rotation) > this.options.threshold || this.state & STATE_BEGAN);
			  }
			});

			/**
			 * Swipe
			 * Recognized when the pointer is moving fast (velocity), with enough distance in the allowed direction.
			 * @constructor
			 * @extends AttrRecognizer
			 */
			function SwipeRecognizer() {
			  AttrRecognizer.apply(this, arguments);
			}

			inherit(SwipeRecognizer, AttrRecognizer, {
			  /**
			   * @namespace
			   * @memberof SwipeRecognizer
			   */
			  defaults: {
			    event: 'swipe',
			    threshold: 10,
			    velocity: 0.3,
			    direction: DIRECTION_HORIZONTAL | DIRECTION_VERTICAL,
			    pointers: 1
			  },

			  getTouchAction: function() {
			    return PanRecognizer.prototype.getTouchAction.call(this);
			  },

			  attrTest: function(input) {
			    var direction = this.options.direction;
			    var velocity;

			    if (direction & (DIRECTION_HORIZONTAL | DIRECTION_VERTICAL)) {
			      velocity = input.overallVelocity;
			    } else if (direction & DIRECTION_HORIZONTAL) {
			      velocity = input.overallVelocityX;
			    } else if (direction & DIRECTION_VERTICAL) {
			      velocity = input.overallVelocityY;
			    }

			    return this._super.attrTest.call(this, input) &&
			      direction & input.offsetDirection &&
			      input.distance > this.options.threshold &&
			      input.maxPointers == this.options.pointers &&
			      abs(velocity) > this.options.velocity && input.eventType & INPUT_END;
			  },

			  emit: function(input) {
			    var direction = directionStr(input.offsetDirection);
			    if (direction) {
			      this.manager.emit(this.options.event + direction, input);
			    }

			    this.manager.emit(this.options.event, input);
			  }
			});

			/**
			 * A tap is ecognized when the pointer is doing a small tap/click. Multiple taps are recognized if they occur
			 * between the given interval and position. The delay option can be used to recognize multi-taps without firing
			 * a single tap.
			 *
			 * The eventData from the emitted event contains the property `tapCount`, which contains the amount of
			 * multi-taps being recognized.
			 * @constructor
			 * @extends Recognizer
			 */
			function TapRecognizer() {
			  Recognizer.apply(this, arguments);

			  // previous time and center,
			  // used for tap counting
			  this.pTime = false;
			  this.pCenter = false;

			  this._timer = null;
			  this._input = null;
			  this.count = 0;
			}

			inherit(TapRecognizer, Recognizer, {
			  /**
			   * @namespace
			   * @memberof PinchRecognizer
			   */
			  defaults: {
			    event: 'tap',
			    pointers: 1,
			    taps: 1,
			    interval: 300, // max time between the multi-tap taps
			    time: 250, // max time of the pointer to be down (like finger on the screen)
			    threshold: 9, // a minimal movement is ok, but keep it low
			    posThreshold: 10 // a multi-tap can be a bit off the initial position
			  },

			  getTouchAction: function() {
			    return [TOUCH_ACTION_MANIPULATION];
			  },

			  process: function(input) {
			    var options = this.options;

			    var validPointers = input.pointers.length === options.pointers;
			    var validMovement = input.distance < options.threshold;
			    var validTouchTime = input.deltaTime < options.time;

			    this.reset();

			    if ((input.eventType & INPUT_START) && (this.count === 0)) {
			      return this.failTimeout();
			    }

			    // we only allow little movement
			    // and we've reached an end event, so a tap is possible
			    if (validMovement && validTouchTime && validPointers) {
			      if (input.eventType != INPUT_END) {
			        return this.failTimeout();
			      }

			      var validInterval = this.pTime ? (input.timeStamp - this.pTime < options.interval) : true;
			      var validMultiTap = !this.pCenter || getDistance(this.pCenter, input.center) < options.posThreshold;

			      this.pTime = input.timeStamp;
			      this.pCenter = input.center;

			      if (!validMultiTap || !validInterval) {
			        this.count = 1;
			      } else {
			        this.count += 1;
			      }

			      this._input = input;

			      // if tap count matches we have recognized it,
			      // else it has began recognizing...
			      var tapCount = this.count % options.taps;
			      if (tapCount === 0) {
			        // no failing requirements, immediately trigger the tap event
			        // or wait as long as the multitap interval to trigger
			        if (!this.hasRequireFailures()) {
			          return STATE_RECOGNIZED;
			        } else {
			          this._timer = setTimeoutContext(function() {
			            this.state = STATE_RECOGNIZED;
			            this.tryEmit();
			          }, options.interval, this);
			          return STATE_BEGAN;
			        }
			      }
			    }
			    return STATE_FAILED;
			  },

			  failTimeout: function() {
			    this._timer = setTimeoutContext(function() {
			      this.state = STATE_FAILED;
			    }, this.options.interval, this);
			    return STATE_FAILED;
			  },

			  reset: function() {
			    clearTimeout(this._timer);
			  },

			  emit: function() {
			    if (this.state == STATE_RECOGNIZED) {
			      this._input.tapCount = this.count;
			      this.manager.emit(this.options.event, this._input);
			    }
			  }
			});

			/**
			 * Simple way to create a manager with a default set of recognizers.
			 * @param {HTMLElement} element
			 * @param {Object} [options]
			 * @constructor
			 */
			function Hammer(element, options) {
			  options = options || {};
			  options.recognizers = ifUndefined(options.recognizers, Hammer.defaults.preset);
			  return new Manager(element, options);
			}

			/**
			 * @const {string}
			 */
			Hammer.VERSION = '2.0.7';

			/**
			 * default settings
			 * @namespace
			 */
			Hammer.defaults = {
			  /**
			   * set if DOM events are being triggered.
			   * But this is slower and unused by simple implementations, so disabled by default.
			   * @type {Boolean}
			   * @default false
			   */
			  domEvents: false,

			  /**
			   * The value for the touchAction property/fallback.
			   * When set to `compute` it will magically set the correct value based on the added recognizers.
			   * @type {String}
			   * @default compute
			   */
			  touchAction: TOUCH_ACTION_COMPUTE,

			  /**
			   * @type {Boolean}
			   * @default true
			   */
			  enable: true,

			  /**
			   * EXPERIMENTAL FEATURE -- can be removed/changed
			   * Change the parent input target element.
			   * If Null, then it is being set the to main element.
			   * @type {Null|EventTarget}
			   * @default null
			   */
			  inputTarget: null,

			  /**
			   * force an input class
			   * @type {Null|Function}
			   * @default null
			   */
			  inputClass: null,

			  /**
			   * Default recognizer setup when calling `Hammer()`
			   * When creating a new Manager these will be skipped.
			   * @type {Array}
			   */
			  preset: [
			    // RecognizerClass, options, [recognizeWith, ...], [requireFailure, ...]
			    [RotateRecognizer, {enable: false}],
			    [PinchRecognizer, {enable: false}, ['rotate']],
			    [SwipeRecognizer, {direction: DIRECTION_HORIZONTAL}],
			    [PanRecognizer, {direction: DIRECTION_HORIZONTAL}, ['swipe']],
			    [TapRecognizer],
			    [TapRecognizer, {event: 'doubletap', taps: 2}, ['tap']],
			    [PressRecognizer]
			  ],

			  /**
			   * Some CSS properties can be used to improve the working of Hammer.
			   * Add them to this method and they will be set when creating a new Manager.
			   * @namespace
			   */
			  cssProps: {
			    /**
			     * Disables text selection to improve the dragging gesture. Mainly for desktop browsers.
			     * @type {String}
			     * @default 'none'
			     */
			    userSelect: 'none',

			    /**
			     * Disable the Windows Phone grippers when pressing an element.
			     * @type {String}
			     * @default 'none'
			     */
			    touchSelect: 'none',

			    /**
			     * Disables the default callout shown when you touch and hold a touch target.
			     * On iOS, when you touch and hold a touch target such as a link, Safari displays
			     * a callout containing information about the link. This property allows you to disable that callout.
			     * @type {String}
			     * @default 'none'
			     */
			    touchCallout: 'none',

			    /**
			     * Specifies whether zooming is enabled. Used by IE10>
			     * @type {String}
			     * @default 'none'
			     */
			    contentZooming: 'none',

			    /**
			     * Specifies that an entire element should be draggable instead of its contents. Mainly for desktop browsers.
			     * @type {String}
			     * @default 'none'
			     */
			    userDrag: 'none',

			    /**
			     * Overrides the highlight color shown when the user taps a link or a JavaScript
			     * clickable element in iOS. This property obeys the alpha value, if specified.
			     * @type {String}
			     * @default 'rgba(0,0,0,0)'
			     */
			    tapHighlightColor: 'rgba(0,0,0,0)'
			  }
			};

			var STOP = 1;
			var FORCED_STOP = 2;

			/**
			 * Manager
			 * @param {HTMLElement} element
			 * @param {Object} [options]
			 * @constructor
			 */
			function Manager(element, options) {
			  this.options = assign({}, Hammer.defaults, options || {});

			  this.options.inputTarget = this.options.inputTarget || element;

			  this.handlers = {};
			  this.session = {};
			  this.recognizers = [];
			  this.oldCssProps = {};

			  this.element = element;
			  this.input = createInputInstance(this);
			  this.touchAction = new TouchAction(this, this.options.touchAction);

			  toggleCssProps(this, true);

			  each(this.options.recognizers, function(item) {
			    var recognizer = this.add(new (item[0])(item[1]));
			    item[2] && recognizer.recognizeWith(item[2]);
			    item[3] && recognizer.requireFailure(item[3]);
			  }, this);
			}

			Manager.prototype = {
			  /**
			   * set options
			   * @param {Object} options
			   * @returns {Manager}
			   */
			  set: function(options) {
			    assign(this.options, options);

			    // Options that need a little more setup
			    if (options.touchAction) {
			      this.touchAction.update();
			    }
			    if (options.inputTarget) {
			      // Clean up existing event listeners and reinitialize
			      this.input.destroy();
			      this.input.target = options.inputTarget;
			      this.input.init();
			    }
			    return this;
			  },

			  /**
			   * stop recognizing for this session.
			   * This session will be discarded, when a new [input]start event is fired.
			   * When forced, the recognizer cycle is stopped immediately.
			   * @param {Boolean} [force]
			   */
			  stop: function(force) {
			    this.session.stopped = force ? FORCED_STOP : STOP;
			  },

			  /**
			   * run the recognizers!
			   * called by the inputHandler function on every movement of the pointers (touches)
			   * it walks through all the recognizers and tries to detect the gesture that is being made
			   * @param {Object} inputData
			   */
			  recognize: function(inputData) {
			    var session = this.session;
			    if (session.stopped) {
			      return;
			    }

			    // run the touch-action polyfill
			    this.touchAction.preventDefaults(inputData);

			    var recognizer;
			    var recognizers = this.recognizers;

			    // this holds the recognizer that is being recognized.
			    // so the recognizer's state needs to be BEGAN, CHANGED, ENDED or RECOGNIZED
			    // if no recognizer is detecting a thing, it is set to `null`
			    var curRecognizer = session.curRecognizer;

			    // reset when the last recognizer is recognized
			    // or when we're in a new session
			    if (!curRecognizer || (curRecognizer && curRecognizer.state & STATE_RECOGNIZED)) {
			      curRecognizer = session.curRecognizer = null;
			    }

			    var i = 0;
			    while (i < recognizers.length) {
			      recognizer = recognizers[i];

			      // find out if we are allowed try to recognize the input for this one.
			      // 1.   allow if the session is NOT forced stopped (see the .stop() method)
			      // 2.   allow if we still haven't recognized a gesture in this session, or the this recognizer is the one
			      //      that is being recognized.
			      // 3.   allow if the recognizer is allowed to run simultaneous with the current recognized recognizer.
			      //      this can be setup with the `recognizeWith()` method on the recognizer.
			      if (session.stopped !== FORCED_STOP && ( // 1
			        !curRecognizer || recognizer == curRecognizer || // 2
			        recognizer.canRecognizeWith(curRecognizer))) { // 3
			        recognizer.recognize(inputData);
			      } else {
			        recognizer.reset();
			      }

			      // if the recognizer has been recognizing the input as a valid gesture, we want to store this one as the
			      // current active recognizer. but only if we don't already have an active recognizer
			      if (!curRecognizer && recognizer.state & (STATE_BEGAN | STATE_CHANGED | STATE_ENDED)) {
			        curRecognizer = session.curRecognizer = recognizer;
			      }
			      i++;
			    }
			  },

			  /**
			   * get a recognizer by its event name.
			   * @param {Recognizer|String} recognizer
			   * @returns {Recognizer|Null}
			   */
			  get: function(recognizer) {
			    if (recognizer instanceof Recognizer) {
			      return recognizer;
			    }

			    var recognizers = this.recognizers;
			    for (var i = 0; i < recognizers.length; i++) {
			      if (recognizers[i].options.event == recognizer) {
			        return recognizers[i];
			      }
			    }
			    return null;
			  },

			  /**
			   * add a recognizer to the manager
			   * existing recognizers with the same event name will be removed
			   * @param {Recognizer} recognizer
			   * @returns {Recognizer|Manager}
			   */
			  add: function(recognizer) {
			    if (invokeArrayArg(recognizer, 'add', this)) {
			      return this;
			    }

			    // remove existing
			    var existing = this.get(recognizer.options.event);
			    if (existing) {
			      this.remove(existing);
			    }

			    this.recognizers.push(recognizer);
			    recognizer.manager = this;

			    this.touchAction.update();
			    return recognizer;
			  },

			  /**
			   * remove a recognizer by name or instance
			   * @param {Recognizer|String} recognizer
			   * @returns {Manager}
			   */
			  remove: function(recognizer) {
			    if (invokeArrayArg(recognizer, 'remove', this)) {
			      return this;
			    }

			    recognizer = this.get(recognizer);

			    // let's make sure this recognizer exists
			    if (recognizer) {
			      var recognizers = this.recognizers;
			      var index = inArray(recognizers, recognizer);

			      if (index !== -1) {
			        recognizers.splice(index, 1);
			        this.touchAction.update();
			      }
			    }

			    return this;
			  },

			  /**
			   * bind event
			   * @param {String} events
			   * @param {Function} handler
			   * @returns {EventEmitter} this
			   */
			  on: function(events, handler) {
			    if (events === undefined) {
			      return;
			    }
			    if (handler === undefined) {
			      return;
			    }

			    var handlers = this.handlers;
			    each(splitStr(events), function(event) {
			      handlers[event] = handlers[event] || [];
			      handlers[event].push(handler);
			    });
			    return this;
			  },

			  /**
			   * unbind event, leave emit blank to remove all handlers
			   * @param {String} events
			   * @param {Function} [handler]
			   * @returns {EventEmitter} this
			   */
			  off: function(events, handler) {
			    if (events === undefined) {
			      return;
			    }

			    var handlers = this.handlers;
			    each(splitStr(events), function(event) {
			      if (!handler) {
			        delete handlers[event];
			      } else {
			        handlers[event] && handlers[event].splice(inArray(handlers[event], handler), 1);
			      }
			    });
			    return this;
			  },

			  /**
			   * emit event to the listeners
			   * @param {String} event
			   * @param {Object} data
			   */
			  emit: function(event, data) {
			    // we also want to trigger dom events
			    if (this.options.domEvents) {
			      triggerDomEvent(event, data);
			    }

			    // no handlers, so skip it all
			    var handlers = this.handlers[event] && this.handlers[event].slice();
			    if (!handlers || !handlers.length) {
			      return;
			    }

			    data.type = event;
			    data.preventDefault = function() {
			      data.srcEvent.preventDefault();
			    };

			    var i = 0;
			    while (i < handlers.length) {
			      handlers[i](data);
			      i++;
			    }
			  },

			  /**
			   * destroy the manager and unbinds all events
			   * it doesn't unbind dom events, that is the user own responsibility
			   */
			  destroy: function() {
			    this.element && toggleCssProps(this, false);

			    this.handlers = {};
			    this.session = {};
			    this.input.destroy();
			    this.element = null;
			  }
			};

			/**
			 * add/remove the css properties as defined in manager.options.cssProps
			 * @param {Manager} manager
			 * @param {Boolean} add
			 */
			function toggleCssProps(manager, add) {
			  var element = manager.element;
			  if (!element.style) {
			    return;
			  }
			  var prop;
			  each(manager.options.cssProps, function(value, name) {
			    prop = prefixed(element.style, name);
			    if (add) {
			      manager.oldCssProps[prop] = element.style[prop];
			      element.style[prop] = value;
			    } else {
			      element.style[prop] = manager.oldCssProps[prop] || '';
			    }
			  });
			  if (!add) {
			    manager.oldCssProps = {};
			  }
			}

			/**
			 * trigger dom event
			 * @param {String} event
			 * @param {Object} data
			 */
			function triggerDomEvent(event, data) {
			  var gestureEvent = document.createEvent('Event');
			  gestureEvent.initEvent(event, true, true);
			  gestureEvent.gesture = data;
			  data.target.dispatchEvent(gestureEvent);
			}

			assign(Hammer, {
			  INPUT_START: INPUT_START,
			  INPUT_MOVE: INPUT_MOVE,
			  INPUT_END: INPUT_END,
			  INPUT_CANCEL: INPUT_CANCEL,

			  STATE_POSSIBLE: STATE_POSSIBLE,
			  STATE_BEGAN: STATE_BEGAN,
			  STATE_CHANGED: STATE_CHANGED,
			  STATE_ENDED: STATE_ENDED,
			  STATE_RECOGNIZED: STATE_RECOGNIZED,
			  STATE_CANCELLED: STATE_CANCELLED,
			  STATE_FAILED: STATE_FAILED,

			  DIRECTION_NONE: DIRECTION_NONE,
			  DIRECTION_LEFT: DIRECTION_LEFT,
			  DIRECTION_RIGHT: DIRECTION_RIGHT,
			  DIRECTION_UP: DIRECTION_UP,
			  DIRECTION_DOWN: DIRECTION_DOWN,
			  DIRECTION_HORIZONTAL: DIRECTION_HORIZONTAL,
			  DIRECTION_VERTICAL: DIRECTION_VERTICAL,
			  DIRECTION_ALL: DIRECTION_ALL,

			  Manager: Manager,
			  Input: Input,
			  TouchAction: TouchAction,

			  TouchInput: TouchInput,
			  MouseInput: MouseInput,
			  PointerEventInput: PointerEventInput,
			  TouchMouseInput: TouchMouseInput,
			  SingleTouchInput: SingleTouchInput,

			  Recognizer: Recognizer,
			  AttrRecognizer: AttrRecognizer,
			  Tap: TapRecognizer,
			  Pan: PanRecognizer,
			  Swipe: SwipeRecognizer,
			  Pinch: PinchRecognizer,
			  Rotate: RotateRecognizer,
			  Press: PressRecognizer,

			  on: addEventListeners,
			  off: removeEventListeners,
			  each: each,
			  merge: merge,
			  extend: extend,
			  assign: assign,
			  inherit: inherit,
			  bindFn: bindFn,
			  prefixed: prefixed
			});

			// jquery.hammer.js
			// This jQuery plugin is just a small wrapper around the Hammer() class.
			// It also extends the Manager.emit method by triggering jQuery events.
			// $(element).hammer(options).bind("pan", myPanHandler);
			// The Hammer instance is stored at $element.data("hammer").
			// https://github.com/hammerjs/jquery.hammer.js

			(function($, Hammer) {
			  function hammerify(el, options) {
			    var $el = $(el);
			    if (!$el.data('hammer')) {
			      $el.data('hammer', new Hammer($el[0], options));
			    }
			  }

			  $.fn.hammer = function(options) {
			    return this.each(function() {
			      hammerify(this, options);
			    });
			  };

			  // extend the emit method to also trigger jQuery events
			  Hammer.Manager.prototype.emit = (function(originalEmit) {
			    return function(type, data) {
			      originalEmit.call(this, type, data);
			      $(this.element).trigger({
			        type: type,
			        gesture: data
			      });
			    };
			  })(Hammer.Manager.prototype.emit);
			})($, Hammer);

			module.exports = UI.Hammer = Hammer;


		/***/ },
		/* 4 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var UI = __webpack_require__(2);

			/**
			 * Add to Homescreen v3.2.2
			 * (c) 2015 Matteo Spinelli
			 * @license: http://cubiq.org/license
			 */

			// Check for addEventListener browser support (prevent errors in IE<9)
			var _eventListener = 'addEventListener' in window;

			// Check if document is loaded, needed by autostart
			var _DOMReady = false;
			if (document.readyState === 'complete') {
			  _DOMReady = true;
			} else if (_eventListener) {
			  window.addEventListener('load', loaded, false);
			}

			function loaded() {
			  window.removeEventListener('load', loaded, false);
			  _DOMReady = true;
			}

			// regex used to detect if app has been added to the homescreen
			var _reSmartURL = /\/ath(\/)?$/;
			var _reQueryString = /([\?&]ath=[^&]*$|&ath=[^&]*(&))/;

			// singleton
			var _instance;
			function ath(options) {
			  _instance = _instance || new ath.Class(options);

			  return _instance;
			}

			// message in all supported languages
			ath.intl = {
			  en_us: {
			    ios: 'To add this web app to the home screen: tap %icon and then <strong>Add to Home Screen</strong>.',
			    android: 'To add this web app to the home screen open the browser option menu and tap on <strong>Add to homescreen</strong>. <small>The menu can be accessed by pressing the menu hardware button if your device has one, or by tapping the top right menu icon <span class="ath-action-icon">icon</span>.</small>'
			  },

			  zh_cn: {
			    ios: '如要把应用程式加至主屏幕,请点击%icon, 然后<strong>加至主屏幕</strong>',
			    android: 'To add this web app to the home screen open the browser option menu and tap on <strong>Add to homescreen</strong>. <small>The menu can be accessed by pressing the menu hardware button if your device has one, or by tapping the top right menu icon <span class="ath-action-icon">icon</span>.</small>'
			  },

			  zh_tw: {
			    ios: '如要把應用程式加至主屏幕, 請點擊%icon, 然後<strong>加至主屏幕</strong>.',
			    android: 'To add this web app to the home screen open the browser option menu and tap on <strong>Add to homescreen</strong>. <small>The menu can be accessed by pressing the menu hardware button if your device has one, or by tapping the top right menu icon <span class="ath-action-icon">icon</span>.</small>'
			  }
			};

			// Add 2 characters language support (Android mostly)
			for (var lang in ath.intl) {
			  ath.intl[lang.substr(0, 2)] = ath.intl[lang];
			}

			// default options
			ath.defaults = {
			  appID: 'org.cubiq.addtohome',		// local storage name (no need to change)
			  fontSize: 15,				// base font size, used to properly resize the popup based on viewport scale factor
			  debug: false,				// override browser checks
			  logging: false,				// log reasons for showing or not showing to js console; defaults to true when debug is true
			  modal: false,				// prevent further actions until the message is closed
			  mandatory: false,			// you can't proceed if you don't add the app to the homescreen
			  autostart: true,			// show the message automatically
			  skipFirstVisit: false,		// show only to returning visitors (ie: skip the first time you visit)
			  startDelay: 1,				// display the message after that many seconds from page load
			  lifespan: 15,				// life of the message in seconds
			  displayPace: 1440,			// minutes before the message is shown again (0: display every time, default 24 hours)
			  maxDisplayCount: 0,			// absolute maximum number of times the message will be shown to the user (0: no limit)
			  icon: true,					// add touch icon to the message
			  message: '',				// the message can be customized
			  validLocation: [],			// list of pages where the message will be shown (array of regexes)
			  onInit: null,				// executed on instance creation
			  onShow: null,				// executed when the message is shown
			  onRemove: null,				// executed when the message is removed
			  onAdd: null,				// when the application is launched the first time from the homescreen (guesstimate)
			  onPrivate: null,			// executed if user is in private mode
			  privateModeOverride: false,	// show the message even in private mode (very rude)
			  detectHomescreen: false		// try to detect if the site has been added to the homescreen (false | true | 'hash' | 'queryString' | 'smartURL')
			};

			// browser info and capability
			var _ua = window.navigator.userAgent;

			var _nav = window.navigator;
			_extend(ath, {
			  hasToken: document.location.hash == '#ath' || _reSmartURL.test(document.location.href) || _reQueryString.test(document.location.search),
			  isRetina: window.devicePixelRatio && window.devicePixelRatio > 1,
			  isIDevice: (/iphone|ipod|ipad/i).test(_ua),
			  isMobileChrome: _ua.indexOf('Android') > -1 && (/Chrome\/[.0-9]*/).test(_ua) && _ua.indexOf("Version") == -1,
			  isMobileIE: _ua.indexOf('Windows Phone') > -1,
			  language: _nav.language && _nav.language.toLowerCase().replace('-', '_') || ''
			});

			// falls back to en_us if language is unsupported
			ath.language = ath.language && ath.language in ath.intl ? ath.language : 'en_us';

			ath.isMobileSafari = ath.isIDevice && _ua.indexOf('Safari') > -1 && _ua.indexOf('CriOS') < 0;
			ath.OS = ath.isIDevice ? 'ios' : ath.isMobileChrome ? 'android' : ath.isMobileIE ? 'windows' : 'unsupported';

			ath.OSVersion = _ua.match(/(OS|Android) (\d+[_\.]\d+)/);
			ath.OSVersion = ath.OSVersion && ath.OSVersion[2] ? +ath.OSVersion[2].replace('_', '.') : 0;

			ath.isStandalone = 'standalone' in window.navigator && window.navigator.standalone;
			ath.isTablet = (ath.isMobileSafari && _ua.indexOf('iPad') > -1) || (ath.isMobileChrome && _ua.indexOf('Mobile') < 0);

			ath.isCompatible = (ath.isMobileSafari && ath.OSVersion >= 6) || ath.isMobileChrome;	// TODO: add winphone

			var _defaultSession = {
			  lastDisplayTime: 0,			// last time we displayed the message
			  returningVisitor: false,	// is this the first time you visit
			  displayCount: 0,			// number of times the message has been shown
			  optedout: false,			// has the user opted out
			  added: false				// has been actually added to the homescreen
			};

			ath.removeSession = function(appID) {
			  try {
			    if (!localStorage) {
			      throw new Error('localStorage is not defined');
			    }

			    localStorage.removeItem(appID || ath.defaults.appID);
			  } catch (e) {
			    // we are most likely in private mode
			  }
			};

			ath.doLog = function(logStr) {
			  if (this.options.logging) {
			    console.log(logStr);
			  }
			};

			ath.Class = function(options) {
			  // class methods
			  this.doLog = ath.doLog;

			  // merge default options with user config
			  this.options = _extend({}, ath.defaults);
			  _extend(this.options, options);
			  // override defaults that are dependent on each other
			  if (this.options.debug) {
			    this.options.logging = true;
			  }

			  // IE<9 so exit (I hate you, really)
			  if (!_eventListener) {
			    return;
			  }

			  // normalize some options
			  this.options.mandatory = this.options.mandatory && ( 'standalone' in window.navigator || this.options.debug );
			  this.options.modal = this.options.modal || this.options.mandatory;
			  if (this.options.mandatory) {
			    this.options.startDelay = -0.5;		// make the popup hasty
			  }
			  this.options.detectHomescreen = this.options.detectHomescreen === true ? 'hash' : this.options.detectHomescreen;

			  // setup the debug environment
			  if (this.options.debug) {
			    ath.isCompatible = true;
			    ath.OS = typeof this.options.debug == 'string' ? this.options.debug : ath.OS == 'unsupported' ? 'android' : ath.OS;
			    ath.OSVersion = ath.OS == 'ios' ? '8' : '4';
			  }

			  // the element the message will be appended to
			  this.container = document.documentElement;

			  // load session
			  this.session = this.getItem(this.options.appID);
			  this.session = this.session ? JSON.parse(this.session) : undefined;

			  // user most likely came from a direct link containing our token, we don't need it and we remove it
			  if (ath.hasToken && ( !ath.isCompatible || !this.session )) {
			    ath.hasToken = false;
			    _removeToken();
			  }

			  // the device is not supported
			  if (!ath.isCompatible) {
			    this.doLog("Add to homescreen: not displaying callout because device not supported");
			    return;
			  }

			  this.session = this.session || _defaultSession;

			  // check if we can use the local storage
			  try {
			    if (!localStorage) {
			      throw new Error('localStorage is not defined');
			    }

			    localStorage.setItem(this.options.appID, JSON.stringify(this.session));
			    ath.hasLocalStorage = true;
			  } catch (e) {
			    // we are most likely in private mode
			    ath.hasLocalStorage = false;

			    if (this.options.onPrivate) {
			      this.options.onPrivate.call(this);
			    }
			  }

			  // check if this is a valid location
			  var isValidLocation = !this.options.validLocation.length;
			  for (var i = this.options.validLocation.length; i--;) {
			    if (this.options.validLocation[i].test(document.location.href)) {
			      isValidLocation = true;
			      break;
			    }
			  }

			  // check compatibility with old versions of add to homescreen. Opt-out if an old session is found
			  if (this.getItem('addToHome')) {
			    this.optOut();
			  }

			  // critical errors:
			  if (this.session.optedout) {
			    this.doLog("Add to homescreen: not displaying callout because user opted out");
			    return;
			  }
			  if (this.session.added) {
			    this.doLog("Add to homescreen: not displaying callout because already added to the homescreen");
			    return;
			  }
			  if (!isValidLocation) {
			    this.doLog("Add to homescreen: not displaying callout because not a valid location");
			    return;
			  }

			  // check if the app is in stand alone mode
			  if (ath.isStandalone) {
			    // execute the onAdd event if we haven't already
			    if (!this.session.added) {
			      this.session.added = true;
			      this.updateSession();

			      if (this.options.onAdd && ath.hasLocalStorage) {	// double check on localstorage to avoid multiple calls to the custom event
			        this.options.onAdd.call(this);
			      }
			    }

			    this.doLog("Add to homescreen: not displaying callout because in standalone mode");
			    return;
			  }

			  // (try to) check if the page has been added to the homescreen
			  if (this.options.detectHomescreen) {
			    // the URL has the token, we are likely coming from the homescreen
			    if (ath.hasToken) {
			      _removeToken();		// we don't actually need the token anymore, we remove it to prevent redistribution

			      // this is called the first time the user opens the app from the homescreen
			      if (!this.session.added) {
			        this.session.added = true;
			        this.updateSession();

			        if (this.options.onAdd && ath.hasLocalStorage) {	// double check on localstorage to avoid multiple calls to the custom event
			          this.options.onAdd.call(this);
			        }
			      }

			      this.doLog("Add to homescreen: not displaying callout because URL has token, so we are likely coming from homescreen");
			      return;
			    }

			    // URL doesn't have the token, so add it
			    if (this.options.detectHomescreen == 'hash') {
			      history.replaceState('', window.document.title, document.location.href + '#ath');
			    } else if (this.options.detectHomescreen == 'smartURL') {
			      history.replaceState('', window.document.title, document.location.href.replace(/(\/)?$/, '/ath$1'));
			    } else {
			      history.replaceState('', window.document.title, document.location.href + (document.location.search ? '&' : '?' ) + 'ath=');
			    }
			  }

			  // check if this is a returning visitor
			  if (!this.session.returningVisitor) {
			    this.session.returningVisitor = true;
			    this.updateSession();

			    // we do not show the message if this is your first visit
			    if (this.options.skipFirstVisit) {
			      this.doLog("Add to homescreen: not displaying callout because skipping first visit");
			      return;
			    }
			  }

			  // we do no show the message in private mode
			  if (!this.options.privateModeOverride && !ath.hasLocalStorage) {
			    this.doLog("Add to homescreen: not displaying callout because browser is in private mode");
			    return;
			  }

			  // all checks passed, ready to display
			  this.ready = true;

			  if (this.options.onInit) {
			    this.options.onInit.call(this);
			  }

			  if (this.options.autostart) {
			    this.doLog("Add to homescreen: autostart displaying callout");
			    this.show();
			  }
			};

			ath.Class.prototype = {
			  // event type to method conversion
			  events: {
			    load: '_delayedShow',
			    error: '_delayedShow',
			    orientationchange: 'resize',
			    resize: 'resize',
			    scroll: 'resize',
			    click: 'remove',
			    touchmove: '_preventDefault',
			    transitionend: '_removeElements',
			    webkitTransitionEnd: '_removeElements',
			    MSTransitionEnd: '_removeElements'
			  },

			  handleEvent: function(e) {
			    var type = this.events[e.type];
			    if (type) {
			      this[type](e);
			    }
			  },

			  show: function(force) {
			    // in autostart mode wait for the document to be ready
			    if (this.options.autostart && !_DOMReady) {
			      setTimeout(this.show.bind(this), 50);
			      // we are not displaying callout because DOM not ready, but don't log that because
			      // it would log too frequently
			      return;
			    }

			    // message already on screen
			    if (this.shown) {
			      this.doLog("Add to homescreen: not displaying callout because already shown on screen");
			      return;
			    }

			    var now = Date.now();
			    var lastDisplayTime = this.session.lastDisplayTime;

			    if (force !== true) {
			      // this is needed if autostart is disabled and you programmatically call the show() method
			      if (!this.ready) {
			        this.doLog("Add to homescreen: not displaying callout because not ready");
			        return;
			      }

			      // we obey the display pace (prevent the message to popup too often)
			      if (now - lastDisplayTime < this.options.displayPace * 60000) {
			        this.doLog("Add to homescreen: not displaying callout because displayed recently");
			        return;
			      }

			      // obey the maximum number of display count
			      if (this.options.maxDisplayCount && this.session.displayCount >= this.options.maxDisplayCount) {
			        this.doLog("Add to homescreen: not displaying callout because displayed too many times already");
			        return;
			      }
			    }

			    this.shown = true;

			    // increment the display count
			    this.session.lastDisplayTime = now;
			    this.session.displayCount++;
			    this.updateSession();

			    // try to get the highest resolution application icon
			    if (!this.applicationIcon) {
			      if (ath.OS == 'ios') {
			        this.applicationIcon = document.querySelector('head link[rel^=apple-touch-icon][sizes="152x152"],head link[rel^=apple-touch-icon][sizes="144x144"],head link[rel^=apple-touch-icon][sizes="120x120"],head link[rel^=apple-touch-icon][sizes="114x114"],head link[rel^=apple-touch-icon]');
			      } else {
			        this.applicationIcon = document.querySelector('head link[rel^="shortcut icon"][sizes="196x196"],head link[rel^=apple-touch-icon]');
			      }
			    }

			    var message = '';

			    if (typeof this.options.message == 'object' && ath.language in this.options.message) {		// use custom language message
			      message = this.options.message[ath.language][ath.OS];
			    } else if (typeof this.options.message == 'object' && ath.OS in this.options.message) {		// use custom os message
			      message = this.options.message[ath.OS];
			    } else if (this.options.message in ath.intl) {				// you can force the locale
			      message = ath.intl[this.options.message][ath.OS];
			    } else if (this.options.message !== '') {						// use a custom message
			      message = this.options.message;
			    } else if (ath.OS in ath.intl[ath.language]) {				// otherwise we use our message
			      message = ath.intl[ath.language][ath.OS];
			    }

			    // add the action icon
			    message = '<p>' + message.replace('%icon', '<span class="ath-action-icon">icon</span>') + '</p>';

			    // create the message container
			    this.viewport = document.createElement('div');
			    this.viewport.className = 'ath-viewport';
			    if (this.options.modal) {
			      this.viewport.className += ' ath-modal';
			    }
			    if (this.options.mandatory) {
			      this.viewport.className += ' ath-mandatory';
			    }
			    this.viewport.style.position = 'absolute';

			    // create the actual message element
			    this.element = document.createElement('div');
			    this.element.className = 'ath-container ath-' + ath.OS + ' ath-' + ath.OS + (ath.OSVersion + '').substr(0, 1) + ' ath-' + (ath.isTablet ? 'tablet' : 'phone');
			    this.element.style.cssText = '-webkit-transition-property:-webkit-transform,opacity;-webkit-transition-duration:0s;-webkit-transition-timing-function:ease-out;transition-property:transform,opacity;transition-duration:0s;transition-timing-function:ease-out;';
			    this.element.style.webkitTransform = 'translate3d(0,-' + window.innerHeight + 'px,0)';
			    this.element.style.transform = 'translate3d(0,-' + window.innerHeight + 'px,0)';

			    // add the application icon
			    if (this.options.icon && this.applicationIcon) {
			      this.element.className += ' ath-icon';
			      this.img = document.createElement('img');
			      this.img.className = 'ath-application-icon';
			      this.img.addEventListener('load', this, false);
			      this.img.addEventListener('error', this, false);

			      this.img.src = this.applicationIcon.href;
			      this.element.appendChild(this.img);
			    }

			    this.element.innerHTML += message;

			    // we are not ready to show, place the message out of sight
			    this.viewport.style.left = '-99999em';

			    // attach all elements to the DOM
			    this.viewport.appendChild(this.element);
			    this.container.appendChild(this.viewport);

			    // if we don't have to wait for an image to load, show the message right away
			    if (this.img) {
			      this.doLog("Add to homescreen: not displaying callout because waiting for img to load");
			    } else {
			      this._delayedShow();
			    }
			  },

			  _delayedShow: function(e) {
			    setTimeout(this._show.bind(this), this.options.startDelay * 1000 + 500);
			  },

			  _show: function() {
			    var that = this;

			    // update the viewport size and orientation
			    this.updateViewport();

			    // reposition/resize the message on orientation change
			    window.addEventListener('resize', this, false);
			    window.addEventListener('scroll', this, false);
			    window.addEventListener('orientationchange', this, false);

			    if (this.options.modal) {
			      // lock any other interaction
			      document.addEventListener('touchmove', this, true);
			    }

			    // Enable closing after 1 second
			    if (!this.options.mandatory) {
			      setTimeout(function() {
			        that.element.addEventListener('click', that, true);
			      }, 1000);
			    }

			    // kick the animation
			    setTimeout(function() {
			      that.element.style.webkitTransitionDuration = '1.2s';
			      that.element.style.transitionDuration = '1.2s';
			      that.element.style.webkitTransform = 'translate3d(0,0,0)';
			      that.element.style.transform = 'translate3d(0,0,0)';
			    }, 0);

			    // set the destroy timer
			    if (this.options.lifespan) {
			      this.removeTimer = setTimeout(this.remove.bind(this), this.options.lifespan * 1000);
			    }

			    // fire the custom onShow event
			    if (this.options.onShow) {
			      this.options.onShow.call(this);
			    }
			  },

			  remove: function() {
			    clearTimeout(this.removeTimer);

			    // clear up the event listeners
			    if (this.img) {
			      this.img.removeEventListener('load', this, false);
			      this.img.removeEventListener('error', this, false);
			    }

			    window.removeEventListener('resize', this, false);
			    window.removeEventListener('scroll', this, false);
			    window.removeEventListener('orientationchange', this, false);
			    document.removeEventListener('touchmove', this, true);
			    this.element.removeEventListener('click', this, true);

			    // remove the message element on transition end
			    this.element.addEventListener('transitionend', this, false);
			    this.element.addEventListener('webkitTransitionEnd', this, false);
			    this.element.addEventListener('MSTransitionEnd', this, false);

			    // start the fade out animation
			    this.element.style.webkitTransitionDuration = '0.3s';
			    this.element.style.opacity = '0';
			  },

			  _removeElements: function() {
			    this.element.removeEventListener('transitionend', this, false);
			    this.element.removeEventListener('webkitTransitionEnd', this, false);
			    this.element.removeEventListener('MSTransitionEnd', this, false);

			    // remove the message from the DOM
			    this.container.removeChild(this.viewport);

			    this.shown = false;

			    // fire the custom onRemove event
			    if (this.options.onRemove) {
			      this.options.onRemove.call(this);
			    }
			  },

			  updateViewport: function() {
			    if (!this.shown) {
			      return;
			    }

			    this.viewport.style.width = window.innerWidth + 'px';
			    this.viewport.style.height = window.innerHeight + 'px';
			    this.viewport.style.left = window.scrollX + 'px';
			    this.viewport.style.top = window.scrollY + 'px';

			    var clientWidth = document.documentElement.clientWidth;

			    this.orientation = clientWidth > document.documentElement.clientHeight ? 'landscape' : 'portrait';

			    var screenWidth = ath.OS == 'ios' ? this.orientation == 'portrait' ? screen.width : screen.height : screen.width;
			    this.scale = screen.width > clientWidth ? 1 : screenWidth / window.innerWidth;

			    this.element.style.fontSize = this.options.fontSize / this.scale + 'px';
			  },

			  resize: function() {
			    clearTimeout(this.resizeTimer);
			    this.resizeTimer = setTimeout(this.updateViewport.bind(this), 100);
			  },

			  updateSession: function() {
			    if (ath.hasLocalStorage === false) {
			      return;
			    }

			    if (localStorage) {
			      localStorage.setItem(this.options.appID, JSON.stringify(this.session));
			    }
			  },

			  clearSession: function() {
			    this.session = _defaultSession;
			    this.updateSession();
			  },

			  getItem: function(item) {
			    try {
			      if (!localStorage) {
			        throw new Error('localStorage is not defined');
			      }

			      return localStorage.getItem(item);
			    } catch (e) {
			      // Preventing exception for some browsers when fetching localStorage key
			      ath.hasLocalStorage = false;
			    }
			  },

			  optOut: function() {
			    this.session.optedout = true;
			    this.updateSession();
			  },

			  optIn: function() {
			    this.session.optedout = false;
			    this.updateSession();
			  },

			  clearDisplayCount: function() {
			    this.session.displayCount = 0;
			    this.updateSession();
			  },

			  _preventDefault: function(e) {
			    e.preventDefault();
			    e.stopPropagation();
			  }
			};

			// utility
			function _extend(target, obj) {
			  for (var i in obj) {
			    target[i] = obj[i];
			  }

			  return target;
			}

			function _removeToken() {
			  if (document.location.hash == '#ath') {
			    history.replaceState('', window.document.title, document.location.href.split('#')[0]);
			  }

			  if (_reSmartURL.test(document.location.href)) {
			    history.replaceState('', window.document.title, document.location.href.replace(_reSmartURL, '$1'));
			  }

			  if (_reQueryString.test(document.location.search)) {
			    history.replaceState('', window.document.title, document.location.href.replace(_reQueryString, '$2'));
			  }
			}

			/* jshint +W101, +W106 */

			ath.VERSION = '3.2.2';

			module.exports = UI.addToHomescreen = ath;


		/***/ },
		/* 5 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);

			/**
			 * @via https://github.com/Minwe/bootstrap/blob/master/js/alert.js
			 * @copyright Copyright 2013 Twitter, Inc.
			 * @license Apache 2.0
			 */

			// Alert Class
			// NOTE: removeElement option is unavailable now
			var Alert = function(element, options) {
			  var _this = this;
			  this.options = $.extend({}, Alert.DEFAULTS, options);
			  this.$element = $(element);

			  this.$element
			    .addClass('cui-fade cui-in')
			    .on('click.alert.amui', '.cui-close', function() {
			      _this.close();
			    });
			};

			Alert.DEFAULTS = {
			  removeElement: true
			};

			Alert.prototype.close = function() {
			  var $element = this.$element;

			  $element.trigger('close.alert.amui').removeClass('cui-in');

			  function processAlert() {
			    $element.trigger('closed.alert.amui').remove();
			  }

			  UI.support.transition && $element.hasClass('cui-fade') ?
			    $element
			      .one(UI.support.transition.end, processAlert)
			      .emulateTransitionEnd(200) :
			    processAlert();
			};

			// plugin
			UI.plugin('alert', Alert);

			// Init code
			$(document).on('click.alert.amui.data-api', '[data-cui-alert]', function(e) {
			  var $target = $(e.target);
			  $target.is('.cui-close') && $(this).alert('close');
			});

			module.exports = Alert;


		/***/ },
		/* 6 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);

			/**
			 * @via https://github.com/twbs/bootstrap/blob/master/js/button.js
			 * @copyright (c) 2011-2014 Twitter, Inc
			 * @license The MIT License
			 */

			var Button = function(element, options) {
			  this.$element = $(element);
			  this.options = $.extend({}, Button.DEFAULTS, options);
			  this.isLoading = false;
			  this.hasSpinner = false;
			};

			Button.DEFAULTS = {
			  loadingText: 'loading...',
			  disabledClassName: 'cui-disabled',
			  activeClassName: 'cui-active',
			  spinner: undefined
			};

			Button.prototype.setState = function(state, stateText) {
			  var $element = this.$element;
			  var disabled = 'disabled';
			  var data = $element.data();
			  var options = this.options;
			  var val = $element.is('input') ? 'val' : 'html';
			  var stateClassName = 'cui-btn-' + state + ' ' + options.disabledClassName;

			  state += 'Text';

			  if (!options.resetText) {
			    options.resetText = $element[val]();
			  }

			  // add spinner for element with html()
			  if (UI.support.animation && options.spinner &&
			    val === 'html' && !this.hasSpinner) {
			    options.loadingText = '<span class="cui-icon-' + options.spinner +
			      ' cui-icon-spin"></span>' + options.loadingText;

			    this.hasSpinner = true;
			  }

			  stateText = stateText ||
			    (data[state] === undefined ? options[state] : data[state]);

			  $element[val](stateText);

			  // push to event loop to allow forms to submit
			  setTimeout($.proxy(function() {
			    // TODO: add stateClass for other states
			    if (state === 'loadingText') {
			      $element.addClass(stateClassName).attr(disabled, disabled);
			      this.isLoading = true;
			    } else if (this.isLoading) {
			      $element.removeClass(stateClassName).removeAttr(disabled);
			      this.isLoading = false;
			    }
			  }, this), 0);
			};

			Button.prototype.toggle = function() {
			  var changed = true;
			  var $element = this.$element;
			  var $parent = this.$element.parent('[class*="cui-btn-group"]');
			  var activeClassName = Button.DEFAULTS.activeClassName;

			  if ($parent.length) {
			    var $input = this.$element.find('input');

			    if ($input.prop('type') == 'radio') {
			      if ($input.prop('checked') && $element.hasClass(activeClassName)) {
			        changed = false;
			      } else {
			        $parent.find('.' + activeClassName).removeClass(activeClassName);
			      }
			    }

			    if (changed) {
			      $input.prop('checked',
			        !$element.hasClass(activeClassName)).trigger('change');
			    }
			  }

			  if (changed) {
			    $element.toggleClass(activeClassName);
			    if (!$element.hasClass(activeClassName)) {
			      $element.blur();
			    }
			  }
			};

			UI.plugin('button', Button, {
			  dataOptions: 'data-cui-loading',
			  methodCall: function(args, instance) {
			    if (args[0] === 'toggle') {
			      instance.toggle();
			    } else if (typeof args[0] === 'string') {
			      instance.setState.apply(instance, args);
			    }
			  }
			});

			// Init code
			$(document).on('click.button.amui.data-api', '[data-cui-button]', function(e) {
			  e.preventDefault();
			  var $btn = $(e.target);

			  if (!$btn.hasClass('cui-btn')) {
			    $btn = $btn.closest('.cui-btn');
			  }

			  $btn.button('toggle');
			});

			UI.ready(function(context) {
			  $('[data-cui-loading]', context).button();

			  // resolves #866
			  $('[data-cui-button]', context).find('input:checked').each(function() {
			    $(this).parent('label').addClass(Button.DEFAULTS.activeClassName);
			  });
			});

			module.exports = UI.button = Button;


		/***/ },
		/* 7 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);

			/**
			 * @via https://github.com/twbs/bootstrap/blob/master/js/collapse.js
			 * @copyright (c) 2011-2014 Twitter, Inc
			 * @license The MIT License
			 */

			var Collapse = function(element, options) {
			  this.$element = $(element);
			  this.options = $.extend({}, Collapse.DEFAULTS, options);
			  this.transitioning = null;

			  if (this.options.parent) {
			    this.$parent = $(this.options.parent);
			  }

			  if (this.options.toggle) {
			    this.toggle();
			  }
			};

			Collapse.DEFAULTS = {
			  toggle: true
			};

			Collapse.prototype.open = function() {
			  if (this.transitioning || this.$element.hasClass('cui-in')) {
			    return;
			  }

			  var startEvent = $.Event('open.collapse.amui');
			  this.$element.trigger(startEvent);

			  if (startEvent.isDefaultPrevented()) {
			    return;
			  }

			  var actives = this.$parent && this.$parent.find('> .cui-panel > .cui-in');

			  if (actives && actives.length) {
			    var hasData = actives.data('amui.collapse');

			    if (hasData && hasData.transitioning) {
			      return;
			    }

			    Plugin.call(actives, 'close');

			    hasData || actives.data('amui.collapse', null);
			  }

			  this.$element
			    .removeClass('cui-collapse')
			    .addClass('cui-collapsing').height(0);

			  this.transitioning = 1;

			  var complete = function() {
			    this.$element
			      .removeClass('cui-collapsing')
			      .addClass('cui-collapse cui-in')
			      .height('')
			      .trigger('opened.collapse.amui');
			    this.transitioning = 0;
			  };

			  if (!UI.support.transition) {
			    return complete.call(this);
			  }

			  var scrollHeight = this.$element[0].scrollHeight;

			  this.$element
			    .one(UI.support.transition.end, $.proxy(complete, this))
			    .emulateTransitionEnd(300)
			    .css({height: scrollHeight}); // 当折叠的容器有 padding 时，如果用 height() 只能设置内容的宽度
			};

			Collapse.prototype.close = function() {
			  if (this.transitioning || !this.$element.hasClass('cui-in')) {
			    return;
			  }

			  var startEvent = $.Event('close.collapse.amui');
			  this.$element.trigger(startEvent);

			  if (startEvent.isDefaultPrevented()) {
			    return;
			  }

			  this.$element.height(this.$element.height()).redraw();

			  this.$element.addClass('cui-collapsing').
			    removeClass('cui-collapse cui-in');

			  this.transitioning = 1;

			  var complete = function() {
			    this.transitioning = 0;
			    this.$element
			      .trigger('closed.collapse.amui')
			      .removeClass('cui-collapsing')
			      .addClass('cui-collapse');
			    // css({height: '0'});
			  };

			  if (!UI.support.transition) {
			    return complete.call(this);
			  }

			  this.$element.height(0)
			    .one(UI.support.transition.end, $.proxy(complete, this))
			    .emulateTransitionEnd(300);
			};

			Collapse.prototype.toggle = function() {
			  this[this.$element.hasClass('cui-in') ? 'close' : 'open']();
			};

			// Collapse Plugin
			function Plugin(option) {
			  return this.each(function() {
			    var $this = $(this);
			    var data = $this.data('amui.collapse');
			    var options = $.extend({}, Collapse.DEFAULTS,
			      UI.utils.options($this.attr('data-cui-collapse')),
			      typeof option == 'object' && option);

			    if (!data && options.toggle && option === 'open') {
			      option = !option;
			    }

			    if (!data) {
			      $this.data('amui.collapse', (data = new Collapse(this, options)));
			    }

			    if (typeof option == 'string') {
			      data[option]();
			    }
			  });
			}

			$.fn.collapse = Plugin;

			// Init code
			$(document).on('click.collapse.amui.data-api', '[data-cui-collapse]',
			  function(e) {
			    var href;
			    var $this = $(this);
			    var options = UI.utils.options($this.attr('data-cui-collapse'));
			    var target = options.target ||
			      e.preventDefault() ||
			      (href = $this.attr('href')) &&
			      href.replace(/.*(?=#[^\s]+$)/, '');
			    var $target = $(target);
			    var data = $target.data('amui.collapse');
			    var option = data ? 'toggle' : options;
			    var parent = options.parent;
			    var $parent = parent && $(parent);

			    if (!data || !data.transitioning) {
			      if ($parent) {
			        // '[data-am-collapse*="{parent: \'' + parent + '"]
			        $parent.find('[data-cui-collapse]').not($this).addClass('cui-collapsed');
			      }

			      $this[$target.hasClass('cui-in') ?
			        'addClass' : 'removeClass']('cui-collapsed');
			    }

			    Plugin.call($target, option);
			  });

			module.exports = UI.collapse = Collapse;

			// TODO: 更好的 target 选择方式
			//       折叠的容器必须没有 border/padding 才能正常处理，否则动画会有一些小问题
			//       寻找更好的未知高度 transition 动画解决方案，max-height 之类的就算了


		/***/ },
		/* 8 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			var $doc = $(document);

			/**
			 * bootstrap-datepicker.js
			 * @via http://www.eyecon.ro/bootstrap-datepicker
			 * @license http://www.apache.org/licenses/LICENSE-2.0
			 */
			var Datepicker = function(element, options) {
			  this.$element = $(element);
			  this.options = $.extend({}, Datepicker.DEFAULTS, options);
			  this.format = DPGlobal.parseFormat(this.options.format);

			  this.$element.data('date', this.options.date);
			  this.language = this.getLocale(this.options.locale);
			  this.theme = this.options.theme;
			  this.$picker = $(DPGlobal.template).appendTo('body').on({
			    click: $.proxy(this.click, this)
			    // mousedown: $.proxy(this.mousedown, this)
			  });

			  this.isInput = this.$element.is('input');
			  this.component = this.$element.is('.cui-datepicker-date') ?
			    this.$element.find('.cui-datepicker-add-on') : false;

			  if (this.isInput) {
			    this.$element.on({
			      'click.datepicker.amui': $.proxy(this.open, this),
			      // blur: $.proxy(this.close, this),
			      'keyup.datepicker.amui': $.proxy(this.update, this)
			    });
			  } else {
			    if (this.component) {
			      this.component.on('click.datepicker.amui', $.proxy(this.open, this));
			    } else {
			      this.$element.on('click.datepicker.amui', $.proxy(this.open, this));
			    }
			  }

			  this.minViewMode = this.options.minViewMode;

			  if (typeof this.minViewMode === 'string') {
			    switch (this.minViewMode) {
			      case 'months':
			        this.minViewMode = 1;
			        break;
			      case 'years':
			        this.minViewMode = 2;
			        break;
			      default:
			        this.minViewMode = 0;
			        break;
			    }
			  }

			  this.viewMode = this.options.viewMode;

			  if (typeof this.viewMode === 'string') {
			    switch (this.viewMode) {
			      case 'months':
			        this.viewMode = 1;
			        break;
			      case 'years':
			        this.viewMode = 2;
			        break;
			      default:
			        this.viewMode = 0;
			        break;
			    }
			  }

			  this.startViewMode = this.viewMode;
			  this.weekStart = ((this.options.weekStart ||
			  Datepicker.locales[this.language].weekStart || 0) % 7);
			  this.weekEnd = ((this.weekStart + 6) % 7);
			  this.onRender = this.options.onRender;

			  this.setTheme();
			  this.fillDow();
			  this.fillMonths();
			  this.update();
			  this.showMode();
			};

			Datepicker.DEFAULTS = {
			  locale: 'zh_CN',
			  format: 'yyyy-mm-dd',
			  weekStart: undefined,
			  viewMode: 0,
			  minViewMode: 0,
			  date: '',
			  theme: '',
			  autoClose: 1,
			  onRender: function(date) {
			    return '';
			  }
			};

			Datepicker.prototype.open = function(e) {
			  this.$picker.show();
			  this.height = this.component ?
			    this.component.outerHeight() : this.$element.outerHeight();

			  this.place();
			  $(window).on('resize.datepicker.amui', $.proxy(this.place, this));
			  if (e) {
			    e.stopPropagation();
			    e.preventDefault();
			  }
			  var that = this;
			  $doc.on('mousedown.datapicker.amui touchstart.datepicker.amui', function(ev) {
			    if ($(ev.target).closest('.cui-datepicker').length === 0) {
			      that.close();
			    }
			  });
			  this.$element.trigger({
			    type: 'open.datepicker.amui',
			    date: this.date
			  });
			};

			Datepicker.prototype.close = function() {
			  this.$picker.hide();
			  $(window).off('resize.datepicker.amui', this.place);
			  this.viewMode = this.startViewMode;
			  this.showMode();
			  if (!this.isInput) {
			    $(document).off('mousedown.datapicker.amui touchstart.datepicker.amui',
			      this.close);
			  }
			  // this.set();
			  this.$element.trigger({
			    type: 'close.datepicker.amui',
			    date: this.date
			  });
			};

			Datepicker.prototype.set = function() {
			  var formatted = DPGlobal.formatDate(this.date, this.format);
			  var $input;

			  if (!this.isInput) {
			    if (this.component) {
			      $input = this.$element.find('input').attr('value', formatted);
			    }

			    this.$element.data('date', formatted);
			  } else {
			    $input = this.$element.attr('value', formatted);
			  }

			  // fixes https://github.com/amazeui/amazeui/issues/711
			  $input && $input.trigger('change');
			};

			Datepicker.prototype.setValue = function(newDate) {
			  if (typeof newDate === 'string') {
			    this.date = DPGlobal.parseDate(newDate, this.format);
			  } else {
			    this.date = new Date(newDate);
			  }
			  this.set();

			  this.viewDate = new Date(this.date.getFullYear(),
			    this.date.getMonth(), 1, 0, 0, 0, 0);

			  this.fill();
			};

			Datepicker.prototype.place = function() {
			  var offset = this.component ?
			    this.component.offset() : this.$element.offset();
			  var $width = this.component ?
			    this.component.width() : this.$element.width();
			  var top = offset.top + this.height;
			  var left = offset.left;
			  var right = $doc.width() - offset.left - $width;
			  var isOutView = this.isOutView();

			  this.$picker.removeClass('cui-datepicker-right');
			  this.$picker.removeClass('cui-datepicker-up');

			  if ($doc.width() > 640) {
			    if (isOutView.outRight) {
			      this.$picker.addClass('cui-datepicker-right');
			      this.$picker.css({
			        top: top,
			        left: 'auto',
			        right: right
			      });
			      return;
			    }
			    if (isOutView.outBottom) {
			      this.$picker.addClass('cui-datepicker-up');
			      top = offset.top - this.$picker.outerHeight(true);
			    }
			  } else {
			    left = 0;
			  }

			  this.$picker.css({
			    top: top,
			    left: left
			  });
			};

			Datepicker.prototype.update = function(newDate) {
			  this.date = DPGlobal.parseDate(
			    typeof newDate === 'string' ? newDate : (this.isInput ?
			      this.$element.prop('value') : this.$element.data('date')),
			    this.format
			  );
			  this.viewDate = new Date(this.date.getFullYear(),
			    this.date.getMonth(), 1, 0, 0, 0, 0);
			  this.fill();
			};

			// Days of week
			Datepicker.prototype.fillDow = function() {
			  var dowCount = this.weekStart;
			  var html = '<tr>';
			  while (dowCount < this.weekStart + 7) {
			    // NOTE: do % then add 1
			    html += '<th class="cui-datepicker-dow">' +
			    Datepicker.locales[this.language].daysMin[(dowCount++) % 7] +
			    '</th>';
			  }
			  html += '</tr>';

			  this.$picker.find('.cui-datepicker-days thead').append(html);
			};

			Datepicker.prototype.fillMonths = function() {
			  var html = '';
			  var i = 0;
			  while (i < 12) {
			    html += '<span class="cui-datepicker-month">' +
			    Datepicker.locales[this.language].monthsShort[i++] + '</span>';
			  }
			  this.$picker.find('.cui-datepicker-months td').append(html);
			};

			Datepicker.prototype.fill = function() {
			  var d = new Date(this.viewDate);
			  var year = d.getFullYear();
			  var month = d.getMonth();
			  var currentDate = this.date.valueOf();

			  var prevMonth = new Date(year, month - 1, 28, 0, 0, 0, 0);
			  var day = DPGlobal
			    .getDaysInMonth(prevMonth.getFullYear(), prevMonth.getMonth());

			  var daysSelect = this.$picker
			    .find('.cui-datepicker-days .cui-datepicker-select');

			  if (this.language === 'zh_CN') {
			    daysSelect.text(year + Datepicker.locales[this.language].year[0] +
			    ' ' + Datepicker.locales[this.language].months[month]);
			  } else {
			    daysSelect.text(Datepicker.locales[this.language].months[month] +
			    ' ' + year);
			  }

			  prevMonth.setDate(day);
			  prevMonth.setDate(day - (prevMonth.getDay() - this.weekStart + 7) % 7);

			  var nextMonth = new Date(prevMonth);
			  nextMonth.setDate(nextMonth.getDate() + 42);
			  nextMonth = nextMonth.valueOf();
			  var html = [];

			  var className;
			  var prevY;
			  var prevM;

			  while (prevMonth.valueOf() < nextMonth) {
			    if (prevMonth.getDay() === this.weekStart) {
			      html.push('<tr>');
			    }

			    className = this.onRender(prevMonth, 0);
			    prevY = prevMonth.getFullYear();
			    prevM = prevMonth.getMonth();

			    if ((prevM < month && prevY === year) || prevY < year) {
			      className += ' cui-datepicker-old';
			    } else if ((prevM > month && prevY === year) || prevY > year) {
			      className += ' cui-datepicker-new';
			    }

			    if (prevMonth.valueOf() === currentDate) {
			      className += ' cui-active';
			    }
			    html.push('<td class="cui-datepicker-day ' +
			    className + '">' + prevMonth.getDate() + '</td>');

			    if (prevMonth.getDay() === this.weekEnd) {
			      html.push('</tr>');
			    }

			    prevMonth.setDate(prevMonth.getDate() + 1);
			  }

			  this.$picker.find('.cui-datepicker-days tbody')
			    .empty().append(html.join(''));

			  var currentYear = this.date.getFullYear();
			  var months = this.$picker.find('.cui-datepicker-months')
			    .find('.cui-datepicker-select')
			    .text(year);
			  months = months.end()
			    .find('span').removeClass('cui-active').removeClass('cui-disabled');

			  var monthLen = 0;

			  while (monthLen < 12) {
			    if (this.onRender(d.setFullYear(year, monthLen), 1)) {
			      months.eq(monthLen).addClass('cui-disabled');
			    }
			    monthLen++;
			  }

			  if (currentYear === year) {
			    months.eq(this.date.getMonth())
			        .removeClass('cui-disabled')
			        .addClass('cui-active');
			  }

			  html = '';
			  year = parseInt(year / 10, 10) * 10;
			  var yearCont = this.$picker
			    .find('.cui-datepicker-years')
			    .find('.cui-datepicker-select')
			    .text(year + '-' + (year + 9))
			    .end()
			    .find('td');
			  var yearClassName;
			  // fixes https://github.com/amazeui/amazeui/issues/770
			  // maybe not need now
			  var viewDate = new Date(this.viewDate);

			  year -= 1;

			  for (var i = -1; i < 11; i++) {
			    yearClassName = this.onRender(viewDate.setFullYear(year), 2);
			    html += '<span class="' + yearClassName + '' +
			    (i === -1 || i === 10 ? ' cui-datepicker-old' : '') +
			    (currentYear === year ? ' cui-active' : '') + '">' + year + '</span>';
			    year += 1;
			  }
			  yearCont.html(html);
			};

			Datepicker.prototype.click = function(event) {
			  event.stopPropagation();
			  event.preventDefault();
			  var month;
			  var year;
			  var $dayActive = this.$picker.find('.cui-datepicker-days').find('.cui-active');
			  var $months = this.$picker.find('.cui-datepicker-months');
			  var $monthIndex = $months.find('.cui-active').index();

			  var $target = $(event.target).closest('span, td, th');
			  if ($target.length === 1) {
			    switch ($target[0].nodeName.toLowerCase()) {
			      case 'th':
			        switch ($target[0].className) {
			          case 'cui-datepicker-switch':
			            this.showMode(1);
			            break;
			          case 'cui-datepicker-prev':
			          case 'cui-datepicker-next':
			            this.viewDate['set' + DPGlobal.modes[this.viewMode].navFnc].call(
			              this.viewDate,
			              this.viewDate
			                ['get' + DPGlobal.modes[this.viewMode].navFnc]
			                .call(this.viewDate) +
			              DPGlobal.modes[this.viewMode].navStep *
			              ($target[0].className === 'cui-datepicker-prev' ? -1 : 1)
			            );
			            this.fill();
			            this.set();
			            break;
			        }
			        break;
			      case 'span':
			        if ($target.is('.cui-disabled')) {
			          return;
			        }

			        if ($target.is('.cui-datepicker-month')) {
			          month = $target.parent().find('span').index($target);

			          if ($target.is('.cui-active')) {
			            this.viewDate.setMonth(month, $dayActive.text());
			          } else {
			            this.viewDate.setMonth(month);
			          }

			        } else {
			          year = parseInt($target.text(), 10) || 0;
			          if ($target.is('.cui-active')) {
			            this.viewDate.setFullYear(year, $monthIndex, $dayActive.text());
			          } else {
			            this.viewDate.setFullYear(year);
			          }

			        }

			        if (this.viewMode !== 0) {
			          this.date = new Date(this.viewDate);
			          this.$element.trigger({
			            type: 'changeDate.datepicker.amui',
			            date: this.date,
			            viewMode: DPGlobal.modes[this.viewMode].clsName
			          });
			        }

			        this.showMode(-1);
			        this.fill();
			        this.set();
			        break;
			      case 'td':
			        if ($target.is('.cui-datepicker-day') && !$target.is('.cui-disabled')) {
			          var day = parseInt($target.text(), 10) || 1;
			          month = this.viewDate.getMonth();
			          if ($target.is('.cui-datepicker-old')) {
			            month -= 1;
			          } else if ($target.is('.cui-datepicker-new')) {
			            month += 1;
			          }
			          year = this.viewDate.getFullYear();
			          this.date = new Date(year, month, day, 0, 0, 0, 0);
			          this.viewDate = new Date(year, month, Math.min(28, day), 0, 0, 0, 0);
			          this.fill();
			          this.set();
			          this.$element.trigger({
			            type: 'changeDate.datepicker.amui',
			            date: this.date,
			            viewMode: DPGlobal.modes[this.viewMode].clsName
			          });

			          this.options.autoClose && this.close();
			        }
			        break;
			    }
			  }
			};

			Datepicker.prototype.mousedown = function(event) {
			  event.stopPropagation();
			  event.preventDefault();
			};

			Datepicker.prototype.showMode = function(dir) {
			  if (dir) {
			    this.viewMode = Math.max(this.minViewMode,
			      Math.min(2, this.viewMode + dir));
			  }

			  this.$picker.find('>div').hide().
			    filter('.cui-datepicker-' + DPGlobal.modes[this.viewMode].clsName).show();
			};

			Datepicker.prototype.isOutView = function() {
			  var offset = this.component ?
			    this.component.offset() : this.$element.offset();
			  var isOutView = {
			    outRight: false,
			    outBottom: false
			  };
			  var $picker = this.$picker;
			  var width = offset.left + $picker.outerWidth(true);
			  var height = offset.top + $picker.outerHeight(true) +
			    this.$element.innerHeight();

			  if (width > $doc.width()) {
			    isOutView.outRight = true;
			  }
			  if (height > $doc.height()) {
			    isOutView.outBottom = true;
			  }
			  return isOutView;
			};

			Datepicker.prototype.getLocale = function(locale) {
			  if (!locale) {
			    locale = navigator.language && navigator.language.split('-');
			    locale[1] = locale[1].toUpperCase();
			    locale = locale.join('_');
			  }

			  if (!Datepicker.locales[locale]) {
			    locale = 'en_US';
			  }
			  return locale;
			};

			Datepicker.prototype.setTheme = function() {
			  if (this.theme) {
			    this.$picker.addClass('cui-datepicker-' + this.theme);
			  }
			};

			// Datepicker locales
			Datepicker.locales = {
			  en_US: {
			    days: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
			      'Friday', 'Saturday'],
			    daysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
			    daysMin: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
			    months: ['January', 'February', 'March', 'April', 'May', 'June',
			      'July', 'August', 'September', 'October', 'November', 'December'],
			    monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
			      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			    weekStart: 0
			  },
			  zh_CN: {
			    days: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
			    daysShort: ['周日', '周一', '周二', '周三', '周四', '周五', '周六'],
			    daysMin: ['日', '一', '二', '三', '四', '五', '六'],
			    months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月',
			      '八月', '九月', '十月', '十一月', '十二月'],
			    monthsShort: ['一月', '二月', '三月', '四月', '五月', '六月',
			      '七月', '八月', '九月', '十月', '十一月', '十二月'],
			    weekStart: 1,
			    year: ['年']
			  }
			};

			var DPGlobal = {
			  modes: [
			    {
			      clsName: 'days',
			      navFnc: 'Month',
			      navStep: 1
			    },
			    {
			      clsName: 'months',
			      navFnc: 'FullYear',
			      navStep: 1
			    },
			    {
			      clsName: 'years',
			      navFnc: 'FullYear',
			      navStep: 10
			    }
			  ],

			  isLeapYear: function(year) {
			    return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
			  },

			  getDaysInMonth: function(year, month) {
			    return [31, (DPGlobal.isLeapYear(year) ? 29 : 28),
			      31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
			  },

			  parseFormat: function(format) {
			    var separator = format.match(/[.\/\-\s].*?/);
			    var parts = format.split(/\W+/);

			    if (!separator || !parts || parts.length === 0) {
			      throw new Error('Invalid date format.');
			    }

			    return {
			      separator: separator,
			      parts: parts
			    };
			  },

			  parseDate: function(date, format) {
			    var parts = date.split(format.separator);
			    var val;
			    date = new Date();

			    date.setHours(0);
			    date.setMinutes(0);
			    date.setSeconds(0);
			    date.setMilliseconds(0);

			    if (parts.length === format.parts.length) {
			      var year = date.getFullYear();
			      var day = date.getDate();
			      var month = date.getMonth();

			      for (var i = 0, cnt = format.parts.length; i < cnt; i++) {
			        val = parseInt(parts[i], 10) || 1;
			        switch (format.parts[i]) {
			          case 'dd':
			          case 'd':
			            day = val;
			            date.setDate(val);
			            break;
			          case 'mm':
			          case 'm':
			            month = val - 1;
			            date.setMonth(val - 1);
			            break;
			          case 'yy':
			            year = 2000 + val;
			            date.setFullYear(2000 + val);
			            break;
			          case 'yyyy':
			            year = val;
			            date.setFullYear(val);
			            break;
			        }
			      }
			      date = new Date(year, month, day, 0, 0, 0);
			    }
			    return date;
			  },

			  formatDate: function(date, format) {
			    var val = {
			      d: date.getDate(),
			      m: date.getMonth() + 1,
			      yy: date.getFullYear().toString().substring(2),
			      yyyy: date.getFullYear()
			    };
			    var dateArray = [];

			    val.dd = (val.d < 10 ? '0' : '') + val.d;
			    val.mm = (val.m < 10 ? '0' : '') + val.m;

			    for (var i = 0, cnt = format.parts.length; i < cnt; i++) {
			      dateArray.push(val[format.parts[i]]);
			    }
			    return dateArray.join(format.separator);
			  },

			  headTemplate: '<thead>' +
			  '<tr class="cui-datepicker-header">' +
			  '<th class="cui-datepicker-prev">' +
			  '<i class="cui-datepicker-prev-icon"></i></th>' +
			  '<th colspan="5" class="cui-datepicker-switch">' +
			  '<div class="cui-datepicker-select"></div></th>' +
			  '<th class="cui-datepicker-next"><i class="cui-datepicker-next-icon"></i>' +
			  '</th></tr></thead>',

			  contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>'
			};

			DPGlobal.template = '<div class="cui-datepicker cui-datepicker-dropdown">' +
			'<div class="cui-datepicker-caret"></div>' +
			'<div class="cui-datepicker-days">' +
			'<table class="cui-datepicker-table">' +
			DPGlobal.headTemplate +
			'<tbody></tbody>' +
			'</table>' +
			'</div>' +
			'<div class="cui-datepicker-months">' +
			'<table class="cui-datepicker-table">' +
			DPGlobal.headTemplate +
			DPGlobal.contTemplate +
			'</table>' +
			'</div>' +
			'<div class="cui-datepicker-years">' +
			'<table class="cui-datepicker-table">' +
			DPGlobal.headTemplate +
			DPGlobal.contTemplate +
			'</table>' +
			'</div>' +
			'</div>';

			// jQuery plugin
			UI.plugin('datepicker', Datepicker);

			// Init code
			UI.ready(function(context) {
			  $('[data-cui-datepicker]').datepicker();
			});

			module.exports = UI.datepicker = Datepicker;

			// TODO: 1. 载入动画
			//       2. less 优化


		/***/ },
		/* 9 调光器*/
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			var $doc = $(document);
			var transition = UI.support.transition;

			var Dimmer = function() {
			  this.id = UI.utils.generateGUID('cui-dimmer');
			  this.$element = $(Dimmer.DEFAULTS.tpl, {
			    id: this.id
			  });

			  this.inited = false;
			  this.scrollbarWidth = 0;
			  this.$used = $([]);
			};

			Dimmer.DEFAULTS = {
			  tpl: '<div class="cui-dimmer" data-cui-dimmer></div>'
			};

			Dimmer.prototype.init = function() {
			  if (!this.inited) {
			    $(document.body).append(this.$element);
			    this.inited = true;
			    $doc.trigger('init.dimmer.amui');
			    this.$element.on('touchmove.dimmer.amui', function(e) {
			      e.preventDefault();
			    });
			  }

			  return this;
			};

			Dimmer.prototype.open = function(relatedElement) {
			  if (!this.inited) {
			    this.init();
			  }

			  var $element = this.$element;

			  // 用于多重调用
			  if (relatedElement) {
			    this.$used = this.$used.add($(relatedElement));
			  }

			  this.checkScrollbar().setScrollbar();

			  $element.show().trigger('open.dimmer.amui');

			  transition && $element.off(transition.end);

			  setTimeout(function() {
			    $element.addClass('cui-active');
			  }, 0);

			  return this;
			};

			Dimmer.prototype.close = function(relatedElement, force) {
			  this.$used = this.$used.not($(relatedElement));

			  if (!force && this.$used.length) {
			    return this;
			  }

			  var $element = this.$element;

			  $element.removeClass('cui-active').trigger('close.dimmer.amui');

			  function complete() {
			    $element.hide();
			    this.resetScrollbar();
			  }

			  // transition ? $element.one(transition.end, $.proxy(complete, this)) :
			  complete.call(this);

			  return this;
			};

			Dimmer.prototype.checkScrollbar = function() {
			  this.scrollbarWidth = UI.utils.measureScrollbar();

			  return this;
			};

			Dimmer.prototype.setScrollbar = function() {
			  var $body = $(document.body);
			  var bodyPaddingRight = parseInt(($body.css('padding-right') || 0), 10);

			  if (this.scrollbarWidth) {
			    $body.css('padding-right', bodyPaddingRight + this.scrollbarWidth);
			  }

			  $body.addClass('cui-dimmer-active');

			  return this;
			};

			Dimmer.prototype.resetScrollbar = function() {
			  $(document.body).css('padding-right', '').removeClass('cui-dimmer-active');

			  return this;
			};

			module.exports = UI.dimmer = new Dimmer();


		/***/ },
		/* 10 下拉菜单*/
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			var animation = UI.support.animation;

			/**
			 * @via https://github.com/Minwe/bootstrap/blob/master/js/dropdown.js
			 * @copyright (c) 2011-2014 Twitter, Inc
			 * @license The MIT License
			 */

			// var toggle = '[data-am-dropdown] > .am-dropdown-toggle';

			var Dropdown = function(element, options) {
			  this.options = $.extend({}, Dropdown.DEFAULTS, options);

			  options = this.options;

			  this.$element = $(element);
			  this.$toggle = this.$element.find(options.selector.toggle);
			  this.$dropdown = this.$element.find(options.selector.dropdown);
			  this.$boundary = (options.boundary === window) ? $(window) :
			    this.$element.closest(options.boundary);
			  this.$justify = (options.justify && $(options.justify).length &&
			  $(options.justify)) || undefined;

			  !this.$boundary.length && (this.$boundary = $(window));

			  this.active = this.$element.hasClass('cui-active') ? true : false;
			  //console.log(this.active);
			  this.animating = null;

			  this.events();
			};

			Dropdown.DEFAULTS = {
			  animation: 'cui-animation-slide-top-fixed',
			  boundary: window,
			  justify: undefined,
			  selector: {
			    dropdown: '.cui-dropdown-content',
			    toggle: '.cui-dropdown-toggle'
			  },
			  trigger: 'click'
			};

			Dropdown.prototype.toggle = function() {
			  this.clear();
			  //console.log('toggle');
			  if (this.animating) {
			    return;
			  }
			  
			
			  this[this.active ? 'close' : 'open']();
			};

			Dropdown.prototype.open = function(e) {

			  //console.log('open');
			  var $toggle = this.$toggle;
			  var $element = this.$element;
			  var $dropdown = this.$dropdown;

			  if ($toggle.is('.cui-disabled, :disabled')) {
			    return;
			  }

			  if (this.active) {
			    return;
			  }

			  $element.trigger('open.dropdown.amui').addClass('cui-active');

			  $toggle.trigger('focus');

			  this.checkDimensions(e);

			  var complete = $.proxy(function() {
			    $element.trigger('opened.dropdown.amui');
			    this.active = true;
			    this.animating = 0;
			  }, this);

			  if (animation) {
			    this.animating = 1;
			    $dropdown.addClass(this.options.animation).
			      on(animation.end + '.open.dropdown.amui', $.proxy(function() {
			        complete();
			        $dropdown.removeClass(this.options.animation);
			      }, this));
			  } else {
			    complete();
			  }
			};

			Dropdown.prototype.close = function() {
			  if (!this.active) {
			    return;
			  }
			  console.log('close');
			  // fix #165
			  // var animationName = this.options.animation + ' am-animation-reverse';
			  var animationName = 'cui-dropdown-animation';
			  var $element = this.$element;
			  var $dropdown = this.$dropdown;

			  $element.trigger('close.dropdown.amui');

			  var complete = $.proxy(function complete() {
			    $element.
			      removeClass('cui-active').
			      trigger('closed.dropdown.amui');
			    this.active = false;
			    this.animating = 0;
			    this.$toggle.blur();
			  }, this);

			  if (animation) {
			    $dropdown.removeClass(this.options.animation);
			    $dropdown.addClass(animationName);
			    this.animating = 1;
			    // animation
			    $dropdown.one(animation.end + '.close.dropdown.amui', function() {
			      $dropdown.removeClass(animationName);
			      complete();
			    });
			  } else {
			    complete();
			  }
			};

			Dropdown.prototype.enable = function() {
			  this.$toggle.prop('disabled', false);
			},

			Dropdown.prototype.disable = function() {
			  this.$toggle.prop('disabled', true);
			},

			Dropdown.prototype.checkDimensions = function(e) {
			  if (!this.$dropdown.length) {
			    return;
			  }

			  var $dropdown = this.$dropdown;
			  
			  // @see #873
			  if (e && e.offset) {
			    $dropdown.offset(e.offset);
			  }

			  var offset = $dropdown.offset();
			  var width = $dropdown.outerWidth();
			  var boundaryWidth = this.$boundary.width();
			  var boundaryOffset = $.isWindow(this.boundary) && this.$boundary.offset() ?
			    this.$boundary.offset().left : 0;

			  if (this.$justify) {
			    // jQuery.fn.width() is really...
			    $dropdown.css({'min-width': this.$justify.css('width')});
			  }

			  if ((width + (offset.left - boundaryOffset)) > boundaryWidth) {
			    this.$element.addClass('cui-dropdown-flip');
			  }
			};

			Dropdown.prototype.clear = function() {
			  $('[data-cui-dropdown]').not(this.$element).each(function() {
			    var data = $(this).data('amui.dropdown');
			    data && data.close();
			  });
			};

			Dropdown.prototype.events = function() {
			  var eventNS = 'dropdown.amui';
			  // triggers = this.options.trigger.split(' '),
			  var $toggle = this.$toggle;

			  $toggle.on('click.' + eventNS, $.proxy(function(e) {
			    e.preventDefault();
			    this.toggle();
			  }, this));

			  /*for (var i = triggers.length; i--;) {
			   var trigger = triggers[i];

			   if (trigger === 'click') {
			   $toggle.on('click.' + eventNS, $.proxy(this.toggle, this))
			   }

			   if (trigger === 'focus' || trigger === 'hover') {
			   var eventIn  = trigger == 'hover' ? 'mouseenter' : 'focusin';
			   var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout';

			   this.$element.on(eventIn + '.' + eventNS, $.proxy(this.open, this))
			   .on(eventOut + '.' + eventNS, $.proxy(this.close, this));
			   }
			   }*/

			  $(document).on('keydown.dropdown.amui', $.proxy(function(e) {
			    e.keyCode === 27 && this.active && this.close();
			  }, this)).on('click.outer.dropdown.amui', $.proxy(function(e) {
			    // var $target = $(e.target);

			    if (this.active &&
			      (this.$element[0] === e.target || !this.$element.find(e.target).length)) {
			      this.close();
			    }
			  }, this));
			};

			// Dropdown Plugin
			UI.plugin('dropdown', Dropdown);

			// Init code
			UI.ready(function(context) {
			  $('[data-cui-dropdown]', context).dropdown();
			});

			$(document).on('click.dropdown.amui.data-api', '.cui-dropdown form',
			  function(e) {
			    e.stopPropagation();
			  });

			module.exports = UI.dropdown = Dropdown;

			// TODO: 1. 处理链接 focus
			//       2. 增加 mouseenter / mouseleave 选项
			//       3. 宽度适应


		/***/ },
		/* 15 模态框*/
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			var dimmer = __webpack_require__(9);
			var $doc = $(document);
			var supportTransition = UI.support.transition;

			/**
			 * @reference https://github.com/nolimits4web/Framework7/blob/master/src/js/modals.js
			 * @license https://github.com/nolimits4web/Framework7/blob/master/LICENSE
			 */

			var Modal = function(element, options) {
			  this.options = $.extend({}, Modal.DEFAULTS, options || {});
			  this.$element = $(element);
			  this.$dialog = this.$element.find('.cui-modal-dialog');

			  if (!this.$element.attr('id')) {
			    this.$element.attr('id', UI.utils.generateGUID('cui-modal'));
			  }

			  this.isPopup = this.$element.hasClass('cui-popup');
			  this.isActions = this.$element.hasClass('cui-modal-actions');
			  this.isPrompt = this.$element.hasClass('cui-modal-prompt');
			  this.isLoading = this.$element.hasClass('cui-modal-loading');
			  this.active = this.transitioning = this.relatedTarget = null;
			  this.dimmer = this.options.dimmer ? dimmer : {
			    open: function() {
			    },
			    close: function() {
			    }
			  };

			  this.events();
			};

			Modal.DEFAULTS = {
			  className: {
			    active: 'cui-modal-active',
			    out: 'cui-modal-out'
			  },
			  selector: {
			    modal: '.cui-modal',
			    active: '.cui-modal-active'
			  },
			  closeViaDimmer: true,
			  cancelable: true,
			  onConfirm: function() {
			  },
			  onCancel: function() {
			  },
			  closeOnCancel: true,
			  closeOnConfirm: true,
			  dimmer: true,
			  height: undefined,
			  width: undefined,
			  duration: 300, // must equal the CSS transition duration
			  transitionEnd: supportTransition && supportTransition.end + '.modal.amui'
			};

			Modal.prototype.toggle = function(relatedTarget) {
			  return this.active ? this.close() : this.open(relatedTarget);
			};

			Modal.prototype.open = function(relatedTarget) {
			  var $element = this.$element;
			  var options = this.options;
			  var isPopup = this.isPopup;
			  var width = options.width;
			  var height = options.height;
			  var style = {};

			  if (this.active) {
			    return;
			  }

			  if (!this.$element.length) {
			    return;
			  }

			  // callback hook
			  relatedTarget && (this.relatedTarget = relatedTarget);

			  // 判断如果还在动画，就先触发之前的closed事件
			  if (this.transitioning) {
			    clearTimeout($element.transitionEndTimmer);
			    $element.transitionEndTimmer = null;
			    $element.trigger(options.transitionEnd)
			      .off(options.transitionEnd);
			  }

			  isPopup && this.$element.show();

			  this.active = true;

			  $element.trigger($.Event('open.modal.amui', {relatedTarget: relatedTarget}));

			  this.dimmer.open($element);

			  $element.show().redraw();

			  // apply Modal width/height if set
			  if (!isPopup && !this.isActions) {
			    if (width) {
			      style.width = parseInt(width, 10) + 'px';
			    }

			    if (height) {
			      style.height = parseInt(height, 10) + 'px';
			    }

			    this.$dialog.css(style);
			  }

			  $element
			    .removeClass(options.className.out)
			    .addClass(options.className.active);

			  this.transitioning = 1;

			  var complete = function() {
			    $element.trigger($.Event('opened.modal.amui', {
			      relatedTarget: relatedTarget
			    }));
			    this.transitioning = 0;

			    // Prompt auto focus
			    if (this.isPrompt) {
			      this.$dialog.find('input').eq(0).focus();
			    }
			  };

			  if (!supportTransition) {
			    return complete.call(this);
			  }

			  $element
			    .one(options.transitionEnd, $.proxy(complete, this))
			    .emulateTransitionEnd(options.duration);
			};

			Modal.prototype.close = function(relatedTarget) {
			  if (!this.active) {
			    return;
			  }

			  var $element = this.$element;
			  var options = this.options;
			  var isPopup = this.isPopup;

			  // 判断如果还在动画，就先触发之前的opened事件
			  if (this.transitioning) {
			    clearTimeout($element.transitionEndTimmer);
			    $element.transitionEndTimmer = null;
			    $element.trigger(options.transitionEnd).off(options.transitionEnd);
			    this.dimmer.close($element, true);
			  }

			  this.$element.trigger($.Event('close.modal.amui', {
			    relatedTarget: relatedTarget
			  }));

			  this.transitioning = 1;

			  var complete = function() {
			    $element.trigger('closed.modal.amui');
			    isPopup && $element.removeClass(options.className.out);
			    $element.hide();
			    this.transitioning = 0;
			    // 不强制关闭 Dimmer，以便多个 Modal 可以共享 Dimmer
			    this.dimmer.close($element, false);
			    this.active = false;
			  };

			  $element.removeClass(options.className.active)
			    .addClass(options.className.out);

			  if (!supportTransition) {
			    return complete.call(this);
			  }

			  $element.one(options.transitionEnd, $.proxy(complete, this))
			    .emulateTransitionEnd(options.duration);
			};

			Modal.prototype.events = function() {
			  var _this = this;
			  var options = this.options;
			  var $element = this.$element;
			  var $dimmer = this.dimmer.$element;
			  var $ipt = $element.find('.cui-modal-prompt-input');
			  var $confirm = $element.find('[data-cui-modal-confirm]');
			  var $cancel = $element.find('[data-cui-modal-cancel]');
			  var getData = function() {
			    var data = [];
			    $ipt.each(function() {
			      data.push($(this).val());
			    });

			    return (data.length === 0) ? undefined :
			      ((data.length === 1) ? data[0] : data);
			  };

			  // close via Esc key
			  if (this.options.cancelable) {
			    $element.on('keyup.modal.amui', function(e) {
			      if (_this.active && e.which === 27) {
			        $element.trigger('cancel.modal.amui');
			        _this.close();
			      }
			    });
			  }

			  // Close Modal when dimmer clicked
			  if (this.options.dimmer && this.options.closeViaDimmer && !this.isLoading) {
			    $dimmer.on('click.dimmer.modal.amui', function() {
			      _this.close();
			    });
			  }

			  // Close Modal when button clicked
			  $element.on(
			    'click.close.modal.amui',
			    '[data-cui-modal-close], .cui-modal-btn',
			    function(e) {
			      e.preventDefault();
			      var $this = $(this);

			      if ($this.is($confirm)) {
			        options.closeOnConfirm && _this.close();
			      } else if ($this.is($cancel)) {
			        options.closeOnCancel && _this.close();
			      } else {
			        _this.close();
			      }
			    }
			  )
			    // trigger dimmer click event if non-dialog area clicked
			    // fixes #882 caused by https://github.com/amazeui/amazeui/commit/b6be7719681193f1c4cb04af89cb9fd9f4422163
			    .on('click', function(e) {
			      // fixes #900
			      // e.stopPropagation();
			      $(e.target).is($element) && $dimmer.trigger('click.dimmer.modal.amui');
			    });

			  $confirm.on('click.confirm.modal.amui',
			    function() {
			      $element.trigger($.Event('confirm.modal.amui', {
			        trigger: this
			      }));
			    });

			  $cancel.on('click.cancel.modal.amui', function() {
			    $element.trigger($.Event('cancel.modal.amui', {
			      trigger: this
			    }));
			  });

			  $element.on('confirm.modal.amui', function(e) {
			    e.data = getData();
			    _this.options.onConfirm.call(_this, e);
			  }).on('cancel.modal.amui', function(e) {
			    e.data = getData();
			    _this.options.onCancel.call(_this, e);
			  });
			};

			function Plugin(option, relatedTarget) {
			  return this.each(function() {
			    var $this = $(this);
			    var data = $this.data('amui.modal');
			    var options = typeof option == 'object' && option;

			    if (!data) {
			      $this.data('amui.modal', (data = new Modal(this, options)));
			    }

			    if (typeof option == 'string') {
			      data[option] && data[option](relatedTarget);
			    } else {
			      data.toggle(option && option.relatedTarget || undefined);
			    }
			  });
			}

			$.fn.modal = Plugin;

			// Init
			$doc.on('click.modal.amui.data-api', '[data-cui-modal]', function() {
			  var $this = $(this);
			  var options = UI.utils.parseOptions($this.attr('data-cui-modal'));
			  var $target = $(options.target ||
			    (this.href && this.href.replace(/.*(?=#[^\s]+$)/, '')));
			  var option = $target.data('amui.modal') ? 'toggle' : options;

			  Plugin.call($target, option, this);
			});

			module.exports = UI.modal = Modal;


		/***/ },
		/* 28 选项卡 */
		/***/ function(module, exports, __webpack_require__) {

			'use strict';

			var $ = __webpack_require__(1);
			var UI = __webpack_require__(2);
			var Hammer = __webpack_require__(3);
			var supportTransition = UI.support.transition;
			var animation = UI.support.animation;

			/**
			 * @via https://github.com/twbs/bootstrap/blob/master/js/tab.js
			 * @copyright 2011-2014 Twitter, Inc.
			 * @license MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
			 */

			/**
			 * Tabs
			 * @param {HTMLElement} element
			 * @param {Object} options
			 * @constructor
			 */
			var Tabs = function(element, options) {
			  this.$element = $(element);
			  this.options = $.extend({}, Tabs.DEFAULTS, options || {});
			  this.transitioning = this.activeIndex = null;

			  this.refresh();
			  this.init();
			};

			Tabs.DEFAULTS = {
			  selector: {
			    nav: '> .cui-tabs-nav',
			    content: '> .cui-tabs-bd',
			    panel: '> .cui-tab-panel'
			  },
			  activeClass: 'cui-active'
			};

			Tabs.prototype.refresh = function() {
			  var selector = this.options.selector;

			  this.$tabNav = this.$element.find(selector.nav);
			  this.$navs = this.$tabNav.find('a');

			  this.$content = this.$element.find(selector.content);
			  this.$tabPanels = this.$content.find(selector.panel);

			  var $active = this.$tabNav.find('> .' + this.options.activeClass);

			  // Activate the first Tab when no active Tab or multiple active Tabs
			  if ($active.length !== 1) {
			    this.open(0);
			  } else {
			    this.activeIndex = this.$navs.index($active.children('a'));
			  }
			};

			Tabs.prototype.init = function() {
			  var _this = this;
			  var options = this.options;

			  this.$element.on('click.tabs.amui', options.selector.nav + ' a', function(e) {
			    e.preventDefault();
			    _this.open($(this));
			  });

			  // TODO: nested Tabs touch events
			  if (!options.noSwipe) {
			    if (!this.$content.length) {
			      return this;
			    }

			    var hammer = new Hammer.Manager(this.$content[0]);
			    var swipe = new Hammer.Swipe({
			      direction: Hammer.DIRECTION_HORIZONTAL
			      // threshold: 40
			    });

			    hammer.add(swipe);

			    hammer.on('swipeleft', UI.utils.debounce(function(e) {
			      e.preventDefault();
			      _this.goTo('next');
			    }, 100));

			    hammer.on('swiperight', UI.utils.debounce(function(e) {
			      e.preventDefault();
			      _this.goTo('prev');
			    }, 100));

			    this._hammer = hammer;
			  }
			};

			/**
			 * Open $nav tab
			 * @param {jQuery|HTMLElement|Number} $nav
			 * @returns {Tabs}
			 */
			Tabs.prototype.open = function($nav) {
				// console.log(1);
			  var activeClass = this.options.activeClass;
			  var activeIndex = typeof $nav === 'number' ? $nav : this.$navs.index($($nav));

			  $nav = typeof $nav === 'number' ? this.$navs.eq(activeIndex) : $($nav);

			  if (!$nav ||
			    !$nav.length ||
			    this.transitioning ||
			    $nav.parent('li').hasClass(activeClass)) {
			    return;
			  }

			  var $tabNav = this.$tabNav;
			  var href = $nav.attr('href');
			  var regexHash = /^#.+$/;
			  var $target = regexHash.test(href) && this.$content.find(href) ||
			    this.$tabPanels.eq(activeIndex);
			  var previous = $tabNav.find('.' + activeClass + ' a')[0];
			  var e = $.Event('open.tabs.amui', {
			    relatedTarget: previous
			  });

			  $nav.trigger(e);

			  if (e.isDefaultPrevented()) {
			    return;
			  }

			  // activate Tab nav
			  this.activate($nav.closest('li'), $tabNav);

			  // activate Tab content
			  this.activate($target, this.$content, function() {
			    $nav.trigger({
			      type: 'opened.tabs.amui',
			      relatedTarget: previous
			    });
			  });

			  this.activeIndex = activeIndex;
			};

			Tabs.prototype.activate = function($element, $container, callback) {
			  this.transitioning = true;

			  var activeClass = this.options.activeClass;
			  var $active = $container.find('> .' + activeClass);
			  var transition = callback && supportTransition && !!$active.length;

			  $active.removeClass(activeClass + ' cui-in');

			  $element.addClass(activeClass);

			  if (transition) {
			    $element.redraw(); // reflow for transition
			    $element.addClass('cui-in');
			  } else {
			    $element.removeClass('cui-fade');
			  }

			  var complete = $.proxy(function complete() {
			    callback && callback();
			    this.transitioning = false;
			  }, this);



			  transition && !this.$content.is('.cui-tabs-bd-ofv') ?
			    $active.one(supportTransition.end, complete) : complete();
			};

			/**
			 * Go to `next` or `prev` tab
			 * @param {String} direction - `next` or `prev`
			 */
			Tabs.prototype.goTo = function(direction) {
			  var navIndex = this.activeIndex;
			  var isNext = direction === 'next';
			  var spring = isNext ? 'cui-animation-right-spring' :
			    'cui-animation-left-spring';

			  if ((isNext && navIndex + 1 >= this.$navs.length) || // last one
			    (!isNext && navIndex === 0)) { // first one
			    var $panel = this.$tabPanels.eq(navIndex);

			    animation && $panel.addClass(spring).on(animation.end, function() {
			      $panel.removeClass(spring);
			    });
			  } else {
			    this.open(isNext ? navIndex + 1 : navIndex - 1);
			  }
			};

			Tabs.prototype.destroy = function() {
			  this.$element.off('.tabs.amui');
			  Hammer.off(this.$content[0], 'swipeleft swiperight');
			  this._hammer && this._hammer.destroy();
			  $.removeData(this.$element, 'amui.tabs');
			};

			// Plugin
			function Plugin(option) {
				// console.log(2);
			  var args = Array.prototype.slice.call(arguments, 1);
			  var methodReturn;

			  this.each(function() {
			    var $this = $(this);
			    var $tabs = $this.is('.cui-tabs') && $this || $this.closest('.cui-tabs');
			    var data = $tabs.data('amui.tabs');
			    var options = $.extend({}, UI.utils.parseOptions($this.data('amTabs')),
			      $.isPlainObject(option) && option);

			    if (!data) {
			      $tabs.data('amui.tabs', (data = new Tabs($tabs[0], options)));
			    }

			    if (typeof option === 'string') {
			      if (option === 'open' && $this.is('.cui-tabs-nav a')) {
			        data.open($this);
			      } else {
			        methodReturn = typeof data[option] === 'function' ?
			          data[option].apply(data, args) : data[option];
			      }
			    }
			  });

			  return methodReturn === undefined ? this : methodReturn;
			}

			$.fn.tabs = Plugin;

			// Init code
			UI.ready(function(context) {
			  $('[data-cui-tabs]', context).tabs();
			});

			$(document).on('click.tabs.amui.data-api', '[data-cui-tabs] .cui-tabs-nav a',
			  function(e) {
			  e.preventDefault();
			  Plugin.call($(this), 'open');
			});

			module.exports = UI.tabs = Tabs;

			// TODO: 1. Ajax 支持
			//       2. touch 事件处理逻辑优化


		/***/ },
		
		
		

	])
});