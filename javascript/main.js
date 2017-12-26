document.getElementById('searchBar').addEventListener('submit', saveSearch);

function saveSearch(e){

	var searchInput = document.getElementById('searchInput').value;

	var search = {
		input: searchInput
	}

	if(localStorage.getItem('searchData') === null){
    // Init array
    var searchData = [];
    // Add to array
    searchData.push(search);
    // Set to localStorage
    localStorage.setItem('searchData', JSON.stringify(searchData));
  } else {
    // Get bookmarks from localStorage
    var searchData = JSON.parse(localStorage.getItem('searchData'));
    // Add bookmark to array
    searchData.push(search);
    // Re-set back to localStorage
    localStorage.setItem('searchData', JSON.stringify(searchData));
  }

    document.getElementById('searchBar').reset();

  // Re-fetch bookmarks
  fetchSearchResults();

  // Prevent form from submitting
  e.preventDefault();

}

// Fetch bookmarks
function fetchSearchResults(){
  // Get bookmarks from localStorage
  var searchData = JSON.parse(localStorage.getItem('searchData'));
  // Get output id
  var searchResult = document.getElementById('searchResult');

  // Build output
  searchResult.innerHTML = '';
  for(var i = 0; i < searchData.length; i++){
    var input = searchData[i].searchInput;

    searchResult.innerHTML += '<div class="well">'+
                                  '<h3>'+input+
                                  '</h3>'+
                                  '</div>';
  }
}