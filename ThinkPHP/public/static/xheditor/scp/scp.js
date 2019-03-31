/*
	版权所有 2009-2017 荆门泽优软件有限公司
	保留所有权利
	官方网站：http://www.ncmem.com
	产品首页：http://www.ncmem.com/webplug/scppro/index.asp
	产品论坛：http://bbs.ncmem.com/forum-52-1.html
	在线演示：http://www.ncmem.com/products/screencapture/demo/index.html
	在线演示-FCKEditor2.x：http://www.ncmem.com/products/screencapture/fckeditor2x/index.html
	在线演示-CKEditor3.x：http://www.ncmem.com/products/screencapture/demo-ckeditor361/index_ckeditor361.html
	在线演示-xhEditor1.x：http://www.ncmem.com/products/screencapture/kindeditor3x/index.html
	布署文档：http://www.cnblogs.com/xproer/archive/2011/09/14/2176188.html
	升级日志：http://www.cnblogs.com/xproer/archive/2010/12/04/1896399.html
	开发文档-ASP.NET(C#)：http://www.cnblogs.com/xproer/archive/2010/12/04/1896552.html
	开发文档-PHP：http://www.cnblogs.com/xproer/archive/2011/05/16/2047915.html
	开发文档-JSP：http://www.cnblogs.com/xproer/archive/2011/05/20/2051862.html
	联系邮箱：1085617561@qq.com
	联系QQ：1085617561
*/
function debugMsg(txt){$("#msg").append(txt+"<br/>");}
//全局对象
var ScreenCaptureError = {
	  "0": "就绪"
	, "1": "发送数据错误"
	, "2": "接收数据错误"
	, "3": "域名未授权或为空"
	, "4": "公司未授权或为空"
	, "5": "nat app error"
};

var LanguageZhCn = {
      "CapForm": "截屏选择窗口"
    , "CapFormTitle": "选择截屏窗口"
    , "CapFormTip": "请将您想要截取的窗口调整到最前"
    , "BtnOk": "确定"
    , "BtnCancel": "取消"
    , "RectSuze": "区域大小"
    , "CurRGB": "当前RGB"
    , "QuckCap": "双击可以快速完成截图"
};
var LanguageEn = {
      "CapForm": "Capture Form Selecter"
    , "CapFormTitle": "Choose Capture Form"
    , "CapFormTip": "Please set the window to the front which you want to intercept resize"
    , "BtnOk": "Ok"
    , "BtnCancel": "Cancel"
    , "RectSuze": "Rect Size"
    , "CurRGB": "Current RGB"
    , "QuckCap": "Double-click can be quickly completed Screenshot"
};
var LanguageZhTw = {
      "CapForm": "截屏選擇視窗"
    , "CapFormTitle": "選擇截屏視窗"
    , "CapFormTip": "請將您想要截取的視窗調整到最前"
    , "BtnOk": "確定"
    , "BtnCancel": "取消"
    , "RectSuze": "區域大小"
    , "CurRGB": "當前RGB"
    , "QuckCap": "雙擊可以快速完成截圖"
};

