     
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    console.log("here");
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function (event) {
    if (!event.target.matches('.dashboard-notify-btn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.style.display === 'block') {
          openDropdown.style.display = 'none';
        }
      }
    }
  };