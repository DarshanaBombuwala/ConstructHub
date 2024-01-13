// Get the modal element
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById('openModalBtn');

// Get the <span> element that closes the modal
var span = document.getElementById('closeModalBtn');

// Get the content element inside the modal
var modalContent = document.getElementById('modalContent');

// When the user clicks the button, open the modal and load content
btn.onclick = function() {
    // You can change 'popup-content.html' to the path of your desired HTML file
    fetch('popup.html')
        .then(response => response.text())
        .then(data => {
            modalContent.innerHTML = data;
            modal.style.display = 'block';
        });
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
};
