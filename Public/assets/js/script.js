function openTab(tabId) {
    var tabContents = document.getElementsByClassName('content-container');

    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].classList.add('tab-transition'); // Add the transition class
        tabContents[i].style.opacity = 0;
        tabContents[i].style.display = 'none';
    }
    var tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(function(tabButton) {
        tabButton.classList.remove('active');
        
    });
  
    var selectedTab = document.getElementById(tabId);
    selectedTab.style.display = 'flex';
    selectedTab.style.flexWrap = 'wrap';
    selectedTab.style.justifyContent = 'flex-start';
    selectedTab.style.alignItems = 'flex-start';
    setTimeout(function() {
        selectedTab.style.opacity = 1; 
    }, 10);

    var clickedTabButton = document.querySelector('.tab-button[onclick="openTab(\'' + tabId + '\')"]');
    clickedTabButton.classList.add('active');
    
      
}

openTab('professional')

document.addEventListener('DOMContentLoaded', function () {
    // Get references to all tab buttons using their common class
    var tabButtons = document.querySelectorAll('.tab-button');

    // Attach a click event listener to each tab button
    tabButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Scroll to the top of the page
            window.scrollTo({
                top:0,
                behavior: 'smooth' // Use smooth scrolling for a smoother transition (optional)
            });
        });
    });
});

