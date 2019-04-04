function syncInputText()
{
	var selectedItems = '';
	options = document.getElementById('teachers').options;	
	for (var i = 0; i < options.length; i++)
	{
		if (options[i].selected)
		{
			selectedItems += options[i].value + ' ';
		}
	}	
	document.getElementById('eduform-teacher_ids').value = selectedItems;
}