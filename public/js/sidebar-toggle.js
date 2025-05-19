// Mobile menu toggle
const menuBtn = document.getElementById('menuBtn');
const closeMenuBtn = document.getElementById('closeMenuBtn');
const mobileNav = document.getElementById('mobileNav');
const mobileMenuContent = document.getElementById('mobileMenuContent');
const overlay = document.getElementById('mobileNavOverlay');

// Add initial classes
overlay.classList.add('transition-opacity', 'duration-300');
mobileMenuContent.classList.add('translate-x-full');

// Open mobile menu
menuBtn.addEventListener('click', () => {
    if (mobileNav.classList.contains('hidden')) {
        mobileNav.classList.remove('hidden');
        mobileMenuContent.classList.remove('translate-x-full');
        overlay.classList.remove('opacity-0');
        overlay.classList.add('opacity-100');
    } else {
        mobileNav.classList.add('hidden');
        mobileMenuContent.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
    }
});

// Close mobile menu with close button
closeMenuBtn.addEventListener('click', () => {
    mobileNav.classList.add('hidden');
    mobileMenuContent.classList.add('translate-x-full');
    overlay.classList.remove('opacity-100');
    overlay.classList.add('opacity-0');
});

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!e.target.closest('#mobileNav') && !e.target.closest('#menuBtn')) {
        if (!mobileNav.classList.contains('hidden')) {
            mobileNav.classList.add('hidden');
            mobileMenuContent.classList.add('translate-x-full');
            overlay.classList.remove('opacity-100');
            overlay.classList.add('opacity-0');
        }
    }
});

// Close mobile menu when pressing escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        mobileNav.classList.add('hidden');
        mobileMenuContent.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0');
    }
});
