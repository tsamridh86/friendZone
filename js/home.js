$(document).ready(function(){
	start();
});

function start(){
	$("#targetArea").addClass("glyphicon glyphicon-chevron-down");

	$("#expansion").click(
		function(){
			if($("#targetArea").attr('class') == "glyphicon glyphicon-chevron-down")
			{
				$("#targetArea").removeClass("glyphicon glyphicon-chevron-down");
				$("#targetArea").addClass("glyphicon glyphicon-chevron-up");
			}

			else 
			{
				$("#targetArea").removeClass("glyphicon glyphicon-chevron-up");
				$("#targetArea").addClass("glyphicon glyphicon-chevron-down");
			}
		});
}