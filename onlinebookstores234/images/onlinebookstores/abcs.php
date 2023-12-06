<!DOCTYPE html>
<html>
<head>
    <title>Bookstore Admin Panel - Edit Staff</title>
</head>
<body>
    <h1>Bookstore Admin Panel - Edit Staff</h1>
    
    <form>
        <label for="staffSelect">Select a staff member:</label>
        <select id="staffSelect" name="staffId">
            <option value="1">John Doe</option>
            <option value="2">Jane Smith</option>
            <option value="3">Alex Johnson</option>
            <option value="4">Emily Davis</option>
            <!-- Add more staff members as needed -->
        </select>
        <br>
        
        <label for="staffName">Staff Name:</label>
        <input type="text" id="staffName" name="staffName">
        <br>
        
        <label for="staffRole">Staff Role:</label>
        <input type="text" id="staffRole" name="staffRole">
        <br>
        
        <label for="staffEmail">Staff Email:</label>
        <input type="email" id="staffEmail" name="staffEmail">
        <br>
        
        <button type="submit">Update Staff</button>
    </form>
</body>
</html>
