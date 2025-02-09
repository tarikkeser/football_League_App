document.addEventListener("DOMContentLoaded", function () {
    fetch("http://localhost/routes/apiRoutes/fixtures.php")
        .then(response => response.json())
        .then(data => {
            const tbody = document.getElementById("fixtures-body");
            tbody.innerHTML = "";

            const isAdmin = tbody.dataset.isAdmin === "true"; // Admin mi kontrol et

            data.forEach(match => {
                const row = document.createElement("tr");
                let rowClass = match.status === "played" ? "table-danger" : "table-success"; 
                row.classList.add(rowClass);

                let actionButton = "";
                if (isAdmin) {
                    actionButton = `<td>
                        <button class="btn btn-primary update-match-btn" data-match-id="${match.id}">Update</button>
                    </td>`;
                }

                row.innerHTML = `
                    <td>${match.match_date}</td>
                    <td>${match.home_team}</td>
                    <td>${match.away_team}</td>
                    <td>${match.home_team_stadium}</td>
                    ${actionButton}
                `;

                tbody.appendChild(row);
            });
            // Güncelleme butonları için event listener (admin ise)
            if (isAdmin) {
                document.querySelectorAll(".update-match-btn").forEach(button => {
                    button.addEventListener("click", function () {
                        const matchId = this.getAttribute("data-match-id");
                        openMatchUpdateForm(matchId);
                    });
                });
            }
        })
        .catch(error => console.error("Error loading fixtures:", error));
});


// open
function openMatchUpdateForm(matchId) {
    const formContainer = document.getElementById("update-form-container");
    document.getElementById("match-id").value = matchId;
    formContainer.classList.remove("d-none"); 
}
// close form
document.getElementById("close-form-btn").addEventListener("click", function () {
    document.getElementById("update-form-container").classList.add("d-none");
})
document.getElementById("update-match-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Sayfanın yenilenmesini engelle
    
    const matchId = document.getElementById("match-id").value;
    const homeScore = document.getElementById("home-score").value;
    const awayScore = document.getElementById("away-score").value;
    const status = document.getElementById("match-completed").checked ? "played" : "scheduled";

    fetch("http://localhost/routes/apiRoutes/fixtures.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `match_id=${matchId}&home_score=${homeScore}&away_score=${awayScore}&status=${status}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert("Match updated successfully!");
            document.getElementById("update-form-container").classList.add("d-none");
        } else {
            alert("Update failed: " + (data.error || "Unknown error"));
        }
    })
    .catch(error => console.error("Error updating match:", error));
});

;