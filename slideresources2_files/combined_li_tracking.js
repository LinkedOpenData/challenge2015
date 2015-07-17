!function(e,t){"object"==typeof exports?module.exports=t():"function"==typeof define&&define.amd?define("liTrackClient",[],t):e.liTrackClient=t()}(this,function(){var e={AJAX_METHOD:"POST",DEFAULT_PAGE_TYPE:"ajax",globalTrackingUrl:null,globalTrackingAppId:"no.app.id",lastDisplayMetric:null,lastActionMetric:null,queue:[],maxQueueSize:1,queueTimeout:1e3,timeoutId:null,csrfToken:"",setProperty:function(e,t){if(t)return void(this[e]=t);var n=this.getMetaTag(e);return n?void(this[e]=n.content):void 0},setTrackingUrl:function(e){this.setProperty("globalTrackingUrl",e)},setAppId:function(e){this.setProperty("globalTrackingAppId",e)},setCsrfToken:function(e){this.setProperty("csrfToken",e)},getCookieString:function(){return document.cookie},getCsrfToken:function(){for(var e="JSESSIONID=",t=this.getCookieString().split(";"),n=0;n<t.length;n++){for(var i=t[n];" "===i.charAt(0);)i=i.substring(1);if(-1!==i.indexOf(e)){var r=i.substring(e.length,i.length);return'"'===r[0]&&'"'===r[r.length-1]&&(r=r.substring(1,r.length-1)),r}}return""},createXmlHttpObject:function(){try{return new XMLHttpRequest}catch(e){}return null},ajax:function(e,t,n){var i;return this.globalTrackingUrl?(i=this.createXmlHttpObject(),void(i&&(i.open(this.AJAX_METHOD,this.globalTrackingUrl,!0),i.withCredentials=!0,i.setRequestHeader("Content-type","application/json"),this.csrfToken?i.setRequestHeader("Csrf-Token",this.csrfToken):i.setRequestHeader("Csrf-Token",this.getCsrfToken()),i.onreadystatechange=function(){return 4===i.readyState?200!==i.status&&304!==i.status?void(n&&n("Request returned "+i.status)):void("function"==typeof t&&t(i)):void 0},4!==i.readyState&&i.send(e)))):void(n&&n("Tracking url is not defined"))},flush:function(){var e=this;this.ajax(JSON.stringify(this.queue),null,e.logError),this.queue=[],clearTimeout(this.timeoutId),this.timeoutId=null},addToQueue:function(e){if(this.queue.push(e),this.queue.length>=this.maxQueueSize)return this.flush();if(!this.timeoutId){var t=this;this.timeoutId=setTimeout(function(){t.flush()},this.queueTimeout)}},track:function(e){return"object"!=typeof e?void this.logError("Track data must be an object"):(e=this.fillMissingData(e),void this.addToQueue(e))},trackWithCallback:function(e,t){var n=this;if("object"!=typeof e)return void this.logError("Track data must be an object");e=this.fillMissingData(e);var i=JSON.stringify(e);this.ajax(i,function(e){"function"==typeof t&&t(null,e.responseText)},function(e){n.logError(e),"function"==typeof t&&t(e)})},getTimestamp:function(){return Math.round((new Date).getTime()/1e3)},getTrackingCode:function(e){return e.eventBody.trackingCode?e.eventBody.trackingCode:"PageViewEvent"===e.eventInfo.eventName?"full"===e.eventBody.pageType?(this.lastDisplayMetric=e.eventBody.requestHeader.pageKey,this.lastActionMetric):(this.lastActionMetric=e.eventBody.requestHeader.pageKey,this.lastDisplayMetric):null},fillMissingData:function(e){if(!e.eventInfo)return this.logError("You must specify eventInfo");if(e.eventInfo.appId||(e.eventInfo.appId=this.globalTrackingAppId),!e.eventBody)return this.logError("You must specify eventBody");e.eventBody.trackingCode=this.getTrackingCode(e);var t=e.eventBody.trackingInfo||{};t.clientTimestamp||(t.clientTimestamp=this.getTimestamp()),e.eventBody.trackingInfo=t;var n=e.eventBody.requestHeader||{};return n.pageKey||(n.pageKey=this.lastDisplayMetric),e.eventBody.requestHeader=n,e},trackPageView:function(e){var t,n,i,r;"string"==typeof e?(t=e,r=this.DEFAULT_PAGE_TYPE):(t=e.pageKey,r=e.pageType||this.DEFAULT_PAGE_TYPE,n=e.trackingCode,i=e.trackingInfo);var o={eventInfo:{eventName:"PageViewEvent"},eventBody:{requestHeader:{pageKey:t},pageType:r}};return n&&(o.eventBody.trackingCode=n),i&&(o.eventBody.trackingInfo=i),t?void this.track(o):this.logError("You must provide a pageKey")},trackUnifiedAction:function(e){if(!e.action)return this.logError("You must provide action");if(!e.sponsoredFlag)return this.logError("You must provide sponsoredFlag");var t={eventInfo:{eventName:"UnifiedActionEvent"},eventBody:e};this.track(t)},trackArticleView:function(e){if(!e.articleId)return this.logError("You must provide articleId");var t={eventInfo:{eventName:"ArticleViewEvent"},eventBody:e};this.track(t)},trackUnifiedImpression:function(e){if(!e.results)return this.logError("You must provide results");var t={eventInfo:{eventName:"UnifiedImpressionEvent"},eventBody:e};this.track(t)},logError:function(e){var t=window.console;t&&t.error&&t.error(e)},getMetaTag:function(e){var t,n,i,r=document.getElementById(e)||document.querySelector&&document.querySelector("meta[name="+e+"]");if(r)return r;for(t=document.getElementsByTagName("meta"),i=t.length,n=0;i>n;n++)if(t[n].getAttribute("name")===e)return t[n];return null},init:function(){this.setTrackingUrl(),this.setAppId()}};return e.init(),e}),function(e){e.initTrackingLibrary=function(e){"undefined"!==liTrackClient&&(liTrackClient.setTrackingUrl(),liTrackClient.setAppId(e))},e.getUserRequestHeader=function(e){return{pageKey:e}},e.recordLeadTrackingEvent=function(t,n,i,r,o,a,s){var u={eventInfo:{eventName:t,appId:"slideshare.js.tracking.leads"},eventBody:{requestHeader:e.getUserRequestHeader(o),trackingId:n,leadCampaignInfo:{slideshowUrn:"urn:li:slideShareSlideshow:"+i,leadCampaignUrn:"urn:li:slideshareLeadCampaign:"+r},triggerInfo:{trigger:a,slideNumber:s}}};liTrackClient.track(u)},e.recordTrackingEvent=function(e,t,n){var i={eventInfo:{eventName:t,appId:e},eventBody:n};liTrackClient.track(i)}}(slideshare_object);