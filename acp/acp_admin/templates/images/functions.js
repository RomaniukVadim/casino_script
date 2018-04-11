// 10.23.2002
//browser detect

var browser

if(document.layers){
	document.write("<LINK REL=STYLESHEET HREF='/hcp/ma/lp/admin_netscape.css' type='text/css'>");
	browser = "NN"
} else {
	document.write("<LINK REL=STYLESHEET HREF='/hcp/ma/lp/adminTimpani.css' type='text/css'>");
	browser = "IE"
}


//functions for admin console redesign

function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

var imgPlus=new Image()
var imgMinus=new Image()
imgPlus.src="/hcp/ma/lp/item_plus.gif"
imgMinus.src="/hcp/ma/lp/item_minus.gif"
function toggle(img){
    if (img.src==imgPlus.src)
        img.src=imgMinus.src;
    else
        img.src=imgPlus.src
}

function toggleObjectDisplay(objId)
{
	obj = document.getElementById(objId);
	if (obj){
	    if(obj.style.display=='none'){
	        if(!document.all && obj.tagName=='TR'){
	            obj.style.display = 'table-row';
            }else if(!document.all && obj.tagName=='TD'){
                obj.style.display = 'table-cell';
            }else{
                obj.style.display = 'block';
            }
        }
		//else
		//    obj.style.display = 'none';
    }
}

function showTable(innerTable)
{
    if (document.all) {
        if (innerTable.display == '')
            innerTable.display = 'none';
        else
            innerTable.display = '';
    }
}

//improved method (working in NS6+ also)
function showHideTable(tableName)
{
	if (document.getElementById) // DOM-compliant browsers
	{
		d1=document.getElementById(tableName);
	}else if (document.all) // IE 4.x
	{
		d1=document.all[tableName];
	}
	if (d1.style.display=="none"){
        if(!document.all && d1.tagName=='TR'){
            d1.style.display = 'table-row';
        }else if(!document.all && d1.tagName=='TD'){
            d1.style.display = 'table-cell';
        }else{
            d1.style.display = 'block';
        }
	}else{
		d1.style.display="none";
    }
}


function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  if (browser == "IE") {
      for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
        if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
        obj.visibility=v; }
        maxElement = 24;
        currElement = 0;
        // last iframe is the info layer
        if (document.frames.length > 1) {
			for (x=0; x < document.frames.length-1; x++) {
				if (document.frames[x].document.body.style != null) {
					document.frames[x].document.body.style.display = (obj.visibility=='visible' ? "none" : "block" );
				}				
			}        
		}
        for (x=0; x < document.applets.length; x++) {
            document.applets[x].style.visibility = (obj.visibility=='visible') ? "hidden" : "visible";
        }
        for (x=0; x < document.forms.length; x++) {
            for (y=0; y < document.forms[x].elements.length; y++) {
                if (!document.forms[x].elements[y].type.match("hidden"))
                    currElement++;
                if (document.forms[x].elements[y].type.match("select") && currElement < maxElement) {
                    document.forms[x].elements[y].style.visibility = (obj.visibility=='visible') ? "hidden" : "visible";
                }
            }
        }
    }
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function limitTextarea(obj, maxize) {
	if (obj.value.length > maxize)
		obj.value = obj.value.substring(0, maxize);		
}
function showtip(current,e,text)
{
    if (document.all || document.getElementById) {
         current.title=text
    } else if (document.layers) {
        if (document.tooltip) {
            document.tooltip.document.write('<layer>'+text+'</layer>')
            document.tooltip.document.close()
            document.tooltip.left=e.pageX+5
            document.tooltip.top=e.pageY+5
            document.tooltip.visibility="show"
        }
    }
}
function hidetip()
{
    if (document.layers && document.tooltip)
        document.tooltip.visibility="hidden"
}

// sort select options (when 'Select One' exists).
function sortChoices(field) {
    opt = new Array(field.length-1);
    for (i=0; i < opt.length; i++)
        opt[i] = new Array(field.options[i+1].text, field.options[i+1].value)

    opt.sort()
    for(i=0; i< opt.length; i++) {
        field.options[i+1] = new Option(opt[i][0]);
        field.options[i+1].value = opt[i][1];
    }
}

// for NS users - limit textarea max number of chars, to DB's field size.
function trimTextarea(maxsize)
{
    for (x=0; x < document.forms.length; x++) {
        for (y=0; y < document.forms[x].elements.length; y++) {
            if (document.forms[x].elements[y].type.match("textarea") && document.forms[x].elements[y].value.length > maxsize) {
                document.forms[x].elements[y].value = document.forms[x].elements[y].value.substring(0,maxsize)
            }
        }
    }
}

function trimOneTextarea(field, maxsize)
{
	if (field != null) {
		if (field.type.match("textarea") && field.value.length > maxsize) {
		    field.value = field.value.substring(0,maxsize)
		}
    }
}

function checkForTagChars(inp)
{
	if( inp.indexOf(">") > -1 || (inp.indexOf("<") > -1) 
	    || (inp.indexOf("\"") > -1) || (inp.indexOf("'") > -1) )
	{
		alert("Name contains invalid characters.");
		return false;
	}
	else
		return true;
}