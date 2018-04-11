<span id="theText" style="width:100%; color: #FFFF00">
<strong>  <marquee height="10" width="570" loop="20" Direction="left" scrollamount="3". >
Админпанель Видеослот "Атлантика"
</marquee></strong>
</span>

<script>
<!--
//величина сияния от и до
var from = 5;
var to = 15;
//скорсть сияния
var delay = 120;
//цвет сияния, имя в rgb (пример:'#ffff33') или именованный
var glowColor = "#ff4000'";
//не менять!!!
var i = to;
var j = 0;
textPulseDown();
function textPulseUp()
{
if (!document.all)
return
if (i < to)
{
theText.style.filter = "Glow(Color=" + glowColor + ", Strength=" + i + ")";
i++;
theTimeout = setTimeout('textPulseUp()',delay);
return 0;
}
if (i = to)
{
theTimeout = setTimeout('textPulseDown()',delay);
return 0;
}
}
function textPulseDown()
{
if (!document.all)
return
if (i > from)
{
theText.style.filter = "Glow(Color=" + glowColor + ", Strength=" + i + ")";
i--;
theTimeout = setTimeout('textPulseDown()',delay);
return 0;
}
if (i = from)
{
theTimeout = setTimeout('textPulseUp()',delay);
return 0;
}
}
//-->
</script>