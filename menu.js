function unset()
{
	str = "";
	for (i=0; i<document.links.length; i++) {
		if (document.links[i].className == "amenu")
			document.links[i].className = "menu";
	}
}

function setmenu(a)
{
	unset();
	document.links[a].className = "amenu";
}

function setsubmenucontent(a,item)
{
	//a = a || 0;
	//alert(a);
	parent.submenu.location.href=document.links[a].href+'&s='+item;
}


function setmaincontent(a)
{
	parent.main.location.href=document.links[a].href;
}
