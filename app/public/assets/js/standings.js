document.addEventListener('DOMContentLoaded', loadTeams);
// Get references to DOM elements
const standingsBody = document.getElementById('standings-body');
const addTeamForm = document.getElementById('addTeamForm');
const teamIdInput = document.getElementById('team_id');
const teamNameInput = document.getElementById('team_name');
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

// Load team details into the  delete form.
async function loadTeamDetails(teamId) {
    try {
        const response = await fetch(`/api/team/${teamId}`);
        const team = await response.json();

        teamIdInput.value = teamId;
        deleteTeamNameInput.value = team.name;
        document.getElementById('deleteForm').style.display = 'block';
    } catch (error) {
        console.error('Error loading team details:', error);
    }
}
    // handle add
    addTeamForm.addEventListener('submit', async (e) => {
        e.preventDefault(); 
    
        const newTeam = {
            name: document.getElementById('add_team_name').value,
             };
    
        try {
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

    document.addEventListener("DOMContentLoaded", function () {
     
        const addForm = document.getElementById("addForm");
        const deleteForm = document.getElementById("deleteForm");
    
        const showAddFormBtn = document.getElementById("showAddFormBtn");
        const showDeleteFormBtn = document.getElementById("showDeleteFormBtn");
    
        function hideAllForms() {
            addForm.style.display = "none";
            deleteForm.style.display = "none";
        }
    
  
        showAddFormBtn.addEventListener("click", function () {
            hideAllForms();
            addForm.style.display = "block";
        });

    

        showDeleteFormBtn.addEventListener("click", function () {
            hideAllForms();
            deleteForm.style.display = "block";
        });
    });
    





;
