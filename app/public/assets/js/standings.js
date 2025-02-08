document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost/routes/apiRoutes/leaguestandings.php")
 
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById("standings-body");

            data.forEach(team => {
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td><img src="${team.logo}" alt="Team Logo" width="50"></td>
                    <td>${team.name}</td>
                    <td>${team.points}</td>
                    <td>${team.goals_scored}</td>
                    <td>${team.goals_conceded}</td>
                `;

                tbody.appendChild(row);
            });
        })
        .catch(error => console.error("Error loading standings:", error));
});
