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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin: 0;
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
            width: 700px;
            max-height: 90vh;
            overflow-y: auto;
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
            flex-wrap: wrap;
        }

        .form-buttons button {
            flex: 1;
            min-width: 120px;
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

        /* Search Animation */
        @keyframes searchFade {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        tbody tr {
            animation: searchFade 0.4s ease-out;
        }

        tbody tr:nth-child(1) { animation-delay: 0.05s; }
        tbody tr:nth-child(2) { animation-delay: 0.1s; }
        tbody tr:nth-child(3) { animation-delay: 0.15s; }
        tbody tr:nth-child(4) { animation-delay: 0.2s; }
        tbody tr:nth-child(5) { animation-delay: 0.25s; }
        tbody tr:nth-child(n+6) { animation-delay: 0.3s; }

        /* Pokédex Styles */
        .pokedex-section {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 3px solid #8b4545;
        }

        .pokedex-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 3px solid #ffd700;
            text-align: center;
        }

        .pokedex-header h2 {
            font-family: 'Arial Black', Arial, sans-serif;
            font-weight: 900;
            font-size: 42px;
            color: #ffd700;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
        }

        .pokedex-header p {
            color: #fff;
            font-size: 14px;
            margin-top: 8px;
        }

        .pokedex-controls {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .pokedex-search {
            flex: 1;
            min-width: 300px;
            display: flex;
            gap: 10px;
        }

        .pokedex-search input {
            flex: 1;
            padding: 12px 15px;
            border: 2px solid #ffd700;
            border-radius: 8px;
            background: #3d2428;
            color: #f5d5d8;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 14px;
        }

        .pokedex-search input::placeholder {
            color: #a57070;
        }

        .pokedex-filter {
            display: flex;
            gap: 10px;
        }

        .pokedex-filter select {
            padding: 12px 15px;
            border: 2px solid #ffd700;
            border-radius: 8px;
            background: #3d2428;
            color: #f5d5d8;
            font-weight: 500;
            cursor: pointer;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .pokedex-filter select option {
            background: #3d2428;
            color: #f5d5d8;
        }

        .btn-pokemon-search {
            background: #c94545;
            color: white;
            border-color: #8b4545;
        }

        .btn-pokemon-search:hover {
            background: #e85555;
        }

        .btn-pokemon-reset {
            background: #5a8a8a;
            color: white;
            border-color: #8b4545;
        }

        .btn-pokemon-reset:hover {
            background: #6fa8a8;
        }

        .pokemon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .pokemon-card {
            background: linear-gradient(135deg, #3d2428 0%, #5a3535 100%);
            border: 2px solid #8b4545;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .pokemon-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(201, 69, 69, 0.3);
            border-color: #f5d5d8;
        }

        .pokemon-id {
            color: #c94545;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .pokemon-image {
            width: 150px;
            height: 150px;
            margin: 0 auto 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pokemon-image img {
            max-width: 100%;
            max-height: 100%;
            image-rendering: crisp-edges;
        }

        .pokemon-name {
            color: #f5d5d8;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: capitalize;
        }

        .pokemon-types {
            display: flex;
            gap: 8px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .type-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
        }

        .type-normal { background: #A8A878; }
        .type-fire { background: #F08030; }
        .type-water { background: #6890F0; }
        .type-grass { background: #78C850; }
        .type-electric { background: #F8D030; color: #333; }
        .type-ice { background: #98D8D8; }
        .type-fighting { background: #C03028; }
        .type-poison { background: #A040A0; }
        .type-ground { background: #E0C068; }
        .type-flying { background: #A890F0; }
        .type-psychic { background: #F85888; }
        .type-bug { background: #A8B820; }
        .type-rock { background: #B8A038; }
        .type-ghost { background: #705898; }
        .type-dragon { background: #7038F8; }
        .type-dark { background: #705848; }
        .type-steel { background: #B8B8D0; }
        .type-fairy { background: #EE99AC; }

        .pokemon-description {
            color: #c9a8a8;
            font-size: 12px;
            margin-top: 10px;
            min-height: 40px;
            line-height: 1.4;
        }

        .pokemon-loading {
            text-align: center;
            color: #f5d5d8;
            font-size: 16px;
            padding: 40px;
        }

        .pokemon-loading-spinner {
            border: 4px solid #c94545;
            border-top: 4px solid transparent;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: pokemonSpin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes pokemonSpin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .pokemon-no-results {
            text-align: center;
            color: #c94545;
            font-size: 18px;
            padding: 40px;
        }

        /* Success Notification */
        .success-notification {
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
            animation: slideInRight 0.5s ease forwards;
            text-align: center;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        @keyframes slideInRight {
            from {
                right: -400px;
                opacity: 0;
            }
            to {
                right: 30px;
                opacity: 1;
            }
        }

        @keyframes slideOutRight {
            from {
                right: 30px;
                opacity: 1;
            }
            to {
                right: -400px;
                opacity: 0;
            }
        }

        .success-notification.hide {
            animation: slideOutRight 0.5s ease forwards;
        }

        .success-notification h3 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .success-notification p {
            font-size: 16px;
            margin-bottom: 0;
        }

        .success-notification .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .error-notification {
            position: fixed;
            right: -400px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #7a4a4a 0%, #5a2d2d 100%);
            color: #f5a8a8;
            padding: 30px;
            border-radius: 15px;
            border: 2px solid #9a5a5a;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.7);
            min-width: 350px;
            z-index: 2000;
            animation: slideInRight 0.5s ease forwards;
            text-align: center;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        .error-notification.hide {
            animation: slideOutRight 0.5s ease forwards;
        }

        .error-notification h3 {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .error-notification p {
            font-size: 16px;
            margin-bottom: 0;
        }

        .error-notification .icon {
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

        <!-- Pokédex Section -->
        <div class="pokedex-section">
            <div class="pokedex-header">
                <h2>POKÉDEX</h2>
                <p>Generations 1-8 • Gotta Catch 'Em All!</p>
            </div>

            <div class="pokedex-controls">
                <div class="pokedex-search">
                    <input type="text" id="pokemonSearchInput" placeholder="Search Pokémon by name or ID...">
                    <button class="btn-pokemon-search" onclick="searchPokemonList()">Search</button>
                </div>
                <div class="pokedex-filter">
                    <select id="pokemonTypeFilter" onchange="filterPokemonByType()">
                        <option value="">All Types</option>
                        <option value="normal">Normal</option>
                        <option value="fire">Fire</option>
                        <option value="water">Water</option>
                        <option value="grass">Grass</option>
                        <option value="electric">Electric</option>
                        <option value="ice">Ice</option>
                        <option value="fighting">Fighting</option>
                        <option value="poison">Poison</option>
                        <option value="ground">Ground</option>
                        <option value="flying">Flying</option>
                        <option value="psychic">Psychic</option>
                        <option value="bug">Bug</option>
                        <option value="rock">Rock</option>
                        <option value="ghost">Ghost</option>
                        <option value="dragon">Dragon</option>
                        <option value="dark">Dark</option>
                        <option value="steel">Steel</option>
                        <option value="fairy">Fairy</option>
                    </select>
                    <button class="btn-pokemon-reset" onclick="resetPokemonFilters()">Reset</button>
                </div>
            </div>

            <div class="pokemon-grid" id="pokemonGrid">
                <div class="pokemon-loading">
                    <div class="pokemon-loading-spinner"></div>
                    Loading Pokédex data...
                </div>
            </div>
        </div>

        <!-- Pokemon Details Modal -->
        <div id="pokemonModal" class="modal">
            <div class="modal-content">
                <span class="close-btn" onclick="closePokemonModal()">&times;</span>
                <div class="modal-header" id="pokemonModalHeader"></div>
                <div style="padding: 20px; color: #e0b0b5;" id="pokemonModalBody"></div>
            </div>
        </div>
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
                    <button type="button" class="btn-secondary" onclick="resetForm()">Clear Form</button>
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
            showErrorNotification('Validation Error', 'Please fill in all fields');
            return;
        }

        if (!userId && !password) {
            showErrorNotification('Validation Error', 'Password is required for new users');
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
        const isUpdate = !!userId;

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
                if (isUpdate) {
                    showSuccessNotification('User Updated!', '✏️ User information has been updated successfully');
                } else {
                    showSuccessNotification('User Added!', '✅ New user has been added successfully');
                }
            } else {
                showErrorNotification('Error', data.message || 'An error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorNotification('Error', 'An error occurred while saving the user');
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
                    showSuccessNotification('User Deleted!', '🗑️ User has been deleted successfully');
                } else {
                    showErrorNotification('Error', data.message || 'An error occurred');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorNotification('Error', 'An error occurred while deleting the user');
            });
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
        document.getElementById('password').required = true;
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('userModal');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
        const pokemonModal = document.getElementById('pokemonModal');
        if (event.target == pokemonModal) {
            pokemonModal.style.display = 'none';
        }
    }

    // ===== POKÉDEX FUNCTIONS =====
    let allPokemonList = [];
    let filteredPokemonList = [];

    // Load Pokédex on page load
    async function loadPokedexData() {
        try {
            const grid = document.getElementById('pokemonGrid');
            grid.innerHTML = '<div class="pokemon-loading"><div class="pokemon-loading-spinner"></div>Loading Pokédex data...</div>';

            // Fetch first 1025 Pokémon (Gen 1-8)
            const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=1025&offset=0');
            const data = await response.json();

            // Fetch detailed data for each Pokémon
            const promises = data.results.map(pokemon => 
                fetch(pokemon.url).then(res => res.json())
            );

            const pokemonData = await Promise.all(promises);

            // Fetch species data for descriptions
            const speciesPromises = pokemonData.map(p =>
                fetch(`https://pokeapi.co/api/v2/pokemon-species/${p.id}`).then(res => res.json())
            );

            const speciesData = await Promise.all(speciesPromises);

            // Combine Pokémon and species data
            allPokemonList = pokemonData.map((pokemon, index) => ({
                ...pokemon,
                description: speciesData[index]?.flavor_text_entries?.find(entry => entry.language.name === 'en')?.flavor_text?.replace(/\n/g, ' ') || 'No description available.'
            }));

            filteredPokemonList = allPokemonList;
            displayPokemonList(filteredPokemonList);

        } catch (error) {
            console.error('Error loading Pokédex:', error);
            document.getElementById('pokemonGrid').innerHTML = '<div class="pokemon-no-results">Failed to load Pokédex data. Please refresh the page.</div>';
        }
    }

    function displayPokemonList(pokemonList) {
        const grid = document.getElementById('pokemonGrid');

        if (pokemonList.length === 0) {
            grid.innerHTML = '<div class="pokemon-no-results">No Pokémon found matching your search.</div>';
            return;
        }

        grid.innerHTML = pokemonList.map(p => {
            const types = p.types.map(t => t.type.name);
            const typeHtml = types.map(type => 
                `<span class="type-badge type-${type}">${type}</span>`
            ).join('');

            return `
                <div class="pokemon-card" onclick="showPokemonDetailsModal(${p.id})">
                    <div class="pokemon-id">#${String(p.id).padStart(4, '0')}</div>
                    <div class="pokemon-image">
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${p.id}.png" 
                             alt="${p.name}" 
                             onerror="this.src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${p.id}.png'">
                    </div>
                    <div class="pokemon-name">${p.name}</div>
                    <div class="pokemon-types">${typeHtml}</div>
                    <div class="pokemon-description">${p.description.substring(0, 80)}${p.description.length > 80 ? '...' : ''}</div>
                </div>
            `;
        }).join('');
    }

    function showPokemonDetailsModal(pokemonId) {
        const pokemon = allPokemonList.find(p => p.id === pokemonId);
        if (!pokemon) return;

        const types = pokemon.types.map(t => t.type.name);
        const typeHtml = types.map(type => 
            `<span class="type-badge type-${type}">${type}</span>`
        ).join('');

        const statsHtml = pokemon.stats.map(stat => `
            <div class="stat">
                <span class="stat-name">${stat.stat.name.toUpperCase()}</span>
                <span class="stat-value">${stat.base_stat}</span>
            </div>
        `).join('');

        const abilitiesHtml = pokemon.abilities.map(ability => 
            `<div style="background: rgba(201, 69, 69, 0.2); padding: 8px 12px; border-radius: 5px; margin-bottom: 8px; text-transform: capitalize;">${ability.ability.name}</div>`
        ).join('');

        const modalHeader = document.getElementById('pokemonModalHeader');
        const modalBody = document.getElementById('pokemonModalBody');

        modalHeader.innerHTML = `
            <div style="text-align: center; margin-bottom: 20px;">
                <div style="color: #c94545; font-size: 14px; font-weight: 600; margin-bottom: 5px;">#${String(pokemon.id).padStart(4, '0')}</div>
                <h3 style="color: #f5d5d8; text-transform: capitalize; font-size: 28px; margin: 10px 0;">${pokemon.name}</h3>
                <div class="pokemon-types">${typeHtml}</div>
            </div>
        `;

        modalBody.innerHTML = `
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
                <div style="text-align: center;">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemon.id}.png" 
                         alt="${pokemon.name}"
                         style="max-width: 150px; max-height: 150px;"
                         onerror="this.src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemon.id}.png'">
                </div>
                <div>
                    <div style="color: #c94545; font-weight: 600; margin-bottom: 15px;">Base Stats</div>
                    ${statsHtml}
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <div style="color: #c94545; font-weight: 600; margin-bottom: 10px;">Description</div>
                <div style="background: rgba(201, 69, 69, 0.1); padding: 15px; border-radius: 8px; border-left: 3px solid #c94545; line-height: 1.6;">
                    ${pokemon.description}
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="color: #c94545; font-weight: 600; margin-bottom: 10px;">Abilities</div>
                ${abilitiesHtml}
            </div>

            <div style="border-top: 2px solid #8b4545; padding-top: 15px; font-size: 14px;">
                <div style="margin-bottom: 8px;"><strong style="color: #c94545;">Height:</strong> ${(pokemon.height / 10).toFixed(1)}m</div>
                <div style="margin-bottom: 8px;"><strong style="color: #c94545;">Weight:</strong> ${(pokemon.weight / 10).toFixed(1)}kg</div>
                <div><strong style="color: #c94545;">Base Experience:</strong> ${pokemon.base_experience}</div>
            </div>
        `;

        document.getElementById('pokemonModal').style.display = 'block';
    }

    function closePokemonModal() {
        document.getElementById('pokemonModal').style.display = 'none';
    }

    function searchPokemonList() {
        const searchTerm = document.getElementById('pokemonSearchInput').value.toLowerCase();
        filteredPokemonList = allPokemonList.filter(p => 
            p.name.toLowerCase().includes(searchTerm) || 
            String(p.id).includes(searchTerm)
        );
        displayPokemonList(filteredPokemonList);
    }

    function filterPokemonByType() {
        const selectedType = document.getElementById('pokemonTypeFilter').value;
        if (!selectedType) {
            filteredPokemonList = allPokemonList;
        } else {
            filteredPokemonList = allPokemonList.filter(p =>
                p.types.some(t => t.type.name === selectedType)
            );
        }
        displayPokemonList(filteredPokemonList);
    }

    function resetPokemonFilters() {
        document.getElementById('pokemonSearchInput').value = '';
        document.getElementById('pokemonTypeFilter').value = '';
        filteredPokemonList = allPokemonList;
        displayPokemonList(filteredPokemonList);
    }

    // Load Pokédex when page is fully loaded
    setTimeout(() => {
        loadPokedexData();
    }, 500);

    // Success and Error Notification Functions
    function showSuccessNotification(title, message) {
        const notification = document.createElement('div');
        notification.className = 'success-notification';
        notification.innerHTML = `
            <div class="icon">✓</div>
            <h3>${title}</h3>
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

    function showErrorNotification(title, message) {
        const notification = document.createElement('div');
        notification.className = 'error-notification';
        notification.innerHTML = `
            <div class="icon">⚠️</div>
            <h3>${title}</h3>
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


</script>

</body>
</html>