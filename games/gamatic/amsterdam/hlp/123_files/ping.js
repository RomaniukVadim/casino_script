setInterval("CallServer()", 300000);

function CallServer()
{
	$.get("/ping");
}