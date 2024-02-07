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
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
        }

        .buy-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
    </style>

    <title>Hello</title>
</head>

<body>
    <?php
    $current = "EquipmentListing";
    ?>
    <?php require_once '../App/components/dashboard-sidemenu.php' ?>
    <div id="main">
        <div class="add-btn">
            <button onclick="togglePopup()">
                <span class="btn-text"> Add New </span>
                <span><i class='bx bx-message-square-add'></i></span>
            </button>
        </div>

        <div class="product-card">
            <div class="product-info">
                <div class="product-title">Product Name</div>
                <div class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                <div class="product-price">$19.99</div>
                <a href="#" class="buy-button">Buy Now</a>
            </div>
        </div>

        <div class="popup-form-container" id="popup-form-container">
            <button class="close-button">✖︎</button>
            <div class="heading">
                <p class="form-heading">List New Equipment</p>
            </div>
            <!-- <div class="form-overview">
                <p>Professional</p>
            </div>-->
            <form class="form-container" id="form-container">
                <div class="row-inputs">
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Name</label>
                            <input type="text" id="description" name="name" placeholder="Explain your Requirement">
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Category</label>
                            <select id="fruitSelect" name="category">
                                <option value="None Selected">None Selected</option>
                                <option value="Power Tools">Power Tools</option>
                                <option value="Power Tools">Outdoor Tools</option>
                            </select>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>


                </div>

                <div class="row-inputs row-inputs-textarea">
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Description</label>
                            <textarea id="description" name="description" rows="4" cols="50" placeholder="Explain your Requirement"></textarea>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>
                </div>

                <div class="row-inputs row-inputs-textarea">
                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Specialilities</label>
                            <textarea id="description" name="specialities" rows="4" cols="50" placeholder="Explain your Requirement"></textarea>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>
                </div>
                <div class="row-inputs">

                    <div class="err-wrap">
                        <div class="text-fields description">
                            <label for="description"><i class='bx bxs-notepad'></i>Availability</label>
                            <select id="fruitSelect" name="availability">
                                <option value="Available">Available</option>
                                <option value="Disable">Disable</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>
                        <label class="err-msg">This is an example</label>
                    </div>


                </div>

                <div class="row-inputs row-inputs-img-upload">
                    <div class="err-wrap upload-img">
                        <label><i class='bx bxs-cloud-upload'></i>Upload Images</label>


                        <div class="file-upload">

                            <label for="imageUpload2" id="uploadLabel">
                                <img src="upload.jpeg" alt="Upload Image" id="uploadedImage2">
                            </label>
                            <input type="file" id="imageUpload2" name="imageUpload" accept="image/*" style="display: none;">
                            <button class="img-close-button hidden" id="closeButton2">✖︎</button>
                        </div>
                        <div class="file-upload">

                            <label for="imageUpload3" id="uploadLabel">
                                <img src="upload.jpeg" alt="Upload Image" id="uploadedImage3">
                            </label>
                            <input type="file" id="imageUpload3" name="imageUpload" accept="image/*" style="display: none;">

                            <button class="img-close-button hidden" id="closeButton3">✖︎</button>
                        </div>
                        <div class="file-upload">

                            <label for="imageUpload4" id="uploadLabel">
                                <img src="upload.jpeg" alt="Upload Image" id="uploadedImage4">
                            </label>
                            <input type="file" id="imageUpload4" name="imageUpload" accept="image/*" style="display: none;">
                            <button class="img-close-button hidden" id="closeButton4">✖︎</button>
                        </div>
                        <div class="file-upload">

                            <label for="imageUpload5" id="uploadLabel">
                                <img src="upload.jpeg" alt="Upload Image" id="uploadedImage5">
                            </label>
                            <input type="file" id="imageUpload5" name="imageUpload" accept="image/*" style="display: none;">
                            <button class="img-close-button hidden" id="closeButton5">✖︎</button>
                        </div>
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
            fetch('<?= ROOT ?>/rentalmanager/equipmentListing/add', {
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
                    console.log(data);
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with the fetch operation:', error);
                });
        }
    </script>
</body>

</html>