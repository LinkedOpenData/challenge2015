/*!CK:3026817991!*//*1436150688,*/

if (self.CavalryLogger) { CavalryLogger.start_js(["PFlPI"]); }

__d("PerfXClientMetricsConfig",[],function(a,b,c,d,e,f){b.__markCompiled&&b.__markCompiled();e.exports={LOGGER_CONFIG:"PerfXClientMetricsLoggerConfig"};},null);
__d("PixelRatioConst",[],function(a,b,c,d,e,f){b.__markCompiled&&b.__markCompiled();e.exports={cookieName:"dpr"};},null);
__d("clearImmediatePolyfill",["ImmediateImplementation"],function(a,b,c,d,e,f){b.__markCompiled&&b.__markCompiled();e.exports=a.clearImmediate||b('ImmediateImplementation').clearImmediate;},null);
__d("sourceMetaToString",[],function(a,b,c,d,e,f){b.__markCompiled&&b.__markCompiled();function g(h,i){var j;if(h.name){j=h.name;if(h.module)j=h.module+'.'+j;}else if(h.module)j=h.module+'.<anonymous>';if(i&&h.line){j=(j?j:'<anonymous>')+':'+h.line;if(h.column)j+=':'+h.column;}return j;}e.exports=g;},null);
__d("clearImmediate",["clearImmediatePolyfill"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();e.exports=g.bind(a);},null);
__d("PerfXFlusher",["BanzaiLogger","PerfXClientMetricsConfig","invariant"],function(a,b,c,d,e,f,g,h,i){b.__markCompiled&&b.__markCompiled();var j=h.LOGGER_CONFIG,k=['perfx_page','perfx_page_type','tti','e2e'];function l(n){k.forEach(function(o){i(o in n);});}var m={flush:function(n,o){l(o);o.lid=n;if(o.fbtrace_id){g.log(j,o,{delay:10*1000});}else g.log(j,o);}};e.exports=m;},null);
__d("legacy:onload-action",["PageHooks"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();a._domreadyHook=g._domreadyHook;a._onloadHook=g._onloadHook;a.runHook=g.runHook;a.runHooks=g.runHooks;a.keep_window_set_as_loaded=g.keepWindowSetAsLoaded;},3);
__d("ClickRefUtils",[],function(a,b,c,d,e,f){b.__markCompiled&&b.__markCompiled();var g={get_intern_ref:function(h){if(!!h){var i={profile_minifeed:1,gb_content_and_toolbar:1,gb_muffin_area:1,ego:1,bookmarks_menu:1,jewelBoxNotif:1,jewelNotif:1,BeeperBox:1,searchBarClickRef:1};for(var j=h;j&&j!=document.body;j=j.parentNode){if(!j.id||typeof j.id!=='string')continue;if(j.id.substr(0,8)=='pagelet_')return j.id.substr(8);if(j.id.substr(0,8)=='box_app_')return j.id;if(i[j.id])return j.id;}}return '-';},get_href:function(h){var i=(h.getAttribute&&(h.getAttribute('ajaxify')||h.getAttribute('data-endpoint'))||h.action||h.href||h.name);return typeof i==='string'?i:null;},should_report:function(h,i){if(i=='FORCE')return true;if(i=='INDIRECT')return false;return h&&(g.get_href(h)||(h.getAttribute&&h.getAttribute('data-ft')));}};e.exports=g;},null);
__d("setUECookie",["Env"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();function h(i){if(!g.no_cookies)document.cookie="act="+encodeURIComponent(i)+"; path=/; domain="+window.location.hostname.replace(/^.*(\.facebook\..*)$/i,'$1');}e.exports=h;},null);
__d("ClickRefLogger",["Arbiter","Banzai","ClickRefUtils","Env","ScriptPath","SessionName","Vector","$","collectDataAttributes","ge","pageID","setUECookie"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r){b.__markCompiled&&b.__markCompiled();var s={delay:0,retry:true};function t(x){if(!p('content'))return [0,0,0,0];var y=n('content'),z=m.getEventPosition(x);return [z.x,z.y,y.offsetLeft,y.clientWidth];}function u(x,y,event,z){var aa='r',ba=[0,0,0,0],ca,da;if(!!event){ca=event.type;if(ca=='click'&&p('content'))ba=t(event);var ea=0;event.ctrlKey&&(ea+=1);event.shiftKey&&(ea+=2);event.altKey&&(ea+=4);event.metaKey&&(ea+=8);if(ea)ca+=ea;}if(!!y)da=i.get_href(y);var fa=o(!!event?(event.target||event.srcElement):y,['ft','gt']);Object.assign(fa.ft,z.ft);Object.assign(fa.gt,z.gt);if(typeof(fa.ft.ei)==='string')delete fa.ft.ei;var ga=[x._ue_ts,x._ue_count,da||'-',x._context,ca||'-',i.get_intern_ref(y),aa,a.URI?a.URI.getRequestURI(true,true).getUnqualifiedURI().toString():location.pathname+location.search+location.hash,fa].concat(ba).concat(q).concat(k.getScriptPath());return ga;}g.subscribe("ClickRefAction/new",function(x,y){if(i.should_report(y.node,y.mode)){var z=u(y.cfa,y.node,y.event,y.extra_data);r(y.cfa.ue);var aa=[l.getName(),Date.now(),'act'];h.post('click_ref_logger',Array.prototype.concat(aa,z),s);}});function v(x){function y(ga){var ha='';for(var ia=0;ia<ga.length;ia++)ha+=String.fromCharCode(1^ga.charCodeAt(ia));return ha;}function z(ga,ha,ia,ja){var ka=ha[ia];if(ka&&ga&&ka in ga)if(ia+1<ha.length){z(ga[ka],ha,ia+1,ja);}else{var la=ga[ka],ma=function(){setTimeout(ja.bind(null,arguments));return la.apply(this,arguments);};ma.toString=la.toString.bind(la);Object.defineProperty(ga,ka,{configurable:false,writable:true,value:ma});}}var aa={},ba={},ca=false;function da(ga,ha){if(ba[ga])return;ba[ga]=aa[ga]=1;}var ea=x[y('jiri')];if(ea){var fa=[];y(ea).split(',').map(function(ga,ha){var ia=ga.substring(1).split(':'),ja;switch(ga.charAt(0)){case '1':ja=new RegExp('\\b('+ia[0]+')\\b','i');fa.push(function(ka){var la=ja.exec(Object.keys(window));if(la)da(ha,''+la);});break;case '2':ja=new RegExp(ia[0]);z(window,ia,2,function(ka){var la=ka[ia[1]];if(typeof la==='string'&&ja.test(la))da(ha,ga);});break;case '3':z(window,ia,0,function(){for(var ka=fa.length;ka--;)fa[ka]();var la=Object.keys(aa);if(la.length){aa={};setTimeout(h[y('qnru')].bind(h,y('islg'),{m:''+la}),5000);}});break;case '4':ca=true;break;}});}}try{v(j);}catch(w){}},null);
__d("PixelRatio",["Arbiter","Cookie","PixelRatioConst","Run"],function(a,b,c,d,e,f,g,h,i,j){b.__markCompiled&&b.__markCompiled();var k=i.cookieName,l,m;function n(){return window.devicePixelRatio||1;}function o(){h.set(k,n());}function p(){h.clear(k);}function q(){var s=n();if(s!==l){o();}else p();}var r={startDetecting:function(s){l=s||1;p();if(m)return;m=[g.subscribe('pre_page_transition',q)];j.onBeforeUnload(q);}};e.exports=r;},null);
__d("UserActionHistory",["Arbiter","ClickRefUtils","ScriptPath","throttle","WebStorage"],function(a,b,c,d,e,f,g,h,i,j,k){b.__markCompiled&&b.__markCompiled();var l={click:1,submit:1},m=false,n={log:[],len:0},o=j.acrossTransitions(function(){try{m._ua_log=JSON.stringify(n);}catch(r){m=false;}},1000);function p(){var r=k.getSessionStorage();if(r){m=r;m._ua_log&&(n=JSON.parse(m._ua_log));}else m=false;n.log[n.len%10]={ts:Date.now(),path:'-',index:n.len,type:'init',iref:'-'};n.len++;g.subscribe("UserAction/new",function(s,t){var u=t.ua,v=t.node,event=t.event;if(!event||!(event.type in l))return;var w={path:i.getScriptPath(),type:event.type,ts:u._ue_ts,iref:h.get_intern_ref(v)||'-',index:n.len};n.log[n.len++%10]=w;m&&o();});}function q(){return n.log.sort(function(r,s){return (s.ts!=r.ts)?(s.ts-r.ts):(s.index-r.index);});}p();e.exports={getHistory:q};},null);
__d("PerfXLogger",["Arbiter","LogBuffer","PageEvents","PerfXFlusher","performance"],function(a,b,c,d,e,f,g,h,i,j,k){b.__markCompiled&&b.__markCompiled();var l={},m='BigPipe/init',n='tti_bigpipe',o={},p,q={_listenersSetUp:false,_setupListeners:function(){if(this.listenersSetUp)return;this._subscribeToBigPipeInit(g);this._subscribeToFullPageE2E(g);this.listenersSetUp=true;},_init:function(r,s,t){l[r]={perfx_page:s,perfx_page_type:t};this._setupListeners();},initForPageLoad:function(r,s,t){p=r;this._init(r,s,t);},initForQuickling:function(r,s,t,u){this._init(r,s,t);o[r]=u;},_subscribeToBigPipeInit:function(r){r.subscribe(m,function(event,s){var t=s.arbiter;this._subscribeToTTI(t);this._subscribeToAsyncTransitionE2E(t);}.bind(this));},_subscribeToTTI:function(r){r.subscribe(n,function(event,s){var t=s.lid;if(!(t in l))return;l[t].tti=s.ts;});},_subscribeToFullPageE2E:function(r){r.subscribe(i.BIGPIPE_ONLOAD,function(event,s){if(!(p in l))return;l[p].e2e=s.ts;this._finishPageload(p);}.bind(this));},_subscribeToAsyncTransitionE2E:function(r){r.subscribe(i.AJAXPIPE_ONLOAD,function(event,s){var t=s.lid;if(!(t in l))return;l[t].e2e=s.ts;this._finishQuickling(t);}.bind(this));},_generatePayload:function(r,s){var t=l[r];if(t.fbtrace_id){t.js_tti=this._getJSTime(s,t.tti);t.js_e2e=this._getJSTime(s,t.e2e);}var u=Object.assign({},t);if(!this._adjustAndValidateValues(u,s))return;return u;},_getPageloadPayload:function(r){if(!(r in l))return;if(!k.timing){delete l[r];return;}var s=k.timing.navigationStart;return this._generatePayload(r,s);},_getQuicklingPayload:function(r){if(!(r in o)||!(r in l))return;if(!k.timing||!k.getEntriesByName){delete o[r];delete l[r];return;}var s=o[r],t=k.getEntriesByName(s);if(t.length===0)return;var u=t[0],v=k.timing.navigationStart+u.startTime;return this._generatePayload(r,v);},_finishPageload:function(r){var s=this._getPageloadPayload(r);if(s)this._log(r,s);},_finishQuickling:function(r){var s=this._getQuicklingPayload(r);if(s)this._log(r,s);},_log:function(r,s){j.flush(r,s);},_adjustAndValidateValues:function(r,s){var t=['e2e','tti'],u=true;for(var v=0;v<t.length;v++){var w=t[v],x=r[w];if(!x){u=false;break;}r[w]=x-s;}return u;},getPayload:function(r){if(!(r in l))return;var s=l[r].perfx_page_type;if(s==="normal"){return this._getPageloadPayload(r);}else if(s==="quickling")return this._getQuicklingPayload(r);},setFBTraceID:function(r,s){if(r in l)l[r].fbtrace_id=s;},_getJSTime:function(r,s){if(r>s)return 0;var t=0;h.read('time_slice').forEach(function(u){var v=u.begin,w=u.end;if(v>w)return;if(r<=v&&w<=s){t+=w-v;}else if(v<=r&&s<=w){t+=s-r;}else if(v<=r&&r<=w){t+=w-r;}else if(v<=s&&s<=w)t+=s-v;});return t;}};e.exports=q;},null);
__d("PluginCSSReflowHack",["Style"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();var h={trigger:function(i){setTimeout(function(){var j='border-bottom-width',k=g.get(i,j);g.set(i,j,parseInt(k,10)+1+'px');var l=i.offsetHeight;g.set(i,j,k);return l;},1000);}};e.exports=h;},null);
__d("KappaWrapper",["AsyncSignal","setTimeoutAcrossTransitions"],function(a,b,c,d,e,f,g,h){b.__markCompiled&&b.__markCompiled();var i=false;e.exports={forceStart:function(j,k,l){var m=0,n=function(){new g('/si/kappa/',{Ko:"a"}).send();if(++m<j)h(n,(k*1000));};h(n,((k+l)*1000));},start:function(j,k,l){if(!i){i=true;this.forceStart(j,k,l);}}};},null);
__d("Chromedome",["fbt"],function(a,b,c,d,e,f,g){b.__markCompiled&&b.__markCompiled();f.start=function(h){if(h.off||top!==window||!/(^|\.)facebook\.com$/.test(document.domain))return;var i=h.stop||g._("Stop!"),j=h.text||g._("This is a browser feature intended for developers. If someone told you to copy-paste something here to enable a Facebook feature or \"hack\" someone's account, it is a scam and will give them access to your Facebook account."),k=h.more||g._("For more information, see {url}.",[g.param("url",'https://www.facebook.com/selfxss')]);if((window.chrome||window.safari)&&!h.textonly){var l='font-family:helvetica; font-size:20px; ';[[i,h.c1||l+'font-size:50px; font-weight:bold; '+'color:red; -webkit-text-stroke:1px black;'],[j,h.c2||l],[k,h.c3||l],['','']].map(function(r){setTimeout(console.log.bind(console,'\n%c'+r[0],r[1]));});}else{var m=['',' .d8888b.  888                       888','d88P  Y88b 888                       888','Y88b.      888                       888',' "Y888b.   888888  .d88b.  88888b.   888','    "Y88b. 888    d88""88b 888 "88b  888','      "888 888    888  888 888  888  Y8P','Y88b  d88P Y88b.  Y88..88P 888 d88P',' "Y8888P"   "Y888  "Y88P"  88888P"   888','                           888','                           888','                           888'],n=(''+j).match(/.{35}.+?\s+|.+$/g),o=Math.floor(Math.max(0,(m.length-n.length)/2));for(var p=0;p<m.length||p<n.length;p++){var q=m[p];m[p]=q+new Array(45-q.length).join(' ')+(n[p-o]||'');}console.log('\n\n\n'+m.join('\n')+'\n\n'+k+'\n');return;}};},null);