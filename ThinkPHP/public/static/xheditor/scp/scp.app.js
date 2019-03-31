var scp_app = {
    ins: null
    ,edgeApp: null
    , Config: null
    , queueCount:0
    , checkFF: function ()
    {
        var mimetype = navigator.mimeTypes;
        if (typeof mimetype == "object" && mimetype.length)
        {
            for (var i = 0; i < mimetype.length; i++)
            {
                var enabled = mimetype[i].type == this.Config.firefox.type;
                if (!enabled) enabled = mimetype[i].type == this.Config.firefox.type.toLowerCase();
                if (enabled) return mimetype[i].enabledPlugin;
            }
        }
        else
        {
            mimetype = [this.Config.firefox.type];
        }
        if (mimetype)
        {
            return mimetype.enabledPlugin;
        }
        return false;
    }
	, Setup: function ()
	{
		//文件夹选择控件
        acx += '<object id="downPart" classid="clsid:' + this.Config.ClsidPart + '"';
        acx += ' codebase="' + this.Config.CabPath + '" width="1" height="1" ></object>';

		$("body").append(acx);
	}
    , init: function ()
    {
        var param = { name: "init", config: this.Config };
        this.postMessage(param);
    }
    , initNat: function ()
    {
        if (!this.chrome45) return;
        this.exitEvent();
        document.addEventListener('Down3EventCallBack', function (evt)
        {
            this.recvMessage(JSON.stringify(evt.detail));
        });
    }
    , initEdge: function ()
    {
        this.edgeApp.run();
    }
    , capture: function (opt) {
        var param = { name: "capture" };
        jQuery.extend(param, opt);
        this.postMessage(param);
    }
    , captureScreen: function () {
        var param = { name: "capture_screen" };
        this.postMessage(param);
    }
    , captureRect: function (left, top, width, height) {
        var param = { name: "capture_rect" ,x: left, y: top, w: width, h: height };
        this.postMessage(param);
    }
    , exit: function ()
    {
        var par = { name: 'exit' };
        var evt = document.createEvent("CustomEvent");
        evt.initCustomEvent(this.entID, true, false, par);
        document.dispatchEvent(evt);
    }
    , exitEvent: function ()
    {
        var obj = this;
        $(window).bind("beforeunload", function () { obj.exit(); });
    }
    , postMessage:function(json)
    {
        try {
            this.ins.parter.postMessage(JSON.stringify(json));
        } catch (e) { console.log("调用postMessage失败，请检查控件是否安装成功");}
    }
    , postMessageNat: function (par)
    {
        var evt = document.createEvent("CustomEvent");
        evt.initCustomEvent(this.entID, true, false, par);
        document.dispatchEvent(evt);
    }
    , postMessageEdge: function (par)
    {
        this.edgeApp.send(par);
    }
};