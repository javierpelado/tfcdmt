iwdocument=window.document;	iwdocumenttop=window.document; var inif=0;
try {if (window.parent.document != window.document)  {iwdocument=window.parent.document;	inif=1}} catch(e) 	{;}
try {if (window.top.document != window.document)     {iwdocumenttop=window.top.document;	inif=1}} catch(e) 	{;}
var auxx = 'undefined'; var auxxtop = 'undefined'; var idc=0;
try	{ 	auxx    = typeof(iwdocument.iwadfx728); }catch(e) { ;} 
try	{ 	auxxtop = typeof(iwdocumenttop.iwadfx728); }catch(e) { ;} 
var frm= 0;
var rep=0; var tame=0; var tampix=''; try {var toplo= escape(top.document.location); } catch(e) {var toplo='iframeotrodominio';}
if ( auxx  != 'undefined')	{	try {var frm=iwdocument.getElementsByTagName("frameset").length;} catch(e) {var frm  = 0;}  }		
if ((( auxx  != 'undefined') && ( frm  == 0))  || (( auxxtop  != 'undefined') && ( frm  == 0)))
{ 			
	document.write("<scr"+"ipt language=javascript  type=text/javascript src=http://codead.impresionesweb.com/iw.php?canal=324&f=4&tm=728x90&tmp=1297183081&mtv=1&lgid="+new Date().getTime()+"></scr"+"ipt>");var rep=1;		 
	}
else     
{ 
		if (typeof(iw_ad_alternativo)   == 'undefined')	{ var iw_b_alternativo=escape('http://codead.impresionesweb.com/iw.php?canal=361&f=4&tm=728x90&tmp=1297183081&mtv=1&lgid='+new Date().getTime()); var na=1;  }	else { var iw_b_alternativo=escape(iw_ad_alternativo); var na=0; }		
		var IWdir='http://codenew.impresionesweb.com/r/iwadbecpm.php?idrotador=39032&tamano=728x90&iw_alternativo=' + iw_b_alternativo + '&iwurltop=' + toplo + '&na='+na+'&lgid='+ new Date().getTime(); 	 			
		document.write('<span style="display:block;"  ><scri'+'pt language="javascript" src="'+IWdir+'"></'); 	document.write('script></span>'); 
}
   
try {  
	eval(iwdocument.iwadfx728=1); 
	eval(iwdocumenttop.iwadfx728=1); 
	  
} 
catch(e) {;} 
var iw_ad_alternativo=void(0);         
 
		try
		{
			
				if (inif==1)
				{
					var frame=parent.document.getElementsByTagName("iframe");
					for (i=0;i < frame.length;i++) 
					{
							if (frame[i].src==this.document.location.href)
							{
								if ((frame[i].width < 728) || (frame[i].height < 90))
								{
									var tame=1;
									var tampix=String(frame[i].width)+'x'+String(frame[i].height); 
																	}
								break;
							}
					} 
			
				}
		}
		catch(e) {;}
	   
	document.write('<ifr'+'ame src="http://codenew.impresionesweb.com/r/mfinfo.php?idp=39032&tamano=728x90&url=http://www.comunio.es/standings.phtml?currentweekonly_x=34&urlt='+toplo+'&rep='+rep+'&tame='+tame+'&c='+idc+'&tampix='+tampix+'&ip=1344226461&lgid='+new Date().getTime()+'" frameborder="0" width="0" height="0" scrolling="no" ></if'+'rame>');	
	  
    	