/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		0: 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp"] = window["webpackJsonp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push([1,1]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ([
/* 0 */,
/* 1 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($, global) {/* harmony import */ var _js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(21);
/* harmony import */ var _assets_scss_main_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(5);
/* harmony import */ var _assets_scss_main_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_assets_scss_main_scss__WEBPACK_IMPORTED_MODULE_1__);
// import './assets/img/_sprite.svg';


global.$ = global.jQuery = $;

function requireAll(r) {
  r.keys().forEach(r);
}

requireAll(__webpack_require__(9));
requireAll(__webpack_require__(20));
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(0), __webpack_require__(2)))

/***/ }),
/* 2 */,
/* 3 */,
/* 4 */,
/* 5 */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(6);

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(7)(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),
/* 7 */,
/* 8 */,
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./ic-arrow-left.svg": 10,
	"./ic-arrow-right.svg": 11,
	"./ic-call.svg": 12,
	"./ic-info.svg": 13,
	"./ic-instagramm.svg": 14,
	"./ic-solid.svg": 15,
	"./ic-telegram.svg": 16,
	"./ic-tick-square.svg": 17,
	"./ic-tick.svg": 18,
	"./ic-whatchapp.svg": 19
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = 9;

/***/ }),
/* 10 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-arrow-left-usage",
      viewBox: "0 0 40 35",
      url: "assets/sprites/" + "sprite.svg#ic-arrow-left",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 11 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-arrow-right-usage",
      viewBox: "0 0 40 35",
      url: "assets/sprites/" + "sprite.svg#ic-arrow-right",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 12 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-call-usage",
      viewBox: "0 0 477.156 477.156",
      url: "assets/sprites/" + "sprite.svg#ic-call",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 13 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-info-usage",
      viewBox: "0 0 50 50",
      url: "assets/sprites/" + "sprite.svg#ic-info",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 14 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-instagramm-usage",
      viewBox: "0 0 32 32",
      url: "assets/sprites/" + "sprite.svg#ic-instagramm",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 15 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-solid-usage",
      viewBox: "0 0 36 37",
      url: "assets/sprites/" + "sprite.svg#ic-solid",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 16 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-telegram-usage",
      viewBox: "0 0 27 23",
      url: "assets/sprites/" + "sprite.svg#ic-telegram",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 17 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-tick-square-usage",
      viewBox: "0 0 30 30",
      url: "assets/sprites/" + "sprite.svg#ic-tick-square",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 18 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-tick-usage",
      viewBox: "0 0 45 45",
      url: "assets/sprites/" + "sprite.svg#ic-tick",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 19 */
/***/ (function(module, exports) {

module.exports = {
      id: "ic-whatchapp-usage",
      viewBox: "0 0 31 31",
      url: "assets/sprites/" + "sprite.svg#ic-whatchapp",
      toString: function () {
        return this.url;
      }
    }

/***/ }),
/* 20 */
/***/ (function(module, exports) {

function webpackEmptyContext(req) {
	var e = new Error("Cannot find module '" + req + "'");
	e.code = 'MODULE_NOT_FOUND';
	throw e;
}
webpackEmptyContext.keys = function() { return []; };
webpackEmptyContext.resolve = webpackEmptyContext;
module.exports = webpackEmptyContext;
webpackEmptyContext.id = 20;

/***/ }),
/* 21 */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";

// EXTERNAL MODULE: ./node_modules/jquery/dist/jquery.js
var jquery = __webpack_require__(0);
var jquery_default = /*#__PURE__*/__webpack_require__.n(jquery);

// EXTERNAL MODULE: ./node_modules/@fancyapps/fancybox/dist/jquery.fancybox.js
var jquery_fancybox = __webpack_require__(3);

// EXTERNAL MODULE: ./node_modules/slick-slider/slick/slick.min.js
var slick_min = __webpack_require__(4);

// CONCATENATED MODULE: ./src/js/common.js

 // import 'bootstrap/js/dist/modal';

 // import 'select2';
// import Inputmask from "inputmask";


// CONCATENATED MODULE: ./src/js/index.js

var widthWindow = jquery_default()(window).width();
jquery_default()(window).resize(function () {
  widthWindow = jquery_default()(window).width();
}); // Слайдер клиентов

