

var nutsWsb = (function($){

	var nutsWsbPanels = {
		'rootpanel':'panelcontrol',
		'panelbase':'panelcontrol-panel',
		'panelcontrol-btns':'panelcontrol-buttons',
		'panelcontrol-add':'panelcontrol-add',
		'panelproperty-btns':'panelproperty-buttons'
	};

	var pageRender = function(){
	};

	var loadShell = function(){
		nutsWsb.shell.loadModules();
	};

	var exec = function(){
		pageRender();
		loadShell();
	};

	return { exec : exec };

}(jQuery));

