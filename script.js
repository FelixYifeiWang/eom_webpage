// Tab functionality
function showTab(tabId) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => {
        tab.classList.remove('active');
    });
    document.getElementById(tabId).classList.add('active');
}

// Initializing default tab
document.addEventListener('DOMContentLoaded', () => {
    showTab('classic');
});
