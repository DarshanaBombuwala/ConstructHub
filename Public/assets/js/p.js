const imgs = document.querySelectorAll(".img-select a");
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
  imgItem.addEventListener("click", (event) => {
    event.preventDefault();
    imgId = imgItem.dataset.id;
    slideImage();
  });
});

function slideImage() {
  const displayWidth = document.querySelector(
    ".img-showcase img:first-child"
  ).clientWidth;

  document.querySelector(".img-showcase").style.transform = `translateX(${
    -(imgId - 1) * displayWidth
  }px)`;
}

window.addEventListener("resize", slideImage);

document.addEventListener("DOMContentLoaded", function () {
  let startDatePicker;
  let endDatePicker;
  let startDateSelected = false;
  let endDateSelected = false;
  // Variable to store the minimum available number
  let reservedData;
  let ROOT = "http://localhost/groupProject/Construct_hub_grp/Public"; // Global variable to store reserved data

  // Fetch reserved dates from the server
  fetch(ROOT + "/product/reservedDays") // Adjust the endpoint accordingly
    .then((response) => response.json())
    .then((data) => {
      reservedData = data; // Set reservedData as a global variable
      console.log(reservedData);
      startDatePicker = flatpickr("#startDate", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: getDisabledDates(),
        onChange: function (selectedDates, dateStr, instance) {
          startDateSelected = true;
          endDatePicker.set("minDate", dateStr);

          const quantityInput = document.getElementById("quantity");
          if (quantityInput) {
            quantityInput.value = 1;
          }
          if (endDateSelected) {
            const start = startDatePicker.selectedDates[0];
            const end = endDatePicker.selectedDates[0];

            if (end < start) {
              const existingLabelElement =
                document.querySelector(".availability-msg");

              if (existingLabelElement) {
                existingLabelElement.textContent = `End date cannot be before Start  Date!`;
              }
              return;
            }

            const disabledDates = getDisabledDatesBetween(
              start,
              end,
              reservedData
            );
            console.log("disabled" + disabledDates);

            if (disabledDates.length > 0) {
              // Some dates between the selected start and end dates are disabled
              const existingLabelElement =
                document.querySelector(".availability-msg");

              if (existingLabelElement) {
                existingLabelElement.textContent = `Some days are full reserved in your selected date range. Please Choose Valid Date!`;
              }

              // Clear the end date
              startDatePicker.clear();
              const reservationBtn = document.querySelector(".reservation-btn");
              if (reservationBtn) {
                // Remove the 'disabled' attribute
                reservationBtn.setAttribute("disabled", "disabled");
              }
              return;
            }
          }
          if (endDateSelected) {
            minAvailable = updateAvailabilityMessage();
            updateQuantityInput(minAvailable);
          }
        },
      });

      endDatePicker = flatpickr("#endDate", {
        dateFormat: "Y-m-d",
        disable: getDisabledDates(),
        minDate: "today",
        onChange: function (selectedDates, dateStr, instance) {
          endDateSelected = true;
          if (startDateSelected) {
            const start = startDatePicker.selectedDates[0];
            const end = endDatePicker.selectedDates[0];

            if (end < start) {
              const existingLabelElement =
                document.querySelector(".availability-msg");

              if (existingLabelElement) {
                existingLabelElement.textContent = `End date cannot be before Start  Date!`;
              }
              return;
            }

            const disabledDates = getDisabledDatesBetween(
              start,
              end,
              reservedData
            );
            console.log("disabled" + disabledDates);

            if (disabledDates.length > 0) {
              // Some dates between the selected start and end dates are disabled
              const existingLabelElement =
                document.querySelector(".availability-msg");

              if (existingLabelElement) {
                existingLabelElement.textContent = `Some days are full reserved in your selected date range. Please Choose Valid Date!`;
              }

              // Clear the end date
              endDatePicker.clear();
              const reservationBtn = document.querySelector(".reservation-btn");
              if (reservationBtn) {
                // Remove the 'disabled' attribute
                reservationBtn.setAttribute("disabled", "disabled");
              }
              return;
            }
          }
          const quantityInput = document.getElementById("quantity");
          quantityInput.value = 1;
          minAvailable = updateAvailabilityMessage();
          updateQuantityInput(minAvailable);
        },
      });
    })
    .catch((error) => {
      console.error("Error fetching reserved dates:", error);
    });

  function updateAvailabilityMessage() {
    const start = startDatePicker.selectedDates[0];
    const end = endDatePicker.selectedDates[0];
    let minAvailable = reservedData.expectedCount;

    if (start && end) {
      let currentDate = new Date(start);

      while (currentDate <= end) {
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, "0");
        const day = String(currentDate.getDate()).padStart(2, "0");
        const dateStr = `${year}-${month}-${day}`;

        if (reservedData[dateStr] < minAvailable) {
          minAvailable = reservedData[dateStr];
        }

        currentDate.setDate(currentDate.getDate() + 1);
      }

      console.log(minAvailable + "min av");

      const existingLabelElement = document.querySelector(".availability-msg");

      if (existingLabelElement) {
        existingLabelElement.textContent = `Available Equipments: ${minAvailable}`;
      }

      const reservationBtn = document.querySelector(".reservation-btn");
      if (reservationBtn) {
        // Remove the 'disabled' attribute
        reservationBtn.removeAttribute("disabled");
      }
    }
    return minAvailable;
  }

  function getDisabledDates() {
    const disabledDates = [];

    for (const [date, count] of Object.entries(reservedData)) {
      if (count === 0 && date !== "expectedCount") {
        disabledDates.push(date);
      }
    }
    console.log(disabledDates);
    return disabledDates;
  }

  function getDisabledDatesBetween(startDate, endDate) {
    const disabledDates = [];
    console.log(startDate + endDate);
    let currentDate = new Date(startDate);

    while (currentDate <= endDate) {
      const year = currentDate.getFullYear();
      const month = String(currentDate.getMonth() + 1).padStart(2, "0");
      const day = String(currentDate.getDate()).padStart(2, "0");
      const dateStr = `${year}-${month}-${day}`;

      if (reservedData[dateStr] === 0) {
        disabledDates.push(dateStr);
      }

      currentDate.setDate(currentDate.getDate() + 1);
    }

    console.log("dis dates: " + disabledDates);

    return disabledDates;
  }

  function updateQuantityInput(value) {
    console.log("in quantity");
    const quantityInput = document.getElementById("quantity");
    quantityInput.max = value;
  }
});

