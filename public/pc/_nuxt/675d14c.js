(window.webpackJsonp=window.webpackJsonp||[]).push([[41],{487:function(e,t,o){var content=o(548);"string"==typeof content&&(content=[[e.i,content,""]]),content.locals&&(e.exports=content.locals);(0,o(12).default)("899b1c8a",content,!0,{sourceMap:!1})},546:function(e,t,o){e.exports=o.p+"img/profit_null.59610af.png"},547:function(e,t,o){"use strict";o(487)},548:function(e,t,o){var n=o(11)(!1);n.push([e.i,".user-collection{padding:10px}.user-collection .collection-header{padding:10px 5px;border-bottom:1px solid #e5e5e5}.user-collection .collection-list{display:flex;flex-direction:column;justify-content:space-between;min-height:690px}.user-collection .collection-list .goods-item{padding:26px 20px;border-bottom:1px dashed #e5e5e5}.user-collection .collection-list .goods-item .goods-info{margin-left:10px;width:500px;flex:1}.user-collection .collection-list .goods-item .goods-info .goods-name{margin-bottom:8px}.user-collection .collection-list .goods-item .to-buy-btn{border:1px solid #ff2c3c;height:32px;width:104px;font-size:13px}.user-collection .collection-list .goods-item .cancel-btn{margin-left:10px;height:32px;width:104px;border:1px solid #e5e5e5;font-size:13px;cursor:pointer}.user-collection .data-null{padding-top:100px}",""]),e.exports=n},597:function(e,t,o){"use strict";o.r(t);o(34);var n=o(2),c={head:function(){return{title:this.$store.getters.headTitle,link:[{rel:"icon",type:"image/x-icon",href:this.$store.getters.favicon}]}},layout:"user_lauout",asyncData:function(e){return Object(n.a)(regeneratorRuntime.mark((function t(){var o,n,c,r,l;return regeneratorRuntime.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.$post,o=e.$get,n=[],c=0,r=5,t.next=6,o("collect/getCollectGoods",{params:{page_no:1,page_size:r}});case 6:return 1==(l=t.sent).code&&(n=l.data.list,c=l.data.count),t.abrupt("return",{collectList:n,goodsCount:c,pageSize:r});case 9:case"end":return t.stop()}}),t)})))()},data:function(){return{currentPage:1}},methods:{changePage:function(e){var t=this;return Object(n.a)(regeneratorRuntime.mark((function o(){var n;return regeneratorRuntime.wrap((function(o){for(;;)switch(o.prev=o.next){case 0:return t.currentPage=e,o.next=3,t.$get("collect/getCollectGoods",{params:{page_no:e,page_size:t.pageSize}});case 3:1==(n=o.sent).code&&(t.collectList=n.data.list,t.goodsCount=n.data.count);case 5:case"end":return o.stop()}}),o)})))()},cancelCollection:function(e){var t=this;return Object(n.a)(regeneratorRuntime.mark((function o(){return regeneratorRuntime.wrap((function(o){for(;;)switch(o.prev=o.next){case 0:return o.next=2,t.$post("collect/handleCollectGoods",{is_collect:0,goods_id:e});case 2:1==o.sent.code&&(t.$message({message:"已取消收藏",type:"success"}),t.changePage(t.currentPage));case 4:case"end":return o.stop()}}),o)})))()}}},r=(o(547),o(7)),component=Object(r.a)(c,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"user-collection"},[n("div",{staticClass:"collection-header lg"},[e._v("\n    收藏\n  ")]),e._v(" "),n("div",{directives:[{name:"show",rawName:"v-show",value:e.goodsCount>0,expression:"goodsCount > 0"}],staticClass:"collection-list mt10"},[n("div",e._l(e.collectList,(function(t,o){return n("div",{key:o,staticClass:"goods-item row-between"},[n("div",{staticStyle:{display:"flex","flex-direction":"row"}},[n("el-image",{staticStyle:{width:"72px",height:"72px"},attrs:{fit:"cover",src:t.image,lazy:""}}),e._v(" "),n("div",{staticClass:"goods-info"},[n("div",{staticClass:"goods-name line2"},[e._v(e._s(t.name))]),e._v(" "),n("div",{staticClass:"primary nr",staticStyle:{"font-weight":"500"}},[e._v("¥"+e._s(t.price))])])],1),e._v(" "),n("div",{staticClass:"row"},[n("nuxt-link",{staticClass:"to-buy-btn primary row-center",attrs:{to:"/goods_details/"+t.id}},[e._v("去购买")]),e._v(" "),n("el-popconfirm",{attrs:{title:"确定删除该收藏吗？","confirm-button-text":"确定","cancel-button-text":"取消",icon:"el-icon-info","icon-color":"red"},on:{confirm:function(o){return e.cancelCollection(t.id)}}},[n("div",{staticClass:"cancel-btn lighter row-center",attrs:{slot:"reference"},slot:"reference"},[e._v("取消收藏")])])],1)])})),0),e._v(" "),n("div",{staticClass:"row-center",staticStyle:{"margin-top":"30px"}},[n("el-pagination",{attrs:{"hide-on-single-page":"",background:"",layout:"prev, pager, next",total:e.goodsCount,"prev-text":"上一页","next-text":"下一页","page-size":e.pageSize},on:{"current-change":e.changePage}})],1)]),e._v(" "),n("div",{directives:[{name:"show",rawName:"v-show",value:e.goodsCount<=0,expression:"goodsCount <= 0"}],staticClass:"column-center data-null"},[n("img",{staticStyle:{width:"150px",height:"150px"},attrs:{src:o(546)}}),e._v(" "),n("div",{staticClass:"muted xs"},[e._v("暂无收藏商品～")])])])}),[],!1,null,null,null);t.default=component.exports}}]);