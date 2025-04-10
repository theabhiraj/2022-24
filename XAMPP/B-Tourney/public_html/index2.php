<!DOCTYPE html>
<html>
<head>
    <title>Index Page</title>
    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Style for the modal content */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Index Page</h1>
    
    <!-- Add a login button to open the modal -->
    <button onclick="openLoginModal()">Login</button>

    <!-- The modal for the login form -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <!-- Include the login form here -->
            <?php include 'login.php'; ?>
        </div>
    </div>

    <script>
        // JavaScript function to open the login modal
        function openLoginModal() {
            var modal = document.getElementById('loginModal');
            modal.style.display = 'block';
        }
    </script>
</body>
</html>
