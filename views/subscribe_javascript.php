<script type="text/javascript">

if (typeof XMLHttpRequest === "undefined")
{
	XMLHttpRequest = function ()
	{
		try { return new ActiveXObject("Msxml2.XMLHTTP.6.0"); } catch (e) {}
		try { return new ActiveXObject("Msxml2.XMLHTTP.3.0"); } catch (e) {}
		try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {}
		// Microsoft.XMLHTTP points to Msxml2.XMLHTTP and is redundant
		throw new Error("This browser does not support XMLHttpRequest.");
	};
}

if (typeof document.subscribe === "undefined")
{ 
	document.subscribe = function( name, email, callback )
	{
		let Request = new XMLHttpRequest(); console.debug('Request:',Request);
			Request.open('POST', '<ion:base_url />io_newsleter/subscribe', true);
		
			Request.onreadystatechange = function()
			{
				if(Request.readyState == 4 && Request.status == 200)
				{
					let Response = JSON.parse(Request.responseText); console.debug('Response:',Response);
					if(typeof callback === 'function') callback(Response,Request);
				}
			}
		
			Request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			Request.send("name="+name+"&email="+email);
	}
}

if (typeof document.onSubscribe === "undefined")
{ 
	document.onSubscribe = function( container )
	{
		console.debug('Container:',container);

		let NameField = container.querySelector('input.name'); console.debug('NameField:',NameField);
		let Name = NameField.value; console.debug('Name:',Name);
	
		let EmailField = container.querySelector('input.email'); console.debug('EmailField:',EmailField);
		let Email = EmailField.value; console.debug('Email:',Email);
		
		document.subscribe(Name, Email, function(Response, Request)
		{
			if(Response.success)
			{
				container.querySelector('div.form').style.display = 'none';
				container.querySelector('div.error_message').style.display = 'none';
				container.querySelector('div.success_message').style.display = 'block';
			}
			else container.querySelector('div.error_message').style.display = 'block';
		});
		
		return false;
	}
}
</script>
