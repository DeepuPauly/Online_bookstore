<?php include 'headerpurchase.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Page</title>
    <style>
        /* Basic form styling for better presentation */
        body {
            background-image: url("log.jpg");
            font-family: Arial, sans-serif;
            margin: 0; /* Remove default margin to fill the entire viewport */
            padding: 0; /* Remove default padding */
        }
/* Add top margin to create space below the navigation bar */
            header#header {
    position: fixed;
    top: 0; /* Reduce this value to move the navigation bar higher */
    left: 0;
    width: 100%;
   background-color: rgba(0, 0, 0, 0.8); /* Transparent background color */
    transition: all 0.3s ease-in-out;
    z-index: 997;
    padding: 20px 0;
}
     header#header a {
    color: white; /* Text color for links in the navigation bar */
}

/* Change the link color on hover */
header#header a:hover {
    color: #ff9900;
    }  
        /* Create a semi-transparent black overlay */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Change the alpha value (0.5) for transparency */
            z-index: 1; /* Place the overlay on top of other content */
        }

        form {
            max-width: 500px;
            margin: 100px auto 0;;
            position: relative; /* Make sure the form is relative to the overlay */
            z-index: 2; /* Place the form above the overlay */
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Set a transparent background color for the form */
            color: white;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .input-box {
            background-color: transparent; /* Set the background color to transparent for the input box */
            padding: 20px;
            border-radius: 4px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: transparent;
            color: white;
        }

        button {
            padding: 10px 20px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: brown;
       }
    </style>
</head>
<body>
    <div class="overlay"></div> <!-- The transparent black overlay -->

    <form action="process_purchase.php" method="post">
        <center><h2>Purchase Details</h2></center>

        <!-- Enclose the inputs in a div with a transparent background -->
        <div class="input-box">
            <label for="vendor">Vendor:</label>
            <input type="text" id="vendor" name="vendor" required>

            <label for="item">Quantity</label>
            <input type="text" id="item" name="item" required>

            <label for="cost">Cost Price:</label>
            <input type="number" id="cost" name="cost" min="0.01" step="0.01" required>

            <label for="quantity">Selling Price:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <label for="total">Total Cost:</label>
            <input type="text" id="total" name="total" readonly>
        </div>

       <center> <button type="submit">Add to cart</button></center>
    </form>

    <script>
        function calculateTotal() {
            const cost = parseFloat(document.getElementById("cost").value);
            const quantity = parseInt(document.getElementById("quantity").value);
            const total = cost * quantity;

            // Update the total input field with the calculated total cost
            document.getElementById("total").value = total.toFixed(2);
        }
    </script>
</body>
</html>
