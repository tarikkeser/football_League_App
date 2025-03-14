document.addEventListener('DOMContentLoaded', loadTeams);
// Get references to DOM elements
const standingsBody = document.getElementById('standings-body');
// Load all teams and populate the standings table
async function loadTeams() {
    try {
        const response = await fetch('/api/standings');
        const teams = await response.json();
        standingsBody.innerHTML = teams.map(team => `
                <td><img src="${team.logo}" alt="${team.name} logo" width="30"></td>
                <td>${team.name}</td>
                <td>${team.points}</td>
                <td>${team.goals_scored}</td>
                <td>${team.goals_conceded}</td>
            </tr>
        `).join('');
    } catch (error) {
        console.error('Error loading teams:', error);
    }
}

