// Admin sidebar toggle functionality
function toggleSidebar() {
    const sidebar = document.getElementById('mobileSidebar');
    if (sidebar) {
        sidebar.classList.toggle('-translate-x-full');
    }
}

// Initialize event listeners
document.addEventListener('DOMContentLoaded', () => {
    const openSidebarBtn = document.querySelector('.md:hidden button[type="button"][aria-label="Open sidebar"]');
    if (openSidebarBtn) {
        openSidebarBtn.addEventListener('click', toggleSidebar);
    }
});
