jQuery(document).ready(function($){
	
	var interval;
	
	function startTicker(){
		$("#news_ticker li:first").slideUp(function(){
			$(this).appendTo($("#news_ticker")).slideDown();
		});
	}
	
	interval = setInterval(startTicker, 2000);
	
	function stopTicker(){
		clearInterval(interval);
	}
	
	$("#news_ticker").hover(function(){
		stopTicker();
	}, function(){
		interval = setInterval(startTicker, 2000);
	});
	
});
	