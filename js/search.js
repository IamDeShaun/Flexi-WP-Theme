const searchIcon = document.getElementById("search");
const searchBox = document.getElementById("searchbox");

searchIcon.addEventListener('click', function () {
  if (searchBox.style.top == '50px') {
    searchBox.style.top = '-65px';
    searchBox.style.pointerEvents = 'none';
  } else {
    searchBox.style.top = '50px';
    searchBox.style.pointerEvents = 'auto';
  }
});
