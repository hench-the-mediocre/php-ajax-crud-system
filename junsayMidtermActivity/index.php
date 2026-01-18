<?php

include 'connection.php'    ;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Junsay Midterm Activity</title>
    <link href="https://fonts.googleapis.com/css2?family=Helvetica+Neue:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #2d1b1f 0%, #3d1f25 50%, #2d1b1f 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .header-container {
            background: linear-gradient(135deg, #4a2528 0%, #6b3535 100%);
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 2px solid #8b4545;
        }

        .header-container h1 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 300;
            font-size: 48px;
            color: #f5d5d8;
            letter-spacing: 2px;
            text-transform: capitalize;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-section {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            justify-content: space-between;
            align-items: center;
        }

        .search-box {
            flex: 1;
            display: flex;
            gap: 10px;
        }

        .search-box input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #8b4545;
            border-radius: 8px;
            background: #3d2428;
            color: #f5d5d8;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
        }

        .search-box input::placeholder {
            color: #a57070;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        button {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-primary {
            background: #c94545;
            color: white;
        }

        .btn-primary:hover {
            background: #e85555;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(201, 69, 69, 0.4);
        }

        .btn-secondary {
            background: #5a8a8a;
            color: white;
        }

        .btn-secondary:hover {
            background: #6fa8a8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(111, 168, 168, 0.4);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            padding: 8px 12px;
            font-size: 12px;
        }

        .btn-danger:hover {
            background: #ff4757;
        }

        .btn-edit {
            background: #c94545;
            color: white;
            padding: 8px 12px;
            font-size: 12px;
        }

        .btn-edit:hover {
            background: #e85555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #3d2428;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 2px solid #8b4545;
        }

        th {
            background: linear-gradient(135deg, #4a2528 0%, #5a3535 100%);
            color: #f5d5d8;
            padding: 18px;
            text-align: left;
            font-weight: 500;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            letter-spacing: 1px;
            border-bottom: 2px solid #8b4545;
        }

        td {
            padding: 15px 18px;
            color: #e0b0b5;
            border-bottom: 1px solid #5a3535;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        tbody tr:hover {
            background: #4a2f33;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .user-type-admin {
            background: #c94545;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 500;
            display: inline-block;
            text-align: center;
            min-width: 70px;
        }

        .user-type-student {
            background: #00bcd4;
            color: #1a1a1a;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 500;
            display: inline-block;
            text-align: center;
            min-width: 70px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            background: linear-gradient(135deg, #4a2528 0%, #5a3535 100%);
            margin: 5% auto;
            padding: 40px;
            border: 2px solid #8b4545;
            border-radius: 15px;
            width: 500px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            font-size: 28px;
            font-weight: 300;
            color: #f5d5d8;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #f5d5d8;
            margin-bottom: 8px;
            font-weight: 500;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #8b4545;
            border-radius: 8px;
            background: #3d2428;
            color: #f5d5d8;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
        }

        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #a57070;
        }

        select option {
            background: #3d2428;
            color: #f5d5d8;
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .form-buttons button {
            flex: 1;
        }

        .close-btn {
            color: #f5d5d8;
            float: right;
            font-size: 32px;
            font-weight: 300;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            margin-top: -10px;
        }

        .close-btn:hover {
            color: #ffffff;
        }

        /* Success Notification Carousel */
        .notification-carousel {
            position: fixed;
            right: -400px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #4a7a4a 0%, #2d5a2d 100%);
            color: #c8f5c8;
            padding: 30px;
            border-radius: 15px;
            border: 2px solid #5a9a5a;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
            min-width: 350px;
            z-index: 2000;
            animation: slideInFromRight 0.5s ease forwards;
            text-align: center;
        }

        @keyframes slideInFromRight {
            from {
                right: -400px;
                opacity: 0;
            }
            to {
                right: 30px;
                opacity: 1;
            }
        }

        @keyframes slideOutToRight {
            from {
                right: 30px;
                opacity: 1;
            }
            to {
                right: -400px;
                opacity: 0;
            }
        }

        .notification-carousel.hide {
            animation: slideOutToRight 0.5s ease forwards;
        }

        .notification-carousel h3 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .notification-carousel p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .notification-carousel .checkmark {
            font-size: 48px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <h1>Junsay Midterm Activity</h1>
    </div>

    <div class="container">
        <!-- Search and Button Section -->
        <div class="search-section">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search users...">
                <button class="btn-primary" onclick="searchUsers()">Search</button>
            </div>
            <div class="button-group">
                <button class="btn-primary" onclick="openAddForm()">+ Add User</button>
            </div>
        </div>

        <!-- User Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Display Name</th>
                    <th>User Type</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
            </tbody>
        </table>
    </div>

    <!-- User Form Modal -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div class="modal-header" id="modalTitle">Add New User</div>
            <form id="userForm">
                <input type="hidden" id="userId" name="userId">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" id="username" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" id="password" required>
                </div>
                <div class="form-group">
                    <label>Display Name:</label>
                    <input type="text" id="displayName" required>
                </div>
                <div class="form-group">
                    <label>User Type:</label>
                    <select id="userType" required>
                        <option value="">Select User Type</option>
                        <option value="Admin">Admin</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                <div class="form-buttons">
                    <button type="button" class="btn-primary" onclick="saveUser()">Save User</button>
                    <button type="button" class="btn-secondary" onclick="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', loadUsers);

    function loadUsers() {
        fetch('api/search.php')
            .then(response => response.json())
            .then(data => {
                displayUsers(data);
            })
            .catch(error => console.error('Error:', error));
    }

    function displayUsers(users) {
        const tbody = document.getElementById('userTableBody');
        tbody.innerHTML = '';

        users.forEach(user => {
            const userTypeClass = user.user_type === 'Admin' ? 'user-type-admin' : 'user-type-student';
            const row = `
                <tr>
                    <td>${user.user_id}</td>
                    <td>${user.username}</td>
                    <td>${user.display_name}</td>
                    <td><span class="${userTypeClass}">${user.user_type}</span></td>
                    <td>${user.date_created}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-edit" onclick='editUser(${JSON.stringify(user).replace(/'/g, "&#39;")})'>Edit</button>
                            <button class="btn-danger" onclick="deleteUser(${user.user_id})">Delete</button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.innerHTML += row;
        });
    }

    function openAddForm() {
        document.getElementById('userId').value = '';
        document.getElementById('userForm').reset();
        document.getElementById('modalTitle').textContent = 'Add New User';
        document.getElementById('userModal').style.display = 'block';
        document.getElementById('password').required = true;
    }

    function editUser(user) {
        document.getElementById('userId').value = user.user_id;
        document.getElementById('username').value = user.username;
        document.getElementById('displayName').value = user.display_name;
        document.getElementById('userType').value = user.user_type;
        document.getElementById('password').value = '';
        document.getElementById('password').required = false;
        document.getElementById('modalTitle').textContent = 'Edit User';
        document.getElementById('userModal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('userModal').style.display = 'none';
        resetForm();
    }

    function saveUser() {
        const userId = document.getElementById('userId').value;
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const displayName = document.getElementById('displayName').value;
        const userType = document.getElementById('userType').value;

        // Validation
        if (!username || !displayName || !userType) {
            alert('Please fill in all fields');
            return;
        }

        if (!userId && !password) {
            alert('Password is required for new users');
            return;
        }

        const userData = {
            username: username,
            display_name: displayName,
            user_type: userType
        };

        if (password) {
            userData.password = password;
        }

        const url = userId ? `api/update.php?id=${userId}` : 'api/insert.php';

        fetch(url, {
            method: userId ? 'PUT' : 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(userData)
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                closeModal();
                loadUsers();
                showSuccessNotification(userId ? 'User Updated Successfully!' : 'User Added Successfully!');
            } else {
                alert(data.message || 'Error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving the user');
        });
    }

    function deleteUser(id) {
        if(confirm('Are you sure you want to delete this user?')) {
            fetch(`api/delete.php?id=${id}`, {
                method: 'DELETE'
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    loadUsers();
                    showSuccessNotification('User Deleted Successfully!');
                } else {
                    alert(data.message || 'Error occurred');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    function searchUsers() {
        const searchTerm = document.getElementById('searchInput').value;
        fetch(`api/search.php?search=${encodeURIComponent(searchTerm)}`)
            .then(response => response.json())
            .then(data => {
                displayUsers(data);
            })
            .catch(error => console.error('Error:', error));
    }

    function resetForm() {
        document.getElementById('userForm').reset();
        document.getElementById('userId').value = '';
    }

    function showSuccessNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'notification-carousel';
        notification.innerHTML = `
            <div class="checkmark">✓</div>
            <h3>Success!</h3>
            <p>${message}</p>
        `;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('hide');
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 3000);
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('userModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
</script>

</body>
</html>