(window.webpackJsonp=window.webpackJsonp||[]).push([[27,5,12,14,15],{394:function(t,e,r){"use strict";var n=r(20),o=r(4),c=r(95),l=r(22),d=r(21),f=r(42),m=r(238),h=r(94),v=r(8),x=r(96),_=r(154).f,w=r(53).f,y=r(24).f,S=r(396).trim,k="Number",C=o.Number,N=C.prototype,T=f(x(N))==k,I=function(t){var e,r,n,o,c,l,d,code,f=h(t,!1);if("string"==typeof f&&f.length>2)if(43===(e=(f=S(f)).charCodeAt(0))||45===e){if(88===(r=f.charCodeAt(2))||120===r)return NaN}else if(48===e){switch(f.charCodeAt(1)){case 66:case 98:n=2,o=49;break;case 79:case 111:n=8,o=55;break;default:return+f}for(l=(c=f.slice(2)).length,d=0;d<l;d++)if((code=c.charCodeAt(d))<48||code>o)return NaN;return parseInt(c,n)}return+f};if(c(k,!C(" 0o1")||!C("0b1")||C("+0x1"))){for(var E,z=function(t){var e=arguments.length<1?0:t,r=this;return r instanceof z&&(T?v((function(){N.valueOf.call(r)})):f(r)!=k)?m(new C(I(e)),r,z):I(e)},O=n?_(C):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger,fromString,range".split(","),A=0;O.length>A;A++)d(C,E=O[A])&&!d(z,E)&&y(z,E,w(C,E));z.prototype=N,N.constructor=z,l(o,k,z)}},395:function(t,e,r){var content=r(399);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("03051d40",content,!0,{sourceMap:!1})},396:function(t,e,r){var n=r(19),o="["+r(397)+"]",c=RegExp("^"+o+o+"*"),l=RegExp(o+o+"*$"),d=function(t){return function(e){var r=String(n(e));return 1&t&&(r=r.replace(c,"")),2&t&&(r=r.replace(l,"")),r}};t.exports={start:d(1),end:d(2),trim:d(3)}},397:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},398:function(t,e,r){"use strict";r(395)},399:function(t,e,r){var n=r(11)(!1);n.push([t.i,".price-format{display:flex;align-items:baseline}",""]),t.exports=n},400:function(t,e,r){"use strict";r.r(e);r(394),r(52),r(239);var n={data:function(){return{priceSlice:{}}},components:{},props:{firstSize:{type:Number,default:14},secondSize:{type:Number,default:14},color:{type:String},weight:{type:[String,Number],default:500},price:{type:[String,Number],default:""},showSubscript:{type:Boolean,default:!0},subscriptSize:{type:Number,default:14},lineThrough:{type:Boolean,default:!1}},created:function(){this.priceFormat()},watch:{price:function(t){this.priceFormat()}},methods:{priceFormat:function(){var t=this.price,e={};null!==t&&(t=parseFloat(t),t=String(t).split("."),e.first=t[0],e.second=t[1],this.priceSlice=e)}}},o=(r(398),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("span",{class:(t.lineThrough?"line-through":"")+"price-format",style:{color:t.color,"font-weight":t.weight}},[t.showSubscript?r("span",{style:{"font-size":t.subscriptSize+"px","margin-right":"1px"}},[t._v("¥")]):t._e(),t._v(" "),r("span",{style:{"font-size":t.firstSize+"px","margin-right":"1px"}},[t._v(t._s(t.priceSlice.first))]),t._v(" "),t.priceSlice.second?r("span",{style:{"font-size":t.secondSize+"px"}},[t._v("."+t._s(t.priceSlice.second))]):t._e()])}),[],!1,null,null,null);e.default=component.exports},401:function(t,e,r){var content=r(403);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("7277513c",content,!0,{sourceMap:!1})},402:function(t,e,r){"use strict";r(401)},403:function(t,e,r){var n=r(11)(!1);n.push([t.i,".null-data[data-v-7fa0e58c]{padding:100px}.null-data .img-null[data-v-7fa0e58c]{width:150px;height:150px}",""]),t.exports=n},404:function(t,e,r){"use strict";r.r(e);var n={components:{},props:{img:{type:String},text:{type:String,default:"暂无数据"},imgStyle:{type:String,default:""}},methods:{}},o=(r(402),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"bg-white column-center null-data"},[r("img",{staticClass:"img-null",style:t.imgStyle,attrs:{src:t.img,alt:""}}),t._v(" "),r("div",{staticClass:"muted mt8"},[t._v(t._s(t.text))])])}),[],!1,null,"7fa0e58c",null);e.default=component.exports},405:function(t,e,r){var content=r(412);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("f37a30f2",content,!0,{sourceMap:!1})},406:function(t,e,r){var content=r(418);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("a57d76be",content,!0,{sourceMap:!1})},410:function(t,e,r){"use strict";r.d(e,"b",(function(){return o})),r.d(e,"a",(function(){return c}));r(99),r(155),r(52),r(239);var n=r(30);var o=function(t){var time=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1e3,e=arguments.length>2?arguments[2]:void 0,r=new Date(0).getTime();return function(){var n=(new Date).getTime();if(n-r>time){for(var o=arguments.length,c=new Array(o),l=0;l<o;l++)c[l]=arguments[l];t.apply(e,c),r=n}}};function c(t){var p="";if("object"==Object(n.a)(t)){for(var e in p="?",t)p+="".concat(e,"=").concat(t[e],"&");p=p.slice(0,-1)}return p}},411:function(t,e,r){"use strict";r(405)},412:function(t,e,r){var n=r(11)(!1);n.push([t.i,".goods-list[data-v-483dfcdd]{align-items:stretch}.goods-list .goods-item[data-v-483dfcdd]{display:block;box-sizing:border-box;width:224px;height:310px;margin-bottom:16px;padding:12px 12px 16px;border-radius:4px;transition:all .2s}.goods-list .goods-item[data-v-483dfcdd]:hover{transform:translateY(-8px);box-shadow:0 0 6px rgba(0,0,0,.1)}.goods-list .goods-item .goods-img[data-v-483dfcdd]{width:200px;height:200px}.goods-list .goods-item .name[data-v-483dfcdd]{margin-bottom:10px;height:40px;line-height:20px}.goods-list .goods-item .seckill .btn[data-v-483dfcdd]{padding:4px 12px;border-radius:4px;border:1px solid transparent}.goods-list .goods-item .seckill .btn.not-start[data-v-483dfcdd]{border-color:#ff2c3c;color:#ff2c3c;background-color:transparent}.goods-list .goods-item .seckill .btn.end[data-v-483dfcdd]{background-color:#e5e5e5;color:#fff}",""]),t.exports=n},414:function(t,e,r){"use strict";var n=r(6),o=r(415);n({target:"String",proto:!0,forced:r(416)("link")},{link:function(t){return o(this,"a","href",t)}})},415:function(t,e,r){var n=r(19),o=/"/g;t.exports=function(t,e,r,c){var l=String(n(t)),d="<"+e;return""!==r&&(d+=" "+r+'="'+String(c).replace(o,"&quot;")+'"'),d+">"+l+"</"+e+">"}},416:function(t,e,r){var n=r(8);t.exports=function(t){return n((function(){var e=""[t]('"');return e!==e.toLowerCase()||e.split('"').length>3}))}},417:function(t,e,r){"use strict";r(406)},418:function(t,e,r){var n=r(11)(!1);n.push([t.i,".ad-item[data-v-562e7d63]{width:100%;height:100%;cursor:pointer}",""]),t.exports=n},421:function(t,e,r){"use strict";r.r(e);r(394);var n={props:{list:{type:Array,default:function(){return[]}},num:{type:Number,default:5},type:{type:String},status:{type:Number}},watch:{list:{immediate:!0,handler:function(t){}}},computed:{getSeckillText:function(){switch(this.status){case 0:return"未开始";case 1:return"立即抢购";case 2:return"已结束"}}}},o=(r(411),r(7)),component=Object(o.a)(n,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"goods-list row wrap"},t._l(t.list,(function(e,n){return r("nuxt-link",{key:n,staticClass:"goods-item bg-white",style:{marginRight:(n+1)%t.num==0?0:"14px"},attrs:{to:"/goods_details/"+e.id}},[r("el-image",{staticClass:"goods-img",attrs:{lazy:"",src:e.image,alt:""}}),t._v(" "),r("div",{staticClass:"name line2"},[t._v(t._s(e.name))]),t._v(" "),"seckill"==t.type?r("div",{staticClass:"seckill row-between"},[r("div",{staticClass:"primary row"},[t._v("\n        秒杀价"),r("price-formate",{attrs:{price:e.seckill_price,"first-size":18}})],1),t._v(" "),r("div",{class:["btn bg-primary white",{"not-start":0==t.status,end:2==t.status}]},[t._v(t._s(t.getSeckillText))])]):r("div",{staticClass:"row-between wrap"},[r("div",{staticClass:"price row"},[r("div",{staticClass:"primary mr8"},[r("price-formate",{attrs:{price:e.price,"first-size":16}})],1),t._v(" "),r("div",{staticClass:"muted sm line-through"},[r("price-formate",{attrs:{price:e.market_price}})],1)]),t._v(" "),r("div",{staticClass:"muted xs"},[t._v(t._s(e.sales_sum)+"人购买")])])],1)})),1)}),[],!1,null,"483dfcdd",null);e.default=component.exports;installComponents(component,{PriceFormate:r(400).default})},422:function(t,e,r){"use strict";r.r(e);r(67),r(414);var n=r(410),o={components:{},props:{item:{type:Object,default:function(){return{}}}},methods:{goPage:function(t){var e=t.link_type,link=t.link,r=t.params;switch(e){case 3:window.open(t.link);break;default:["/goods_details"].includes(link)?link+="/".concat(r.id):link+=Object(n.a)(r),this.$router.push({path:link})}}}},c=(r(417),r(7)),component=Object(c.a)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"ad-item",on:{click:function(e){return e.stopPropagation(),t.goPage(t.item)}}},[r("el-image",{staticStyle:{width:"100%",height:"100%"},attrs:{src:t.item.image}})],1)}),[],!1,null,"562e7d63",null);e.default=component.exports},436:function(t,e,r){t.exports=r.p+"img/goods_null.38f1689.png"},499:function(t,e,r){var content=r(578);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("4d39614a",content,!0,{sourceMap:!1})},577:function(t,e,r){"use strict";r(499)},578:function(t,e,r){var n=r(11)(!1);n.push([t.i,".goods-list .banner img{width:100%;display:block}.goods-list .sort{padding:15px 16px}.goods-list .sort .sort-name .item{margin-right:30px;cursor:pointer}.goods-list .sort .sort-name .item.active{color:#ff2c3c}",""]),t.exports=n},609:function(t,e,r){"use strict";r.r(e);r(55);var n=r(5),o=(r(34),r(2)),c=r(410),l={head:function(){return{title:this.$store.getters.headTitle,link:[{rel:"icon",type:"image/x-icon",href:this.$store.getters.favicon}]}},components:{},watchQuery:!0,asyncData:function(t){return Object(o.a)(regeneratorRuntime.mark((function e(){var r,o,c,l,d,data,f,m,h,v,x,_,w;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return r=t.$get,o=t.params,c=t.query,l=o.type,d=c.name,data=Object(n.a)({page_size:20,type:l,name:d},"type",l),1==l&&(data.sort="desc",data.sort_type="sales_sum"),e.next=7,r("pc/goodsList",{params:data});case 7:return f=e.sent,m=f.data,h=m.list,v=m.count,e.next=13,r("pc/index");case 13:x=e.sent,_=x.data,w={},e.t0=l,e.next="1"===e.t0?19:"2"===e.t0?21:"3"===e.t0?23:25;break;case 19:return w=_.host_ad,e.abrupt("break",25);case 21:return w=_.new_ad,e.abrupt("break",25);case 23:return w=_.best_ad,e.abrupt("break",25);case 25:return e.abrupt("return",{goodsList:h,count:v,ad:w});case 26:case"end":return e.stop()}}),e)})))()},data:function(){return{sortType:"",saleSort:"desc",priceSort:"desc",page:""}},created:function(){this.changeSortType=Object(c.b)(this.changeSortType,500,this)},methods:{changeSortType:function(t){switch(this.sortType=t,t){case"price":"asc"==this.priceSort?this.priceSort="desc":"desc"==this.priceSort&&(this.priceSort="asc");break;case"sales_sum":"asc"==this.saleSort?this.saleSort="desc":"desc"==this.saleSort&&(this.saleSort="asc")}this.getGoods()},changePage:function(t){this.page=t,this.getGoods()},getGoods:function(){var t=this;return Object(o.a)(regeneratorRuntime.mark((function e(){var r,n,o,c,l,d,f,m;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:r=t.$route.query.name,n=t.priceSort,o=t.sortType,c=t.saleSort,l="",e.t0=o,e.next="price"===e.t0?6:"sales_sum"===e.t0?8:10;break;case 6:return l=n,e.abrupt("break",10);case 8:return l=c,e.abrupt("break",10);case 10:return e.next=12,t.$get("pc/goodsList",{params:{page_size:20,page_no:t.page,sort_type:o,sort:l,name:r}});case 12:d=e.sent,f=d.data,m=f.list,f.count,t.goodsList=m;case 17:case"end":return e.stop()}}),e)})))()}}},d=(r(577),r(7)),component=Object(d.a)(l,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"goods-list"},[n("div",{staticClass:"banner mt16"},[t.ad.image?n("ad-item",{attrs:{item:t.ad}}):t._e()],1),t._v(" "),n("div",{staticClass:"sort mb16 row bg-white"},[n("div",{staticClass:"title"},[t._v("排序方式：")]),t._v(" "),n("div",{staticClass:"sort-name ml16 row"},[n("div",{class:["item",{active:""==t.sortType}],on:{click:function(e){return t.changeSortType("")}}},[t._v("\n        综合\n      ")]),t._v(" "),n("div",{class:["item",{active:"price"==t.sortType}],on:{click:function(e){return t.changeSortType("price")}}},[t._v("\n        价格\n        "),n("i",{directives:[{name:"show",rawName:"v-show",value:"desc"==t.priceSort,expression:"priceSort == 'desc'"}],staticClass:"el-icon-arrow-down"}),t._v(" "),n("i",{directives:[{name:"show",rawName:"v-show",value:"asc"==t.priceSort,expression:"priceSort == 'asc'"}],staticClass:"el-icon-arrow-up"})]),t._v(" "),n("div",{class:["item",{active:"sales_sum"==t.sortType}],on:{click:function(e){return t.changeSortType("sales_sum")}}},[t._v("\n        销量\n        "),n("i",{directives:[{name:"show",rawName:"v-show",value:"desc"==t.saleSort,expression:"saleSort == 'desc'"}],staticClass:"el-icon-arrow-down"}),t._v(" "),n("i",{directives:[{name:"show",rawName:"v-show",value:"asc"==t.saleSort,expression:"saleSort == 'asc'"}],staticClass:"el-icon-arrow-up"})])])]),t._v(" "),t.goodsList.length?[n("goods-list",{attrs:{list:t.goodsList}}),t._v(" "),t.count?n("div",{staticClass:"pagination row-center",staticStyle:{"padding-bottom":"38px"}},[n("el-pagination",{attrs:{background:"",layout:"prev, pager, next",total:t.count,"prev-text":"上一页","next-text":"下一页","hide-on-single-page":"","page-size":20},on:{"current-change":t.changePage}})],1):t._e()]:n("null-data",{attrs:{img:r(436),text:"暂无商品~"}})],2)}),[],!1,null,null,null);e.default=component.exports;installComponents(component,{AdItem:r(422).default,GoodsList:r(421).default,NullData:r(404).default})}}]);