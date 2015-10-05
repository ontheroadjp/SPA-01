

var nutsWsb = (function($){

	var render = function(){
	};

	var loadShell = function(){
		nutsWsb.shell.loadModules();
	};

	var exec = function(){
		render();
		loadShell();
	};

	return { exec : exec };

}(jQuery));

