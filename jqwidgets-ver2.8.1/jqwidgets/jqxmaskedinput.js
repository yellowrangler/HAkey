/*
jQWidgets v2.8.1 (2013-Apr-12)
Copyright (c) 2011-2013 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxMaskedInput","",{});a.extend(a.jqx._jqxMaskedInput.prototype,{defineInstance:function(){this.value=null;this.mask="99999";this.width=null;this.height=25;this.textAlign="left";this.readOnly=false,this.promptChar="_";this.inputMode="advanced";this.rtl=false;this.disabled=false;this.events=["valuechanged","textchanged","mousedown","mouseup","keydown","keyup","keypress","change"];this.aria={"aria-valuenow":{name:"value",type:"string"},"aria-disabled":{name:"disabled",type:"boolean"}}},createInstance:function(b){this.render()},render:function(){this.host.attr({role:"textbox"});this.host.attr("data-role","input");a.jqx.aria(this);a.jqx.aria(this,"aria-multiline",false);a.jqx.aria(this,"aria-readonly",this.readOnly);this.host.addClass(this.toThemeProperty("jqx-input"));this.host.addClass(this.toThemeProperty("jqx-rc-all"));this.host.addClass(this.toThemeProperty("jqx-widget"));this.host.addClass(this.toThemeProperty("jqx-widget-content"));maskEditor=this;if(this.element.nodeName.toLowerCase()=="div"){this.element.innerHTML="";this.maskbox=a("<input autocomplete='off' type='textarea'/>").appendTo(this.host)}else{this.maskbox=this.host}this.maskbox.addClass(this.toThemeProperty("jqx-reset"));this.maskbox.addClass(this.toThemeProperty("jqx-input-content"));this.maskbox.addClass(this.toThemeProperty("jqx-widget-content"));var h=this.host.attr("value");if(h!=undefined){this.value=h}var d=this.host.attr("name");if(!d){d=this.element.id}this.maskbox.attr("name",d);if(this.rtl){this.maskbox.addClass(this.toThemeProperty("jqx-rtl"))}var f=this;this.propertyChangeMap.disabled=function(j,l,k,n){if(n){j.maskbox.addClass(f.toThemeProperty("jqx-input-disabled"))}else{j.maskbox.removeClass(f.toThemeProperty("jqx-input-disabled"))}};if(this.disabled){this.maskbox.addClass(this.toThemeProperty("jqx-input-disabled"));this.maskbox.attr("disabled",true);this.host.addClass(this.toThemeProperty("jqx-fill-state-disabled"))}this.selectedText="";this._addHandlers();this.self=this;this.oldValue=this._value();this.items=new Array();this._initializeLiterals();this._render();if(this.value!=null){this.inputValue(this.value.toString())}var f=this;var e=a.jqx.mobile.isOperaMiniMobileBrowser();if(e){this.inputMode="simple";this.addHandler(a(document),"click",f._exitSimpleInputMode,f)}var c;this.addHandler(this.maskbox,"blur",function(j){if(f.inputMode=="simple"){f._exitSimpleInputMode(j,f,false);return false}if(f.rtl){f.maskbox.css("direction","ltr")}f.host.removeClass(f.toThemeProperty("jqx-fill-state-focus"));if(f.maskbox.val()!=c){f._raiseEvent(7,j)}});this.addHandler(this.maskbox,"focus",function(j){c=f.maskbox.val();if(f.inputMode=="simple"){f.maskbox[0].value=f._getEditValue();a.data(f.maskbox,"simpleInputMode",true);return false}if(f.rtl){f.maskbox.css("direction","rtl")}f.host.addClass(f.toThemeProperty("jqx-fill-state-focus"))});var f=this;if(this.host.parents("form").length>0){this.host.parents("form").on("reset",function(){setTimeout(function(){f.clearValue()},10)})}if(a.jqx.mobile.isChromeMobileBrowser()&&!e){var b="";var g=setInterval(function(){var k=a(f.maskbox).val();var j=f._selection();if(k.length<b.length){var l=j.start;if(l<f.items.length&&f.items[l].canEdit&&f.items[l].character!=f.promptChar){f.items[l].character=f.promptChar}var k=f._getString();f.maskedValue(k);f._setSelectionStart(l)}if(k!=b){b=k}},10)}},focus:function(){try{this.maskbox.focus()}catch(b){}},_exitSimpleInputMode:function(b,l,g){if(l==undefined){l=b.data}if(l==null){return}if(g==undefined){if(b.target!=null&&l.element!=null){if((b.target.id!=undefined&&b.target.id.toString().length>0&&l.host.find("#"+b.target.id).length>0)||b.target==l.element){return}}var e=l.host.offset();var d=e.left;var f=e.top;var c=l.host.width();var k=l.host.height();var n=a(b.target).offset();if(n.left>=d&&n.left<=d+c){if(n.top>=f&&n.top<=f+k){return}}}if(l.disabled||l.readOnly){return}var j=a.data(l.maskbox,"simpleInputMode");if(j==null){return}var h=l.maskbox.val();l.inputValue(h,true);a.data(l.maskbox,"simpleInputMode",null);return false},_addHandlers:function(){var b=this;this.addHandler(this.maskbox,"mousedown",function(c){return b._raiseEvent(2,c)});this.addHandler(this.maskbox,"mouseup",function(c){return b._raiseEvent(3,c)});this.addHandler(this.maskbox,"keydown",function(c){return b._raiseEvent(4,c)});this.addHandler(this.maskbox,"keyup",function(c){return b._raiseEvent(5,c)});this.addHandler(this.maskbox,"keypress",function(c){return b._raiseEvent(6,c)})},_getString:function(){var c="";for(var b=0;b<this.items.length;b++){var d=this.items[b].character;if((this.items[b].character==this.promptChar)&&(this.promptChar!=this.items[b].defaultCharacter)){c+=this.items[b].defaultCharacter}else{c+=d}}return c},_initializeLiterals:function(){if(this.mask==undefined||this.mask==null){this.items=new Array();return}this.mask=this.mask.toString();var g=this.mask.length;for(var d=0;d<g;d++){var h=this.mask.substring(d,d+1);var f="";var b=false;if(h=="#"){f="(\\d|[+]|[-])";b=true}else{if(h=="9"||h=="0"){f="\\d";b=true}else{if(h=="$"){b=false}else{if(h=="/"||h==":"){b=false}else{if(h=="A"||h=="a"){f="\\w";b=true}else{if(h=="c"||h=="C"){f=".";b=true}else{if(h=="L"||h=="l"){f="\\p{L}";b=true}}}}}}}var c=this;var e=function(l,k,j){e.character=l;e.regex=k;e.canEdit=j;e.defaultCharacter=c.promptChar};if(b){e(this.promptChar,f,b)}else{e(h,f,b)}this.items[d]=e}},setRegex:function(d,e,b,c){if((d==null||d==undefined)||(e==null||e==undefined)){return}if(d<this.items.length){this.items[d].regex=e;if(b!=null&&b!=undefined){this.items[d].canEdit=b}if(c!=null&&c!=undefined){this.items[d].defaultCharacter=c}}},_match:function(c,b){var d=new RegExp(b,"i");return d.test(c)},_raiseEvent:function(d,p){var o=this.events[d];var g={};g.owner=this;var n=p.charCode?p.charCode:p.keyCode?p.keyCode:0;var q=true;var l=this.readOnly;var b=new jQuery.Event(o);b.owner=this;g.value=this.inputValue();g.text=this.maskedValue();b.args=g;if(d<2||d>6){q=this.host.trigger(b)}if(this.inputMode!="simple"){if(d==4){if(l||this.disabled){return false}var h=this;if(a.jqx.mobile.isChromeMobileBrowser()){var k=h._selection();window.setTimeout(function(){var r=a.data(h.maskbox,"selectionstart");if(r!=null&&r!=k.start){a.data(h.maskbox,"selectionstart",k.start)}q=h._handleKeyDown(p,n)},25)}else{q=this._handleKeyDown(p,n)}}else{if(d==5){if(l||this.disabled){q=false}}else{if(d==6){if(l||this.disabled){return false}q=this._handleKeyPress(p,n)}}}}else{if(d==4||d==5||d==6){if(l||this.disabled){return false}var e=String.fromCharCode(n);var j=parseInt(e);var f=true;if(!isNaN(j)){f=true;var c=this.maskbox.val().toString().length;if(c>=this._getEditStringLength()&&this._selection().length==0){f=false}}if(!p.ctrlKey&&!p.shiftKey){if(n>=65&&n<=90){f=false}}return f}}return q},_handleKeyPress:function(g,c){var d=this._selection();var b=this;if((g.ctrlKey&&c==97)||(g.ctrlKey&&c==65)){return true}if(c==8){if(d.start>0){b._setSelectionStart(d.start)}return false}if(c==46){if(d.start<this.items.length){b._setSelectionStart(d.start)}return false}if(a.jqx.browser.msie){this._insertKey(c)}var f=this._isSpecialKey(c);return f},_insertKey:function(c){var d=this._selection();var b=this;if(d.start>=0&&d.start<this.items.length){var e=String.fromCharCode(c);var f=false;a.each(this.items,function(h,l){if(h<d.start){return}var k=b.items[h];if(!k.canEdit){return}if(b._match(e,k.regex)){if(!f&&d.length>0){for(var g=d.start;g<d.end;g++){if(b.items[g].canEdit){b.items[g].character=b.promptChar}}var n=b._getString();b.maskedValue(n);f=true}k.character=e;var n=b._getString();b.maskedValue(n);if(d.start<b.items.length){b._setSelectionStart(h+1)}return false}else{return false}})}},_deleteSelectedText:function(){var c=this._selection();var b=false;if(c.start>0||c.length>0){for(i=c.start;i<c.end;i++){if(i<this.items.length&&this.items[i].canEdit&&this.items[i].character!=this.promptChar){this.items[i].character=this.promptChar;b=true}}var d=this._getString();this.maskedValue(d);return b}},_saveSelectedText:function(){var b=this._selection();var c="";if(b.start>0||b.length>0){for(i=b.start;i<b.end;i++){if(this.items[i].canEdit){c+=this.items[i].character}}}window.clipboardData.setData("Text",c);return c},_pasteSelectedText:function(){var e=this._selection();var f="";var d=0;var b=e.start;var c=window.clipboardData.getData("Text");if(c!=this.selectedText&&c.length>0){this.selectedText=c;if(this.selectedText==null||this.selectedText==undefined){return}}if(e.start>=0||e.length>0){for(i=e.start;i<this.items.length;i++){if(this.items[i].canEdit){if(d<this.selectedText.length){this.items[i].character=this.selectedText[d];d++;b=1+i}}}}var f=this._getString();this.maskedValue(f);if(b<this.items.length){this._setSelectionStart(b)}else{this._setSelectionStart(this.items.length)}},_handleKeyDown:function(k,q){var p=this._selection();if((k.ctrlKey&&q==97)||(k.ctrlKey&&q==65)){return true}if((k.ctrlKey&&q==120)||(k.ctrlKey&&q==88)){this.selectedText=this._saveSelectedText(k);this._deleteSelectedText(k);return false}if((k.ctrlKey&&q==99)||(k.ctrlKey&&q==67)){this.selectedText=this._saveSelectedText(k);return false}if((k.ctrlKey&&q==122)||(k.ctrlKey&&q==90)){return false}if((k.ctrlKey&&q==118)||(k.ctrlKey&&q==86)||(k.shiftKey&&q==45)){this._pasteSelectedText();return false}if(p.start>=0&&p.start<this.items.length){var g=String.fromCharCode(q);var r=this.items[p.start]}if(q==8){if(p.length==0){for(j=this.items.length-1;j>=0;j--){if(this.items[j].canEdit&&j<p.end&&this.items[j].character!=this.promptChar){this._setSelection(j,j+1);break}}}p=this._selection();var h=this._deleteSelectedText();if(p.start>0||p.length>0){if(p.start<=this.items.length){if(h){this._setSelectionStart(p.start)}else{this._setSelectionStart(p.start-1)}}}return false}if(q==190){var c=p.start;for(var j=c;j<this.items.length;j++){if(this.items[j].character=="."){this._setSelectionStart(j+1);break}}}if(q==191){var c=p.start;for(var j=c;j<this.items.length;j++){if(this.items[j].character=="/"){this._setSelectionStart(j+1);break}}}if(q==189){var c=p.start;for(var j=c;j<this.items.length;j++){if(this.items[j].character=="-"){this._setSelectionStart(j+1);break}}}if(q==46){if(p.length==0){for(var j=0;j<this.items.length;j++){if(this.items[j].canEdit&&j>=p.start&&this.items[j].character!=this.promptChar){this._setSelection(j,j+1);break}}}var b=p;p=this._selection();var f=this._deleteSelectedText();if(p.start>=0||p.length>=0){if(p.start<this.items.length){if(p.length<=1){if(b.end!=p.end){this._setSelectionStart(p.end)}else{this._setSelectionStart(p.end+1)}}else{this._setSelectionStart(p.start)}}}return false}if(a.jqx.browser.msie==null){var o=this.maskbox.val();var l=this;if(q>=96&&q<=105){q=q-48}l._insertKey(q);var d=this.maskbox.val();if(o.toString()!=d.toString()){return false}}var n=this._isSpecialKey(q);if(q==189){return false}if(!a.jqx.browser.mozilla){return true}return n},_isSpecialKey:function(b){if(b!=8&&b!=9&&b!=13&&b!=35&&b!=36&&b!=37&&b!=39&&b!=46){return false}return true},_selection:function(){if("selectionStart" in this.maskbox[0]){var f=this.maskbox[0];var g=f.selectionEnd-f.selectionStart;return{start:f.selectionStart,end:f.selectionEnd,length:g,text:f.value}}else{var c=document.selection.createRange();if(c==null){return{start:0,end:f.value.length,length:0}}var b=this.maskbox[0].createTextRange();var d=b.duplicate();b.moveToBookmark(c.getBookmark());d.setEndPoint("EndToStart",b);var g=c.text.length;return{start:d.text.length,end:d.text.length+c.text.length,length:g,text:c.text}}},_setSelection:function(d,b){if("selectionStart" in this.maskbox[0]){this.maskbox[0].focus();this.maskbox[0].setSelectionRange(d,b)}else{var c=this.maskbox[0].createTextRange();c.collapse(true);c.moveEnd("character",b);c.moveStart("character",d);c.select()}},_setSelectionStart:function(b){this._setSelection(b,b)},refresh:function(b){if(!b){this._render()}},_render:function(){var c=parseInt(this.host.css("border-left-width"));var g=parseInt(this.host.css("border-left-width"));var f=parseInt(this.host.css("border-left-width"));var d=parseInt(this.host.css("border-left-width"));var j=parseInt(this.host.css("height"))-f-d;var e=parseInt(this.host.css("width"))-c-g;if(this.width!=null&&this.width.toString().indexOf("px")!=-1){e=this.width}else{if(this.width!=undefined&&!isNaN(this.width)){e=this.width}}if(this.height!=null&&this.height.toString().indexOf("px")!=-1){j=this.height}else{if(this.height!=undefined&&!isNaN(this.height)){j=this.height}}e=parseInt(e);j=parseInt(j);if(this.maskbox[0]!=this.element){this.maskbox.css({"border-left-width":0,"border-right-width":0,"border-bottom-width":0,"border-top-width":0})}this.maskbox.css("text-align",this.textAlign);var k=this.maskbox.css("font-size");if(!isNaN(j)){this.maskbox.css("height",parseInt(k)+4+"px")}if(!isNaN(e)){this.maskbox.css("width",e-2)}var h=parseInt(j)-2*parseInt(f)-2*parseInt(d)-parseInt(k);if(isNaN(h)){h=0}if(!isNaN(j)){this.host.height(j)}if(!isNaN(e)){this.host.width(e)}if(this.maskbox[0]!=this.element){var b=h/2;if(a.jqx.browser.msie&&a.jqx.browser.version<8){b=h/4}this.maskbox.css("padding-right","0px");this.maskbox.css("padding-left","0px");this.maskbox.css("padding-top",b);this.maskbox.css("padding-bottom",h/2)}this.maskbox[0].value=this._getString()},destroy:function(){this.element.removeClass("jqx-rc-all");this.maskbox.remove();this.element.remove()},maskedValue:function(b){if(b===undefined){return this._value()}this.value=b;this._refreshValue();if(this.oldValue!==b){this._raiseEvent(1,b);this.oldValue=b;this._raiseEvent(0,b)}return this},_value:function(){var b=this.maskbox.val();return b},propertyChangedHandler:function(c,d,b,e){if(this.isInitialized==undefined||this.isInitialized==false){return}if(d=="rtl"){if(c.rtl){c.maskbox.addClass(c.toThemeProperty("jqx-rtl"))}else{c.maskbox.removeClass(c.toThemeProperty("jqx-rtl"))}}if(d==="value"){if(e==undefined||e==null){e=""}if(e===""){this.clear()}else{e=e.toString();this.inputValue(e)}}if(d==="theme"){a.jqx.utilities.setTheme(b,e,this.host)}if(d=="disabled"){if(e){c.maskbox.addClass(c.toThemeProperty("jqx-input-disabled"));c.host.addClass(c.toThemeProperty("jqx-fill-state-disabled"));c.maskbox.attr("disabled",true)}else{c.host.removeClass(this.toThemeProperty("jqx-fill-state-disabled"));c.host.removeClass(this.toThemeProperty("jqx-input-disabled"));c.maskbox.attr("disabled",false)}a.jqx.aria(c,"aria-disabled",e)}if(d=="readOnly"){this.readOnly=e}if(d=="promptChar"){for(i=0;i<c.items.length;i++){if(c.items[i].character==c.promptChar){c.items[i].character=e;c.items[i].defaultCharacter=e}}c.promptChar=e}if(d=="textAlign"){c.maskbox.css("text-align",e);c.textAlign=e}if(d=="mask"){c.mask=e;c.items=new Array();c._initializeLiterals();c.value=c._getString();c._refreshValue()}if(d=="width"){c.width=e;c._render()}else{if(d=="height"){c.height=e;c._render()}}},_value:function(){var b=this.value;return b},_getEditStringLength:function(){var b="";for(i=0;i<this.items.length;i++){if(this.items[i].canEdit){b+=this.items[i].character}}return b.length},_getEditValue:function(){var b="";for(i=0;i<this.items.length;i++){if(this.items[i].canEdit&&this.items[i].character!=this.promptChar){b+=this.items[i].character}}return b},parseValue:function(e){if(e==undefined||e==null){return null}var c=e.toString();var f="";var b=0;for(m=0;m<c.length;m++){var d=c.substring(m,m+1);for(i=b;i<this.items.length;i++){if(this.items[i].canEdit&&this._match(d,this.items[i].regex)){f+=d;b=i;break}}}return f},clear:function(){this.clearValue()},clearValue:function(){this.inputValue("",true)},val:function(b){if(b!=undefined&&typeof b!="object"){this.inputValue(b)}return this.maskbox[0].value},inputValue:function(g,c){if(g==undefined||g==null){var f="";for(var e=0;e<this.items.length;e++){if(this.items[e].canEdit){f+=this.items[e].character}}return f}else{var b=0;g=g.toString();for(var e=0;e<this.items.length;e++){if(this.items[e].canEdit){if(this._match(g.substring(b,b+1),this.items[e].regex)){this.items[e].character=g.substring(b,b+1);b++}else{if(c){this.items[e].character=this.promptChar}}}}var d=this._getString();this.maskedValue(d);return this.inputValue()}},_refreshValue:function(){var d=this.maskedValue();var b=0;for(var c=0;c<this.items.length;c++){if(d.length>b){if(this.items[c].canEdit&&this.items[c].character!=d[b]){if(this._match(d[b],this.items[c].regex)&&d[b].length==1){this.items[c].character=d[b]}}b++}}this.value=this._getString();d=this.value;this.maskbox[0].value=d;a.jqx.aria(this,"aria-valuenow",d)}})})(jQuery);