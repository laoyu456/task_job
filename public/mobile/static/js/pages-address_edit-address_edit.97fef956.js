(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["pages-address_edit-address_edit"],{"1bfd":function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return o})),i.d(e,"a",(function(){return a}));var a={uField:i("edc1").default,uSelect:i("18c1").default},n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"address-edit"},[i("v-uni-form",{attrs:{"report-submit":"true"},on:{submit:function(e){arguments[0]=e=t.$handleEvent(e),t.formSubmit.apply(void 0,arguments)}}},[i("v-uni-view",{staticClass:"form bg-white"},[i("v-uni-view",{staticClass:"form-item row"},[i("v-uni-view",{staticClass:"label"},[t._v("收货人")]),i("v-uni-input",{staticClass:"ml10",attrs:{name:"contact",type:"text",placeholder:"请填写收货人姓名"},model:{value:t.addressObj.contact,callback:function(e){t.$set(t.addressObj,"contact",e)},expression:"addressObj.contact"}})],1),i("v-uni-view",{staticClass:"form-item row"},[i("v-uni-view",{staticClass:"label"},[t._v("联系方式")]),i("v-uni-input",{staticClass:"ml10",attrs:{name:"telephone",type:"number",placeholder:"请填写手机号码"},model:{value:t.addressObj.telephone,callback:function(e){t.$set(t.addressObj,"telephone",e)},expression:"addressObj.telephone"}})],1),i("v-uni-view",{on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.showRegion=!0}}},[i("v-uni-view",{staticClass:"form-item row"},[i("v-uni-view",{staticClass:"label"},[t._v("所在地区")]),i("v-uni-input",{staticClass:"ml10",attrs:{name:"region",disabled:!0,type:"text",placeholder:"请选择省、市、区"},model:{value:t.region,callback:function(e){t.region=e},expression:"region"}}),i("v-uni-image",{staticClass:"icon-sm ml10",attrs:{src:"/static/images/arrow_right.png"}})],1)],1),i("v-uni-view",[i("u-field",{attrs:{type:"textarea",label:"详细地址",placeholder:"请填写小区、街道、门牌号等信息","field-style":{flex:1,"margin-left":"20rpx",height:"160rpx"}},model:{value:t.addressObj.address,callback:function(e){t.$set(t.addressObj,"address",e)},expression:"addressObj.address"}})],1)],1),i("v-uni-view",{staticClass:"mt10 mb10 bg-white check-wrap"},[i("v-uni-radio-group",{staticClass:"row",on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.ChangeIsDefault.apply(void 0,arguments)}}},[i("v-uni-radio",{staticStyle:{"border-radius":"50%",transform:"scale(0.7)"},attrs:{id:"checkbox",checked:!!t.addressObj.is_default,color:"#FF2C3C"}}),i("v-uni-label",{attrs:{for:"checkbox"}},[i("v-uni-text",[t._v("设置为默认")])],1)],1)],1),i("v-uni-button",{staticClass:"my-btn bg-primary white br60",attrs:{"form-type":"submit"}},[t._v("完成")])],1),i("u-select",{attrs:{mode:"mutil-column-auto",list:t.lists},on:{confirm:function(e){arguments[0]=e=t.$handleEvent(e),t.regionChange.apply(void 0,arguments)}},model:{value:t.showRegion,callback:function(e){t.showRegion=e},expression:"showRegion"}})],1)},o=[]},"20f3":function(t,e,i){"use strict";i.r(e);var a=i("1bfd"),n=i("9ecb");for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);i("ccaf");var l,r=i("f0c5"),s=Object(r["a"])(n["default"],a["b"],a["c"],!1,null,"6d621541",null,!1,a["a"],l);e["default"]=s.exports},"3a71":function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */.u-field[data-v-87b8abc0]{font-size:%?28?%;padding:%?20?% %?28?%;text-align:left;position:relative;color:#303133}.u-field-inner[data-v-87b8abc0]{\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-align:center;-webkit-align-items:center;align-items:center}.u-textarea-inner[data-v-87b8abc0]{-webkit-box-align:start;-webkit-align-items:flex-start;align-items:flex-start}.u-textarea-class[data-v-87b8abc0]{min-height:%?96?%;width:auto;font-size:%?28?%}.fild-body[data-v-87b8abc0]{\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-flex:1;-webkit-flex:1;flex:1;-webkit-box-align:center;-webkit-align-items:center;align-items:center}.u-arror-right[data-v-87b8abc0]{margin-left:%?8?%}.u-label-text[data-v-87b8abc0]{display:-webkit-inline-box;display:-webkit-inline-flex;display:inline-flex}.u-label-left-gap[data-v-87b8abc0]{margin-left:%?6?%}.u-label-postion-top[data-v-87b8abc0]{-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;flex-direction:column;-webkit-box-align:start;-webkit-align-items:flex-start;align-items:flex-start}.u-label[data-v-87b8abc0]{width:%?130?%;-webkit-box-flex:1;-webkit-flex:1 1 %?130?%;flex:1 1 %?130?%;text-align:left;position:relative;\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-align:center;-webkit-align-items:center;align-items:center}.u-required[data-v-87b8abc0]::before{content:"*";position:absolute;left:%?-16?%;font-size:14px;color:#fa3534;height:9px;line-height:1}.u-field__input-wrap[data-v-87b8abc0]{position:relative;overflow:hidden;font-size:%?28?%;height:%?48?%;-webkit-box-flex:1;-webkit-flex:1;flex:1;width:auto}.u-clear-icon[data-v-87b8abc0]{\ndisplay:-webkit-box;display:-webkit-flex;display:flex;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-webkit-flex-direction:row;flex-direction:row;\n-webkit-box-align:center;-webkit-align-items:center;align-items:center}.u-error-message[data-v-87b8abc0]{color:#fa3534;font-size:%?26?%;text-align:left}.placeholder-style[data-v-87b8abc0]{color:#969799}.u-input-class[data-v-87b8abc0]{font-size:%?28?%}.u-button-wrap[data-v-87b8abc0]{margin-left:%?8?%}',""]),t.exports=e},"484b":function(t,e,i){"use strict";var a=i("4ea4");i("99af"),i("e25e"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var n=i("9b87"),o=a(i("e7e9")),l={data:function(){return{addressObj:{contact:"",telephone:"",province:"",city:"",district:"",address:"",is_default:0},region:"",addressId:"",defaultRegion:["广东省","广州市","番禺区"],defaultRegionCode:"440113",showRegion:!1,lists:[]}},props:{},onLoad:function(t){var e=this;this.addressId=parseInt(t.id),t.id?(uni.setNavigationBarTitle({title:"编辑地址"}),this.getOneAddressFun()):(uni.setNavigationBarTitle({title:"添加地址"}),this.getWxAddressFun()),this.$nextTick((function(){e.lists=o.default}))},onUnload:function(){uni.removeStorageSync("wxAddress")},onShareAppMessage:function(){},methods:{formSubmit:function(t){var e=this,i=t.detail.value,a=this.addressObj,o=a.province_id,l=a.city_id,r=a.district_id,s=a.is_default,d=a.address,c=this.addressId;return i.address=d,i.contact?i.telephone?i.region?i.address?(i.province_id=parseInt(o),i.city_id=parseInt(l),i.district_id=parseInt(r),i.is_default=s,i.id=c,delete i.region,void(c?(0,n.editAddress)(i).then((function(t){1==t.code&&e.$toast({title:t.msg},{tab:3,url:1})})).catch((function(t){return e.$toast({title:t})})):(0,n.addAddress)(i).then((function(t){1==t.code&&e.$toast({title:t.msg},{tab:3,url:1})})).catch((function(t){return e.$toast({title:t})})))):this.$toast({title:"请填写小区、街道、门牌号等信息"}):this.$toast({title:"请选择省、市、区"}):this.$toast({title:"请填写手机号码"}):this.$toast({title:"请填写收货人姓名"})},regionChange:function(t){this.addressObj.province_id=t[0].value,this.addressObj.city_id=t[1].value,this.addressObj.district_id=t[2].value,this.region=t[0].label+" "+t[1].label+" "+t[2].label},ChangeIsDefault:function(t){0==this.addressObj.is_default?this.addressObj.is_default=1:this.addressObj.is_default=0},textareaChange:function(t){this.addressObj.address=t.detail.value},getOneAddressFun:function(){var t=this;(0,n.getOneAddress)(this.addressId).then((function(e){if(1==e.code){var i=e.data,a=i.city,n=i.province,o=i.district;t.addressObj=e.data,t.region="".concat(n," ").concat(a," ").concat(o)}}))},getWxAddressFun:function(){var t=this,e=uni.getStorageSync("wxAddress");if(e){e=JSON.parse(e);var i=e,a=i.userName,o=i.telNumber,l=i.provinceName,r=i.cityName,s=i.detailInfo,d=e.countryName||e.countyName;(0,n.hasRegionCode)({province:l,city:r,district:d}).then((function(e){1==e.code&&e.data.province&&(t.region="".concat(l," ").concat(r," ").concat(d),t.addressObj.contact=a,t.addressObj.telephone=o,t.addressObj.address=s,t.addressObj.province_id=e.data.province,t.addressObj.city_id=e.data.city,t.addressObj.district_id=e.data.district)}))}}}};e.default=l},"4b6c":function(t,e,i){"use strict";i("a9e3"),i("498a"),Object.defineProperty(e,"__esModule",{value:!0}),e.default=void 0;var a={name:"u-field",props:{icon:String,rightIcon:String,required:Boolean,label:String,password:Boolean,clearable:{type:Boolean,default:!0},labelWidth:{type:[Number,String],default:130},labelAlign:{type:String,default:"left"},inputAlign:{type:String,default:"left"},iconColor:{type:String,default:"#606266"},autoHeight:{type:Boolean,default:!0},errorMessage:{type:[String,Boolean],default:""},placeholder:String,placeholderStyle:String,focus:Boolean,fixed:Boolean,value:[Number,String],type:{type:String,default:"text"},disabled:{type:Boolean,default:!1},maxlength:{type:[Number,String],default:140},confirmType:{type:String,default:"done"},labelPosition:{type:String,default:"left"},fieldStyle:{type:Object,default:function(){return{}}},clearSize:{type:[Number,String],default:30},iconStyle:{type:Object,default:function(){return{}}},borderTop:{type:Boolean,default:!1},borderBottom:{type:Boolean,default:!0},trim:{type:Boolean,default:!0}},data:function(){return{focused:!1,itemIndex:0}},computed:{inputWrapStyle:function(){var t={};return t.textAlign=this.inputAlign,"left"==this.labelPosition?t.margin="0 8rpx":t.marginRight="8rpx",t},rightIconStyle:function(){var t={};return"top"==this.arrowDirection&&(t.transform="roate(-90deg)"),"bottom"==this.arrowDirection?t.transform="roate(90deg)":t.transform="roate(0deg)",t},labelStyle:function(){var t={};return"left"==this.labelAlign&&(t.justifyContent="flext-start"),"center"==this.labelAlign&&(t.justifyContent="center"),"right"==this.labelAlign&&(t.justifyContent="flext-end"),t},justifyContent:function(){return"left"==this.labelAlign?"flex-start":"center"==this.labelAlign?"center":"right"==this.labelAlign?"flex-end":void 0},inputMaxlength:function(){return Number(this.maxlength)},fieldInnerStyle:function(){var t={};return"left"==this.labelPosition?t.flexDirection="row":t.flexDirection="column",t}},methods:{onInput:function(t){var e=t.detail.value;this.trim&&(e=this.$u.trim(e)),this.$emit("input",e)},onFocus:function(t){this.focused=!0,this.$emit("focus",t)},onBlur:function(t){var e=this;setTimeout((function(){e.focused=!1}),100),this.$emit("blur",t)},onConfirm:function(t){this.$emit("confirm",t.detail.value)},onClear:function(t){this.$emit("input","")},rightIconClick:function(){this.$emit("right-icon-click"),this.$emit("click")},fieldClick:function(){this.$emit("click")}}};e.default=a},"4e72":function(t,e,i){var a=i("24fb");e=a(!1),e.push([t.i,'@charset "UTF-8";\n/**\n * 这里是uni-app内置的常用样式变量\n *\n * uni-app 官方扩展插件及插件市场（https://ext.dcloud.net.cn）上很多三方插件均使用了这些样式变量\n * 如果你是插件开发者，建议你使用scss预处理，并在插件代码中直接使用这些变量（无需 import 这个文件），方便用户通过搭积木的方式开发整体风格一致的App\n *\n */\n/**\n * 如果你是App开发者（插件使用者），你可以通过修改这些变量来定制自己的插件主题，实现自定义主题功能\n *\n * 如果你的项目同样使用了scss预处理，你也可以直接在你的 scss 代码中使用如下变量，同时无需 import 这个文件\n */\n/* 颜色变量 */\n/* 行为相关颜色 */\n/* pages/address_edit/address_edit.wxss */.address-edit[data-v-6d621541]{padding-top:%?10?%}.address-edit .form[data-v-6d621541]{-webkit-box-flex:1;-webkit-flex:1;flex:1}.address-edit .form .form-item[data-v-6d621541]{padding:0 %?24?%;height:%?80?%}.address-edit .form .form-item[data-v-6d621541]:not(:nth-of-type(3)){border-bottom:1px solid #e5e5e5}.address-edit .form .form-item .label[data-v-6d621541]{width:%?150?%}.address-edit .form .form-item uni-input[data-v-6d621541]{height:100%;-webkit-box-flex:1;-webkit-flex:1;flex:1}.address-edit .check-wrap[data-v-6d621541]{padding:%?20?%}.address-edit .my-btn[data-v-6d621541]{margin:%?30?% %?26?%;text-align:center}van-field uni-view[data-v-6d621541]{height:100%}van-field uni-textarea[data-v-6d621541]{height:100%!important;padding-top:%?10?%!important}.van-cell[data-v-6d621541]{padding:%?20?%!important}.van-field__body--textarea[data-v-6d621541], .van-field__input[data-v-6d621541]{margin-left:%?15?%}',""]),t.exports=e},"7fb2":function(t,e,i){"use strict";var a=i("d511"),n=i.n(a);n.a},8454:function(t,e,i){"use strict";i.r(e);var a=i("4b6c"),n=i.n(a);for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);e["default"]=n.a},"9a7e":function(t,e,i){var a=i("4e72");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("528b4e51",a,!0,{sourceMap:!1,shadowMode:!1})},"9ecb":function(t,e,i){"use strict";i.r(e);var a=i("484b"),n=i.n(a);for(var o in a)"default"!==o&&function(t){i.d(e,t,(function(){return a[t]}))}(o);e["default"]=n.a},ccaf:function(t,e,i){"use strict";var a=i("9a7e"),n=i.n(a);n.a},d511:function(t,e,i){var a=i("3a71");"string"===typeof a&&(a=[[t.i,a,""]]),a.locals&&(t.exports=a.locals);var n=i("4f06").default;n("cfeae62e",a,!0,{sourceMap:!1,shadowMode:!1})},edc1:function(t,e,i){"use strict";i.r(e);var a=i("ff6a"),n=i("8454");for(var o in n)"default"!==o&&function(t){i.d(e,t,(function(){return n[t]}))}(o);i("7fb2");var l,r=i("f0c5"),s=Object(r["a"])(n["default"],a["b"],a["c"],!1,null,"87b8abc0",null,!1,a["a"],l);e["default"]=s.exports},ff6a:function(t,e,i){"use strict";i.d(e,"b",(function(){return n})),i.d(e,"c",(function(){return o})),i.d(e,"a",(function(){return a}));var a={uIcon:i("6c6d").default},n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-uni-view",{staticClass:"u-field",class:{"u-border-top":t.borderTop,"u-border-bottom":t.borderBottom}},[i("v-uni-view",{staticClass:"u-field-inner",class:["textarea"==t.type?"u-textarea-inner":"","u-label-postion-"+t.labelPosition]},[i("v-uni-view",{staticClass:"u-label",class:[t.required?"u-required":""],style:{justifyContent:t.justifyContent,flex:"left"==t.labelPosition?"0 0 "+t.labelWidth+"rpx":"1"}},[t.icon?i("v-uni-view",{staticClass:"u-icon-wrap"},[i("u-icon",{staticClass:"u-icon",attrs:{size:"32","custom-style":t.iconStyle,name:t.icon,color:t.iconColor}})],1):t._e(),t._t("icon"),i("v-uni-text",{staticClass:"u-label-text",class:[this.$slots.icon||t.icon?"u-label-left-gap":""]},[t._v(t._s(t.label))])],2),i("v-uni-view",{staticClass:"fild-body"},[i("v-uni-view",{staticClass:"u-flex-1 u-flex",style:[t.inputWrapStyle]},["textarea"==t.type?i("v-uni-textarea",{staticClass:"u-flex-1 u-textarea-class",style:[t.fieldStyle],attrs:{value:t.value,placeholder:t.placeholder,placeholderStyle:t.placeholderStyle,disabled:t.disabled,maxlength:t.inputMaxlength,focus:t.focus,autoHeight:t.autoHeight,fixed:t.fixed},on:{input:function(e){arguments[0]=e=t.$handleEvent(e),t.onInput.apply(void 0,arguments)},blur:function(e){arguments[0]=e=t.$handleEvent(e),t.onBlur.apply(void 0,arguments)},focus:function(e){arguments[0]=e=t.$handleEvent(e),t.onFocus.apply(void 0,arguments)},confirm:function(e){arguments[0]=e=t.$handleEvent(e),t.onConfirm.apply(void 0,arguments)},click:function(e){arguments[0]=e=t.$handleEvent(e),t.fieldClick.apply(void 0,arguments)}}}):i("v-uni-input",{staticClass:"u-flex-1 u-field__input-wrap",style:[t.fieldStyle],attrs:{type:t.type,value:t.value,password:t.password||"password"===this.type,placeholder:t.placeholder,placeholderStyle:t.placeholderStyle,disabled:t.disabled,maxlength:t.inputMaxlength,focus:t.focus,confirmType:t.confirmType},on:{focus:function(e){arguments[0]=e=t.$handleEvent(e),t.onFocus.apply(void 0,arguments)},blur:function(e){arguments[0]=e=t.$handleEvent(e),t.onBlur.apply(void 0,arguments)},input:function(e){arguments[0]=e=t.$handleEvent(e),t.onInput.apply(void 0,arguments)},confirm:function(e){arguments[0]=e=t.$handleEvent(e),t.onConfirm.apply(void 0,arguments)},click:function(e){arguments[0]=e=t.$handleEvent(e),t.fieldClick.apply(void 0,arguments)}}})],1),t.clearable&&""!=t.value&&t.focused?i("u-icon",{staticClass:"u-clear-icon",attrs:{size:t.clearSize,name:"close-circle-fill",color:"#c0c4cc"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.onClear.apply(void 0,arguments)}}}):t._e(),i("v-uni-view",{staticClass:"u-button-wrap"},[t._t("right")],2),t.rightIcon?i("u-icon",{staticClass:"u-arror-right",style:[t.rightIconStyle],attrs:{name:t.rightIcon,color:"#c0c4cc",size:"26"},on:{click:function(e){arguments[0]=e=t.$handleEvent(e),t.rightIconClick.apply(void 0,arguments)}}}):t._e()],1)],1),!1!==t.errorMessage&&""!=t.errorMessage?i("v-uni-view",{staticClass:"u-error-message",style:{paddingLeft:t.labelWidth+"rpx"}},[t._v(t._s(t.errorMessage))]):t._e()],1)},o=[]}}]);