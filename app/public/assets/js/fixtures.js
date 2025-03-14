
async function fetchMatches() {
    try {
        const response = await fetch('/api/matches');
        if (!response.ok) {
            throw new Error('Failed to fetch matches');
        }
        const matches = await response.json();
        const container = document.getElementById('matches-container');
        container.innerHTML = '';

        matches.forEach(function(match) {
            const matchCard = `
                <div class="col-md-4">
                    <div class="match-card">
                        <div class="match-header">
                            ${match.home_team} vs ${match.away_team}
                        </div>
                        <div class="match-details">
                            <span><strong>Match Date:</strong> ${new Date(match.match_date).toLocaleString()}</span><br>
                            <span><strong>Location:</strong> ${match.stadium}</span>
                        </div>
                        <div class="score">
                            ${match.home_team_score ? match.home_team_score : 'N/A'} - ${match.away_team_score ? match.away_team_score : 'N/A'}
                        </div>
                        <div>
                            ${
                                // if admin ?
                                isAdmin 
                                ? (match.played == 0 
                                    ? `<button class="btn btn-success btn-sm" onclick="showScoreModal(${match.id}, 'play')">Play Match</button>` 
                                    : `<button class="btn btn-warning btn-sm" onclick="undoMatch(${match.id})">Undo Play</button>`)
                                : (match.played == 0 
                                    ? '' 
                                    : `<button class="btn btn-secondary btn-sm" disabled>Match Played</button>`)
                            }
                        </div>
                    </div>
                </div>
            `;
            container.innerHTML += matchCard;
        });
    } catch (error) {
        console.error('Error fetching matches:', error);
        alert('Error fetching match fixtures.');
    }
}

function showScoreModal(matchId, actionType = 'play') {
    document.getElementById('modalMatchId').value = matchId;
    document.getElementById('modalAction').value = actionType;
    
    document.getElementById('scoreModalLabel').textContent = 'Enter Match Score';
    
    const scoreModal = new bootstrap.Modal(document.getElementById('scoreModal'));
    scoreModal.show();
}

async function undoMatch(matchId) {
    if (confirm('Are you sure you want to undo this match? The score will be reset to 0-0 and team stats will be reverted.')) {
        try {
            const response = await fetch(`/api/match/${matchId}/reset`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            if (!response.ok) {
                throw new Error('Failed to reset match');
            }
            const data = await response.json();
            console.log('Match reset successfully:', data);
            
            fetchMatches();
        } catch (error) {
            console.error('Error resetting match:', error);
            alert('Error resetting match.');
        }
    }
}

document.getElementById('scoreForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const matchId = document.getElementById('modalMatchId').value;
    const homeScore = document.getElementById('homeScore').value;
    const awayScore = document.getElementById('awayScore').value;
    const actionType = document.getElementById('modalAction').value;
    
 
    const played = (actionType === 'play') ? 1 : 0;
    
    const payload = {
        home_score: parseInt(homeScore, 10),
        away_score: parseInt(awayScore, 10),
        played: played
    };

    try {
        const response = await fetch(`/api/match/${matchId}/score`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });
        if (!response.ok) {
            throw new Error('Failed to update match score');
        }
        const data = await response.json();
        console.log('Match score updated:', data);

        const scoreModalEl = document.getElementById('scoreModal');
        const modalInstance = bootstrap.Modal.getInstance(scoreModalEl);
        modalInstance.hide();
  
        fetchMatches();
    } catch (error) {
        console.error('Error updating match score:', error);
        alert('Error updating match score.');
    }
});


document.addEventListener('DOMContentLoaded', function() {
    fetchMatches();
});