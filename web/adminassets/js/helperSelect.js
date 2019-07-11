function syncInputText(options)
{
	var optionIds = [];	
	for (var i = 0; i < options.length; i++)
	{
		optionIds.push(options[i].value);
	}	
	return optionIds.join(' ');
}

function changeLists(action, outputField, uniqId)
{
	var idFromList;
	var idToList;
	switch (action)
	{
		case 'add':
			idFromList = 'all_items_' + uniqId;
			idToList = 'selected_items_' + uniqId;
			break;
		case 'remove':
			idFromList = 'selected_items_' + uniqId;
			idToList = 'all_items_' + uniqId;
			break;
	}
	var selectedIndex = document.getElementById(idFromList).options.selectedIndex;
	if (selectedIndex >= 0)
	{
		var selectedItem = document.getElementById(idFromList).options[selectedIndex];
		document.getElementById(idToList).options.add(selectedItem);
		var syncString = syncInputText(document.getElementById('selected_items_' + uniqId).options);
		document.getElementById(outputField).value = syncString;
	}
	else
	{
		alert('No items was selected!');
	}	
}

function addToList(outputField, uniqId)
{
	changeLists('add', outputField, uniqId);
}

function removeFromList(outputField, uniqId)
{
	changeLists('remove', outputField, uniqId);
}