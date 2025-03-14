document.addEventListener('DOMContentLoaded', loadTeams);
// Get references to DOM elements
const standingsBody = document.getElementById('standings-body');
const updateTeamForm = document.getElementById('updateTeamForm');
const addTeamForm = document.getElementById('addTeamForm');
const teamIdInput = document.getElementById('team_id');
const teamNameInput = document.getElementById('team_name');
const pointsInput = document.getElementById('points');
const goalsScoredInput = document.getElementById('goals_scored');
const goalsConcededInput = document.getElementById('goals_conceded');
const deleteTeamNameInput = document.getElementById('delete_team_name');

// Load all teams and populate the standings table
async function loadTeams() {
    try {
        const response = await fetch('/api/standings');
        const teams = await response.json();
        
        standingsBody.innerHTML = teams.map(team => `
            <tr data-team-id="${team.id}" class="${isAdmin ? 'team-row admin-row' : ''}" 
                style="${isAdmin ? 'cursor: pointer;' : ''}">
                <td><img src="${team.logo}" alt="${team.name} logo" width="30"></td>
                <td>${team.name}</td>
                <td>${team.points}</td>
                <td>${team.goals_scored}</td>
                <td>${team.goals_conceded}</td>
            </tr>
        `).join('');

        // Add click event listeners to each row only if admin
        if (isAdmin) {
            document.querySelectorAll('.team-row').forEach(row => {
                row.addEventListener('click', () => loadTeamDetails(row.dataset.teamId));
            });
        }
    } catch (error) {
        console.error('Error loading teams:', error);
    }
}

// Load team details into the update form and delete form.
async function loadTeamDetails(teamId) {
    try {
        const response = await fetch(`/api/team/${teamId}`);
        const team = await response.json();
        
        // Populate form fields
        teamIdInput.value = teamId;
        teamNameInput.value = team.name;
        pointsInput.value = team.points;
        goalsScoredInput.value = team.goals_scored;
        goalsConcededInput.value = team.goals_conceded;

        // Populate delete form
        deleteTeamNameInput.value = team.name;

        
        // Scroll to the form
        updateTeamForm.scrollIntoView({ behavior: 'smooth' });
    } catch (error) {
        console.error('Error loading team details:', error);
    }
}

// Handle update
updateTeamForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const teamId = teamIdInput.value;
    const teamData = {
        points: parseInt(pointsInput.value),
        goals_scored: parseInt(goalsScoredInput.value),
        goals_conceded: parseInt(goalsConcededInput.value)
    };

    try {
        const response = await fetch(`/api/team/${teamId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(teamData)
        });

        if (response.ok) {
            // Reload the standings table
            alert('Team updated successfully.');
            loadTeams();
        } else {
            const error = await response.json();

        }
    } catch (error) {
        console.error('Error updating team:', error);
    }
}


)
    // handle add
    addTeamForm.addEventListener('submit', async (e) => {
        e.preventDefault(); 
    
        const newTeam = {
            name: document.getElementById('add_team_name').value,
            points: parseInt(document.getElementById('add_points').value),
            goals_scored: parseInt(document.getElementById('add_goals_scored').value),
            goals_conceded: parseInt(document.getElementById('add_goals_conceded').value)
        };
    
        try {
            // Yeni takımı API'ye gönderme
            const response = await fetch('/api/team', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(newTeam)
            });
    
            if (response.ok) {
                alert('Team added successfully.');
                loadTeams();

            } else {
                const error = await response.json();
                alert(error.message);
            }
        } catch (error) {
            console.error(error);
        }
    });
    document.addEventListener('DOMContentLoaded', loadTeams);

    // handle delete
    deleteTeamForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const teamName = deleteTeamNameInput.value;
        const isConfirmed = confirm(`Are you sure you want to delete ${teamName}?`);
        if (!isConfirmed) return;
    
        try {
            const response = await fetch(`/api/team/${teamIdInput.value}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
    
            if (response.ok) {
                alert(`${teamName} has been deleted successfully.`);
                loadTeams();
                toggleForm(null);
            } else {
                const error = await response.json();
                alert(error.message);
            }
        } catch (error) {
            console.error('Error deleting team:', error);
        }
    });





;