/*
	截屏对象管理类，提供常用配置功能
	参数
*/
function CaptureManager()
{
	var _this = this;
	this.StateType = {
		Ready				: 0
		,Posting			: 1
		,Stop				: 2
		,Error				: 3
		,GetNewID			: 4
		,Complete			: 5
		,WaitContinueUpload	: 6
		,None				: 7
		,Waiting			: 8
	};
	_this.State = _this.StateType.None;
	this.scpFF = null;
    this.scpIE = null;
    this.ui = { panel: null, ico: null, img: null, msg: null, per: null ,setup:null};
    this.event = { postComplete: function (src) { }};
	//全局配置信息
	this.Config = {
		  "PostUrl"		: "http://www.ncmem.com/upload.aspx"
		, "EncodeType"	: "utf-8"
		, "Version"		: "1,4,73,60774"
		, "Company"		: "荆门泽优软件有限公司"
		, "License"		: ""
        , "Debug"       : false//是否打开调试模式
        , "LogFile"     : "F:\\log.txt"//日志文件路径
		, "FileFieldName": "img"//自定义图片文件字段名称。
		, "Language"	: "zhcn"//语言设置，en,zhcn,tw
		, "LanCur"	    : LanguageZhCn//语言设置
		, "Quality"     : 100//jpg图片质量，仅对jpg格式有效
		, "ShowForm"	: true//是否显示截屏提示窗口
		, "ImageType"	: "jpg"//图片上传格式。png,jpg,bmp
		, "NameCrypto"	: "crc"//名称生成算法。crc,md5,sha1,uuid
		, "IcoPath"		: "/scp/SL_Uploading.gif"
        , "Cookie"      : ""
        , "Authenticate": { "type": "ntlm", "name": "", "pass": "" }//域环境信息
        //x86
        , ie: {
              part: { clsid: "9767D337-E10A-4319-8854-E4B0FB635274", name: "Xproer.ScreenCapturePro2" }
            , path: "http://www.ncmem.com/download/scp2/scp.cab"
        }
        //x64
        , ie64: {
            part: { clsid: "399B59CE-646E-4430-9000-138DF6515306", name: "Xproer.ScreenCapturePro2x64" }
            , path: "http://www.ncmem.com/download/scp2/scp64.cab"
        }
        , firefox: { name: "", type: "application/npScpPro2", path: "http://www.ncmem.com/download/scp2/scp.xpi" }
        , chrome: { name: "npScpPro2", type: "application/npScpPro2", path: "http://www.ncmem.com/download/scp2/scp.crx" }
	    //Chrome 45
        , chrome45: { name: "com.xproer.down2", path: "http://www.ncmem.com/download/scp2/scp.crx" }
        , exe: { path: "http://www.ncmem.com/download/scp2/scp.exe" }
        , edge: {protocol:"scp2",port:9800,visible:false}
        , "Fields": {"uname": "test","upass": "test","uid":"0","fid":"0"}
	};
	this.postError = function (json)
	{
	    this.ui.msg.text(ScreenCaptureError[json.value]);
	    this.ui.per.text("");
	};
	this.postProcess = function (json)
	{
	    this.ui.per.text(json.percent);
	};
	this.postComplete = function (json)
	{
	    this.ui.per.text("100%");
	    this.ui.msg.text("上传完成");
	    this.CloseMsg(); //隐藏信息层
        this.event.postComplete(json.value);
	};
	this.runComplete = function (json)
	{
	    this.Browser.exitCheck();
	};
    this.loadComplete = function (json) {
        //this.CloseMsg();
	    var needUpdate = true;
	    if (typeof (json.version) != "undefined") {
	        if (json.version == this.Config.Version) {
	            needUpdate = false;
	        }
	    }
        if (needUpdate) this.need_update();
        else { this.CloseMsg(); }
	};
	this.load_complete_edge = function (json) {
        this.edge_load = true;
        this.SafeCheck();
        this.CloseMsg();
	    _this.app.init();
	};
	this.afterCapture = function (json) { this.OpenMsg();/*打开信息面板*/ };
	this.recvMessage = function (str)
	{
	    var json = JSON.parse(str);
	    if      (json.name == "AfterCapture") { _this.afterCapture(json); }
	    else if (json.name == "post_process") { _this.postProcess(json); }
	    else if (json.name == "post_error") { _this.postError(json); }
	    else if (json.name == "post_complete") { _this.postComplete(json); }
	    else if (json.name == "run_complete") { _this.runComplete(json); }
	    else if (json.name == "run_error") { _this.postError(json); }
	    else if (json.name == "load_complete") { _this.loadComplete(json); }
	    else if (json.name == "load_complete_edge") { _this.load_complete_edge(json); }
	};
    
	var browserName = navigator.userAgent.toLowerCase();
	this.ie = browserName.indexOf("msie") > 0;
	//IE11
	this.ie = _this.ie ? _this.ie : browserName.search(/(msie\s|trident.*rv:)([\w.]+)/)!=-1;
	this.firefox = browserName.indexOf("firefox") > 0;
	this.chrome = browserName.indexOf("chrome") > 0;
	this.chrome45 = false;
    this.chrVer = navigator.appVersion.match(/Chrome\/(\d+)/);
    this.edge = navigator.userAgent.indexOf("Edge") > 0;
    this.edgeApp = new WebServer(this);
    this.app = scp_app;
    this.app.edgeApp = this.edgeApp;
    this.app.Config = this.Config;
    this.app.ins = this;
    if (this.edge) { this.ie = this.firefox = this.chrome = this.chrome45 = false; }

    //Win64
    if (window.navigator.platform == "Win64")
    {
        jQuery.extend(this.Config.ie, this.Config.ie64);
    } //Firefox
    if (this.firefox)
    {
        if (!this.app.checkFF())//仍然支持npapi
        {
            this.edge = true;
            this.app.postMessage = this.app.postMessageEdge;
            this.edgeApp.run = this.edgeApp.runChr;
        }
	} //chrome
	else if (this.chrome)
    {
        this.app.check = this.app.checkFF;
        jQuery.extend(this.Config.firefox, this.Config.chrome);
	    //44+版本使用Native Message
        if (parseInt(this.chrVer[1]) >= 44) {
            _this.firefox = true;
            if (!this.app.checkFF())//仍然支持npapi
            {
                this.edge = true;
                this.app.postMessage = this.app.postMessageEdge;
                this.edgeApp.run = this.edgeApp.runChr;
            }
        }
    }
    else if (this.edge)
    {
        this.app.postMessage = this.app.postMessageEdge;
    }

	this.GetHtml = function ()
	{
        //ff
        var html = '<embed name="scpFF" type="' + this.Config.firefox.type + '" pluginspage="' + this.Config.firefox.path + '" width="1" height="1">';
        if (this.chrome45) html = '';
        //ie
	    //html += '<div style="display: none">';
	    html += '<object name="scpIE" classid="clsid:' + this.Config.ie.part.clsid + '"';
	    html += ' codebase="' + this.Config.ie.path + '#version=' + this.Config["Version"] + '" width="1" height="1"></object>';
        if (this.edge) html = '';
	    //html += '</div>';
	    //
        html += '<div name="ui-scp" class="panel-scp">\
	                <img name="ico" alt="进度图标" src="/ScreenCapture/process.gif" /><span name="msg">图片上传中...</span><span name="per">10%</span>\
	            </div>';
        //安装提示
        html += '<div name="ui-setup" class="panel-scp panel-setup"></div>';
	    return html;
	};


    //安全检查，在用户关闭网页时自动停止所有上传任务。
    this.SafeCheck = function (event) {
        //$(window).bind("beforeunload", function (event) {});
        $(window).bind("unload", function () {
            if (this.edge) _this.edgeApp.close();
        });
    };
	this.setup_tip = function ()
    {
        this.ui.setup.skygqbox();
        var dom = this.ui.setup.html("控件加载中，如果未加载成功请先<a name='w-exe'>安装控件</a>");
        var lnk = dom.find('a[name="w-exe"]');
        lnk.attr("href", this.Config.exe.path);
    };
    this.need_update = function () {
        var dom = this.ui.setup.html("发现新版本，请<a name='w-exe' href='#'>更新</a>");
        var lnk = dom.find('a[name="w-exe"]');
        lnk.attr("href", this.Config.exe.path);
    };

    //加载到document.body中
	this.loadAuto= function()
	{
	    var ui = $(document.body).append(this.GetHtml());
        this.initUI(ui);
    };
	
	//加截到指定对象内部
	this.load_to = function(oid)
	{
	    var ui = $("#" + oid).append(this.GetHtml());
        this.initUI(ui);
    };

    this.initUI = function (ui)
    {
        this.parter = ui.find('embed[name="scpFF"]').get(0);
        this.scpIE = ui.find('object[name="scpIE"]').get(0);
        this.ui.panel = ui.find('div[name="ui-scp"]');
        this.ui.ico = ui.find('img[name="ico"]').attr("src", this.Config["IcoPath"]);
        this.ui.msg = ui.find('span[name="msg"]');
        this.ui.per = ui.find('span[name="per"]');
        this.ui.setup = ui.find('div[name="ui-setup"]');

        $(function () {
            if (!_this.edge) {
                if (_this.ie) {
                    _this.parter = _this.scpIE;
                }
                _this.parter.recvMessage = _this.recvMessage;
            }
            _this.setup_tip();
            if (_this.edge) {
                _this.edgeApp.run();
            }
            else {
                _this.app.init();
            }
        });
    };

	//截屏函数
    this.Capture = function () {
        var opt = { autoHide: false };//自动隐藏当前窗口
        this.app.capture(opt);
    };
    //自动隐藏当前窗口
    this.CaptureHide = function () {        
        var opt = { autoHide: true};//自动隐藏当前窗口
        this.app.capture(opt);};
	//截取整个屏幕
	this.CaptureScreen = function(){this.app.captureScreen();};
	//截取指定区域
	this.CaptureRect = function(x,y,w,h){this.app.captureRect(x, y, w, h);};
    this.OpenMsg = function () {
        _this.ui.panel.skygqbox();	    
	    _this.ui.msg.text("图片上传中...");
	};
	this.CloseMsg = function(){$.skygqbox.hide();};
}