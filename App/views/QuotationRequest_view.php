<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .quotation-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        .form-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #45a049;
        }
    </style>
    <title>Quotation Request</title>
</head>

<body>
    <div class="quotation-form">
        <form action="<?=ROOT?>/product/requestQuotation/create" method="post">
            <label class="form-label" for="name">Description</label>
            <input class="form-input" type="text" id="name" name="description" required>

            <label class="form-label" for="email">Estimation:</label>
            <input class="form-input" type="number" id="email" name="estimation" required>

            <label class="form-label" for="product">Category Name:</label>
            <input class="form-input" type="text" id="product" name="categoryname" required>

            <label class="form-label" for="quantity">Profession:</label>
            <input class="form-input" type="text" id="quantity" name="profession" required>

           

            <button class="form-button" type="submit">Submit Request</button>
        </form>
    </div>
</body>

</html>
