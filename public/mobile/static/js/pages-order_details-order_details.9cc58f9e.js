(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-order_details-order_details"],{"015d":function(t,e,i){"use strict";i.r(e);var a=i("f75e"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},"04b0":function(t,e,i){"use strict";i("a9e3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a={name:"u-count-down",props:{timestamp:{type:[Number,String],default:0},autoplay:{type:Boolean,default:!0},separator:{type:String,default:"colon"},separatorSize:{type:[Number,String],default:30},separatorColor:{type:String,default:"#303133"},color:{type:String,default:"#303133"},fontSize:{type:[Number,String],default:30},bgColor:{type:String,default:"#fff"},height:{type:[Number,String],default:"auto"},showBorder:{type:Boolean,default:!1},borderColor:{type:String,default:"#303133"},showSeconds:{type:Boolean,default:!0},showMinutes:{type:Boolean,default:!0},showHours:{type:Boolean,default:!0},showDays:{type:Boolean,default:!0},hideZeroDay:{type:Boolean,default:!1}},watch:{timestamp:function(t,e){this.clearTimer(),this.start()}},data:function(){return{d:"00",h:"00",i:"00",s:"00",timer:null,seconds:0}},computed:{itemStyle:function(){var t={};return this.height&&(t.height=this.height+"rpx",t.width=this.height+"rpx"),this.showBorder&&(t.borderStyle="solid",t.borderColor=this.borderColor,t.borderWidth="1px"),this.bgColor&&(t.backgroundColor=this.bgColor),t},letterStyle:function(){var t={};return this.fontSize&&(t.fontSize=this.fontSize+"rpx"),this.color&&(t.color=this.color),t}},mounted:function(){this.autoplay&&this.timestamp&&this.start()},methods:{start:function(){var t=this;this.clearTimer(),this.timestamp<=0||(this.seconds=Number(this.timestamp),this.formatTime(this.seconds),this.timer=setInterval((function(){if(t.seconds--,t.$emit("change",t.seconds),t.seconds<0)return t.end();t.formatTime(t.seconds)}),1e3))},formatTime:function(t){t<=0&&this.end();var e=0,i=0,a=0,n=0;e=Math.floor(t/86400),i=Math.floor(t/3600)-24*e;var r=null;r=this.showDays?i:Math.floor(t/3600),a=Math.floor(t/60)-60*i-24*e*60,n=Math.floor(t)-24*e*60*60-60*i*60-60*a,r=r<10?"0"+r:r,a=a<10?"0"+a:a,n=n<10?"0"+n:n,e=e<10?"0"+e:e,this.d=e,this.h=r,this.i=a,this.s=n},end:function(){this.clearTimer(),this.$emit("end",{})},reset:function(){this.clearTimer(),this.seconds=Number(this.timestamp),this.s=this.timestamp,console.log(this.s)},clearTimer:function(){this.timer&&(clearInterval(this.timer),this.timer=null)}},beforeDestroy:function(){clearInterval(this.timer),this.timer=null}};e.default=a},"0ea5":function(t,e,i){var a=i("eebd");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("db095662",a,!0,{sourceMap:!1,shadowMode:!1})},"1c5b":function(t,e,i){"use strict";var a=i("4ea4");i("a9e3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0,i("96cf");var n=a(i("1da1")),r=i("9d64"),o={props:{type:Number,orderId:[Number,String]},data:function(){return{show:!1}},methods:{open:function(){this.show=!0},close:function(){this.show=!1},onConfirm:function(){var t=this;return(0,n.default)(regeneratorRuntime.mark((function e(){var i,a,n;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:i=t.type,a=t.orderId,n=null,e.t0=i,e.next=0===e.t0?5:1===e.t0?9:2===e.t0?13:17;break;case 5:return e.next=7,(0,r.cancelOrder)(a);case 7:return n=e.sent,e.abrupt("break",17);case 9:return e.next=11,(0,r.delOrder)(a);case 11:return n=e.sent,e.abrupt("break",17);case 13:return e.next=15,(0,r.confirmOrder)(a);case 15:return n=e.sent,e.abrupt("break",17);case 17:1==n.code&&(t.close(),t.$emit("refresh"),t.$toast({title:n.msg}));case 18:case"end":return e.stop()}}),e)})))()}},computed:{getTipsText:function(){var t=this.type;switch(t){case 0:return"确认取消订单吗？";case 1:return"确认删除订单吗?";case 2:return"确认收货吗?"}}}};e.default=o},"29d0":function(t,e,i){"use strict";var a=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.wxpay=o,e.alipay=s;var n=a(i("abf2")),r=i("587f");function o(t){if((0,r.isWeixinClient)())return n.default.wxPay(t);console.log(t),location.href=t}function s(t){var e=document.createElement("div");console.log(t),e.innerHTML=t,document.body.appendChild(e),document.forms[0].submit()}},"324c":function(t,e,i){"use strict";i.r(e);var a=i("f549"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},"3e63":function(t,e,i){"use strict";i.r(e);var a=i("ba62"),n=i("cbb1");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);i("7e50");var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"4319585a",null,!1,a["a"],o);e["default"]=c.exports},"423b":function(t,e,i){"use strict";i.r(e);var a=i("04b0"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},4640:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=i("587f"),n={name:"float-tab",data:function(){return{showMore:!1,top:0}},mounted:function(){var t=this;(0,a.getRect)(".tab-img",!1,this).then((function(e){t.height=e.height,console.log(t.height)}))},methods:{onChange:function(){this.showMore=!this.showMore}},watch:{showMore:function(t){this.top=t?-this.height:0}}};e.default=n},4655:function(t,e,i){var a=i("aef3");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("607d9480",a,!0,{sourceMap:!1,shadowMode:!1})},"4ad9":function(t,e,i){var a=i("e801");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("35f35b0e",a,!0,{sourceMap:!1,shadowMode:!1})},"520f":function(t,e,i){var a=i("dad0");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("bbbebe4a",a,!0,{sourceMap:!1,shadowMode:!1})},"5e0c":function(t,e,i){"use strict";i("a9e3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a={data:function(){return{}},props:{type:{type:String,default:"fixed"},backgroundColor:{type:String,default:"#fff"},color:{type:String},size:{type:Number,default:40}},methods:{}};e.default=a},"64e8":function(t,e,i){"use strict";i.r(e);var a=i("d056"),n=i("324c");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);i("8c8d");var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"f6bf7054",null,!1,a["a"],o);e["default"]=c.exports},"7ca9":function(t,e,i){"use strict";var a;i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"u-countdown"},[t.showDays&&(t.hideZeroDay||!t.hideZeroDay&&"00"!=t.d)?i("v-uni-view",{style:{fontSize:t.fontSize+"rpx"}},[t._v(t._s(t.d))]):t._e(),t.showDays&&(t.hideZeroDay||!t.hideZeroDay&&"00"!=t.d)?i("v-uni-view",{style:{fontSize:t.separatorSize+"rpx","margin-right":"6rpx"}},[t._v("天")]):t._e(),t.showHours?i("v-uni-view",{staticClass:"u-countdown-item",style:[t.itemStyle]},[i("v-uni-view",{staticClass:"u-countdown-time",style:{fontSize:t.fontSize+"rpx",color:t.color}},[t._v(t._s(t.h))])],1):t._e(),t.showHours?i("v-uni-view",{staticClass:"u-countdown-colon",style:{fontSize:t.separatorSize+"rpx",color:t.separatorColor,paddingBottom:"colon"==t.separator?"4rpx":0}},[t._v(t._s("colon"==t.separator?":":"时"))]):t._e(),t.showMinutes?i("v-uni-view",{staticClass:"u-countdown-item",style:[t.itemStyle]},[i("v-uni-view",{staticClass:"u-countdown-time",style:{fontSize:t.fontSize+"rpx",color:t.color}},[t._v(t._s(t.i))])],1):t._e(),t.showMinutes?i("v-uni-view",{staticClass:"u-countdown-colon",style:{fontSize:t.separatorSize+"rpx",color:t.separatorColor,paddingBottom:"colon"==t.separator?"4rpx":0}},[t._v(t._s("colon"==t.separator?":":"分"))]):t._e(),t.showSeconds?i("v-uni-view",{staticClass:"u-countdown-item",style:[t.itemStyle]},[i("v-uni-view",{staticClass:"u-countdown-time",style:{fontSize:t.fontSize+"rpx",color:t.color}},[t._v(t._s(t.s))])],1):t._e(),t.showSeconds&&"zh"==t.separator?i("v-uni-view",{staticClass:"u-countdown-colon",style:{fontSize:t.separatorSize+"rpx",color:t.separatorColor,paddingBottom:"colon"==t.separator?"4rpx":0}},[t._v("秒")]):t._e()],1)},r=[]},"7e50":function(t,e,i){"use strict";var a=i("0ea5"),n=i.n(a);n.a},"7f0e":function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var a={uModal:i("67ff").default},n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("u-modal",{attrs:{"show-cancel-button":!0,content:t.getTipsText,"confirm-color":"#ff2c3c"},on:{confirm:function(e){arguments[0]=e=t.$handleEvent(e),t.onConfirm.apply(void 0,arguments)}},model:{value:t.show,callback:function(e){t.show=e},expression:"show"}})},r=[]},"86fb":function(t,e,i){"use strict";var a=i("a72c"),n=i.n(a);n.a},"8c8d":function(t,e,i){"use strict";var a=i("4655"),n=i.n(a);n.a},"8e7f":function(t,e,i){"use strict";i.r(e);var a=i("7f0e"),n=i("a9b7");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"ed127a32",null,!1,a["a"],o);e["default"]=c.exports},"9af0":function(t,e,i){"use strict";var a;i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{class:"loading "+(t.vertical?"loading--vertical":"")},[i("v-uni-view",{class:"loading__spinner loading__spinner--"+t.type,style:{color:t.color,width:t.size+"rpx",height:t.size+"rpx"}},t._l(t.array12,(function(e,a){return"spinner"===t.type?i("v-uni-view",{key:a,staticClass:"loading__dot"}):t._e()})),1),i("v-uni-view",{staticClass:"loading__text",style:{"font-size":t.textSize+"rpx",color:t.color}},[t._t("default")],2)],1)},r=[]},"9d64":function(t,e,i){"use strict";var a=i("4ea4");Object.defineProperty(e,"__esModule",{value:!0}),e.orderBuy=r,e.delOrder=o,e.getOrderList=s,e.getOrderDetail=c,e.cancelOrder=d,e.orderTraces=l,e.confirmOrder=u,e.getOrderCoupon=f;var n=a(i("65b1"));i("587f");function r(t){return n.default.post("order/buy",t)}function o(t){return n.default.post("order/del",{id:t})}function s(t){return n.default.get("order/lists",{params:t})}function c(t){return n.default.get("order/detail",{params:{id:t}})}function d(t){return n.default.post("order/cancel",{id:t})}function l(t){return n.default.get("order/orderTraces",{params:{id:t}})}function u(t){return n.default.post("order/confirm",{id:t})}function f(t){return n.default.post("coupon/orderCoupon",t)}},a72c:function(t,e,i){var a=i("bb94");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("76414e36",a,!0,{sourceMap:!1,shadowMode:!1})},a9b7:function(t,e,i){"use strict";i.r(e);var a=i("1c5b"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},aef3:function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */.order-details[data-v-f6bf7054]{position:relative;padding-bottom:calc(%?120?% + env(safe-area-inset-bottom))}.order-details .header-bg[data-v-f6bf7054]{position:absolute;top:0;width:100%;height:%?200?%;background-color:#ff2c3c;z-index:0}.order-details .goods .status[data-v-f6bf7054]{height:%?88?%;padding:0 %?20?%}.order-details .main[data-v-f6bf7054]{position:relative;z-index:1}.order-details .contain[data-v-f6bf7054]{margin:0 %?20?% %?20?%;border-radius:%?14?%;background-color:#fff}.order-details .header[data-v-f6bf7054]{padding:%?24?% %?40?%;box-sizing:border-box}.order-details .img-line[data-v-f6bf7054]{height:1.5px;width:100%;display:block}.order-details .address-wrap[data-v-f6bf7054]{height:%?164?%;padding:0 %?24?%}.order-details .order-info[data-v-f6bf7054]{padding:%?12?% 0}.order-details .order-info .item[data-v-f6bf7054]{padding:%?12?% %?24?%}.order-details .order-info .item .title[data-v-f6bf7054]{width:%?180?%;-webkit-box-flex:0;-webkit-flex:none;flex:none}.order-details .price > uni-view[data-v-f6bf7054]{height:%?60?%;padding:0 %?24?%}.order-details .footer[data-v-f6bf7054]{position:fixed;bottom:0;left:0;right:0;height:%?100?%;padding:0 %?24?%;box-sizing:initial;padding-bottom:env(safe-area-inset-bottom)}.footer .plain[data-v-f6bf7054]{border:1px solid #bbb}.footer .plain.red[data-v-f6bf7054]{border:1px solid #ff2c3c}.tips-dialog[data-v-f6bf7054]{height:%?230?%;width:100%}.order-details .invite-btn[data-v-f6bf7054]{background:-webkit-linear-gradient(right,#ff2c3c,#f95f2f);background:linear-gradient(270deg,#ff2c3c,#f95f2f);margin:%?30?% %?26?% %?40?%}',""]),t.exports=e},af36:function(t,e,i){"use strict";i.r(e);var a=i("9af0"),n=i("015d");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);i("b40a");var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"49a28488",null,!1,a["a"],o);e["default"]=c.exports},b40a:function(t,e,i){"use strict";var a=i("4ad9"),n=i.n(a);n.a},ba62:function(t,e,i){"use strict";var a;i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"float-tab ~column"},[i("v-uni-navigator",{staticClass:"tab-img",style:{top:3*t.top+"px"},attrs:{"hover-class":"none","open-type":"switchTab",url:"/pages/index/index"}},[i("v-uni-image",{staticClass:"tab-icon",attrs:{src:"/static/images/icon_float_home.png"}})],1),i("v-uni-navigator",{staticClass:"tab-img",style:{top:2*t.top+"px"},attrs:{"hover-class":"none","open-type":"navigate",url:"/pages/bundle/contact_offical/contact_offical"}},[i("v-uni-image",{staticClass:"tab-icon",attrs:{src:"/static/images/icon_float_help.png"}})],1),i("v-uni-navigator",{staticClass:"tab-img",style:{top:t.top+"px"},attrs:{"hover-class":"none","open-type":"switchTab",url:"/pages/shop_cart/shop_cart"}},[i("v-uni-image",{staticClass:"tab-icon",attrs:{src:"/static/images/icon_float_cart.png"}})],1),i("v-uni-image",{staticClass:"tab-img",staticStyle:{"z-index":"99"},style:{transform:"rotateZ("+(t.showMore?135:0)+"deg)"},attrs:{src:"/static/images/icon_float_more.png"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.onChange.apply(void 0,arguments)}}})],1)},r=[]},bb94:function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */.u-countdown[data-v-d47f9d56]{display:-webkit-inline-box;display:-webkit-inline-flex;display:inline-flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.u-countdown-item[data-v-d47f9d56]{\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;padding:%?2?%;border-radius:%?6?%;white-space:nowrap;-webkit-transform:translateZ(0);transform:translateZ(0)}.u-countdown-time[data-v-d47f9d56]{margin:0;padding:0}.u-countdown-colon[data-v-d47f9d56]{\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;padding:0 %?5?%;line-height:1;-webkit-box-align:center;-webkit-align-items:center;align-items:center;padding-bottom:%?4?%}.u-countdown-scale[data-v-d47f9d56]{-webkit-transform:scale(.9);transform:scale(.9);-webkit-transform-origin:center center;transform-origin:center center}',""]),t.exports=e},be0b:function(t,e,i){"use strict";var a=i("520f"),n=i.n(a);n.a},c58c:function(t,e,i){"use strict";i.r(e);var a=i("7ca9"),n=i("423b");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);i("86fb");var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"d47f9d56",null,!1,a["a"],o);e["default"]=c.exports},cbb1:function(t,e,i){"use strict";i.r(e);var a=i("4640"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},d056:function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var a={uCountDown:i("c58c").default,orderGoods:i("3ff3").default,priceFormat:i("55d9").default,loadingView:i("d2e4").default,orderDialog:i("8e7f").default,floatTab:i("3e63").default},n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",[i("v-uni-view",{staticClass:"order-details"},[i("v-uni-view",{staticClass:"header-bg"}),i("v-uni-view",{staticClass:"main"},[i("v-uni-view",{staticClass:"header"},[0==t.orderDetail.order_status?i("v-uni-view",{staticClass:"item"},[i("v-uni-view",{staticClass:"white lg mb10"},[t._v("等待买家付款")]),t.cancelTime>0?i("v-uni-view",{staticClass:"white sm row"},[t._v("支付剩余"),i("u-count-down",{attrs:{separator:"zh","show-hours":!1,"show-seconds":!1,timestamp:t.cancelTime,"separator-color":"#fff",color:"#fff","separator-size":26,"font-size":26,"bg-color":"transparent"}}),t._v("自动关闭")],1):t._e()],1):t._e(),1==t.orderDetail.order_status?i("v-uni-view",{staticClass:"item"},[i("v-uni-view",{staticClass:"white lg mb10"},[t._v("等待商家发货")]),i("v-uni-view",{staticClass:"white sm"},[t._v("您的商品正在打包中，请耐心等待…")])],1):t._e(),2==t.orderDetail.order_status?i("v-uni-view",{staticClass:"item"},[i("v-uni-view",{staticClass:"white lg mb10"},[t._v("已发货")]),i("v-uni-view",{staticClass:"white sm"},[t._v("您的商品正在路中，请耐心等待…")])],1):t._e(),3==t.orderDetail.order_status?i("v-uni-view",{staticClass:"item"},[i("v-uni-view",{staticClass:"white lg mb10"},[t._v("已完成")]),i("v-uni-view",{staticClass:"white sm"},[t._v("商品已签收，期待再次购买！")])],1):t._e(),4==t.orderDetail.order_status?i("v-uni-view",{staticClass:"item"},[i("v-uni-view",{staticClass:"white lg mb10"},[t._v("订单已关闭")])],1):t._e()],1),i("v-uni-view",{staticClass:"address-wrap row contain"},[i("v-uni-image",{staticClass:"icon-md mr20",attrs:{src:"/static/images/icon_address.png"}}),i("v-uni-view",{staticClass:"address"},[i("v-uni-view",[i("v-uni-text",{staticClass:"name md mr10"},[t._v(t._s(t.orderDetail.consignee))]),i("v-uni-text",{staticClass:"phone md"},[t._v(t._s(t.orderDetail.mobile))]),i("v-uni-view",{staticClass:"area sm mt10 lighter"},[t._v(t._s(t.orderDetail.delivery_address))])],1)],1)],1),i("v-uni-view",{staticClass:"goods contain"},[null!=t.team.status?i("v-uni-view",{staticClass:"status row-between"},[i("v-uni-view",[t._v("拼团状态")]),i("v-uni-view",{staticClass:"bg-primary br60 white sm",style:"padding: 6rpx 26rpx; "+(2==t.team.status&&"background-color: #d7d7d7")},[t._v(t._s(t.teamStatus(t.team.status)))])],1):t._e(),i("order-goods",{attrs:{team:t.team,link:!0,list:t.orderDetail.order_goods}})],1),i("v-uni-view",{staticClass:"price contain"},[i("v-uni-view",{staticClass:"row-between"},[i("v-uni-view",[t._v("商品金额")]),i("v-uni-view",{staticClass:"black"},[i("price-format",{attrs:{price:t.orderDetail.goods_price}})],1)],1),i("v-uni-view",{staticClass:"row-between"},[i("v-uni-view",[t._v("运费")]),i("v-uni-view",{staticClass:"black"},[t._v("+"),i("price-format",{attrs:{price:t.orderDetail.shipping_price}})],1)],1),0!=t.orderDetail.discount_amount?i("v-uni-view",{staticClass:"row-between"},[i("v-uni-view",[t._v("优惠券")]),i("v-uni-view",{staticClass:"primary"},[t._v("-"),i("price-format",{attrs:{price:t.orderDetail.discount_amount}})],1)],1):t._e(),0!=t.orderDetail.integral_amount?i("v-uni-view",{staticClass:"row-between"},[i("v-uni-view",[t._v("积分抵扣")]),i("v-uni-view",{staticClass:"primary"},[t._v("-"),i("price-format",{attrs:{price:t.orderDetail.integral_amount}})],1)],1):t._e(),i("v-uni-view",{staticClass:"row-end"},[i("v-uni-view",{staticClass:"lighter"},[t._v("实付金额：")]),i("v-uni-view",{staticClass:"primary xl"},[i("price-format",{attrs:{"first-size":34,"second-size":34,price:t.orderDetail.order_amount}})],1)],1)],1),i("v-uni-view",{staticClass:"order-info contain"},[i("v-uni-view",{staticClass:"item row",staticStyle:{"align-items":"flex-start"}},[i("v-uni-view",{staticClass:"title"},[t._v("买家留言")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.user_remark||"无"))])],1)],1),i("v-uni-view",{staticClass:"order-info contain"},[i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("订单编号")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.order_sn))])],1),i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("订单类型")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.getOrderType(t.orderDetail.order_type)))])],1),i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("支付方式")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.pay_way_text))])],1),i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("下单时间")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.create_time))])],1),t.orderDetail.pay_time?i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("付款时间")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.pay_time))])],1):t._e(),t.orderDetail.shipping_time?i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("发货时间")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.shipping_time))])],1):t._e(),t.orderDetail.confirm_take_time?i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("成交时间")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.confirm_take_time))])],1):t._e(),t.orderDetail.cancel_time?i("v-uni-view",{staticClass:"item row"},[i("v-uni-view",{staticClass:"title"},[t._v("关闭时间")]),i("v-uni-view",{staticClass:"black"},[t._v(t._s(t.orderDetail.cancel_time))])],1):t._e()],1),t.orderDetail.cancel_btn||t.orderDetail.delivery_btn||t.orderDetail.take_btn||t.orderDetail.del_btn||t.orderDetail.pay_btn?i("v-uni-view",{staticClass:"footer bg-white row fixed"},[i("v-uni-view",{staticStyle:{flex:"1"}}),t.orderDetail.cancel_btn?i("v-uni-view",[i("v-uni-button",{staticClass:"plain br60",attrs:{size:"sm","hover-class":"none"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.cancelOrder.apply(void 0,arguments)}}},[t._v("取消订单")])],1):t._e(),t.orderDetail.delivery_btn?i("v-uni-navigator",{attrs:{"hover-class":"none",url:"/pages/bundle/goods_logistics/goods_logistics?id="+t.orderDetail.id}},[i("v-uni-button",{staticClass:"plain br60",attrs:{size:"sm","hover-class":"none"}},[t._v("查看物流")])],1):t._e(),t.orderDetail.take_btn?i("v-uni-view",{staticClass:"ml20"},[i("v-uni-button",{staticClass:"plain br60 primary red",attrs:{size:"sm","hover-class":"none"},on:{click:function(e){e.stopPropagation(),arguments[0]=e=t.$handleEvent(e),t.comfirmOrder.apply(void 0,arguments)}}},[t._v("确认收货")])],1):t._e(),t.orderDetail.del_btn?i("v-uni-view",[i("v-uni-button",{staticClass:"plain br60",attrs:{size:"sm","hover-class":"none"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.delOrder.apply(void 0,arguments)}}},[t._v("删除订单")])],1):t._e(),t.orderDetail.pay_btn?i("v-uni-view",{staticClass:"ml20"},[i("v-uni-button",{staticClass:"bg-primary br60 white",attrs:{size:"sm"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.payNow.apply(void 0,arguments)}}},[t._v("立即付款")])],1):t._e()],1):t._e()],1)],1),t.isFirstLoading?i("loading-view"):t._e(),i("order-dialog",{ref:"orderDialog",attrs:{orderId:t.orderDetail.id,type:t.type},on:{refresh:function(e){arguments[0]=e=t.$handleEvent(e),t.onRefresh.apply(void 0,arguments)}}}),t.showLoading?i("loading-view",{attrs:{"background-color":"transparent",size:50}}):t._e(),i("float-tab")],1)},r=[]},d2e4:function(t,e,i){"use strict";i.r(e);var a=i("f5af"),n=i("ea35");for(var r in n)"default"!==r&&function(t){i.d(e,t,(function(){return n[t]}))}(r);i("be0b");var o,s=i("f0c5"),c=Object(s["a"])(n["default"],a["b"],a["c"],!1,null,"5bac94aa",null,!1,a["a"],o);e["default"]=c.exports},dad0:function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,".loading[data-v-5bac94aa]{position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;display:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.loading.flex[data-v-5bac94aa]{position:static;-webkit-box-flex:1;-webkit-flex:1;flex:1;width:100%}",""]),t.exports=e},e801:function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'[data-v-49a28488]:host{font-size:0;line-height:1}.loading[data-v-49a28488]{display:-webkit-inline-box;display:-webkit-inline-flex;display:inline-flex;-webkit-box-align:center;-webkit-align-items:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;justify-content:center;color:#c8c9cc}.loading__spinner[data-v-49a28488]{position:relative;box-sizing:border-box;width:%?45?%;max-width:100%;max-height:100%;height:%?45?%;-webkit-animation:rotate-data-v-49a28488 .8s linear infinite;animation:rotate-data-v-49a28488 .8s linear infinite}.loading__spinner--spinner[data-v-49a28488]{-webkit-animation-timing-function:steps(12);animation-timing-function:steps(12)}.loading__spinner--circular[data-v-49a28488]{border:%?2?% solid transparent;border-top-color:initial;border-radius:100%}.loading__text[data-v-49a28488]{margin-left:%?16?%;color:#969799;font-size:%?28?%;line-height:%?40?%}.loading__text[data-v-49a28488]:empty{display:none}.loading--vertical[data-v-49a28488]{-webkit-flex-direction:column;-webkit-box-orient:vertical;-webkit-box-direction:normal;flex-direction:column}.loading--vertical .loading__text[data-v-49a28488]{margin:%?16?% 0 0}.loading__dot[data-v-49a28488]{position:absolute;top:0;left:0;width:100%;height:100%}.loading__dot[data-v-49a28488]:before{display:block;width:%?4?%;height:25%;margin:0 auto;background-color:currentColor;border-radius:40%;content:" "}.loading__dot[data-v-49a28488]:first-of-type{-webkit-transform:rotate(30deg);transform:rotate(30deg);opacity:1}.loading__dot[data-v-49a28488]:nth-of-type(2){-webkit-transform:rotate(60deg);transform:rotate(60deg);opacity:.9375}.loading__dot[data-v-49a28488]:nth-of-type(3){-webkit-transform:rotate(90deg);transform:rotate(90deg);opacity:.875}.loading__dot[data-v-49a28488]:nth-of-type(4){-webkit-transform:rotate(120deg);transform:rotate(120deg);opacity:.8125}.loading__dot[data-v-49a28488]:nth-of-type(5){-webkit-transform:rotate(150deg);transform:rotate(150deg);opacity:.75}.loading__dot[data-v-49a28488]:nth-of-type(6){-webkit-transform:rotate(180deg);transform:rotate(180deg);opacity:.6875}.loading__dot[data-v-49a28488]:nth-of-type(7){-webkit-transform:rotate(210deg);transform:rotate(210deg);opacity:.625}.loading__dot[data-v-49a28488]:nth-of-type(8){-webkit-transform:rotate(240deg);transform:rotate(240deg);opacity:.5625}.loading__dot[data-v-49a28488]:nth-of-type(9){-webkit-transform:rotate(270deg);transform:rotate(270deg);opacity:.5}.loading__dot[data-v-49a28488]:nth-of-type(10){-webkit-transform:rotate(300deg);transform:rotate(300deg);opacity:.4375}.loading__dot[data-v-49a28488]:nth-of-type(11){-webkit-transform:rotate(330deg);transform:rotate(330deg);opacity:.375}.loading__dot[data-v-49a28488]:nth-of-type(12){-webkit-transform:rotate(1turn);transform:rotate(1turn);opacity:.3125}@-webkit-keyframes rotate-data-v-49a28488{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}@keyframes rotate-data-v-49a28488{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}to{-webkit-transform:rotate(1turn);transform:rotate(1turn)}}',""]),t.exports=e},ea35:function(t,e,i){"use strict";i.r(e);var a=i("5e0c"),n=i.n(a);for(var r in a)"default"!==r&&function(t){i.d(e,t,(function(){return a[t]}))}(r);e["default"]=n.a},eebd:function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */.float-tab[data-v-4319585a]{position:fixed;right:%?16?%;bottom:%?200?%;width:%?96?%;height:%?96?%;z-index:777}.float-tab .tab-img[data-v-4319585a]{width:100%;height:100%;position:absolute;-webkit-transition:all .5s;transition:all .5s}.float-tab .tab-img .tab-icon[data-v-4319585a]{width:100%;height:100%}',""]),t.exports=e},f549:function(t,e,i){"use strict";i("caad"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a=i("9d64"),n=i("c854"),r=i("29d0"),o={data:function(){return{orderDetail:{},team:{},isFirstLoading:!0,type:0,cancelTime:0,showCancel:"",showLoading:!1}},components:{},props:{},onLoad:function(t){this.id=t.id,this.getOrderDetailFun()},methods:{onRefresh:function(){uni.$emit("refreshorder");var t=this.type;[0,2].includes(t)?this.getOrderDetailFun():1==t&&setTimeout((function(){uni.navigateBack()}),2e3)},orderDialog:function(){this.$refs.orderDialog.open()},delOrder:function(){var t=this;this.type=1,this.$nextTick((function(){t.orderDialog()}))},comfirmOrder:function(){var t=this;this.type=2,this.$nextTick((function(){t.orderDialog()}))},cancelOrder:function(){var t=this;this.type=0,this.$nextTick((function(){t.orderDialog()}))},payNow:function(){var t=this;this.showLoading=!0,(0,n.prepay)({from:"order",order_id:this.id}).then((function(e){var i=e.data;t.showLoading=!1,1==e.code?(0,r.wxpay)(i).then((function(e){"success"==e&&(t.$toast({title:"支付成功"}),t.getOrderDetailFun(),uni.$emit("refreshorder"))})):20001==e.code&&(0,r.alipay)(i).then((function(e){"success"==e&&(t.$toast({title:"支付成功"}),t.getOrderDetailFun(),uni.$emit("refreshorder"))}))}))},getOrderDetailFun:function(){var t=this;(0,a.getOrderDetail)(this.id).then((function(e){1==e.code?(t.cancelTime=e.data.order_cancel_time-Date.now()/1e3,t.orderDetail=e.data,t.team=e.data.team||{},t.$nextTick((function(){t.isFirstLoading=!1}))):setTimeout((function(){return uni.navigateBack()}),1500)}))}},computed:{teamStatus:function(){return function(t){switch(t){case 0:return"拼团中";case 1:return"拼团成功";case 2:return"拼团失败"}}},getOrderType:function(){return function(t){switch(t){case 0:return"普通订单";case 1:return"秒杀订单";case 2:return"拼团订单";case 3:return"砍价订单"}}}}};e.default=o},f5af:function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return r})),i.d(e,"a",(function(){return a}));var a={loading:i("af36").default},n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{class:"loading "+("flex"==t.type?"flex":""),style:{backgroundColor:t.backgroundColor}},[i("loading",{attrs:{color:t.color,size:t.size}})],1)},r=[]},f75e:function(t,e,i){"use strict";i("a630"),i("a9e3"),i("3ca3"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a={props:{color:String,vertical:Boolean,type:{type:String,default:"spinner"},size:{type:Number,default:40},textSize:String},data:function(){return{array12:Array.from({length:12})}}};e.default=a}}]);