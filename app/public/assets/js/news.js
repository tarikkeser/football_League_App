// Global variable to track selected news
let selectedNewsId = null;
document.addEventListener('DOMContentLoaded', loadNews);
// Load all news
async function loadNews() {
    try {
        const response = await fetch('/api/news');
        const news = await response.json();
        
        // Render news cards
        const newsList = document.getElementById('newsList');
        newsList.innerHTML = news.map(newsItem => `
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="news-card" data-news-id="${newsItem.id}" onclick="toggleSelectNews(${newsItem.id})">
                    <div class="news-card-header">
                        <h5 class="news-title">${newsItem.title}</h5>
                    </div>
                    <div class="news-content">
                        <p>${newsItem.content}</p>
                    </div>
                    <div class="news-card-footer">
                        <small class="text-muted">${new Date(newsItem.publish_date).toLocaleDateString()}</small>
                    </div>
                </div>
            </div>
        `).join('');
    } catch (error) {
        console.error('Error loading news:', error);
    }
}

// Toggle news selection
function toggleSelectNews(newsId) {
    const previousCard = document.querySelector('.news-card.selected');
    if (previousCard) {
        previousCard.classList.remove('selected');
    }

    const currentCard = document.querySelector(`.news-card[data-news-id="${newsId}"]`);
    
    if (selectedNewsId === newsId) {
        // Deselect if clicking the same card
        selectedNewsId = null;
    } else {
        // Select new card
        currentCard.classList.add('selected');
        selectedNewsId = newsId;
    }
}

// Add new news
async function addNews(event) {
    event.preventDefault();
    
    const title = document.getElementById('title').value;
    const content = document.getElementById('content').value;
    
    const newsData = { title, content };
    
    try {
        const response = await fetch('/api/news', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(newsData)
        });
        
        if (response.ok) {
            alert('News added successfully!');
            document.getElementById('addNewsForm').reset();
            loadNews(); // Reload news list after adding
            $('#addNewsModal').modal('hide'); // Close modal
        } else {
            const error = await response.json();
            alert(error.message);
        }
    } catch (error) {
        console.error('Error adding news:', error);
    }
}

// Delete selected news
async function deleteSelectedNews() {
    if (!selectedNewsId) {
        alert('Please select a news item to delete');
        return;
    }

    if (confirm('Are you sure you want to delete this news item?')) {
        try {
            const response = await fetch(`/api/news/${selectedNewsId}`, { method: 'DELETE' });
            
            if (response.ok) {
                const card = document.querySelector(`.news-card[data-news-id="${selectedNewsId}"]`);
                card.closest('.col-12').remove();
                selectedNewsId = null;
                alert('News deleted successfully!');
            } else {
                const error = await response.json();
                alert(error.message);
            }
        } catch (error) {
            console.error('Error deleting news:', error);
        }
    }
}

// Event listeners
document.getElementById('addNewsForm').addEventListener('submit', addNews);
document.getElementById('deleteNewsBtn').addEventListener('click', deleteSelectedNews);
