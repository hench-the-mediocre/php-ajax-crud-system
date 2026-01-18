<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - Junsay Midterm Activity</title>
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
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .header-container {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            padding: 40px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 3px solid #ffd700;
            text-align: center;
        }

        .header-container h1 {
            font-family: 'Arial Black', Arial, sans-serif;
            font-weight: 900;
            font-size: 56px;
            color: #ffd700;
            letter-spacing: 3px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
        }

        .header-container p {
            color: #fff;
            font-size: 16px;
            margin-top: 10px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .controls-section {
            display: flex;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .search-box {
            flex: 1;
            min-width: 300px;
            display: flex;
            gap: 10px;
        }

        .search-box input {
            flex: 1;
            padding: 12px 15px;
            border: 3px solid #ffd700;
            border-radius: 8px;
            background: #0f3460;
            color: #fff;
            font-size: 14px;
        }

        .search-box input::placeholder {
            color: #aaa;
        }

        .filter-group {
            display: flex;
            gap: 10px;
        }

        select {
            padding: 12px 15px;
            border: 3px solid #ffd700;
            border-radius: 8px;
            background: #0f3460;
            color: #ffd700;
            font-weight: 500;
            cursor: pointer;
        }

        select option {
            background: #0f3460;
            color: #ffd700;
        }

        button {
            padding: 12px 25px;
            border: 3px solid #ffd700;
            border-radius: 8px;
            background: #e74c3c;
            color: #ffd700;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        button:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .back-button {
            background: #16213e;
            color: #ffd700;
            border-color: #ffd700;
            margin-bottom: 20px;
        }

        .back-button:hover {
            background: #0f3460;
        }

        /* Pokémon Grid */
        .pokemon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .pokemon-card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border: 3px solid #ffd700;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .pokemon-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.3);
            border-color: #fff;
        }

        .pokemon-id {
            color: #ffd700;
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
            color: #fff;
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

        .pokemon-height-weight {
            color: #ccc;
            font-size: 12px;
            margin-top: 10px;
        }

        .loading {
            text-align: center;
            color: #ffd700;
            font-size: 18px;
            padding: 40px;
        }

        .loading-spinner {
            border: 4px solid #ffd700;
            border-top: 4px solid transparent;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .no-results {
            text-align: center;
            color: #ffd700;
            font-size: 20px;
            padding: 40px;
        }

        .gen-info {
            background: rgba(255, 215, 0, 0.1);
            border: 2px solid #ffd700;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 30px;
            color: #ffd700;
            text-align: center;
            font-weight: 500;
        }

        /* Modal for Details */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            margin: 5% auto;
            padding: 30px;
            border: 3px solid #ffd700;
            border-radius: 15px;
            width: 90%;
            max-width: 600px;
            color: #fff;
            max-height: 80vh;
            overflow-y: auto;
        }

        .close {
            color: #ffd700;
            float: right;
            font-size: 32px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #fff;
        }

        .modal-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-header h2 {
            color: #ffd700;
            text-transform: capitalize;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .modal-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .modal-image {
            text-align: center;
        }

        .modal-image img {
            max-width: 200px;
            max-height: 200px;
        }

        .modal-stats {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .stat {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 5px;
        }

        .stat-name {
            color: #ffd700;
            font-weight: 600;
        }

        .stat-value {
            color: #fff;
        }

        .modal-abilities {
            grid-column: 1 / -1;
            margin-top: 20px;
        }

        .modal-abilities h4 {
            color: #ffd700;
            margin-bottom: 10px;
        }

        .ability {
            background: rgba(255, 215, 0, 0.1);
            padding: 8px 12px;
            border-radius: 5px;
            margin-bottom: 8px;
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <a href="index.php" class="back-button">← Back to User Management</a>

    <div class="header-container">
        <h1>POKÉDEX</h1>
        <p>Generations 1-8 • Gotta Catch 'Em All!</p>
    </div>

    <div class="container">
        <div class="gen-info">
            📊 Showing all Pokémon from Generation 1 to 8 (Kanto to Galar)
        </div>

        <div class="controls-section">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search Pokémon by name or ID...">
                <button onclick="searchPokemon()">Search</button>
            </div>
            <div class="filter-group">
                <select id="typeFilter" onchange="filterByType()">
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
                <button onclick="resetFilters()">Reset</button>
            </div>
        </div>

        <div class="pokemon-grid" id="pokemonGrid">
            <div class="loading">
                <div class="loading-spinner"></div>
                Loading Pokédex data...
            </div>
        </div>
    </div>

    <!-- Pokemon Details Modal -->
    <div id="pokemonModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePokemonModal()">&times;</span>
            <div class="modal-header" id="modalHeader"></div>
            <div class="modal-body" id="modalBody"></div>
        </div>
    </div>

    <script>
        let allPokemon = [];
        let filteredPokemon = [];

        // Load all Pokémon on page load
        document.addEventListener('DOMContentLoaded', async () => {
            await loadAllPokemon();
        });

        async function loadAllPokemon() {
            try {
                const grid = document.getElementById('pokemonGrid');
                grid.innerHTML = '<div class="loading"><div class="loading-spinner"></div>Loading Pokédex data...</div>';

                // Fetch first 1025 Pokémon (Gen 1-8)
                const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=1025&offset=0');
                const data = await response.json();

                // Fetch detailed data for each Pokémon
                const promises = data.results.map(pokemon => 
                    fetch(pokemon.url).then(res => res.json())
                );

                allPokemon = await Promise.all(promises);
                filteredPokemon = allPokemon;
                displayPokemon(filteredPokemon);

            } catch (error) {
                console.error('Error loading Pokémon:', error);
                document.getElementById('pokemonGrid').innerHTML = '<div class="no-results">Failed to load Pokédex data. Please refresh the page.</div>';
            }
        }

        function displayPokemon(pokemon) {
            const grid = document.getElementById('pokemonGrid');

            if (pokemon.length === 0) {
                grid.innerHTML = '<div class="no-results">No Pokémon found matching your search.</div>';
                return;
            }

            grid.innerHTML = pokemon.map(p => {
                const types = p.types.map(t => t.type.name);
                const typeHtml = types.map(type => 
                    `<span class="type-badge type-${type}">${type}</span>`
                ).join('');

                return `
                    <div class="pokemon-card" onclick="showPokemonDetails(${p.id})">
                        <div class="pokemon-id">#${String(p.id).padStart(4, '0')}</div>
                        <div class="pokemon-image">
                            <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${p.id}.png" 
                                 alt="${p.name}" 
                                 onerror="this.src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${p.id}.png'">
                        </div>
                        <div class="pokemon-name">${p.name}</div>
                        <div class="pokemon-types">${typeHtml}</div>
                        <div class="pokemon-height-weight">
                            Height: ${(p.height / 10).toFixed(1)}m | Weight: ${(p.weight / 10).toFixed(1)}kg
                        </div>
                    </div>
                `;
            }).join('');
        }

        function showPokemonDetails(pokemonId) {
            const pokemon = allPokemon.find(p => p.id === pokemonId);
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
                `<div class="ability">${ability.ability.name}</div>`
            ).join('');

            const modalHeader = document.getElementById('modalHeader');
            const modalBody = document.getElementById('modalBody');

            modalHeader.innerHTML = `
                <h2>${pokemon.name}</h2>
                <div class="pokemon-types">${typeHtml}</div>
                <div class="pokemon-id">#${String(pokemon.id).padStart(4, '0')}</div>
            `;

            modalBody.innerHTML = `
                <div class="modal-image">
                    <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemon.id}.png" 
                         alt="${pokemon.name}"
                         onerror="this.src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemon.id}.png'">
                </div>
                <div class="modal-stats">
                    <div style="color: #ffd700; font-weight: 600; margin-bottom: 10px;">Base Stats</div>
                    ${statsHtml}
                </div>
                <div class="modal-abilities">
                    <h4>Abilities</h4>
                    ${abilitiesHtml}
                </div>
                <div style="grid-column: 1 / -1; margin-top: 20px; color: #ccc; font-size: 14px;">
                    <strong>Height:</strong> ${(pokemon.height / 10).toFixed(1)}m<br>
                    <strong>Weight:</strong> ${(pokemon.weight / 10).toFixed(1)}kg<br>
                    <strong>Base Experience:</strong> ${pokemon.base_experience}
                </div>
            `;

            document.getElementById('pokemonModal').style.display = 'block';
        }

        function closePokemonModal() {
            document.getElementById('pokemonModal').style.display = 'none';
        }

        function searchPokemon() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            filteredPokemon = allPokemon.filter(p => 
                p.name.toLowerCase().includes(searchTerm) || 
                String(p.id).includes(searchTerm)
            );
            displayPokemon(filteredPokemon);
        }

        function filterByType() {
            const selectedType = document.getElementById('typeFilter').value;
            if (!selectedType) {
                filteredPokemon = allPokemon;
            } else {
                filteredPokemon = allPokemon.filter(p =>
                    p.types.some(t => t.type.name === selectedType)
                );
            }
            displayPokemon(filteredPokemon);
        }

        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('typeFilter').value = '';
            filteredPokemon = allPokemon;
            displayPokemon(filteredPokemon);
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('pokemonModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    </script>

</body>
</html>
