<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/dashboards-sidemenu.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/rm-eq-listings.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/popup-form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Hello</title>
</head>

<body>
    <?php
    $current = "Equipments";
    require_once '../App/components/dashboard-sidemenu.php'
    ?>
    <div id="main">
        <div class="add-btn">
            <button onclick="togglePopup()">
                <span class="btn-text"> Add New </span>
                <span><i class='bx bx-message-square-add'></i></span>
            </button>
        </div>
        <div class="popup-form-container" id="popup-form-container">
            <button class="close-button">✖︎</button>
            <div class="heading">
                <p class="form-heading">List New Equipment</p>
            </div>
            <!-- <div class="form-overview">
                <p>Professional</p>
            </div>-->
            <form class="form-container" id="form-container" >
                <div class="row-inputs">

                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Category</label>
                            <select id="fruitSelect" name="equipmentTypeId">
                                <option value="None Selected">None Selected</option>

                                <?php
                                foreach ($data['category'] as $category) {
                                    echo "<option value='{$category->equipmentTypeId}'>{$category->name}</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Brand</label>
                            <input type="text" id="description" name="brand" placeholder="Explain your Requirement">
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>



                </div>


                <div class="row-inputs">
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Model</label>
                            <input type="text" id="model" name="model" placeholder="Explain your Requirement">
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>

                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Serial Number</label>
                            <input type="text" id="description" name="serialNumber" placeholder="Explain your Requirement">
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>





                </div>

                <div class="row-inputs">

                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Condition</label>
                            <select id="fruitSelect" name="presentCondition">
                                <option value="None Selected">None Selected</option>
                                <option value="New">New</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>


                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Availability</label>
                            <select id="fruitSelect" name="availabilityStatus">
                                <option value="None Selected">Available</option>
                                <option value="Under Repair">Under Repair</option>
                                <option value="Out of Service">Out of Service</option>
                            </select>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>




                </div>

                <div class="btn-container">
                    <button type="button" onclick="submitForm()">Submit</button>
                </div>
            </form>


        </div>
    </div>
    <script>
        const ROOT = "<?= ROOT ?>";
        var childElement = document.getElementById('popup-form-container'); // Replace 'yourChildElementId' with the actual id of your child element
        var parentElement = childElement.parentNode;

        console.log(parentElement);
        document.addEventListener('DOMContentLoaded', function() {
            var closeButton = document.querySelector('.close-button');

            closeButton.addEventListener('click', function() {
                togglePopup();
            });
        });

        function togglePopup() {
            var popup = document.getElementById('popup-form-container');

            if (popup.style.display === 'none' || popup.style.display === '') {
                popup.style.display = 'flex';
            } else {
                popup.style.display = 'none';
            }
        }

        function submitForm() {
            // Get form data
            const form = document.getElementById('form-container');
            console.log(form);
            const formData = new FormData(form);
            console.log(formData);
            fetch('<?= ROOT ?>/rentalmanager/equipmentsnew/add', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // assuming the server responds with JSON
                })
                .then(data => {
                    // Handle the successful response
                    console.log('Parsed JSON data:', data);
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    </script>
</body>

</html>