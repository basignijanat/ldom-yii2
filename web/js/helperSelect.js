function syncInputText(options)
{
	var optionIds = [];	
	for (var i = 0; i < options.length; i++)
	{
		optionIds.push(options[i].value);
	}	
	return optionIds.join(' ');
}

function changeLists(action, outputField)
{
	var idFromList;
	var idToList;
	switch (action)
	{
		case 'add':
			idFromList = 'all_items';
			idToList = 'selected_items';
			break;
		case 'remove':
			idFromList = 'selected_items';
			idToList = 'all_items';
			break;
	}
	var selectedIndex = document.getElementById(idFromList).options.selectedIndex;
	if (selectedIndex >= 0)
	{
		var selectedItem = document.getElementById(idFromList).options[selectedIndex];
		document.getElementById(idToList).options.add(selectedItem);
		var syncString = syncInputText(document.getElementById('selected_items').options);
		document.getElementById(outputField).value = syncString;
	}
	else
	{
		alert('No items was selected!');
	}	
}

function addToList(outputField)
{
	changeLists('add', outputField);
}

function removeFromList(outputField)
{
	changeLists('remove', outputField);
}