if (jquery_default()('.js-gallery-slider').length) {
  jquery_default()('.js-gallery-slider').slick({
    slidesToShow: 5,
    infinite: true,
    centerMode: true,
    centerPadding: '0px',
    swipe: false,
    dots: true,
    appendDots: jquery_default()('.js-gallery-slider-dots'),
    prevArrow: '<button id="prev" type="button" class="btn-slider btn-slider_left"><svg class="icon ic-arrow-left" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-left"></use></svg></button>',
    nextArrow: '<button id="next" type="button" class="btn-slider btn-slider_right"><svg class="icon ic-arrow-right" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-right"></use></svg></button>',
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        arrows: false,
        swipe: true
      }
    }]
  });
  jquery_default()('.js-gallery-slider').find('.slick-slide.slick-active').each(function (indx, element) {
    jquery_default()(element).attr('data-active', indx + 1);
  });
  jquery_default()('.js-gallery-slider').find('.slick-arrow').on('click', function () {
    jquery_default()('.js-gallery-slider').find('.slick-slide.slick-active').each(function (indx, element) {
      jquery_default()(element).attr('data-active', indx + 1);
    });
  });
} // Слайдер партнеров


if (jquery_default()('.js-partners-slider').length) {
  jquery_default()('.js-partners-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    rows: 2,
    infinite: true,
    swipe: false,
    dots: true,
    appendDots: jquery_default()('.js-partners-slider-dots'),
    prevArrow: '<button id="prev" type="button" class="btn-slider btn-slider_left"><svg class="icon ic-arrow-left" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-left"></use></svg></button>',
    nextArrow: '<button id="next" type="button" class="btn-slider btn-slider_right"><svg class="icon ic-arrow-right" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-right"></use></svg></button>',
    responsive: [{
      breakpoint: 768,
      settings: {
        swipe: true
      }
    }]
  });
} // Слайдер отзывов


if (jquery_default()('.js-reviews-slider').length) {
  /*jquery_default()('.js-reviews-slider').slick({
    infinite: true,
    swipe: false,
    dots: true,
    prevArrow: '<button id="prev" type="button" class="btn-slider btn-slider_left"><svg class="icon ic-arrow-left" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-left"></use></svg></button>',
    nextArrow: '<button id="next" type="button" class="btn-slider btn-slider_right"><svg class="icon ic-arrow-right" width="40" height="35"><use xlink:href="assets/sprites/sprite.svg#ic-arrow-right"></use></svg></button>',
    responsive: [{
      breakpoint: 768,
      settings: {
        swipe: true
      }
    }]
  });*/
} // Слайдер персон


if (jquery_default()('.js-people-list').length) {
  if (widthWindow < 768) {
    if (!jquery_default()('.js-people-list').hasClass('.slick-initialized')) {
      jquery_default()('.js-people-list').slick({
        infinite: true,
        dots: true,
        arrows: false
      });
    }
  } else {
    if (jquery_default()('.js-people-list').hasClass('.slick-initialized')) {
      jquery_default()('.js-people-list').slick('unslick');
    }
  }
} // Yandex карта


if (jquery_default()('#map').length) {
  var init = function init() {
    var myMap;
    myMap = new ymaps.Map("map", {
      center: [55.778, 37.70],
      zoom: 16,
      controls: []
    });
    placemark('55.778398', '37.699664', 'ул. Большая Почтовая, 26в, стр. 2, Москва, Россия, 105082');
    placemark('55.780225', '37.685505', 'Центросоюзный переулок, 13с3, Москва, Россия, 105082');
    placemark('55.779150', '37.706306', 'Семёновская набережная, 5с1, Москва, Россия, 105094');

    function placemark(lat, long, text) {
      var myPlacemark = new ymaps.Placemark([lat, long], {
        balloonContentBody: text,
        hintContent: text
      }, {
        iconLayout: 'default#image',
        iconImageHref: '/assets/img/mark-map.png',
        iconImageSize: [50, 90],
        iconImageOffset: [-25, -45]
      });
      myMap.geoObjects.add(myPlacemark);
    }
  };

  // Иницилизация карты
  ymaps.ready(init);
}

/***/ })
/******/ ]);