(window.webpackJsonp=window.webpackJsonp||[]).push([[23,12,14,15],{394:function(t,e,r){"use strict";var o=r(20),n=r(4),c=r(95),d=r(22),l=r(21),f=r(42),h=r(238),v=r(94),m=r(8),y=r(96),x=r(154).f,w=r(53).f,_=r(24).f,S=r(396).trim,I="Number",C=n.Number,k=C.prototype,N=f(y(k))==I,T=function(t){var e,r,o,n,c,d,l,code,f=v(t,!1);if("string"==typeof f&&f.length>2)if(43===(e=(f=S(f)).charCodeAt(0))||45===e){if(88===(r=f.charCodeAt(2))||120===r)return NaN}else if(48===e){switch(f.charCodeAt(1)){case 66:case 98:o=2,n=49;break;case 79:case 111:o=8,n=55;break;default:return+f}for(d=(c=f.slice(2)).length,l=0;l<d;l++)if((code=c.charCodeAt(l))<48||code>n)return NaN;return parseInt(c,o)}return+f};if(c(I,!C(" 0o1")||!C("0b1")||C("+0x1"))){for(var E,z=function(t){var e=arguments.length<1?0:t,r=this;return r instanceof z&&(N?m((function(){k.valueOf.call(r)})):f(r)!=I)?h(new C(T(e)),r,z):T(e)},A=o?x(C):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger,fromString,range".split(","),O=0;A.length>O;O++)l(C,E=A[O])&&!l(z,E)&&_(z,E,w(C,E));z.prototype=k,k.constructor=z,d(n,I,z)}},395:function(t,e,r){var content=r(399);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("03051d40",content,!0,{sourceMap:!1})},396:function(t,e,r){var o=r(19),n="["+r(397)+"]",c=RegExp("^"+n+n+"*"),d=RegExp(n+n+"*$"),l=function(t){return function(e){var r=String(o(e));return 1&t&&(r=r.replace(c,"")),2&t&&(r=r.replace(d,"")),r}};t.exports={start:l(1),end:l(2),trim:l(3)}},397:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},398:function(t,e,r){"use strict";r(395)},399:function(t,e,r){var o=r(11)(!1);o.push([t.i,".price-format{display:flex;align-items:baseline}",""]),t.exports=o},400:function(t,e,r){"use strict";r.r(e);r(394),r(52),r(239);var o={data:function(){return{priceSlice:{}}},components:{},props:{firstSize:{type:Number,default:14},secondSize:{type:Number,default:14},color:{type:String},weight:{type:[String,Number],default:500},price:{type:[String,Number],default:""},showSubscript:{type:Boolean,default:!0},subscriptSize:{type:Number,default:14},lineThrough:{type:Boolean,default:!1}},created:function(){this.priceFormat()},watch:{price:function(t){this.priceFormat()}},methods:{priceFormat:function(){var t=this.price,e={};null!==t&&(t=parseFloat(t),t=String(t).split("."),e.first=t[0],e.second=t[1],this.priceSlice=e)}}},n=(r(398),r(7)),component=Object(n.a)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("span",{class:(t.lineThrough?"line-through":"")+"price-format",style:{color:t.color,"font-weight":t.weight}},[t.showSubscript?r("span",{style:{"font-size":t.subscriptSize+"px","margin-right":"1px"}},[t._v("¥")]):t._e(),t._v(" "),r("span",{style:{"font-size":t.firstSize+"px","margin-right":"1px"}},[t._v(t._s(t.priceSlice.first))]),t._v(" "),t.priceSlice.second?r("span",{style:{"font-size":t.secondSize+"px"}},[t._v("."+t._s(t.priceSlice.second))]):t._e()])}),[],!1,null,null,null);e.default=component.exports},401:function(t,e,r){var content=r(403);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("7277513c",content,!0,{sourceMap:!1})},402:function(t,e,r){"use strict";r(401)},403:function(t,e,r){var o=r(11)(!1);o.push([t.i,".null-data[data-v-7fa0e58c]{padding:100px}.null-data .img-null[data-v-7fa0e58c]{width:150px;height:150px}",""]),t.exports=o},404:function(t,e,r){"use strict";r.r(e);var o={components:{},props:{img:{type:String},text:{type:String,default:"暂无数据"},imgStyle:{type:String,default:""}},methods:{}},n=(r(402),r(7)),component=Object(n.a)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"bg-white column-center null-data"},[r("img",{staticClass:"img-null",style:t.imgStyle,attrs:{src:t.img,alt:""}}),t._v(" "),r("div",{staticClass:"muted mt8"},[t._v(t._s(t.text))])])}),[],!1,null,"7fa0e58c",null);e.default=component.exports},405:function(t,e,r){var content=r(412);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("f37a30f2",content,!0,{sourceMap:!1})},410:function(t,e,r){"use strict";r.d(e,"b",(function(){return n})),r.d(e,"a",(function(){return c}));r(99),r(155),r(52),r(239);var o=r(30);var n=function(t){var time=arguments.length>1&&void 0!==arguments[1]?arguments[1]:1e3,e=arguments.length>2?arguments[2]:void 0,r=new Date(0).getTime();return function(){var o=(new Date).getTime();if(o-r>time){for(var n=arguments.length,c=new Array(n),d=0;d<n;d++)c[d]=arguments[d];t.apply(e,c),r=o}}};function c(t){var p="";if("object"==Object(o.a)(t)){for(var e in p="?",t)p+="".concat(e,"=").concat(t[e],"&");p=p.slice(0,-1)}return p}},411:function(t,e,r){"use strict";r(405)},412:function(t,e,r){var o=r(11)(!1);o.push([t.i,".goods-list[data-v-483dfcdd]{align-items:stretch}.goods-list .goods-item[data-v-483dfcdd]{display:block;box-sizing:border-box;width:224px;height:310px;margin-bottom:16px;padding:12px 12px 16px;border-radius:4px;transition:all .2s}.goods-list .goods-item[data-v-483dfcdd]:hover{transform:translateY(-8px);box-shadow:0 0 6px rgba(0,0,0,.1)}.goods-list .goods-item .goods-img[data-v-483dfcdd]{width:200px;height:200px}.goods-list .goods-item .name[data-v-483dfcdd]{margin-bottom:10px;height:40px;line-height:20px}.goods-list .goods-item .seckill .btn[data-v-483dfcdd]{padding:4px 12px;border-radius:4px;border:1px solid transparent}.goods-list .goods-item .seckill .btn.not-start[data-v-483dfcdd]{border-color:#ff2c3c;color:#ff2c3c;background-color:transparent}.goods-list .goods-item .seckill .btn.end[data-v-483dfcdd]{background-color:#e5e5e5;color:#fff}",""]),t.exports=o},421:function(t,e,r){"use strict";r.r(e);r(394);var o={props:{list:{type:Array,default:function(){return[]}},num:{type:Number,default:5},type:{type:String},status:{type:Number}},watch:{list:{immediate:!0,handler:function(t){}}},computed:{getSeckillText:function(){switch(this.status){case 0:return"未开始";case 1:return"立即抢购";case 2:return"已结束"}}}},n=(r(411),r(7)),component=Object(n.a)(o,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",{staticClass:"goods-list row wrap"},t._l(t.list,(function(e,o){return r("nuxt-link",{key:o,staticClass:"goods-item bg-white",style:{marginRight:(o+1)%t.num==0?0:"14px"},attrs:{to:"/goods_details/"+e.id}},[r("el-image",{staticClass:"goods-img",attrs:{lazy:"",src:e.image,alt:""}}),t._v(" "),r("div",{staticClass:"name line2"},[t._v(t._s(e.name))]),t._v(" "),"seckill"==t.type?r("div",{staticClass:"seckill row-between"},[r("div",{staticClass:"primary row"},[t._v("\n        秒杀价"),r("price-formate",{attrs:{price:e.seckill_price,"first-size":18}})],1),t._v(" "),r("div",{class:["btn bg-primary white",{"not-start":0==t.status,end:2==t.status}]},[t._v(t._s(t.getSeckillText))])]):r("div",{staticClass:"row-between wrap"},[r("div",{staticClass:"price row"},[r("div",{staticClass:"primary mr8"},[r("price-formate",{attrs:{price:e.price,"first-size":16}})],1),t._v(" "),r("div",{staticClass:"muted sm line-through"},[r("price-formate",{attrs:{price:e.market_price}})],1)]),t._v(" "),r("div",{staticClass:"muted xs"},[t._v(t._s(e.sales_sum)+"人购买")])])],1)})),1)}),[],!1,null,"483dfcdd",null);e.default=component.exports;installComponents(component,{PriceFormate:r(400).default})},436:function(t,e,r){t.exports=r.p+"img/goods_null.38f1689.png"},471:function(t,e,r){var content=r(507);"string"==typeof content&&(content=[[t.i,content,""]]),content.locals&&(t.exports=content.locals);(0,r(12).default)("4fbc2afa",content,!0,{sourceMap:!1})},506:function(t,e,r){"use strict";r(471)},507:function(t,e,r){var o=r(11)(!1);o.push([t.i,".category[data-v-4cbb9d54]{padding:16px 0}.category .category-hd .category-wrap[data-v-4cbb9d54]{padding:0 16px}.category .category-hd .category-con[data-v-4cbb9d54]{border-bottom:1px dashed #e5e5e5;align-items:flex-start;padding-top:16px}.category .category-hd .category-con .name[data-v-4cbb9d54]{flex:none}.category .category-hd .category-con .item[data-v-4cbb9d54]{margin-bottom:16px;width:84px;margin-left:14px;cursor:pointer}.category .category-hd .category-con .item.active[data-v-4cbb9d54],.category .category-hd .category-con .item[data-v-4cbb9d54]:hover{color:#ff2c3c}.category .category-hd .sort[data-v-4cbb9d54]{padding:15px 16px}.category .category-hd .sort .sort-name .item[data-v-4cbb9d54]{margin-right:30px;cursor:pointer}.category .category-hd .sort .sort-name .item.active[data-v-4cbb9d54]{color:#ff2c3c}",""]),t.exports=o},582:function(t,e,r){"use strict";r.r(e);r(394),r(34);var o=r(2),n=r(410),c={head:function(){return{title:this.$store.getters.headTitle,link:[{rel:"icon",type:"image/x-icon",href:this.$store.getters.favicon}]}},watchQuery:!0,asyncData:function(t){return Object(o.a)(regeneratorRuntime.mark((function e(){var r,o,data;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return t.query,r=t.$get,e.next=3,r("goods_category/lists",{params:{client:2}});case 3:return o=e.sent,data=o.data,e.abrupt("return",{categoryList:data});case 6:case"end":return e.stop()}}),e)})))()},data:function(){return{count:0,oneIndex:0,twoIndex:0,threeIndex:"",categoryOne:[],categoryTwo:[],categoryThree:[],sortType:"",saleSort:"desc",priceSort:"desc",page:"",goodsList:[],cateId:0,isHasGoods:!0}},created:function(){this.changeSortType=Object(n.b)(this.changeSortType,500,this)},methods:{changeData:function(t){var e=this,r=this.categoryList;this.cateId=t,r.some((function(r,o){return r.id===t?(e.oneIndex=o,e.twoIndex=0,e.threeIndex="",!0):r.sons.some((function(r,n){return r.id===t?(e.oneIndex=o,e.twoIndex=n,e.threeIndex="",!0):r.sons.some((function(r,c){if(r.id===t)return e.oneIndex=o,e.twoIndex=n,e.threeIndex=c,!0}))}))})),this.categoryOne=r,this.categoryTwo=r[this.oneIndex].sons,this.categoryThree=this.categoryTwo[this.twoIndex].sons,this.getGoods()},clickAll:function(){this.threeIndex="",this.getGoods()},changeSortType:function(t){switch(this.sortType=t,t){case"price":"asc"==this.priceSort?this.priceSort="desc":"desc"==this.priceSort&&(this.priceSort="asc");break;case"sales_sum":"asc"==this.saleSort?this.saleSort="desc":"desc"==this.saleSort&&(this.saleSort="asc")}this.getGoods()},changePage:function(t){this.page=t,this.getGoods()},getGoods:function(){var t=this;return Object(o.a)(regeneratorRuntime.mark((function e(){var r,o,n,c,d,l,f,h,v,m,y,x;return regeneratorRuntime.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:r=t.priceSort,o=t.sortType,n=t.saleSort,c=t.twoIndex,d=t.threeIndex,l=t.categoryTwo,f=t.cateId,0===c&&""===d&&(f=l[0].id),h="",e.t0=o,e.next="price"===e.t0?7:"sales_sum"===e.t0?9:11;break;case 7:return h=r,e.abrupt("break",11);case 9:return h=n,e.abrupt("break",11);case 11:return e.next=13,t.$get("pc/goodsList",{params:{page_size:20,page_no:t.page,sort_type:o,sort:h,category_id:f}});case 13:v=e.sent,m=v.data,y=m.list,x=m.count,t.goodsList=y,y.length?t.isHasGoods=!0:t.isHasGoods=!1,t.count=x;case 20:case"end":return e.stop()}}),e)})))()}},watch:{categoryList:{immediate:!0,handler:function(t){var e=this.$route.query.id;this.changeData(Number(e))}}}},d=(r(506),r(7)),component=Object(d.a)(c,(function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"category"},[o("div",{staticClass:"category-hd bg-white"},[o("div",{staticClass:"category-wrap"},[o("div",{staticClass:"category-con row"},[o("div",{staticClass:"name muted"},[t._v("一级分类：")]),t._v(" "),o("div",{staticClass:"category-list row wrap lighter"},t._l(t.categoryOne,(function(e,r){return o("div",{key:r,class:["item line1",{active:t.oneIndex==r}],on:{click:function(r){return t.changeData(e.id)}}},[t._v("\n            "+t._s(e.name)+"\n          ")])})),0)]),t._v(" "),o("div",{staticClass:"category-con row"},[o("div",{staticClass:"name muted"},[t._v("二级分类：")]),t._v(" "),o("div",{staticClass:"category-list row wrap lighter"},t._l(t.categoryTwo,(function(e,r){return o("div",{key:r,class:["item line1",{active:t.twoIndex==r}],on:{click:function(r){return t.changeData(e.id)}}},[t._v("\n            "+t._s(e.name)+"\n          ")])})),0)]),t._v(" "),o("div",{staticClass:"category-con row"},[o("div",{staticClass:"name muted"},[t._v("三级分类：")]),t._v(" "),o("div",{staticClass:"category-list row wrap lighter"},[o("div",{class:["item line1",{active:""===t.threeIndex}],on:{click:t.clickAll}},[t._v("\n            全部\n          ")]),t._v(" "),t._l(t.categoryThree,(function(e,r){return o("div",{key:r,class:["item line1",{active:t.threeIndex===r}],on:{click:function(r){return t.changeData(e.id)}}},[t._v("\n            "+t._s(e.name)+"\n          ")])}))],2)])]),t._v(" "),o("div",{staticClass:"sort mb16 row bg-white"},[o("div",{staticClass:"title muted"},[t._v("排序方式：")]),t._v(" "),o("div",{staticClass:"sort-name ml16 row lighter"},[o("div",{class:["item",{active:""==t.sortType}],on:{click:function(e){return t.changeSortType("")}}},[t._v("\n          综合\n        ")]),t._v(" "),o("div",{class:["item",{active:"price"==t.sortType}],on:{click:function(e){return t.changeSortType("price")}}},[t._v("\n          价格\n          "),o("i",{directives:[{name:"show",rawName:"v-show",value:"desc"==t.priceSort,expression:"priceSort == 'desc'"}],staticClass:"el-icon-arrow-down"}),t._v(" "),o("i",{directives:[{name:"show",rawName:"v-show",value:"asc"==t.priceSort,expression:"priceSort == 'asc'"}],staticClass:"el-icon-arrow-up"})]),t._v(" "),o("div",{class:["item",{active:"sales_sum"==t.sortType}],on:{click:function(e){return t.changeSortType("sales_sum")}}},[t._v("\n          销量\n          "),o("i",{directives:[{name:"show",rawName:"v-show",value:"desc"==t.saleSort,expression:"saleSort == 'desc'"}],staticClass:"el-icon-arrow-down"}),t._v(" "),o("i",{directives:[{name:"show",rawName:"v-show",value:"asc"==t.saleSort,expression:"saleSort == 'asc'"}],staticClass:"el-icon-arrow-up"})])])])]),t._v(" "),t.isHasGoods?o("div",[o("goods-list",{attrs:{list:t.goodsList}}),t._v(" "),t.count?o("div",{staticClass:"pagination row-center",staticStyle:{"padding-bottom":"38px"}},[o("el-pagination",{attrs:{background:"","hide-on-single-page":"",layout:"prev, pager, next",total:t.count,"prev-text":"上一页","next-text":"下一页","page-size":20},on:{"current-change":t.changePage}})],1):t._e()],1):o("null-data",{attrs:{img:r(436),text:"暂无商品~"}})],1)}),[],!1,null,"4cbb9d54",null);e.default=component.exports;installComponents(component,{GoodsList:r(421).default,NullData:r(404).default})}}]);