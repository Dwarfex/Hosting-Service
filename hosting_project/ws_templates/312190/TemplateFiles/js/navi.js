function switchback() {
	if (document.getElementById('mainswitch').style.display=='block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='block';
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='block';
	}
	else if (document.getElementById('clanswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='block';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';
	document.getElementById('mainswitch').style.display='block';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('commswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='block';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';	
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='block';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('mediaswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='block';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';	
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='block';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('miscswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='block';
	document.getElementById('misc').style.display='none';	
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='block';
	document.getElementById('miscswitch').style.display='none';
	}
return
}

function switchforward() {
	if (document.getElementById('mainswitch').style.display=='block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='block';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='block';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('clanswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='block';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='block';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('commswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='block';
	document.getElementById('misc').style.display='none';	
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='block';
	document.getElementById('miscswitch').style.display='none';
	}
	else if (document.getElementById('mediaswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='none';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='block';	
	document.getElementById('mainswitch').style.display='none';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='block';
	}
	else if (document.getElementById('miscswitch').style.display == 'block')
	{
	document.getElementById('main').style.display='block';
	document.getElementById('clan').style.display='none';
	document.getElementById('comm').style.display='none';
	document.getElementById('media').style.display='none';
	document.getElementById('misc').style.display='none';
	document.getElementById('mainswitch').style.display='block';
	document.getElementById('clanswitch').style.display='none';
	document.getElementById('commswitch').style.display='none';
	document.getElementById('mediaswitch').style.display='none';
	document.getElementById('miscswitch').style.display='none';
	}	
return
}