(window.webpackJsonp=window.webpackJsonp||[]).push([[4,5,12,15],{394:function(t,e,r){"use strict";var n=r(20),o=r(4),c=r(95),l=r(22),d=r(21),f=r(42),v=r(238),m=r(94),h=r(8),x=r(96),_=r(154).f,y=r(53).f,w=r(24).f,S=r(396).trim,C="Number",N=o.Number,k=N.prototype,I=f(x(k))==C,E=function(t){var e,r,n,o,c,l,d,code,f=m(t,!1);if("string"==typeof f&&f.length>2)if(43===(e=(f=S(f)).charCodeAt(0))||45===e){if(88===(r=f.charCodeAt(2))||120===r)return NaN}else if(48===e){switch(f.charCodeAt(1)){case 66:case 98:n=2,o=49;break;case 79:case 111:n=8,o=55;break;default:return+f}for(l=(c=f.slice(2)).length,d=0;d<l;d++)if((code=c.charCodeAt(d))<48||code>o)return NaN;return parseInt(c,n)}return+f};if(c(C,!N(" 0o1")||!N("0b1")||N("+0x1"))){for(var A,z=function(t){var e=arguments.length<1?0:t,r=this;return r instanceof z&&(I?h((function(){k.valueOf.call(r)})):f(r)!=C)?v(new N(E(e)),r,z):E(e)},T=n?_(N):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger,fromString,range".split(","),F=0;T.length>F;F++)d(N,A=T[F])&&!d(z,A)&&w(z,A,y(N,A));z.prototype=k,k.constructor=z,l(o,C,z)}},395:function(t,e,r){var content=r(399);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("03051d40",content,!0,{sourceMap:!1})},396:function(t,e,r){var n=r(19),o="["+r(397)+"]",c=RegExp("^"+o+o+"*"),l=RegExp(o+o+"*$"),d=function(t){return function(e){var r=String(n(e));return 1&t&&(r=r.replace(c,"")),2&t&&(r=r.replace(l,"")),r}};t.exports={start:d(1),end:d(2),trim:d(3)}},397:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},398:function(t,e,r){"use strict";r(395)},399:function(t,e,r){var n=r(11)(!1);n.push([t.i,".price-format{display:flex;align-items:baseline}",""]),t.exports=n},400:function(t,e,r){"use strict";r.r(e);r(394),r(52),r(239);var n={data:function(){return{priceSlice:{}}},components:{},props:{firstSize:{type:Number,default:14},secondSize:{type:Number,default:14},color:{type:String},weight:{type:[String,Number],default:500},price:{type:[String,Number],default:""},showSubscript:{type:Boolean,default:!0},subscriptSize:{type:Number,default:14},lineThrough:{type:Boolean,default:!1}},created:function(){this.priceFormat()},watch:{price:function(t){this.priceFormat()}},methods:{priceFormat:function(){var t=this.price,e={};null!==t&&(t=parseFloat(t),t=String(t).split("."),e.first=t[0],e.second=t[1],this.priceSlice=e)}}},o=(r(398),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("span",{class:(t.lineThrough?"line-through":"")+"price-format",style:{color:t.color,"font-weight":t.weight}},[t.showSubscript?r("span",{style:{"font-size":t.subscriptSize+"px","margin-right":"1px"}},[t._v("¥")]):t._e(),t._v(" "),r("span",{style:{"font-size":t.firstSize+"px","margin-right":"1px"}},[t._v(t._s(t.priceSlice.first))]),t._v(" "),t.priceSlice.second?r("span",{style:{"font-size":t.secondSize+"px"}},[t._v("."+t._s(t.priceSlice.second))]):t._e()])}),[],!1,null,null,null);e.default=component.exports},405:function(t,e,r){var content=r(412);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("f37a30f2",content,!0,{sourceMap:!1})},406:function(t,e,r){var content=r(418);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("a57d76be",content,!0,{sourceMap:!1})},410:function(t,e,r){"use strict";r.d(e,"b",(function(){return o})),r.d(e,"a",(function(){return c}));r(99),r(155),r(52),r(239);var n=r(30);var o=function(t){var time=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1e3,e=arguments.length>2?arguments[2]:void 0,r=new Date(0).getTime();return function(){var n=(new Date).getTime();if(n-r>time){for(var o=arguments.length,c=new Array(o),l=0;l<o;l++)c[l]=arguments[l];t.apply(e,c),r=n}}};function c(t){var p="";if("object"==Object(n.a)(t)){for(var e in p="?",t)p+="".concat(e,"=").concat(t[e],"&");p=p.slice(0,-1)}return p}},411:function(t,e,r){"use strict";r(405)},412:function(t,e,r){var n=r(11)(!1);n.push([t.i,".goods-list[data-v-483dfcdd]{align-items:stretch}.goods-list .goods-item[data-v-483dfcdd]{display:block;box-sizing:border-box;width:224px;height:310px;margin-bottom:16px;padding:12px 12px 16px;border-radius:4px;transition:all .2s}.goods-list .goods-item[data-v-483dfcdd]:hover{transform:translateY(-8px);box-shadow:0 0 6px rgba(0,0,0,.1)}.goods-list .goods-item .goods-img[data-v-483dfcdd]{width:200px;height:200px}.goods-list .goods-item .name[data-v-483dfcdd]{margin-bottom:10px;height:40px;line-height:20px}.goods-list .goods-item .seckill .btn[data-v-483dfcdd]{padding:4px 12px;border-radius:4px;border:1px solid transparent}.goods-list .goods-item .seckill .btn.not-start[data-v-483dfcdd]{border-color:#ff2c3c;color:#ff2c3c;background-color:transparent}.goods-list .goods-item .seckill .btn.end[data-v-483dfcdd]{background-color:#e5e5e5;color:#fff}",""]),t.exports=n},414:function(t,e,r){"use strict";var n=r(6),o=r(415);n({target:"String",proto:!0,forced:r(416)("link")},{link:function(t){return o(this,"a","href",t)}})},415:function(t,e,r){var n=r(19),o=/"/g;t.exports=function(t,e,r,c){var l=String(n(t)),d="<"+e;return""!==r&&(d+=" "+r+'="'+String(c).replace(o,"&quot;")+'"'),d+">"+l+"</"+e+">"}},416:function(t,e,r){var n=r(8);t.exports=function(t){return n((function(){var e=""[t]('"');return e!==e.toLowerCase()||e.split('"').length>3}))}},417:function(t,e,r){"use strict";r(406)},418:function(t,e,r){var n=r(11)(!1);n.push([t.i,".ad-item[data-v-562e7d63]{width:100%;height:100%;cursor:pointer}",""]),t.exports=n},421:function(t,e,r){"use strict";r.r(e);r(394);var n={props:{list:{type:Array,default:function(){return[]}},num:{type:Number,default:5},type:{type:String},status:{type:Number}},watch:{list:{immediate:!0,handler:function(t){}}},computed:{getSeckillText:function(){switch(this.status){case 0:return"未开始";case 1:return"立即抢购";case 2:return"已结束"}}}},o=(r(411),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"goods-list row wrap"},t._l(t.list,(function(e,n){return r("nuxt-link",{key:n,staticClass:"goods-item bg-white",style:{marginRight:(n+1)%t.num==0?0:"14px"},attrs:{to:"/goods_details/"+e.id}},[r("el-image",{staticClass:"goods-img",attrs:{lazy:"",src:e.image,alt:""}}),t._v(" "),r("div",{staticClass:"name line2"},[t._v(t._s(e.name))]),t._v(" "),"seckill"==t.type?r("div",{staticClass:"seckill row-between"},[r("div",{staticClass:"primary row"},[t._v("\n        秒杀价"),r("price-formate",{attrs:{price:e.seckill_price,"first-size":18}})],1),t._v(" "),r("div",{class:["btn bg-primary white",{"not-start":0==t.status,end:2==t.status}]},[t._v(t._s(t.getSeckillText))])]):r("div",{staticClass:"row-between wrap"},[r("div",{staticClass:"price row"},[r("div",{staticClass:"primary mr8"},[r("price-formate",{attrs:{price:e.price,"first-size":16}})],1),t._v(" "),r("div",{staticClass:"muted sm line-through"},[r("price-formate",{attrs:{price:e.market_price}})],1)]),t._v(" "),r("div",{staticClass:"muted xs"},[t._v(t._s(e.sales_sum)+"人购买")])])],1)})),1)}),[],!1,null,"483dfcdd",null);e.default=component.exports;installComponents(component,{PriceFormate:r(400).default})},422:function(t,e,r){"use strict";r.r(e);r(67),r(414);var n=r(410),o={components:{},props:{item:{type:Object,default:function(){return{}}}},methods:{goPage:function(t){var e=t.link_type,link=t.link,r=t.params;switch(e){case 3:window.open(t.link);break;default:["/goods_details"].includes(link)?link+="/".concat(r.id):link+=Object(n.a)(r),this.$router.push({path:link})}}}},c=(r(417),r(7)),component=Object(c.a)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"ad-item",on:{click:function(e){return e.stopPropagation(),t.goPage(t.item)}}},[r("el-image",{staticStyle:{width:"100%",height:"100%"},attrs:{src:t.item.image}})],1)}),[],!1,null,"562e7d63",null);e.default=component.exports},451:function(t,e,r){var content=r(469);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("3d0c7cbf",content,!0,{sourceMap:!1})},468:function(t,e,r){"use strict";r(451)},469:function(t,e,r){var n=r(11)(!1);n.push([t.i,".activity-area[data-v-5cccde52]{margin-bottom:16px}.activity-area .activity-header[data-v-5cccde52]{height:80px}.activity-area .activity-header .title[data-v-5cccde52]{font-size:28px}",""]),t.exports=n},470:function(t,e,r){"use strict";r.r(e);var n={components:{},props:{url:{type:String,default:""},title:{type:String},desc:{type:String},banner:{type:Object,default:function(){return{}}},list:{type:Array,default:function(){return[]}}},created:function(){}},o=(r(468),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return t.list.length?r("div",{staticClass:"activity-area"},[r("div",{staticClass:"activity-header row"},[r("div",{staticClass:"content row flex1"},[r("div",{staticClass:"title bold mr8"},[t._v(t._s(t.title))]),t._v(" "),r("div",{staticClass:"lg muted"},[t._v(t._s(t.desc))])]),t._v(" "),r("nuxt-link",{staticClass:"more",attrs:{to:t.url}},[t._v("更多 "),r("i",{staticClass:"el-icon-arrow-right"})])],1),t._v(" "),t.banner.image?r("div",[r("ad-item",{attrs:{item:t.banner}})],1):t._e(),t._v(" "),r("div",{staticClass:"activity-goods mt16"},[r("goods-list",{attrs:{list:t.list}})],1)]):t._e()}),[],!1,null,"5cccde52",null);e.default=component.exports;installComponents(component,{AdItem:r(422).default,GoodsList:r(421).default})}}]);