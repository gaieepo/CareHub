/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("/*\r\n * jQuery / jqLite Wizard Plugin\r\n * version: 0.0.7\r\n * Author: Girolamo Tomaselli http://bygiro.com\r\n *\r\n * Copyright (c) 2013 G. Tomaselli\r\n * Licensed under the MIT license.\r\n */\r\n\r\n// compatibility for jQuery / jqLite\r\nvar bg = bg || false;\r\nif(!bg){\r\n    if(typeof jQuery != 'undefined'){\r\n        bg = jQuery;\r\n    } else {\r\n        console.log(\"No jQuery\");\r\n    }\r\n}\r\n\r\n;(function ($, document, window){\r\n\r\n    \"use strict\";\r\n\r\n    var pluginName = \"wizardByGiro\",\r\n    // the name of using in .data()\r\n    dataPlugin = \"plugin_\" + pluginName,\r\n    defaults = {\r\n        currentStep: 0,\r\n        checkStep: false,\r\n        onCompleted: false,\r\n        bottomButtons: true,\r\n        topButtons: true,\r\n        autoSubmit: false,\r\n        keyboard: false,\r\n        btnClass: 'btn',\r\n        btnClassDefault: 'btn-default',\r\n        btnClassCompleted: 'btn-success',\r\n        text:{\r\n            finished: 'Complete',\r\n            next: 'Next',\r\n            previous: 'Previous'\r\n        }\r\n    },\r\n\r\n    attachEventsHandler = function(){\r\n        var that = this,\r\n        opts = this.options;\r\n\r\n        that.$element.find('.btn-next, .btn-prev').on('click', function(e){\r\n            if($(this).attr('disabled') || $(this).hasClass('disabled') || !$(this).is(':visible')) return;\r\n\r\n            var type = $(this).hasClass('btn-next') ? 'next' : 'previous';\r\n            e.stopPropagation();\r\n            that[type].call(that,true,e);\r\n        });\r\n\r\n        that.$element.find('.steps > li').on('click', function(e){\r\n            e.stopPropagation();\r\n            var step = $(this).attr('data-step'),\r\n            isCompleted = $(this).hasClass('completed');\r\n            if(!isCompleted) return true;\r\n\r\n            that.setStep.call(that,step,e);\r\n        });\r\n\r\n        $(document).on('keydown', function(e){\r\n            if(!that.$element.is(':visible')) return;\r\n\r\n            // arrow left\r\n            if(e.ctrlKey && e.keyCode == 37){\r\n                e.stopPropagation();\r\n                e.preventDefault();\r\n                that.previous.call(that,true,e);\r\n            }\r\n\r\n            // arrow right\r\n            if(e.ctrlKey && e.keyCode == 39){\r\n                e.stopPropagation();\r\n                e.preventDefault();\r\n                that.next.call(that,true,e);\r\n            }\r\n        });\r\n\r\n    },\r\n\r\n    checkStatus = function(){\r\n        var that = this,\r\n            currentWidth,\r\n            stepsWidth = 0,\r\n            stepPosition = false,\r\n            steps = that.$element.find('.steps'),\r\n            stepsItems = that.$element.find('.steps > li'),\r\n            opts = that.options;\r\n\r\n        if(!this.currentStep) this.currentStep = 1;\r\n\r\n        stepsItems.removeClass('active');\r\n        that.$element\r\n            .find('.steps > li[data-step=\"'+ that.currentStep +'\"]')\r\n            .addClass('active');\r\n\r\n        that.$element.find('.steps-content .step-pane').removeClass('active');\r\n        var current = that.$element.find('.steps-content .step-pane[data-step=\"'+ that.currentStep +'\"]');\r\n            current.addClass('active');\r\n\r\n        for(var i=0;i<stepsItems.length;i++){\r\n            var stepLi = $(stepsItems[i]);\r\n            if(that.currentStep > (i+1)){\r\n                stepLi.addClass('completed');\r\n            } else {\r\n                stepLi.removeClass('completed');\r\n            }\r\n\r\n            currentWidth = stepLi.outerWidth();\r\n            if(!stepPosition && stepLi.hasClass('active')){\r\n                stepPosition = stepsWidth + (currentWidth / 2);\r\n            }\r\n\r\n            stepsWidth += currentWidth;\r\n        }\r\n\r\n        // set buttons based on current step\r\n        //qiyun that.$element.find('.btn-next').removeClass('final-step '+ opts.btnClassCompleted).addClass(opts.btnClassDefault);\r\n        that.$element.find('.btn-next').removeClass('disabled hidden').addClass(opts.btnClassDefault);\r\n        that.$element.find('.btn-prev').removeClass('disabled hidden');\r\n        that.$element.find('.finished-btn').addClass('final-step btn btn-success'); //qiyun\r\n        that.$element.find('.cancel-btn').addClass('btn btn-default'); //qiyun\r\n\r\n        if(that.currentStep == stepsItems.length){\r\n            // we are in the last step\r\n            //qiyun that.$element.find('.btn-next').removeClass(opts.btnClassDefault).addClass('final-step '+ opts.btnClassCompleted);\r\n            that.$element.find('.btn-next').removeClass(opts.btnClassDefault).addClass('disabled hidden');\r\n        } else if(that.currentStep == 1){\r\n            that.$element.find('.btn-prev').addClass('disabled hidden');\r\n        }\r\n\r\n        // move steps view if needed\r\n        var totalWidth = that.$element.width() - that.$element.find('.actions').outerWidth();\r\n\r\n        if(stepsWidth < totalWidth) return;\r\n\r\n        var offsetDiff = stepPosition - (totalWidth / 2);\r\n        if(offsetDiff > 0){\r\n            // move it forward\r\n            steps.css('left',-offsetDiff);\r\n        } else {\r\n            // move it backward\r\n            steps.css('left',0);\r\n        }\r\n    },\r\n\r\n    moveStep = function(step, direction, event, checkStep){\r\n        var that = this, canMove = true,\r\n        steps = that.$element.find('.steps > li'),\r\n        triggerEnd = false;\r\n\r\n        checkStep = checkStep === false ? false : true;\r\n\r\n        // check we can move\r\n        if(checkStep && typeof that.options.checkStep == 'function'){\r\n            canMove = that.options.checkStep(that,direction,event);\r\n        }\r\n\r\n        if(!canMove) return;\r\n\r\n        if(step){\r\n            that.currentStep = parseInt(step);\r\n        } else {\r\n            if(direction){\r\n                that.currentStep++;\r\n            } else {\r\n                that.currentStep--;\r\n            }\r\n        }\r\n\r\n        that.$element.triggerHandler('step_changed.wizardByGiro');\r\n\r\n        if(that.currentStep < 0) that.currentStep = 0;\r\n        if(that.currentStep > steps.length){\r\n            that.currentStep = steps.length;\r\n            triggerEnd = true;\r\n        }\r\n\r\n        checkStatus.call(that);\r\n\r\n        if(triggerEnd){\r\n            if(typeof that.options.onCompleted == 'function'){\r\n                that.options.onCompleted(that);\r\n            } else if(that.options.autoSubmit) {\r\n                // search if wizard is inside a form and submit it.\r\n                var form = that.$element.closest('form');\r\n                if(form.length) form.submit();\r\n            }\r\n        }\r\n    },\r\n\r\n    methods = {\r\n        init: function (element, options) {\n            var this$1 = this;\n\r\n            var that = this;\r\n            this.$element = $(element);\r\n            this.options = $.extend({}, defaults, options);\r\n\r\n            var opts = this.options;\r\n\r\n            this.$element.addClass('wizard');\r\n\r\n            // add the buttons\r\n            var stepsBar = this.$element.find('.steps'),\r\n            topActions = this.$element.find('.top-actions'),\r\n            bottomActions = this.$element.find('.bottom-actions'),\r\n            // qiyun\r\n            stableActions = this.$element.find('.stable-actions'),\r\n            progressBar = this.$element.find('.progress-bar'),\r\n            html = '';\r\n\r\n            // wrap steps in a container with hidden overflow, if it doesn't have a container\r\n            if(stepsBar.parent().hasClass('wizard')){\r\n                // let's add a container\r\n                stepsBar.wrap('<div class=\"steps-index-container\"></div>');\r\n            } else {\r\n                stepsBar.parent().addClass('steps-index-container');\r\n            }\r\n\r\n            if(opts.topButtons && stepsBar.length && !topActions.length){\r\n                html += '<div class=\"top-actions\"><div class=\"btn-group\">';\r\n                html += '<span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-prev\"><span class=\"previous-text\">'+ opts.text.previous +'</span></span>';\r\n                html += '<span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-next\"><span class=\"next-text\">'+ opts.text.next +'</span></span>';\r\n                //qiyun <span class=\"finished-text\">'+ opts.text.finished +'</span>\r\n                html += '</div></div>';\r\n\r\n                stepsBar.after(html);\r\n            }\r\n\r\n            html = '';\r\n            if(opts.bottomButtons && !bottomActions.length){\r\n                html += '<div class=\"bottom-actions\">';\r\n                html += '<div class=\"left-actions\"><span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-prev\"><span class=\"previous-text\">'+ opts.text.previous +'</span></span></div>';\r\n                html += '<div class=\"right-actions\"><span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-next\"><span class=\"next-text\">'+ opts.text.next +'</span></span></div></div>';\r\n                //<qiyun <span class=\"finished-text\">'+ opts.text.finished +'</span>\r\n                html += '<div class=\"stable-panel\"><div class=\"stable-actions\">';\r\n                html += '<div><span class=\"finished-btn\">' + opts.text.finished +'</span><a class=\"cancel-btn\">Cancel</a></div></div></div>';\r\n                //qiyun>\r\n                that.$element.find('.steps-content').append(html);\r\n            }\r\n\r\n            // add arrows to btn\r\n            this.$element.find('.btn-prev').prepend('<i class=\"wiz-icon-arrow-left\"></i>');\r\n            this.$element.find('.btn-next').append('<i class=\"wiz-icon-arrow-right\"></i>');\r\n\r\n            // get steps and prepare them\r\n            var stepsLi = this.$element.find('.steps > li');\r\n            for(var i=0;i<stepsLi.length;i++){\r\n                var step = $(stepsLi[i]),\r\n                target = step.attr('data-step'),\r\n                content = '<span class=\"step-text\">'+ step.html() +'</span>';\r\n\r\n                step.empty().html('<span class=\"step-index\"><span class=\"label\">'+ (i+1) +'</span></span>'+ content + '<span class=\"wiz-icon-chevron-right colorA\"></span><span class=\"wiz-icon-chevron-right colorB\"></span>');\r\n\r\n                that.$element.find('.steps-content [data-step=\"'+ target +'\"]').addClass('step-pane');\r\n\r\n                // detect currentStep\r\n                if(step.hasClass('active') && !that.currentStep){\r\n                    that.currentStep = i+1;\r\n                }\r\n            }\r\n\r\n            this.$element.find('.steps > li:last-child').addClass('final');\r\n\r\n            attachEventsHandler.call(this);\r\n\r\n            var callbacks = ['checkStep','onCompleted'],cb;\r\n            for(var i=0;i<callbacks.length;i++){\r\n                cb = callbacks[i];\r\n                if(typeof this$1.options[cb] == 'string' && typeof window[this$1.options[cb]] == 'function'){\r\n                    this$1.options[cb] = window[this$1.options[cb]];\r\n                }\r\n            }\r\n\r\n            checkStatus.call(this);\r\n        },\r\n\r\n        next: function(checkStep,event){\r\n            moveStep.call(this,false,true,event,checkStep);\r\n        },\r\n\r\n        previous: function(checkStep,event){\r\n            moveStep.call(this,false,false,event,checkStep);\r\n        },\r\n\r\n        setStep: function(step, checkStep, event){\r\n            moveStep.call(this,step,null,event,checkStep);\r\n        }\r\n    };\r\n\r\n    var main = function (method) {\r\n        var thisPlugin = this.data(dataPlugin);\r\n        if (thisPlugin) {\r\n            if (typeof method === 'string' && thisPlugin[method]) {\r\n                return thisPlugin[method].apply(thisPlugin, Array.prototype.slice.call(arguments, 1));\r\n            }\r\n            return console.log('Method ' + arg + ' does not exist on jQuery / jqLite' + pluginName);\r\n        } else {\r\n            if (!method || typeof method === 'object') {\r\n                thisPlugin = $.extend({}, methods);\r\n                thisPlugin.init(this, method);\r\n                this.data(dataPlugin, thisPlugin);\r\n\r\n                return this;\r\n            }\r\n            return console.log( pluginName +' is not instantiated. Please call $(\"selector\").'+ pluginName +'({options})');\r\n        }\r\n    };\r\n\r\n    // plugin integration\r\n    if($.fn){\r\n        $.fn[ pluginName ] = main;\r\n    } else {\r\n        $.prototype[ pluginName ] = main;\r\n    }\r\n\r\n    $(document).ready(function(){\r\n        var mySelector = document.querySelector('[data-wizard-init]');\r\n        $(mySelector)[ pluginName ]({});\r\n    });\r\n}(bg, document, window));\r\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2pxdWVyeS53aXphcmQuanM/YjMxOSJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG4gKiBqUXVlcnkgLyBqcUxpdGUgV2l6YXJkIFBsdWdpblxyXG4gKiB2ZXJzaW9uOiAwLjAuN1xyXG4gKiBBdXRob3I6IEdpcm9sYW1vIFRvbWFzZWxsaSBodHRwOi8vYnlnaXJvLmNvbVxyXG4gKlxyXG4gKiBDb3B5cmlnaHQgKGMpIDIwMTMgRy4gVG9tYXNlbGxpXHJcbiAqIExpY2Vuc2VkIHVuZGVyIHRoZSBNSVQgbGljZW5zZS5cclxuICovXHJcblxyXG4vLyBjb21wYXRpYmlsaXR5IGZvciBqUXVlcnkgLyBqcUxpdGVcclxudmFyIGJnID0gYmcgfHwgZmFsc2U7XHJcbmlmKCFiZyl7XHJcbiAgICBpZih0eXBlb2YgalF1ZXJ5ICE9ICd1bmRlZmluZWQnKXtcclxuICAgICAgICBiZyA9IGpRdWVyeTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgICAgY29uc29sZS5sb2coXCJObyBqUXVlcnlcIik7XHJcbiAgICB9XHJcbn1cclxuXHJcbjsoZnVuY3Rpb24gKCQsIGRvY3VtZW50LCB3aW5kb3cpe1xyXG5cclxuICAgIFwidXNlIHN0cmljdFwiO1xyXG5cclxuICAgIHZhciBwbHVnaW5OYW1lID0gXCJ3aXphcmRCeUdpcm9cIixcclxuICAgIC8vIHRoZSBuYW1lIG9mIHVzaW5nIGluIC5kYXRhKClcclxuICAgIGRhdGFQbHVnaW4gPSBcInBsdWdpbl9cIiArIHBsdWdpbk5hbWUsXHJcbiAgICBkZWZhdWx0cyA9IHtcclxuICAgICAgICBjdXJyZW50U3RlcDogMCxcclxuICAgICAgICBjaGVja1N0ZXA6IGZhbHNlLFxyXG4gICAgICAgIG9uQ29tcGxldGVkOiBmYWxzZSxcclxuICAgICAgICBib3R0b21CdXR0b25zOiB0cnVlLFxyXG4gICAgICAgIHRvcEJ1dHRvbnM6IHRydWUsXHJcbiAgICAgICAgYXV0b1N1Ym1pdDogZmFsc2UsXHJcbiAgICAgICAga2V5Ym9hcmQ6IGZhbHNlLFxyXG4gICAgICAgIGJ0bkNsYXNzOiAnYnRuJyxcclxuICAgICAgICBidG5DbGFzc0RlZmF1bHQ6ICdidG4tZGVmYXVsdCcsXHJcbiAgICAgICAgYnRuQ2xhc3NDb21wbGV0ZWQ6ICdidG4tc3VjY2VzcycsXHJcbiAgICAgICAgdGV4dDp7XHJcbiAgICAgICAgICAgIGZpbmlzaGVkOiAnQ29tcGxldGUnLFxyXG4gICAgICAgICAgICBuZXh0OiAnTmV4dCcsXHJcbiAgICAgICAgICAgIHByZXZpb3VzOiAnUHJldmlvdXMnXHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuXHJcbiAgICBhdHRhY2hFdmVudHNIYW5kbGVyID0gZnVuY3Rpb24oKXtcclxuICAgICAgICB2YXIgdGhhdCA9IHRoaXMsXHJcbiAgICAgICAgb3B0cyA9IHRoaXMub3B0aW9ucztcclxuXHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuYnRuLW5leHQsIC5idG4tcHJldicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpe1xyXG4gICAgICAgICAgICBpZigkKHRoaXMpLmF0dHIoJ2Rpc2FibGVkJykgfHwgJCh0aGlzKS5oYXNDbGFzcygnZGlzYWJsZWQnKSB8fCAhJCh0aGlzKS5pcygnOnZpc2libGUnKSkgcmV0dXJuO1xyXG5cclxuICAgICAgICAgICAgdmFyIHR5cGUgPSAkKHRoaXMpLmhhc0NsYXNzKCdidG4tbmV4dCcpID8gJ25leHQnIDogJ3ByZXZpb3VzJztcclxuICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgdGhhdFt0eXBlXS5jYWxsKHRoYXQsdHJ1ZSxlKTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMgPiBsaScpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpe1xyXG4gICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAgICAgICB2YXIgc3RlcCA9ICQodGhpcykuYXR0cignZGF0YS1zdGVwJyksXHJcbiAgICAgICAgICAgIGlzQ29tcGxldGVkID0gJCh0aGlzKS5oYXNDbGFzcygnY29tcGxldGVkJyk7XHJcbiAgICAgICAgICAgIGlmKCFpc0NvbXBsZXRlZCkgcmV0dXJuIHRydWU7XHJcblxyXG4gICAgICAgICAgICB0aGF0LnNldFN0ZXAuY2FsbCh0aGF0LHN0ZXAsZSk7XHJcbiAgICAgICAgfSk7XHJcblxyXG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCdrZXlkb3duJywgZnVuY3Rpb24oZSl7XHJcbiAgICAgICAgICAgIGlmKCF0aGF0LiRlbGVtZW50LmlzKCc6dmlzaWJsZScpKSByZXR1cm47XHJcblxyXG4gICAgICAgICAgICAvLyBhcnJvdyBsZWZ0XHJcbiAgICAgICAgICAgIGlmKGUuY3RybEtleSAmJiBlLmtleUNvZGUgPT0gMzcpe1xyXG4gICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIHRoYXQucHJldmlvdXMuY2FsbCh0aGF0LHRydWUsZSk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIC8vIGFycm93IHJpZ2h0XHJcbiAgICAgICAgICAgIGlmKGUuY3RybEtleSAmJiBlLmtleUNvZGUgPT0gMzkpe1xyXG4gICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcclxuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuICAgICAgICAgICAgICAgIHRoYXQubmV4dC5jYWxsKHRoYXQsdHJ1ZSxlKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIH0sXHJcblxyXG4gICAgY2hlY2tTdGF0dXMgPSBmdW5jdGlvbigpe1xyXG4gICAgICAgIHZhciB0aGF0ID0gdGhpcyxcclxuICAgICAgICAgICAgY3VycmVudFdpZHRoLFxyXG4gICAgICAgICAgICBzdGVwc1dpZHRoID0gMCxcclxuICAgICAgICAgICAgc3RlcFBvc2l0aW9uID0gZmFsc2UsXHJcbiAgICAgICAgICAgIHN0ZXBzID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMnKSxcclxuICAgICAgICAgICAgc3RlcHNJdGVtcyA9IHRoYXQuJGVsZW1lbnQuZmluZCgnLnN0ZXBzID4gbGknKSxcclxuICAgICAgICAgICAgb3B0cyA9IHRoYXQub3B0aW9ucztcclxuXHJcbiAgICAgICAgaWYoIXRoaXMuY3VycmVudFN0ZXApIHRoaXMuY3VycmVudFN0ZXAgPSAxO1xyXG5cclxuICAgICAgICBzdGVwc0l0ZW1zLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcclxuICAgICAgICB0aGF0LiRlbGVtZW50XHJcbiAgICAgICAgICAgIC5maW5kKCcuc3RlcHMgPiBsaVtkYXRhLXN0ZXA9XCInKyB0aGF0LmN1cnJlbnRTdGVwICsnXCJdJylcclxuICAgICAgICAgICAgLmFkZENsYXNzKCdhY3RpdmUnKTtcclxuXHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCAuc3RlcC1wYW5lJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xyXG4gICAgICAgIHZhciBjdXJyZW50ID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCAuc3RlcC1wYW5lW2RhdGEtc3RlcD1cIicrIHRoYXQuY3VycmVudFN0ZXAgKydcIl0nKTtcclxuICAgICAgICAgICAgY3VycmVudC5hZGRDbGFzcygnYWN0aXZlJyk7XHJcblxyXG4gICAgICAgIGZvcih2YXIgaT0wO2k8c3RlcHNJdGVtcy5sZW5ndGg7aSsrKXtcclxuICAgICAgICAgICAgdmFyIHN0ZXBMaSA9ICQoc3RlcHNJdGVtc1tpXSk7XHJcbiAgICAgICAgICAgIGlmKHRoYXQuY3VycmVudFN0ZXAgPiAoaSsxKSl7XHJcbiAgICAgICAgICAgICAgICBzdGVwTGkuYWRkQ2xhc3MoJ2NvbXBsZXRlZCcpO1xyXG4gICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgc3RlcExpLnJlbW92ZUNsYXNzKCdjb21wbGV0ZWQnKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgY3VycmVudFdpZHRoID0gc3RlcExpLm91dGVyV2lkdGgoKTtcclxuICAgICAgICAgICAgaWYoIXN0ZXBQb3NpdGlvbiAmJiBzdGVwTGkuaGFzQ2xhc3MoJ2FjdGl2ZScpKXtcclxuICAgICAgICAgICAgICAgIHN0ZXBQb3NpdGlvbiA9IHN0ZXBzV2lkdGggKyAoY3VycmVudFdpZHRoIC8gMik7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHN0ZXBzV2lkdGggKz0gY3VycmVudFdpZHRoO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gc2V0IGJ1dHRvbnMgYmFzZWQgb24gY3VycmVudCBzdGVwXHJcbiAgICAgICAgLy9xaXl1biB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLnJlbW92ZUNsYXNzKCdmaW5hbC1zdGVwICcrIG9wdHMuYnRuQ2xhc3NDb21wbGV0ZWQpLmFkZENsYXNzKG9wdHMuYnRuQ2xhc3NEZWZhdWx0KTtcclxuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLnJlbW92ZUNsYXNzKCdkaXNhYmxlZCBoaWRkZW4nKS5hZGRDbGFzcyhvcHRzLmJ0bkNsYXNzRGVmYXVsdCk7XHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuYnRuLXByZXYnKS5yZW1vdmVDbGFzcygnZGlzYWJsZWQgaGlkZGVuJyk7XHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuZmluaXNoZWQtYnRuJykuYWRkQ2xhc3MoJ2ZpbmFsLXN0ZXAgYnRuIGJ0bi1zdWNjZXNzJyk7IC8vcWl5dW5cclxuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5jYW5jZWwtYnRuJykuYWRkQ2xhc3MoJ2J0biBidG4tZGVmYXVsdCcpOyAvL3FpeXVuXHJcblxyXG4gICAgICAgIGlmKHRoYXQuY3VycmVudFN0ZXAgPT0gc3RlcHNJdGVtcy5sZW5ndGgpe1xyXG4gICAgICAgICAgICAvLyB3ZSBhcmUgaW4gdGhlIGxhc3Qgc3RlcFxyXG4gICAgICAgICAgICAvL3FpeXVuIHRoYXQuJGVsZW1lbnQuZmluZCgnLmJ0bi1uZXh0JykucmVtb3ZlQ2xhc3Mob3B0cy5idG5DbGFzc0RlZmF1bHQpLmFkZENsYXNzKCdmaW5hbC1zdGVwICcrIG9wdHMuYnRuQ2xhc3NDb21wbGV0ZWQpO1xyXG4gICAgICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLnJlbW92ZUNsYXNzKG9wdHMuYnRuQ2xhc3NEZWZhdWx0KS5hZGRDbGFzcygnZGlzYWJsZWQgaGlkZGVuJyk7XHJcbiAgICAgICAgfSBlbHNlIGlmKHRoYXQuY3VycmVudFN0ZXAgPT0gMSl7XHJcbiAgICAgICAgICAgIHRoYXQuJGVsZW1lbnQuZmluZCgnLmJ0bi1wcmV2JykuYWRkQ2xhc3MoJ2Rpc2FibGVkIGhpZGRlbicpO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgLy8gbW92ZSBzdGVwcyB2aWV3IGlmIG5lZWRlZFxyXG4gICAgICAgIHZhciB0b3RhbFdpZHRoID0gdGhhdC4kZWxlbWVudC53aWR0aCgpIC0gdGhhdC4kZWxlbWVudC5maW5kKCcuYWN0aW9ucycpLm91dGVyV2lkdGgoKTtcclxuXHJcbiAgICAgICAgaWYoc3RlcHNXaWR0aCA8IHRvdGFsV2lkdGgpIHJldHVybjtcclxuXHJcbiAgICAgICAgdmFyIG9mZnNldERpZmYgPSBzdGVwUG9zaXRpb24gLSAodG90YWxXaWR0aCAvIDIpO1xyXG4gICAgICAgIGlmKG9mZnNldERpZmYgPiAwKXtcclxuICAgICAgICAgICAgLy8gbW92ZSBpdCBmb3J3YXJkXHJcbiAgICAgICAgICAgIHN0ZXBzLmNzcygnbGVmdCcsLW9mZnNldERpZmYpO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgIC8vIG1vdmUgaXQgYmFja3dhcmRcclxuICAgICAgICAgICAgc3RlcHMuY3NzKCdsZWZ0JywwKTtcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG5cclxuICAgIG1vdmVTdGVwID0gZnVuY3Rpb24oc3RlcCwgZGlyZWN0aW9uLCBldmVudCwgY2hlY2tTdGVwKXtcclxuICAgICAgICB2YXIgdGhhdCA9IHRoaXMsIGNhbk1vdmUgPSB0cnVlLFxyXG4gICAgICAgIHN0ZXBzID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMgPiBsaScpLFxyXG4gICAgICAgIHRyaWdnZXJFbmQgPSBmYWxzZTtcclxuXHJcbiAgICAgICAgY2hlY2tTdGVwID0gY2hlY2tTdGVwID09PSBmYWxzZSA/IGZhbHNlIDogdHJ1ZTtcclxuXHJcbiAgICAgICAgLy8gY2hlY2sgd2UgY2FuIG1vdmVcclxuICAgICAgICBpZihjaGVja1N0ZXAgJiYgdHlwZW9mIHRoYXQub3B0aW9ucy5jaGVja1N0ZXAgPT0gJ2Z1bmN0aW9uJyl7XHJcbiAgICAgICAgICAgIGNhbk1vdmUgPSB0aGF0Lm9wdGlvbnMuY2hlY2tTdGVwKHRoYXQsZGlyZWN0aW9uLGV2ZW50KTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGlmKCFjYW5Nb3ZlKSByZXR1cm47XHJcblxyXG4gICAgICAgIGlmKHN0ZXApe1xyXG4gICAgICAgICAgICB0aGF0LmN1cnJlbnRTdGVwID0gcGFyc2VJbnQoc3RlcCk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgaWYoZGlyZWN0aW9uKXtcclxuICAgICAgICAgICAgICAgIHRoYXQuY3VycmVudFN0ZXArKztcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHRoYXQuY3VycmVudFN0ZXAtLTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgdGhhdC4kZWxlbWVudC50cmlnZ2VySGFuZGxlcignc3RlcF9jaGFuZ2VkLndpemFyZEJ5R2lybycpO1xyXG5cclxuICAgICAgICBpZih0aGF0LmN1cnJlbnRTdGVwIDwgMCkgdGhhdC5jdXJyZW50U3RlcCA9IDA7XHJcbiAgICAgICAgaWYodGhhdC5jdXJyZW50U3RlcCA+IHN0ZXBzLmxlbmd0aCl7XHJcbiAgICAgICAgICAgIHRoYXQuY3VycmVudFN0ZXAgPSBzdGVwcy5sZW5ndGg7XHJcbiAgICAgICAgICAgIHRyaWdnZXJFbmQgPSB0cnVlO1xyXG4gICAgICAgIH1cclxuXHJcbiAgICAgICAgY2hlY2tTdGF0dXMuY2FsbCh0aGF0KTtcclxuXHJcbiAgICAgICAgaWYodHJpZ2dlckVuZCl7XHJcbiAgICAgICAgICAgIGlmKHR5cGVvZiB0aGF0Lm9wdGlvbnMub25Db21wbGV0ZWQgPT0gJ2Z1bmN0aW9uJyl7XHJcbiAgICAgICAgICAgICAgICB0aGF0Lm9wdGlvbnMub25Db21wbGV0ZWQodGhhdCk7XHJcbiAgICAgICAgICAgIH0gZWxzZSBpZih0aGF0Lm9wdGlvbnMuYXV0b1N1Ym1pdCkge1xyXG4gICAgICAgICAgICAgICAgLy8gc2VhcmNoIGlmIHdpemFyZCBpcyBpbnNpZGUgYSBmb3JtIGFuZCBzdWJtaXQgaXQuXHJcbiAgICAgICAgICAgICAgICB2YXIgZm9ybSA9IHRoYXQuJGVsZW1lbnQuY2xvc2VzdCgnZm9ybScpO1xyXG4gICAgICAgICAgICAgICAgaWYoZm9ybS5sZW5ndGgpIGZvcm0uc3VibWl0KCk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICB9LFxyXG5cclxuICAgIG1ldGhvZHMgPSB7XHJcbiAgICAgICAgaW5pdDogZnVuY3Rpb24gKGVsZW1lbnQsIG9wdGlvbnMpIHtcclxuICAgICAgICAgICAgdmFyIHRoYXQgPSB0aGlzO1xyXG4gICAgICAgICAgICB0aGlzLiRlbGVtZW50ID0gJChlbGVtZW50KTtcclxuICAgICAgICAgICAgdGhpcy5vcHRpb25zID0gJC5leHRlbmQoe30sIGRlZmF1bHRzLCBvcHRpb25zKTtcclxuXHJcbiAgICAgICAgICAgIHZhciBvcHRzID0gdGhpcy5vcHRpb25zO1xyXG5cclxuICAgICAgICAgICAgdGhpcy4kZWxlbWVudC5hZGRDbGFzcygnd2l6YXJkJyk7XHJcblxyXG4gICAgICAgICAgICAvLyBhZGQgdGhlIGJ1dHRvbnNcclxuICAgICAgICAgICAgdmFyIHN0ZXBzQmFyID0gdGhpcy4kZWxlbWVudC5maW5kKCcuc3RlcHMnKSxcclxuICAgICAgICAgICAgdG9wQWN0aW9ucyA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLnRvcC1hY3Rpb25zJyksXHJcbiAgICAgICAgICAgIGJvdHRvbUFjdGlvbnMgPSB0aGlzLiRlbGVtZW50LmZpbmQoJy5ib3R0b20tYWN0aW9ucycpLFxyXG4gICAgICAgICAgICAvLyBxaXl1blxyXG4gICAgICAgICAgICBzdGFibGVBY3Rpb25zID0gdGhpcy4kZWxlbWVudC5maW5kKCcuc3RhYmxlLWFjdGlvbnMnKSxcclxuICAgICAgICAgICAgcHJvZ3Jlc3NCYXIgPSB0aGlzLiRlbGVtZW50LmZpbmQoJy5wcm9ncmVzcy1iYXInKSxcclxuICAgICAgICAgICAgaHRtbCA9ICcnO1xyXG5cclxuICAgICAgICAgICAgLy8gd3JhcCBzdGVwcyBpbiBhIGNvbnRhaW5lciB3aXRoIGhpZGRlbiBvdmVyZmxvdywgaWYgaXQgZG9lc24ndCBoYXZlIGEgY29udGFpbmVyXHJcbiAgICAgICAgICAgIGlmKHN0ZXBzQmFyLnBhcmVudCgpLmhhc0NsYXNzKCd3aXphcmQnKSl7XHJcbiAgICAgICAgICAgICAgICAvLyBsZXQncyBhZGQgYSBjb250YWluZXJcclxuICAgICAgICAgICAgICAgIHN0ZXBzQmFyLndyYXAoJzxkaXYgY2xhc3M9XCJzdGVwcy1pbmRleC1jb250YWluZXJcIj48L2Rpdj4nKTtcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHN0ZXBzQmFyLnBhcmVudCgpLmFkZENsYXNzKCdzdGVwcy1pbmRleC1jb250YWluZXInKTtcclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgaWYob3B0cy50b3BCdXR0b25zICYmIHN0ZXBzQmFyLmxlbmd0aCAmJiAhdG9wQWN0aW9ucy5sZW5ndGgpe1xyXG4gICAgICAgICAgICAgICAgaHRtbCArPSAnPGRpdiBjbGFzcz1cInRvcC1hY3Rpb25zXCI+PGRpdiBjbGFzcz1cImJ0bi1ncm91cFwiPic7XHJcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8c3BhbiBjbGFzcz1cIicrIG9wdHMuYnRuQ2xhc3MgKycgJysgb3B0cy5idG5DbGFzc0RlZmF1bHQgKycgYnRuLXByZXZcIj48c3BhbiBjbGFzcz1cInByZXZpb3VzLXRleHRcIj4nKyBvcHRzLnRleHQucHJldmlvdXMgKyc8L3NwYW4+PC9zcGFuPic7XHJcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8c3BhbiBjbGFzcz1cIicrIG9wdHMuYnRuQ2xhc3MgKycgJysgb3B0cy5idG5DbGFzc0RlZmF1bHQgKycgYnRuLW5leHRcIj48c3BhbiBjbGFzcz1cIm5leHQtdGV4dFwiPicrIG9wdHMudGV4dC5uZXh0ICsnPC9zcGFuPjwvc3Bhbj4nO1xyXG4gICAgICAgICAgICAgICAgLy9xaXl1biA8c3BhbiBjbGFzcz1cImZpbmlzaGVkLXRleHRcIj4nKyBvcHRzLnRleHQuZmluaXNoZWQgKyc8L3NwYW4+XHJcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8L2Rpdj48L2Rpdj4nO1xyXG5cclxuICAgICAgICAgICAgICAgIHN0ZXBzQmFyLmFmdGVyKGh0bWwpO1xyXG4gICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICBodG1sID0gJyc7XHJcbiAgICAgICAgICAgIGlmKG9wdHMuYm90dG9tQnV0dG9ucyAmJiAhYm90dG9tQWN0aW9ucy5sZW5ndGgpe1xyXG4gICAgICAgICAgICAgICAgaHRtbCArPSAnPGRpdiBjbGFzcz1cImJvdHRvbS1hY3Rpb25zXCI+JztcclxuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXYgY2xhc3M9XCJsZWZ0LWFjdGlvbnNcIj48c3BhbiBjbGFzcz1cIicrIG9wdHMuYnRuQ2xhc3MgKycgJysgb3B0cy5idG5DbGFzc0RlZmF1bHQgKycgYnRuLXByZXZcIj48c3BhbiBjbGFzcz1cInByZXZpb3VzLXRleHRcIj4nKyBvcHRzLnRleHQucHJldmlvdXMgKyc8L3NwYW4+PC9zcGFuPjwvZGl2Pic7XHJcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8ZGl2IGNsYXNzPVwicmlnaHQtYWN0aW9uc1wiPjxzcGFuIGNsYXNzPVwiJysgb3B0cy5idG5DbGFzcyArJyAnKyBvcHRzLmJ0bkNsYXNzRGVmYXVsdCArJyBidG4tbmV4dFwiPjxzcGFuIGNsYXNzPVwibmV4dC10ZXh0XCI+Jysgb3B0cy50ZXh0Lm5leHQgKyc8L3NwYW4+PC9zcGFuPjwvZGl2PjwvZGl2Pic7XHJcbiAgICAgICAgICAgICAgICAvLzxxaXl1biA8c3BhbiBjbGFzcz1cImZpbmlzaGVkLXRleHRcIj4nKyBvcHRzLnRleHQuZmluaXNoZWQgKyc8L3NwYW4+XHJcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8ZGl2IGNsYXNzPVwic3RhYmxlLXBhbmVsXCI+PGRpdiBjbGFzcz1cInN0YWJsZS1hY3Rpb25zXCI+JztcclxuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXY+PHNwYW4gY2xhc3M9XCJmaW5pc2hlZC1idG5cIj4nICsgb3B0cy50ZXh0LmZpbmlzaGVkICsnPC9zcGFuPjxhIGNsYXNzPVwiY2FuY2VsLWJ0blwiPkNhbmNlbDwvYT48L2Rpdj48L2Rpdj48L2Rpdj4nO1xyXG4gICAgICAgICAgICAgICAgLy9xaXl1bj5cclxuICAgICAgICAgICAgICAgIHRoYXQuJGVsZW1lbnQuZmluZCgnLnN0ZXBzLWNvbnRlbnQnKS5hcHBlbmQoaHRtbCk7XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIC8vIGFkZCBhcnJvd3MgdG8gYnRuXHJcbiAgICAgICAgICAgIHRoaXMuJGVsZW1lbnQuZmluZCgnLmJ0bi1wcmV2JykucHJlcGVuZCgnPGkgY2xhc3M9XCJ3aXotaWNvbi1hcnJvdy1sZWZ0XCI+PC9pPicpO1xyXG4gICAgICAgICAgICB0aGlzLiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLmFwcGVuZCgnPGkgY2xhc3M9XCJ3aXotaWNvbi1hcnJvdy1yaWdodFwiPjwvaT4nKTtcclxuXHJcbiAgICAgICAgICAgIC8vIGdldCBzdGVwcyBhbmQgcHJlcGFyZSB0aGVtXHJcbiAgICAgICAgICAgIHZhciBzdGVwc0xpID0gdGhpcy4kZWxlbWVudC5maW5kKCcuc3RlcHMgPiBsaScpO1xyXG4gICAgICAgICAgICBmb3IodmFyIGk9MDtpPHN0ZXBzTGkubGVuZ3RoO2krKyl7XHJcbiAgICAgICAgICAgICAgICB2YXIgc3RlcCA9ICQoc3RlcHNMaVtpXSksXHJcbiAgICAgICAgICAgICAgICB0YXJnZXQgPSBzdGVwLmF0dHIoJ2RhdGEtc3RlcCcpLFxyXG4gICAgICAgICAgICAgICAgY29udGVudCA9ICc8c3BhbiBjbGFzcz1cInN0ZXAtdGV4dFwiPicrIHN0ZXAuaHRtbCgpICsnPC9zcGFuPic7XHJcblxyXG4gICAgICAgICAgICAgICAgc3RlcC5lbXB0eSgpLmh0bWwoJzxzcGFuIGNsYXNzPVwic3RlcC1pbmRleFwiPjxzcGFuIGNsYXNzPVwibGFiZWxcIj4nKyAoaSsxKSArJzwvc3Bhbj48L3NwYW4+JysgY29udGVudCArICc8c3BhbiBjbGFzcz1cIndpei1pY29uLWNoZXZyb24tcmlnaHQgY29sb3JBXCI+PC9zcGFuPjxzcGFuIGNsYXNzPVwid2l6LWljb24tY2hldnJvbi1yaWdodCBjb2xvckJcIj48L3NwYW4+Jyk7XHJcblxyXG4gICAgICAgICAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCBbZGF0YS1zdGVwPVwiJysgdGFyZ2V0ICsnXCJdJykuYWRkQ2xhc3MoJ3N0ZXAtcGFuZScpO1xyXG5cclxuICAgICAgICAgICAgICAgIC8vIGRldGVjdCBjdXJyZW50U3RlcFxyXG4gICAgICAgICAgICAgICAgaWYoc3RlcC5oYXNDbGFzcygnYWN0aXZlJykgJiYgIXRoYXQuY3VycmVudFN0ZXApe1xyXG4gICAgICAgICAgICAgICAgICAgIHRoYXQuY3VycmVudFN0ZXAgPSBpKzE7XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgIHRoaXMuJGVsZW1lbnQuZmluZCgnLnN0ZXBzID4gbGk6bGFzdC1jaGlsZCcpLmFkZENsYXNzKCdmaW5hbCcpO1xyXG5cclxuICAgICAgICAgICAgYXR0YWNoRXZlbnRzSGFuZGxlci5jYWxsKHRoaXMpO1xyXG5cclxuICAgICAgICAgICAgdmFyIGNhbGxiYWNrcyA9IFsnY2hlY2tTdGVwJywnb25Db21wbGV0ZWQnXSxjYjtcclxuICAgICAgICAgICAgZm9yKHZhciBpPTA7aTxjYWxsYmFja3MubGVuZ3RoO2krKyl7XHJcbiAgICAgICAgICAgICAgICBjYiA9IGNhbGxiYWNrc1tpXTtcclxuICAgICAgICAgICAgICAgIGlmKHR5cGVvZiB0aGlzLm9wdGlvbnNbY2JdID09ICdzdHJpbmcnICYmIHR5cGVvZiB3aW5kb3dbdGhpcy5vcHRpb25zW2NiXV0gPT0gJ2Z1bmN0aW9uJyl7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5vcHRpb25zW2NiXSA9IHdpbmRvd1t0aGlzLm9wdGlvbnNbY2JdXTtcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgY2hlY2tTdGF0dXMuY2FsbCh0aGlzKTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBuZXh0OiBmdW5jdGlvbihjaGVja1N0ZXAsZXZlbnQpe1xyXG4gICAgICAgICAgICBtb3ZlU3RlcC5jYWxsKHRoaXMsZmFsc2UsdHJ1ZSxldmVudCxjaGVja1N0ZXApO1xyXG4gICAgICAgIH0sXHJcblxyXG4gICAgICAgIHByZXZpb3VzOiBmdW5jdGlvbihjaGVja1N0ZXAsZXZlbnQpe1xyXG4gICAgICAgICAgICBtb3ZlU3RlcC5jYWxsKHRoaXMsZmFsc2UsZmFsc2UsZXZlbnQsY2hlY2tTdGVwKTtcclxuICAgICAgICB9LFxyXG5cclxuICAgICAgICBzZXRTdGVwOiBmdW5jdGlvbihzdGVwLCBjaGVja1N0ZXAsIGV2ZW50KXtcclxuICAgICAgICAgICAgbW92ZVN0ZXAuY2FsbCh0aGlzLHN0ZXAsbnVsbCxldmVudCxjaGVja1N0ZXApO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG4gICAgdmFyIG1haW4gPSBmdW5jdGlvbiAobWV0aG9kKSB7XHJcbiAgICAgICAgdmFyIHRoaXNQbHVnaW4gPSB0aGlzLmRhdGEoZGF0YVBsdWdpbik7XHJcbiAgICAgICAgaWYgKHRoaXNQbHVnaW4pIHtcclxuICAgICAgICAgICAgaWYgKHR5cGVvZiBtZXRob2QgPT09ICdzdHJpbmcnICYmIHRoaXNQbHVnaW5bbWV0aG9kXSkge1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRoaXNQbHVnaW5bbWV0aG9kXS5hcHBseSh0aGlzUGx1Z2luLCBBcnJheS5wcm90b3R5cGUuc2xpY2UuY2FsbChhcmd1bWVudHMsIDEpKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gY29uc29sZS5sb2coJ01ldGhvZCAnICsgYXJnICsgJyBkb2VzIG5vdCBleGlzdCBvbiBqUXVlcnkgLyBqcUxpdGUnICsgcGx1Z2luTmFtZSk7XHJcbiAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgaWYgKCFtZXRob2QgfHwgdHlwZW9mIG1ldGhvZCA9PT0gJ29iamVjdCcpIHtcclxuICAgICAgICAgICAgICAgIHRoaXNQbHVnaW4gPSAkLmV4dGVuZCh7fSwgbWV0aG9kcyk7XHJcbiAgICAgICAgICAgICAgICB0aGlzUGx1Z2luLmluaXQodGhpcywgbWV0aG9kKTtcclxuICAgICAgICAgICAgICAgIHRoaXMuZGF0YShkYXRhUGx1Z2luLCB0aGlzUGx1Z2luKTtcclxuXHJcbiAgICAgICAgICAgICAgICByZXR1cm4gdGhpcztcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICByZXR1cm4gY29uc29sZS5sb2coIHBsdWdpbk5hbWUgKycgaXMgbm90IGluc3RhbnRpYXRlZC4gUGxlYXNlIGNhbGwgJChcInNlbGVjdG9yXCIpLicrIHBsdWdpbk5hbWUgKycoe29wdGlvbnN9KScpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcblxyXG4gICAgLy8gcGx1Z2luIGludGVncmF0aW9uXHJcbiAgICBpZigkLmZuKXtcclxuICAgICAgICAkLmZuWyBwbHVnaW5OYW1lIF0gPSBtYWluO1xyXG4gICAgfSBlbHNlIHtcclxuICAgICAgICAkLnByb3RvdHlwZVsgcGx1Z2luTmFtZSBdID0gbWFpbjtcclxuICAgIH1cclxuXHJcbiAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpe1xyXG4gICAgICAgIHZhciBteVNlbGVjdG9yID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEtd2l6YXJkLWluaXRdJyk7XHJcbiAgICAgICAgJChteVNlbGVjdG9yKVsgcGx1Z2luTmFtZSBdKHt9KTtcclxuICAgIH0pO1xyXG59KGJnLCBkb2N1bWVudCwgd2luZG93KSk7XHJcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL2pxdWVyeS53aXphcmQuanMiXSwibWFwcGluZ3MiOiJBQUFBOzs7Ozs7Ozs7O0FBVUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);