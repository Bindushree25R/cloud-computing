<!DOCTYPE html>
<html>
<head>
    <title>User Data and Image Display</title>
</head>
<body>
    <h1>User Data and Image Display</h1>
    
    <div id="userInput">
        <h2>User Entered Data:</h2>
        <p id="userData"></p>
        <img id="userImage" src="" alt="User Image">
    </div>
    
    <form id="dataForm">
        <label for="data">Enter Data:</label>
        <input type="text" id="data" name="data" required>
        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
        <button type="button" onclick="displayUserInput()">Submit</button>
    </form>
    
    <script>
        function displayUserInput() {
            const userData = document.getElementById("data").value;
            const userImage = document.getElementById("image").files[0];
            
            const userDataDisplay = document.getElementById("userData");
            const userImageDisplay = document.getElementById("userImage");
            
            userDataDisplay.textContent = userData;
            
            if (userImage) {
                const imageUrl = URL.createObjectURL(userImage);
                userImageDisplay.src = imageUrl;
            }
        }
    </script>
</body>
</html>