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

eval("/*\n * jQuery / jqLite Wizard Plugin\n * version: 0.0.7\n * Author: Girolamo Tomaselli http://bygiro.com\n *\n * Copyright (c) 2013 G. Tomaselli\n * Licensed under the MIT license.\n */\n\n// compatibility for jQuery / jqLite\nvar bg = bg || false;\nif(!bg){\n    if(typeof jQuery != 'undefined'){\n        bg = jQuery;\n    } else {\n        console.log(\"No jQuery\");\n    }\n}\n\n;(function ($, document, window){\n\n    \"use strict\";\n\n    var pluginName = \"wizardByGiro\",\n    // the name of using in .data()\n    dataPlugin = \"plugin_\" + pluginName,\n    defaults = {\n        currentStep: 0,\n        checkStep: false,\n        onCompleted: false,\n        bottomButtons: true,\n        topButtons: true,\n        autoSubmit: false,\n        keyboard: false,\n        btnClass: 'btn',\n        btnClassDefault: 'btn-default',\n        btnClassCompleted: 'btn-success',\n        text:{\n            finished: 'Complete',\n            next: 'Next',\n            previous: 'Previous'\n        }\n    },\n\n    attachEventsHandler = function(){\n        var that = this,\n        opts = this.options;\n\n        that.$element.find('.btn-next, .btn-prev').on('click', function(e){\n            if($(this).attr('disabled') || $(this).hasClass('disabled') || !$(this).is(':visible')) return;\n\n            var type = $(this).hasClass('btn-next') ? 'next' : 'previous';\n            e.stopPropagation();\n            that[type].call(that,true,e);\n        });\n\n        that.$element.find('.steps > li').on('click', function(e){\n            e.stopPropagation();\n            var step = $(this).attr('data-step'),\n            isCompleted = $(this).hasClass('completed');\n            if(!isCompleted) return true;\n\n            that.setStep.call(that,step,e);\n        });\n\n        $(document).on('keydown', function(e){\n            if(!that.$element.is(':visible')) return;\n\n            // arrow left\n            if(e.ctrlKey && e.keyCode == 37){\n                e.stopPropagation();\n                e.preventDefault();\n                that.previous.call(that,true,e);\n            }\n\n            // arrow right\n            if(e.ctrlKey && e.keyCode == 39){\n                e.stopPropagation();\n                e.preventDefault();\n                that.next.call(that,true,e);\n            }\n        });\n\n    },\n\n    checkStatus = function(){\n        var that = this,\n            currentWidth,\n            stepsWidth = 0,\n            stepPosition = false,\n            steps = that.$element.find('.steps'),\n            stepsItems = that.$element.find('.steps > li'),\n            opts = that.options;\n\n        if(!this.currentStep) this.currentStep = 1;\n\n        stepsItems.removeClass('active');\n        that.$element\n            .find('.steps > li[data-step=\"'+ that.currentStep +'\"]')\n            .addClass('active');\n\n        that.$element.find('.steps-content .step-pane').removeClass('active');\n        var current = that.$element.find('.steps-content .step-pane[data-step=\"'+ that.currentStep +'\"]');\n            current.addClass('active');\n\n        for(var i=0;i<stepsItems.length;i++){\n            var stepLi = $(stepsItems[i]);\n            if(that.currentStep > (i+1)){\n                stepLi.addClass('completed');\n            } else {\n                stepLi.removeClass('completed');\n            }\n\n            currentWidth = stepLi.outerWidth();\n            if(!stepPosition && stepLi.hasClass('active')){\n                stepPosition = stepsWidth + (currentWidth / 2);\n            }\n\n            stepsWidth += currentWidth;\n        }\n\n        // set buttons based on current step\n        //qiyun that.$element.find('.btn-next').removeClass('final-step '+ opts.btnClassCompleted).addClass(opts.btnClassDefault);\n        that.$element.find('.btn-next').removeClass('disabled hidden').addClass(opts.btnClassDefault);\n        that.$element.find('.btn-prev').removeClass('disabled hidden');\n        that.$element.find('.finished-btn').addClass('final-step btn btn-success'); //qiyun\n        that.$element.find('.cancel-btn').addClass('btn btn-default'); //qiyun\n\n        if(that.currentStep == stepsItems.length){\n            // we are in the last step\n            //qiyun that.$element.find('.btn-next').removeClass(opts.btnClassDefault).addClass('final-step '+ opts.btnClassCompleted);\n            that.$element.find('.btn-next').removeClass(opts.btnClassDefault).addClass('disabled hidden');\n        } else if(that.currentStep == 1){\n            that.$element.find('.btn-prev').addClass('disabled hidden');\n        }\n\n        // move steps view if needed\n        var totalWidth = that.$element.width() - that.$element.find('.actions').outerWidth();\n\n        if(stepsWidth < totalWidth) return;\n\n        var offsetDiff = stepPosition - (totalWidth / 2);\n        if(offsetDiff > 0){\n            // move it forward\n            steps.css('left',-offsetDiff);\n        } else {\n            // move it backward\n            steps.css('left',0);\n        }\n    },\n\n    moveStep = function(step, direction, event, checkStep){\n        var that = this, canMove = true,\n        steps = that.$element.find('.steps > li'),\n        triggerEnd = false;\n\n        checkStep = checkStep === false ? false : true;\n\n        // check we can move\n        if(checkStep && typeof that.options.checkStep == 'function'){\n            canMove = that.options.checkStep(that,direction,event);\n        }\n\n        if(!canMove) return;\n\n        if(step){\n            that.currentStep = parseInt(step);\n        } else {\n            if(direction){\n                that.currentStep++;\n            } else {\n                that.currentStep--;\n            }\n        }\n\n        that.$element.triggerHandler('step_changed.wizardByGiro');\n\n        if(that.currentStep < 0) that.currentStep = 0;\n        if(that.currentStep > steps.length){\n            that.currentStep = steps.length;\n            triggerEnd = true;\n        }\n\n        checkStatus.call(that);\n\n        if(triggerEnd){\n            if(typeof that.options.onCompleted == 'function'){\n                that.options.onCompleted(that);\n            } else if(that.options.autoSubmit) {\n                // search if wizard is inside a form and submit it.\n                var form = that.$element.closest('form');\n                if(form.length) form.submit();\n            }\n        }\n    },\n\n    methods = {\n        init: function (element, options) {\n            var this$1 = this;\n\n            var that = this;\n            this.$element = $(element);\n            this.options = $.extend({}, defaults, options);\n\n            var opts = this.options;\n\n            this.$element.addClass('wizard');\n\n            // add the buttons\n            var stepsBar = this.$element.find('.steps'),\n            topActions = this.$element.find('.top-actions'),\n            bottomActions = this.$element.find('.bottom-actions'),\n            // qiyun\n            stableActions = this.$element.find('.stable-actions'),\n            progressBar = this.$element.find('.progress-bar'),\n            html = '';\n\n            // wrap steps in a container with hidden overflow, if it doesn't have a container\n            if(stepsBar.parent().hasClass('wizard')){\n                // let's add a container\n                stepsBar.wrap('<div class=\"steps-index-container\"></div>');\n            } else {\n                stepsBar.parent().addClass('steps-index-container');\n            }\n\n            if(opts.topButtons && stepsBar.length && !topActions.length){\n                html += '<div class=\"top-actions\"><div class=\"btn-group\">';\n                html += '<span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-prev\"><span class=\"previous-text\">'+ opts.text.previous +'</span></span>';\n                html += '<span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-next\"><span class=\"next-text\">'+ opts.text.next +'</span></span>';\n                //qiyun <span class=\"finished-text\">'+ opts.text.finished +'</span>\n                html += '</div></div>';\n\n                stepsBar.after(html);\n            }\n\n            html = '';\n            if(opts.bottomButtons && !bottomActions.length){\n                html += '<div class=\"bottom-actions\">';\n                html += '<div class=\"left-actions\"><span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-prev\"><span class=\"previous-text\">'+ opts.text.previous +'</span></span></div>';\n                html += '<div class=\"right-actions\"><span class=\"'+ opts.btnClass +' '+ opts.btnClassDefault +' btn-next\"><span class=\"next-text\">'+ opts.text.next +'</span></span></div></div>';\n                //<qiyun <span class=\"finished-text\">'+ opts.text.finished +'</span>\n                html += '<div class=\"stable-panel\"><div class=\"stable-actions\">';\n                html += '<div><span class=\"finished-btn\">' + opts.text.finished +'</span><a class=\"cancel-btn\">Cancel</a></div></div></div>';\n                //qiyun>\n                that.$element.find('.steps-content').append(html);\n            }\n\n            // add arrows to btn\n            this.$element.find('.btn-prev').prepend('<i class=\"wiz-icon-arrow-left\"></i>');\n            this.$element.find('.btn-next').append('<i class=\"wiz-icon-arrow-right\"></i>');\n\n            // get steps and prepare them\n            var stepsLi = this.$element.find('.steps > li');\n            for(var i=0;i<stepsLi.length;i++){\n                var step = $(stepsLi[i]),\n                target = step.attr('data-step'),\n                content = '<span class=\"step-text\">'+ step.html() +'</span>';\n\n                step.empty().html('<span class=\"step-index\"><span class=\"label\">'+ (i+1) +'</span></span>'+ content + '<span class=\"wiz-icon-chevron-right colorA\"></span><span class=\"wiz-icon-chevron-right colorB\"></span>');\n\n                that.$element.find('.steps-content [data-step=\"'+ target +'\"]').addClass('step-pane');\n\n                // detect currentStep\n                if(step.hasClass('active') && !that.currentStep){\n                    that.currentStep = i+1;\n                }\n            }\n\n            this.$element.find('.steps > li:last-child').addClass('final');\n\n            attachEventsHandler.call(this);\n\n            var callbacks = ['checkStep','onCompleted'],cb;\n            for(var i=0;i<callbacks.length;i++){\n                cb = callbacks[i];\n                if(typeof this$1.options[cb] == 'string' && typeof window[this$1.options[cb]] == 'function'){\n                    this$1.options[cb] = window[this$1.options[cb]];\n                }\n            }\n\n            checkStatus.call(this);\n        },\n\n        next: function(checkStep,event){\n            moveStep.call(this,false,true,event,checkStep);\n        },\n\n        previous: function(checkStep,event){\n            moveStep.call(this,false,false,event,checkStep);\n        },\n\n        setStep: function(step, checkStep, event){\n            moveStep.call(this,step,null,event,checkStep);\n        }\n    };\n\n    var main = function (method) {\n        var thisPlugin = this.data(dataPlugin);\n        if (thisPlugin) {\n            if (typeof method === 'string' && thisPlugin[method]) {\n                return thisPlugin[method].apply(thisPlugin, Array.prototype.slice.call(arguments, 1));\n            }\n            return console.log('Method ' + arg + ' does not exist on jQuery / jqLite' + pluginName);\n        } else {\n            if (!method || typeof method === 'object') {\n                thisPlugin = $.extend({}, methods);\n                thisPlugin.init(this, method);\n                this.data(dataPlugin, thisPlugin);\n\n                return this;\n            }\n            return console.log( pluginName +' is not instantiated. Please call $(\"selector\").'+ pluginName +'({options})');\n        }\n    };\n\n    // plugin integration\n    if($.fn){\n        $.fn[ pluginName ] = main;\n    } else {\n        $.prototype[ pluginName ] = main;\n    }\n\n    $(document).ready(function(){\n        var mySelector = document.querySelector('[data-wizard-init]');\n        $(mySelector)[ pluginName ]({});\n    });\n}(bg, document, window));\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2pxdWVyeS53aXphcmQuanM/YjMxOSJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogalF1ZXJ5IC8ganFMaXRlIFdpemFyZCBQbHVnaW5cbiAqIHZlcnNpb246IDAuMC43XG4gKiBBdXRob3I6IEdpcm9sYW1vIFRvbWFzZWxsaSBodHRwOi8vYnlnaXJvLmNvbVxuICpcbiAqIENvcHlyaWdodCAoYykgMjAxMyBHLiBUb21hc2VsbGlcbiAqIExpY2Vuc2VkIHVuZGVyIHRoZSBNSVQgbGljZW5zZS5cbiAqL1xuXG4vLyBjb21wYXRpYmlsaXR5IGZvciBqUXVlcnkgLyBqcUxpdGVcbnZhciBiZyA9IGJnIHx8IGZhbHNlO1xuaWYoIWJnKXtcbiAgICBpZih0eXBlb2YgalF1ZXJ5ICE9ICd1bmRlZmluZWQnKXtcbiAgICAgICAgYmcgPSBqUXVlcnk7XG4gICAgfSBlbHNlIHtcbiAgICAgICAgY29uc29sZS5sb2coXCJObyBqUXVlcnlcIik7XG4gICAgfVxufVxuXG47KGZ1bmN0aW9uICgkLCBkb2N1bWVudCwgd2luZG93KXtcblxuICAgIFwidXNlIHN0cmljdFwiO1xuXG4gICAgdmFyIHBsdWdpbk5hbWUgPSBcIndpemFyZEJ5R2lyb1wiLFxuICAgIC8vIHRoZSBuYW1lIG9mIHVzaW5nIGluIC5kYXRhKClcbiAgICBkYXRhUGx1Z2luID0gXCJwbHVnaW5fXCIgKyBwbHVnaW5OYW1lLFxuICAgIGRlZmF1bHRzID0ge1xuICAgICAgICBjdXJyZW50U3RlcDogMCxcbiAgICAgICAgY2hlY2tTdGVwOiBmYWxzZSxcbiAgICAgICAgb25Db21wbGV0ZWQ6IGZhbHNlLFxuICAgICAgICBib3R0b21CdXR0b25zOiB0cnVlLFxuICAgICAgICB0b3BCdXR0b25zOiB0cnVlLFxuICAgICAgICBhdXRvU3VibWl0OiBmYWxzZSxcbiAgICAgICAga2V5Ym9hcmQ6IGZhbHNlLFxuICAgICAgICBidG5DbGFzczogJ2J0bicsXG4gICAgICAgIGJ0bkNsYXNzRGVmYXVsdDogJ2J0bi1kZWZhdWx0JyxcbiAgICAgICAgYnRuQ2xhc3NDb21wbGV0ZWQ6ICdidG4tc3VjY2VzcycsXG4gICAgICAgIHRleHQ6e1xuICAgICAgICAgICAgZmluaXNoZWQ6ICdDb21wbGV0ZScsXG4gICAgICAgICAgICBuZXh0OiAnTmV4dCcsXG4gICAgICAgICAgICBwcmV2aW91czogJ1ByZXZpb3VzJ1xuICAgICAgICB9XG4gICAgfSxcblxuICAgIGF0dGFjaEV2ZW50c0hhbmRsZXIgPSBmdW5jdGlvbigpe1xuICAgICAgICB2YXIgdGhhdCA9IHRoaXMsXG4gICAgICAgIG9wdHMgPSB0aGlzLm9wdGlvbnM7XG5cbiAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuYnRuLW5leHQsIC5idG4tcHJldicpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGUpe1xuICAgICAgICAgICAgaWYoJCh0aGlzKS5hdHRyKCdkaXNhYmxlZCcpIHx8ICQodGhpcykuaGFzQ2xhc3MoJ2Rpc2FibGVkJykgfHwgISQodGhpcykuaXMoJzp2aXNpYmxlJykpIHJldHVybjtcblxuICAgICAgICAgICAgdmFyIHR5cGUgPSAkKHRoaXMpLmhhc0NsYXNzKCdidG4tbmV4dCcpID8gJ25leHQnIDogJ3ByZXZpb3VzJztcbiAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICAgICAgICB0aGF0W3R5cGVdLmNhbGwodGhhdCx0cnVlLGUpO1xuICAgICAgICB9KTtcblxuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5zdGVwcyA+IGxpJykub24oJ2NsaWNrJywgZnVuY3Rpb24oZSl7XG4gICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgdmFyIHN0ZXAgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtc3RlcCcpLFxuICAgICAgICAgICAgaXNDb21wbGV0ZWQgPSAkKHRoaXMpLmhhc0NsYXNzKCdjb21wbGV0ZWQnKTtcbiAgICAgICAgICAgIGlmKCFpc0NvbXBsZXRlZCkgcmV0dXJuIHRydWU7XG5cbiAgICAgICAgICAgIHRoYXQuc2V0U3RlcC5jYWxsKHRoYXQsc3RlcCxlKTtcbiAgICAgICAgfSk7XG5cbiAgICAgICAgJChkb2N1bWVudCkub24oJ2tleWRvd24nLCBmdW5jdGlvbihlKXtcbiAgICAgICAgICAgIGlmKCF0aGF0LiRlbGVtZW50LmlzKCc6dmlzaWJsZScpKSByZXR1cm47XG5cbiAgICAgICAgICAgIC8vIGFycm93IGxlZnRcbiAgICAgICAgICAgIGlmKGUuY3RybEtleSAmJiBlLmtleUNvZGUgPT0gMzcpe1xuICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgICAgIHRoYXQucHJldmlvdXMuY2FsbCh0aGF0LHRydWUsZSk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIC8vIGFycm93IHJpZ2h0XG4gICAgICAgICAgICBpZihlLmN0cmxLZXkgJiYgZS5rZXlDb2RlID09IDM5KXtcbiAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgICAgICB0aGF0Lm5leHQuY2FsbCh0aGF0LHRydWUsZSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuXG4gICAgfSxcblxuICAgIGNoZWNrU3RhdHVzID0gZnVuY3Rpb24oKXtcbiAgICAgICAgdmFyIHRoYXQgPSB0aGlzLFxuICAgICAgICAgICAgY3VycmVudFdpZHRoLFxuICAgICAgICAgICAgc3RlcHNXaWR0aCA9IDAsXG4gICAgICAgICAgICBzdGVwUG9zaXRpb24gPSBmYWxzZSxcbiAgICAgICAgICAgIHN0ZXBzID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMnKSxcbiAgICAgICAgICAgIHN0ZXBzSXRlbXMgPSB0aGF0LiRlbGVtZW50LmZpbmQoJy5zdGVwcyA+IGxpJyksXG4gICAgICAgICAgICBvcHRzID0gdGhhdC5vcHRpb25zO1xuXG4gICAgICAgIGlmKCF0aGlzLmN1cnJlbnRTdGVwKSB0aGlzLmN1cnJlbnRTdGVwID0gMTtcblxuICAgICAgICBzdGVwc0l0ZW1zLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcbiAgICAgICAgdGhhdC4kZWxlbWVudFxuICAgICAgICAgICAgLmZpbmQoJy5zdGVwcyA+IGxpW2RhdGEtc3RlcD1cIicrIHRoYXQuY3VycmVudFN0ZXAgKydcIl0nKVxuICAgICAgICAgICAgLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5zdGVwcy1jb250ZW50IC5zdGVwLXBhbmUnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG4gICAgICAgIHZhciBjdXJyZW50ID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCAuc3RlcC1wYW5lW2RhdGEtc3RlcD1cIicrIHRoYXQuY3VycmVudFN0ZXAgKydcIl0nKTtcbiAgICAgICAgICAgIGN1cnJlbnQuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuXG4gICAgICAgIGZvcih2YXIgaT0wO2k8c3RlcHNJdGVtcy5sZW5ndGg7aSsrKXtcbiAgICAgICAgICAgIHZhciBzdGVwTGkgPSAkKHN0ZXBzSXRlbXNbaV0pO1xuICAgICAgICAgICAgaWYodGhhdC5jdXJyZW50U3RlcCA+IChpKzEpKXtcbiAgICAgICAgICAgICAgICBzdGVwTGkuYWRkQ2xhc3MoJ2NvbXBsZXRlZCcpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBzdGVwTGkucmVtb3ZlQ2xhc3MoJ2NvbXBsZXRlZCcpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBjdXJyZW50V2lkdGggPSBzdGVwTGkub3V0ZXJXaWR0aCgpO1xuICAgICAgICAgICAgaWYoIXN0ZXBQb3NpdGlvbiAmJiBzdGVwTGkuaGFzQ2xhc3MoJ2FjdGl2ZScpKXtcbiAgICAgICAgICAgICAgICBzdGVwUG9zaXRpb24gPSBzdGVwc1dpZHRoICsgKGN1cnJlbnRXaWR0aCAvIDIpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBzdGVwc1dpZHRoICs9IGN1cnJlbnRXaWR0aDtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vIHNldCBidXR0b25zIGJhc2VkIG9uIGN1cnJlbnQgc3RlcFxuICAgICAgICAvL3FpeXVuIHRoYXQuJGVsZW1lbnQuZmluZCgnLmJ0bi1uZXh0JykucmVtb3ZlQ2xhc3MoJ2ZpbmFsLXN0ZXAgJysgb3B0cy5idG5DbGFzc0NvbXBsZXRlZCkuYWRkQ2xhc3Mob3B0cy5idG5DbGFzc0RlZmF1bHQpO1xuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLnJlbW92ZUNsYXNzKCdkaXNhYmxlZCBoaWRkZW4nKS5hZGRDbGFzcyhvcHRzLmJ0bkNsYXNzRGVmYXVsdCk7XG4gICAgICAgIHRoYXQuJGVsZW1lbnQuZmluZCgnLmJ0bi1wcmV2JykucmVtb3ZlQ2xhc3MoJ2Rpc2FibGVkIGhpZGRlbicpO1xuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5maW5pc2hlZC1idG4nKS5hZGRDbGFzcygnZmluYWwtc3RlcCBidG4gYnRuLXN1Y2Nlc3MnKTsgLy9xaXl1blxuICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5jYW5jZWwtYnRuJykuYWRkQ2xhc3MoJ2J0biBidG4tZGVmYXVsdCcpOyAvL3FpeXVuXG5cbiAgICAgICAgaWYodGhhdC5jdXJyZW50U3RlcCA9PSBzdGVwc0l0ZW1zLmxlbmd0aCl7XG4gICAgICAgICAgICAvLyB3ZSBhcmUgaW4gdGhlIGxhc3Qgc3RlcFxuICAgICAgICAgICAgLy9xaXl1biB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tbmV4dCcpLnJlbW92ZUNsYXNzKG9wdHMuYnRuQ2xhc3NEZWZhdWx0KS5hZGRDbGFzcygnZmluYWwtc3RlcCAnKyBvcHRzLmJ0bkNsYXNzQ29tcGxldGVkKTtcbiAgICAgICAgICAgIHRoYXQuJGVsZW1lbnQuZmluZCgnLmJ0bi1uZXh0JykucmVtb3ZlQ2xhc3Mob3B0cy5idG5DbGFzc0RlZmF1bHQpLmFkZENsYXNzKCdkaXNhYmxlZCBoaWRkZW4nKTtcbiAgICAgICAgfSBlbHNlIGlmKHRoYXQuY3VycmVudFN0ZXAgPT0gMSl7XG4gICAgICAgICAgICB0aGF0LiRlbGVtZW50LmZpbmQoJy5idG4tcHJldicpLmFkZENsYXNzKCdkaXNhYmxlZCBoaWRkZW4nKTtcbiAgICAgICAgfVxuXG4gICAgICAgIC8vIG1vdmUgc3RlcHMgdmlldyBpZiBuZWVkZWRcbiAgICAgICAgdmFyIHRvdGFsV2lkdGggPSB0aGF0LiRlbGVtZW50LndpZHRoKCkgLSB0aGF0LiRlbGVtZW50LmZpbmQoJy5hY3Rpb25zJykub3V0ZXJXaWR0aCgpO1xuXG4gICAgICAgIGlmKHN0ZXBzV2lkdGggPCB0b3RhbFdpZHRoKSByZXR1cm47XG5cbiAgICAgICAgdmFyIG9mZnNldERpZmYgPSBzdGVwUG9zaXRpb24gLSAodG90YWxXaWR0aCAvIDIpO1xuICAgICAgICBpZihvZmZzZXREaWZmID4gMCl7XG4gICAgICAgICAgICAvLyBtb3ZlIGl0IGZvcndhcmRcbiAgICAgICAgICAgIHN0ZXBzLmNzcygnbGVmdCcsLW9mZnNldERpZmYpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgLy8gbW92ZSBpdCBiYWNrd2FyZFxuICAgICAgICAgICAgc3RlcHMuY3NzKCdsZWZ0JywwKTtcbiAgICAgICAgfVxuICAgIH0sXG5cbiAgICBtb3ZlU3RlcCA9IGZ1bmN0aW9uKHN0ZXAsIGRpcmVjdGlvbiwgZXZlbnQsIGNoZWNrU3RlcCl7XG4gICAgICAgIHZhciB0aGF0ID0gdGhpcywgY2FuTW92ZSA9IHRydWUsXG4gICAgICAgIHN0ZXBzID0gdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMgPiBsaScpLFxuICAgICAgICB0cmlnZ2VyRW5kID0gZmFsc2U7XG5cbiAgICAgICAgY2hlY2tTdGVwID0gY2hlY2tTdGVwID09PSBmYWxzZSA/IGZhbHNlIDogdHJ1ZTtcblxuICAgICAgICAvLyBjaGVjayB3ZSBjYW4gbW92ZVxuICAgICAgICBpZihjaGVja1N0ZXAgJiYgdHlwZW9mIHRoYXQub3B0aW9ucy5jaGVja1N0ZXAgPT0gJ2Z1bmN0aW9uJyl7XG4gICAgICAgICAgICBjYW5Nb3ZlID0gdGhhdC5vcHRpb25zLmNoZWNrU3RlcCh0aGF0LGRpcmVjdGlvbixldmVudCk7XG4gICAgICAgIH1cblxuICAgICAgICBpZighY2FuTW92ZSkgcmV0dXJuO1xuXG4gICAgICAgIGlmKHN0ZXApe1xuICAgICAgICAgICAgdGhhdC5jdXJyZW50U3RlcCA9IHBhcnNlSW50KHN0ZXApO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgaWYoZGlyZWN0aW9uKXtcbiAgICAgICAgICAgICAgICB0aGF0LmN1cnJlbnRTdGVwKys7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHRoYXQuY3VycmVudFN0ZXAtLTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuXG4gICAgICAgIHRoYXQuJGVsZW1lbnQudHJpZ2dlckhhbmRsZXIoJ3N0ZXBfY2hhbmdlZC53aXphcmRCeUdpcm8nKTtcblxuICAgICAgICBpZih0aGF0LmN1cnJlbnRTdGVwIDwgMCkgdGhhdC5jdXJyZW50U3RlcCA9IDA7XG4gICAgICAgIGlmKHRoYXQuY3VycmVudFN0ZXAgPiBzdGVwcy5sZW5ndGgpe1xuICAgICAgICAgICAgdGhhdC5jdXJyZW50U3RlcCA9IHN0ZXBzLmxlbmd0aDtcbiAgICAgICAgICAgIHRyaWdnZXJFbmQgPSB0cnVlO1xuICAgICAgICB9XG5cbiAgICAgICAgY2hlY2tTdGF0dXMuY2FsbCh0aGF0KTtcblxuICAgICAgICBpZih0cmlnZ2VyRW5kKXtcbiAgICAgICAgICAgIGlmKHR5cGVvZiB0aGF0Lm9wdGlvbnMub25Db21wbGV0ZWQgPT0gJ2Z1bmN0aW9uJyl7XG4gICAgICAgICAgICAgICAgdGhhdC5vcHRpb25zLm9uQ29tcGxldGVkKHRoYXQpO1xuICAgICAgICAgICAgfSBlbHNlIGlmKHRoYXQub3B0aW9ucy5hdXRvU3VibWl0KSB7XG4gICAgICAgICAgICAgICAgLy8gc2VhcmNoIGlmIHdpemFyZCBpcyBpbnNpZGUgYSBmb3JtIGFuZCBzdWJtaXQgaXQuXG4gICAgICAgICAgICAgICAgdmFyIGZvcm0gPSB0aGF0LiRlbGVtZW50LmNsb3Nlc3QoJ2Zvcm0nKTtcbiAgICAgICAgICAgICAgICBpZihmb3JtLmxlbmd0aCkgZm9ybS5zdWJtaXQoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0sXG5cbiAgICBtZXRob2RzID0ge1xuICAgICAgICBpbml0OiBmdW5jdGlvbiAoZWxlbWVudCwgb3B0aW9ucykge1xuICAgICAgICAgICAgdmFyIHRoYXQgPSB0aGlzO1xuICAgICAgICAgICAgdGhpcy4kZWxlbWVudCA9ICQoZWxlbWVudCk7XG4gICAgICAgICAgICB0aGlzLm9wdGlvbnMgPSAkLmV4dGVuZCh7fSwgZGVmYXVsdHMsIG9wdGlvbnMpO1xuXG4gICAgICAgICAgICB2YXIgb3B0cyA9IHRoaXMub3B0aW9ucztcblxuICAgICAgICAgICAgdGhpcy4kZWxlbWVudC5hZGRDbGFzcygnd2l6YXJkJyk7XG5cbiAgICAgICAgICAgIC8vIGFkZCB0aGUgYnV0dG9uc1xuICAgICAgICAgICAgdmFyIHN0ZXBzQmFyID0gdGhpcy4kZWxlbWVudC5maW5kKCcuc3RlcHMnKSxcbiAgICAgICAgICAgIHRvcEFjdGlvbnMgPSB0aGlzLiRlbGVtZW50LmZpbmQoJy50b3AtYWN0aW9ucycpLFxuICAgICAgICAgICAgYm90dG9tQWN0aW9ucyA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLmJvdHRvbS1hY3Rpb25zJyksXG4gICAgICAgICAgICAvLyBxaXl1blxuICAgICAgICAgICAgc3RhYmxlQWN0aW9ucyA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLnN0YWJsZS1hY3Rpb25zJyksXG4gICAgICAgICAgICBwcm9ncmVzc0JhciA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLnByb2dyZXNzLWJhcicpLFxuICAgICAgICAgICAgaHRtbCA9ICcnO1xuXG4gICAgICAgICAgICAvLyB3cmFwIHN0ZXBzIGluIGEgY29udGFpbmVyIHdpdGggaGlkZGVuIG92ZXJmbG93LCBpZiBpdCBkb2Vzbid0IGhhdmUgYSBjb250YWluZXJcbiAgICAgICAgICAgIGlmKHN0ZXBzQmFyLnBhcmVudCgpLmhhc0NsYXNzKCd3aXphcmQnKSl7XG4gICAgICAgICAgICAgICAgLy8gbGV0J3MgYWRkIGEgY29udGFpbmVyXG4gICAgICAgICAgICAgICAgc3RlcHNCYXIud3JhcCgnPGRpdiBjbGFzcz1cInN0ZXBzLWluZGV4LWNvbnRhaW5lclwiPjwvZGl2PicpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBzdGVwc0Jhci5wYXJlbnQoKS5hZGRDbGFzcygnc3RlcHMtaW5kZXgtY29udGFpbmVyJyk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmKG9wdHMudG9wQnV0dG9ucyAmJiBzdGVwc0Jhci5sZW5ndGggJiYgIXRvcEFjdGlvbnMubGVuZ3RoKXtcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8ZGl2IGNsYXNzPVwidG9wLWFjdGlvbnNcIj48ZGl2IGNsYXNzPVwiYnRuLWdyb3VwXCI+JztcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8c3BhbiBjbGFzcz1cIicrIG9wdHMuYnRuQ2xhc3MgKycgJysgb3B0cy5idG5DbGFzc0RlZmF1bHQgKycgYnRuLXByZXZcIj48c3BhbiBjbGFzcz1cInByZXZpb3VzLXRleHRcIj4nKyBvcHRzLnRleHQucHJldmlvdXMgKyc8L3NwYW4+PC9zcGFuPic7XG4gICAgICAgICAgICAgICAgaHRtbCArPSAnPHNwYW4gY2xhc3M9XCInKyBvcHRzLmJ0bkNsYXNzICsnICcrIG9wdHMuYnRuQ2xhc3NEZWZhdWx0ICsnIGJ0bi1uZXh0XCI+PHNwYW4gY2xhc3M9XCJuZXh0LXRleHRcIj4nKyBvcHRzLnRleHQubmV4dCArJzwvc3Bhbj48L3NwYW4+JztcbiAgICAgICAgICAgICAgICAvL3FpeXVuIDxzcGFuIGNsYXNzPVwiZmluaXNoZWQtdGV4dFwiPicrIG9wdHMudGV4dC5maW5pc2hlZCArJzwvc3Bhbj5cbiAgICAgICAgICAgICAgICBodG1sICs9ICc8L2Rpdj48L2Rpdj4nO1xuXG4gICAgICAgICAgICAgICAgc3RlcHNCYXIuYWZ0ZXIoaHRtbCk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGh0bWwgPSAnJztcbiAgICAgICAgICAgIGlmKG9wdHMuYm90dG9tQnV0dG9ucyAmJiAhYm90dG9tQWN0aW9ucy5sZW5ndGgpe1xuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXYgY2xhc3M9XCJib3R0b20tYWN0aW9uc1wiPic7XG4gICAgICAgICAgICAgICAgaHRtbCArPSAnPGRpdiBjbGFzcz1cImxlZnQtYWN0aW9uc1wiPjxzcGFuIGNsYXNzPVwiJysgb3B0cy5idG5DbGFzcyArJyAnKyBvcHRzLmJ0bkNsYXNzRGVmYXVsdCArJyBidG4tcHJldlwiPjxzcGFuIGNsYXNzPVwicHJldmlvdXMtdGV4dFwiPicrIG9wdHMudGV4dC5wcmV2aW91cyArJzwvc3Bhbj48L3NwYW4+PC9kaXY+JztcbiAgICAgICAgICAgICAgICBodG1sICs9ICc8ZGl2IGNsYXNzPVwicmlnaHQtYWN0aW9uc1wiPjxzcGFuIGNsYXNzPVwiJysgb3B0cy5idG5DbGFzcyArJyAnKyBvcHRzLmJ0bkNsYXNzRGVmYXVsdCArJyBidG4tbmV4dFwiPjxzcGFuIGNsYXNzPVwibmV4dC10ZXh0XCI+Jysgb3B0cy50ZXh0Lm5leHQgKyc8L3NwYW4+PC9zcGFuPjwvZGl2PjwvZGl2Pic7XG4gICAgICAgICAgICAgICAgLy88cWl5dW4gPHNwYW4gY2xhc3M9XCJmaW5pc2hlZC10ZXh0XCI+Jysgb3B0cy50ZXh0LmZpbmlzaGVkICsnPC9zcGFuPlxuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXYgY2xhc3M9XCJzdGFibGUtcGFuZWxcIj48ZGl2IGNsYXNzPVwic3RhYmxlLWFjdGlvbnNcIj4nO1xuICAgICAgICAgICAgICAgIGh0bWwgKz0gJzxkaXY+PHNwYW4gY2xhc3M9XCJmaW5pc2hlZC1idG5cIj4nICsgb3B0cy50ZXh0LmZpbmlzaGVkICsnPC9zcGFuPjxhIGNsYXNzPVwiY2FuY2VsLWJ0blwiPkNhbmNlbDwvYT48L2Rpdj48L2Rpdj48L2Rpdj4nO1xuICAgICAgICAgICAgICAgIC8vcWl5dW4+XG4gICAgICAgICAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCcpLmFwcGVuZChodG1sKTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgLy8gYWRkIGFycm93cyB0byBidG5cbiAgICAgICAgICAgIHRoaXMuJGVsZW1lbnQuZmluZCgnLmJ0bi1wcmV2JykucHJlcGVuZCgnPGkgY2xhc3M9XCJ3aXotaWNvbi1hcnJvdy1sZWZ0XCI+PC9pPicpO1xuICAgICAgICAgICAgdGhpcy4kZWxlbWVudC5maW5kKCcuYnRuLW5leHQnKS5hcHBlbmQoJzxpIGNsYXNzPVwid2l6LWljb24tYXJyb3ctcmlnaHRcIj48L2k+Jyk7XG5cbiAgICAgICAgICAgIC8vIGdldCBzdGVwcyBhbmQgcHJlcGFyZSB0aGVtXG4gICAgICAgICAgICB2YXIgc3RlcHNMaSA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLnN0ZXBzID4gbGknKTtcbiAgICAgICAgICAgIGZvcih2YXIgaT0wO2k8c3RlcHNMaS5sZW5ndGg7aSsrKXtcbiAgICAgICAgICAgICAgICB2YXIgc3RlcCA9ICQoc3RlcHNMaVtpXSksXG4gICAgICAgICAgICAgICAgdGFyZ2V0ID0gc3RlcC5hdHRyKCdkYXRhLXN0ZXAnKSxcbiAgICAgICAgICAgICAgICBjb250ZW50ID0gJzxzcGFuIGNsYXNzPVwic3RlcC10ZXh0XCI+Jysgc3RlcC5odG1sKCkgKyc8L3NwYW4+JztcblxuICAgICAgICAgICAgICAgIHN0ZXAuZW1wdHkoKS5odG1sKCc8c3BhbiBjbGFzcz1cInN0ZXAtaW5kZXhcIj48c3BhbiBjbGFzcz1cImxhYmVsXCI+JysgKGkrMSkgKyc8L3NwYW4+PC9zcGFuPicrIGNvbnRlbnQgKyAnPHNwYW4gY2xhc3M9XCJ3aXotaWNvbi1jaGV2cm9uLXJpZ2h0IGNvbG9yQVwiPjwvc3Bhbj48c3BhbiBjbGFzcz1cIndpei1pY29uLWNoZXZyb24tcmlnaHQgY29sb3JCXCI+PC9zcGFuPicpO1xuXG4gICAgICAgICAgICAgICAgdGhhdC4kZWxlbWVudC5maW5kKCcuc3RlcHMtY29udGVudCBbZGF0YS1zdGVwPVwiJysgdGFyZ2V0ICsnXCJdJykuYWRkQ2xhc3MoJ3N0ZXAtcGFuZScpO1xuXG4gICAgICAgICAgICAgICAgLy8gZGV0ZWN0IGN1cnJlbnRTdGVwXG4gICAgICAgICAgICAgICAgaWYoc3RlcC5oYXNDbGFzcygnYWN0aXZlJykgJiYgIXRoYXQuY3VycmVudFN0ZXApe1xuICAgICAgICAgICAgICAgICAgICB0aGF0LmN1cnJlbnRTdGVwID0gaSsxO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgdGhpcy4kZWxlbWVudC5maW5kKCcuc3RlcHMgPiBsaTpsYXN0LWNoaWxkJykuYWRkQ2xhc3MoJ2ZpbmFsJyk7XG5cbiAgICAgICAgICAgIGF0dGFjaEV2ZW50c0hhbmRsZXIuY2FsbCh0aGlzKTtcblxuICAgICAgICAgICAgdmFyIGNhbGxiYWNrcyA9IFsnY2hlY2tTdGVwJywnb25Db21wbGV0ZWQnXSxjYjtcbiAgICAgICAgICAgIGZvcih2YXIgaT0wO2k8Y2FsbGJhY2tzLmxlbmd0aDtpKyspe1xuICAgICAgICAgICAgICAgIGNiID0gY2FsbGJhY2tzW2ldO1xuICAgICAgICAgICAgICAgIGlmKHR5cGVvZiB0aGlzLm9wdGlvbnNbY2JdID09ICdzdHJpbmcnICYmIHR5cGVvZiB3aW5kb3dbdGhpcy5vcHRpb25zW2NiXV0gPT0gJ2Z1bmN0aW9uJyl7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMub3B0aW9uc1tjYl0gPSB3aW5kb3dbdGhpcy5vcHRpb25zW2NiXV07XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBjaGVja1N0YXR1cy5jYWxsKHRoaXMpO1xuICAgICAgICB9LFxuXG4gICAgICAgIG5leHQ6IGZ1bmN0aW9uKGNoZWNrU3RlcCxldmVudCl7XG4gICAgICAgICAgICBtb3ZlU3RlcC5jYWxsKHRoaXMsZmFsc2UsdHJ1ZSxldmVudCxjaGVja1N0ZXApO1xuICAgICAgICB9LFxuXG4gICAgICAgIHByZXZpb3VzOiBmdW5jdGlvbihjaGVja1N0ZXAsZXZlbnQpe1xuICAgICAgICAgICAgbW92ZVN0ZXAuY2FsbCh0aGlzLGZhbHNlLGZhbHNlLGV2ZW50LGNoZWNrU3RlcCk7XG4gICAgICAgIH0sXG5cbiAgICAgICAgc2V0U3RlcDogZnVuY3Rpb24oc3RlcCwgY2hlY2tTdGVwLCBldmVudCl7XG4gICAgICAgICAgICBtb3ZlU3RlcC5jYWxsKHRoaXMsc3RlcCxudWxsLGV2ZW50LGNoZWNrU3RlcCk7XG4gICAgICAgIH1cbiAgICB9O1xuXG4gICAgdmFyIG1haW4gPSBmdW5jdGlvbiAobWV0aG9kKSB7XG4gICAgICAgIHZhciB0aGlzUGx1Z2luID0gdGhpcy5kYXRhKGRhdGFQbHVnaW4pO1xuICAgICAgICBpZiAodGhpc1BsdWdpbikge1xuICAgICAgICAgICAgaWYgKHR5cGVvZiBtZXRob2QgPT09ICdzdHJpbmcnICYmIHRoaXNQbHVnaW5bbWV0aG9kXSkge1xuICAgICAgICAgICAgICAgIHJldHVybiB0aGlzUGx1Z2luW21ldGhvZF0uYXBwbHkodGhpc1BsdWdpbiwgQXJyYXkucHJvdG90eXBlLnNsaWNlLmNhbGwoYXJndW1lbnRzLCAxKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICByZXR1cm4gY29uc29sZS5sb2coJ01ldGhvZCAnICsgYXJnICsgJyBkb2VzIG5vdCBleGlzdCBvbiBqUXVlcnkgLyBqcUxpdGUnICsgcGx1Z2luTmFtZSk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBpZiAoIW1ldGhvZCB8fCB0eXBlb2YgbWV0aG9kID09PSAnb2JqZWN0Jykge1xuICAgICAgICAgICAgICAgIHRoaXNQbHVnaW4gPSAkLmV4dGVuZCh7fSwgbWV0aG9kcyk7XG4gICAgICAgICAgICAgICAgdGhpc1BsdWdpbi5pbml0KHRoaXMsIG1ldGhvZCk7XG4gICAgICAgICAgICAgICAgdGhpcy5kYXRhKGRhdGFQbHVnaW4sIHRoaXNQbHVnaW4pO1xuXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRoaXM7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICByZXR1cm4gY29uc29sZS5sb2coIHBsdWdpbk5hbWUgKycgaXMgbm90IGluc3RhbnRpYXRlZC4gUGxlYXNlIGNhbGwgJChcInNlbGVjdG9yXCIpLicrIHBsdWdpbk5hbWUgKycoe29wdGlvbnN9KScpO1xuICAgICAgICB9XG4gICAgfTtcblxuICAgIC8vIHBsdWdpbiBpbnRlZ3JhdGlvblxuICAgIGlmKCQuZm4pe1xuICAgICAgICAkLmZuWyBwbHVnaW5OYW1lIF0gPSBtYWluO1xuICAgIH0gZWxzZSB7XG4gICAgICAgICQucHJvdG90eXBlWyBwbHVnaW5OYW1lIF0gPSBtYWluO1xuICAgIH1cblxuICAgICQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XG4gICAgICAgIHZhciBteVNlbGVjdG9yID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignW2RhdGEtd2l6YXJkLWluaXRdJyk7XG4gICAgICAgICQobXlTZWxlY3RvcilbIHBsdWdpbk5hbWUgXSh7fSk7XG4gICAgfSk7XG59KGJnLCBkb2N1bWVudCwgd2luZG93KSk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9qcXVlcnkud2l6YXJkLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTs7Ozs7Ozs7OztBQVVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);