// Function to toggle the visibility of the popup and backdrop
document.addEventListener("DOMContentLoaded", function () {
  var closeButton = document.querySelector(".close-button");

  closeButton.addEventListener("click", function () {
    togglePopup();
  });
});

function togglePopup() {
  var popup = document.getElementById("popupContainer");
  var backdrop = document.getElementById("backdrop");

  if (popup.style.display === "none") {
    popup.style.display = "flex";
    backdrop.style.display = "flex";
  } else {
    popup.style.display = "none";
    backdrop.style.display = "none";
  }
}

const url = window.location.href;
        const parts = url.split('/');
        const category = parts[parts.length - 2];
if(category==='equipments'){
  const webSocket = new WebSocket("ws://localhost:8080"); // Change URL to your WebSocket server

// Event handler for when the connection is opened
webSocket.onopen = function (event) {
  console.log("WebSocket connection opened.");

        
       
        const value = parts[parts.length - 1];

  webSocket.send(value);
};

// Event handler for when a message is received from the server
webSocket.onmessage = function (event) {
  console.log("here");
   const messagesDiv = document.getElementById('messages');
   const data = JSON.parse(event.data); // Parse JSON data
   const message = data.message; // Access the 'message' property

   messagesDiv.innerHTML += '<p>' + message + '</p>'; // Display the message

  // Log the received message to the console
  console.log("Received message:", message);
};

// Event handler for errors
webSocket.onerror = function (event) {
  console.error("WebSocket error:", event);
};

document.addEventListener("DOMContentLoaded", function () {
  const reserveButton = document.getElementById("reserveButton");

  reserveButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission behavior

    if (loggedIn) {
      // User is logged in, enable the button
      console.log("loggedin");
      let ROOT = "http://localhost/groupProject/Construct_hub_grp/Public";
  
      // Proceed with reservation logic
      // For example, send an Axios request with form data
      const formData = new FormData();
      formData.append('startDate', document.getElementById('startDate').value);
      formData.append('endDate', document.getElementById('endDate').value);
      formData.append('quantity', document.getElementById('quantity').value);
  
      axios.post(ROOT+'/product/tempory', formData)
          .then(response => {
              // Handle success response
              if(response.data=="sucess"){
                webSocket.send('newReservation');
              }
              console.log('Reservation successful:', response.data);
          })
          .catch(error => {
              // Handle error
              console.error('Error making reservation:', error);
          });
  } else {
      // User is not logged in, display a message or redirect to login page
      alert("Please log in to make a reservation.");
      // Alternatively, redirect to the login page
      // window.location.href = '/login';
    }
  });
});
}


//console.log("hello" + loggedIn);
