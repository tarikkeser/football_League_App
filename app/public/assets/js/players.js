async function loadTeams() {
    try {
        const response = await fetch("/api/standings");
        const teams = await response.json();

        const teamSelect = document.getElementById("teamSelect");
        teamSelect.innerHTML = `
            <option value="">Select a team</option>
            ${teams.map(team => `<option value="${team.id}">${team.name}</option>`).join("")}
        `;
    } catch (error) {
        console.error("Error loading teams:", error);
    }
}
loadTeams();

document.getElementById("teamSelect").addEventListener("change", async function () {
    const teamId = this.value;
    if (teamId) {
        await getPlayers(teamId);
    } else {
        document.getElementById("players-body").innerHTML = "";
    }
});

async function getPlayers(teamId) {
    try {
        const response = await fetch(`/api/team/${teamId}/players`);
        const players = await response.json();

        const playersBody = document.getElementById("players-body");
        playersBody.innerHTML = players.map(player => `
            <tr class="player-row" data-player-id="${player.id}" style="${isAdmin ? 'cursor: pointer;' : ''}">
                <td>${player.name}</td>
                <td>${player.position}</td>
                <td>${player.nationality || "-"}</td>
                <td>${player.foot}</td>
            </tr>
        `).join("");

        if (isAdmin) {
            document.querySelectorAll(".player-row").forEach(row => {
                row.addEventListener("click", () => loadPlayerDetails(row.dataset.playerId));
            });
        }
    } catch (error) {
        console.error("Error loading players:", error);
    }
}

document.getElementById("addPlayerForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const teamId = document.getElementById("teamSelect").value;
    if (!teamId) {
        alert("Please select a team first!");
        return;
    }

    const newPlayer = {
        name: document.getElementById("add_player_name").value,
        position: document.getElementById("add_position").value,
        nationality: document.getElementById("add_nationality").value || "-",
        foot: document.getElementById("add_foot").value,
    };

    try {
        const response = await fetch(`/api/team/${teamId}/player`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(newPlayer),
        });

        if (response.ok) {
            alert("Player added successfully!");
            document.getElementById("addPlayerForm").reset();
            getPlayers(teamId);
        } else {
            const error = await response.json();
            alert(error.message);
        }
    } catch (error) {
        console.error("Error adding player:", error);
    }
});

// update player
document.getElementById("updatePlayerForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const playerId = document.getElementById("player_id").value;
    const teamId = document.getElementById("teamSelect").value;

    const updatedPlayer = {
        name: document.getElementById("player_name").value,
        position: document.getElementById("position").value,
        nationality: document.getElementById("nationality").value,
        foot: document.getElementById("foot").value,
    };

    try {
        const response = await fetch(`/api/player/${playerId}`, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updatedPlayer),
        });

        if (response.ok) {
            alert("Player updated successfully!");
            getPlayers(teamId);
        } else {
            const error = await response.json();
            alert(error.message);
        }
    } catch (error) {
        console.error("Error updating player:", error);
    }
});
// delete player
document.getElementById("deletePlayerForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const playerId = document.getElementById("player_id").value;
    const teamId = document.getElementById("teamSelect").value;

    try {
        const response = await fetch(`/api/player/${playerId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json", 
            },
        });

        if (response.ok) {
            alert("Player deleted successfully!");
            getPlayers(teamId); 
        } else {
            const error = await response.json();
            alert(error.message); 
        }
    } catch (error) {
        console.error("Error deleting player:", error); 
    }
});


async function loadPlayerDetails(playerId) {
    try {
        const response = await fetch(`/api/player/${playerId}`);
        const player = await response.json();

        document.getElementById('player_id').value = player.id;
        document.getElementById('player_name').value = player.name;
        document.getElementById('position').value = player.position;
        document.getElementById('nationality').value = player.nationality;
        document.getElementById('foot').value = player.foot;
        document.getElementById('delete_player_name').value = player.name;

        toggleForm('updateForm');
    } catch (error) {
        console.error('Error loading player details:', error);
    }
}
