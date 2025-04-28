// ================ Gallery JavaScript ================
// Handles gallery filtering, modal interactions, and image details

document.addEventListener('DOMContentLoaded', () => {
    // Initialize Gallery Filtering
    initGalleryFilters();
    
    // Initialize Gallery Modal
    initGalleryModal();
});

/**
 * Initialize gallery filtering functionality
 */
function initGalleryFilters() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            button.classList.add('active');
            
            // Get filter value
            const filterValue = button.getAttribute('data-filter');
            
            // Filter gallery items
            galleryItems.forEach(item => {
                if (filterValue === 'all' || item.classList.contains(filterValue)) {
                    item.style.display = 'block';
                    // Add fade-in animation
                    item.style.animation = 'fadeIn 0.6s ease';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
}

/**
 * Initialize gallery modal functionality
 */
function initGalleryModal() {
    const modal = document.getElementById('gallery-modal');
    const closeBtn = document.querySelector('.close-modal');
    const viewButtons = document.querySelectorAll('.gallery-view-btn');
    const modalTitle = document.getElementById('modal-title');
    const modalDescription = document.getElementById('modal-description');
    const modalFeatures = document.getElementById('modal-features');
    const modalImage = document.querySelector('.modal-image');
    
    // Gallery items data (this would usually come from a database)
    const galleryData = {
        // Cycling Items
        'cycling-1': {
            title: 'Pro Mountain Bike',
            description: 'High-performance mountain bike with carbon frame, 29" wheels, and premium suspension for navigating challenging trails with confidence and speed.',
            features: [
                'Carbon fiber frame for lightweight strength',
                'Full suspension with 150mm travel',
                'Hydraulic disc brakes for reliable stopping power',
                'Premium drivetrain with wide gear range',
                '29" tubeless-ready wheels'
            ],
            color: '#3498db'
        },
        'cycling-2': {
            title: 'Cycling Helmet',
            description: 'Lightweight, aerodynamic cycling helmet with advanced protection technology and ventilation system to keep you safe and comfortable on the road.',
            features: [
                'MIPS protection system for rotational impact',
                'Adjustable fit system for perfect comfort',
                '16 ventilation channels for cooling airflow',
                'Aerodynamic design reduces drag',
                'Lightweight construction (only 280g)'
            ],
            color: '#2980b9'
        },
        'cycling-3': {
            title: 'Cycling Attire',
            description: 'Professional-grade cycling kit with moisture-wicking fabrics, ergonomic design, and strategic padding for comfort during long rides.',
            features: [
                '4-way stretch fabric moves with your body',
                'Strategically placed seamless construction',
                'Breathable mesh panels for ventilation',
                'Ergonomic chamois pad for all-day comfort',
                'UV protection (UPF 50+)'
            ],
            color: '#1abc9c'
        },
        
        // Winter Sports Items
        'winter-1': {
            title: 'Alpine Skis',
            description: 'Versatile all-mountain skis designed for a perfect balance of performance across varied terrain and snow conditions.',
            features: [
                'All-mountain rocker/camber profile',
                'Wood core construction for responsive flex',
                '88mm waist width for versatility',
                'Reinforced edges for durability',
                'Sintered high-density base for speed'
            ],
            color: '#2ecc71'
        },
        'winter-2': {
            title: 'Ski Boots',
            description: 'Performance ski boots with custom heat-moldable liner for the perfect balance of comfort, control, and power transmission.',
            features: [
                'Custom heat-moldable liner for personalized fit',
                '100mm last width accommodates most foot shapes',
                'Flex rating: 110 for intermediate to advanced skiers',
                '4 micro-adjustable aluminum buckles',
                'Walk mode for easier hiking and walking'
            ],
            color: '#27ae60'
        },
        'winter-3': {
            title: 'Snowboard',
            description: 'Freestyle-focused snowboard with a versatile profile, perfect for riders who split their time between park features and all-mountain terrain.',
            features: [
                'True twin shape for switch riding',
                'Medium flex pattern for versatility',
                'Hybrid camber profile for pop and stability',
                'Sintered base for excellent wax absorption and speed',
                'Carbon stringers for added response'
            ],
            color: '#16a085'
        },
        
        // Water Sports Items
        'water-1': {
            title: 'Surfboard',
            description: 'Versatile shortboard designed for speed, maneuverability, and performance in a wide range of wave conditions.',
            features: [
                'EPS foam core with epoxy resin construction',
                'Dimensions: 6\'2" x 19" x 2 3/8"',
                'Thruster (tri-fin) setup included',
                'Slight concave bottom for speed and control',
                'Medium rocker profile for versatility'
            ],
            color: '#e74c3c'
        },
        'water-2': {
            title: 'Kayak',
            description: 'Stable, maneuverable recreational kayak perfect for lakes, slow-moving rivers, and calm coastal waters.',
            features: [
                '10\' length offers ideal balance of tracking and maneuverability',
                'Adjustable padded seat and backrest for comfortable paddling',
                'Front and rear storage compartments with bungee cords',
                'High-density polyethylene hull for durability',
                'Multiple footrest positions accommodate different paddlers'
            ],
            color: '#c0392b'
        },
        'water-3': {
            title: 'Diving Gear',
            description: 'Professional diving package with everything you need for underwater exploration, from mask and snorkel to fins and wetsuit.',
            features: [
                'Low-volume silicone mask with tempered glass',
                'Dry-top snorkel prevents water entry',
                'Adjustable open-heel fins with quick-release buckles',
                '3mm neoprene wetsuit for moderate water temperatures',
                'Weight-integrated BCD for streamlined profile'
            ],
            color: '#e67e22'
        },
        
        // Hiking Items
        'hiking-1': {
            title: 'Hiking Boots',
            description: 'Waterproof, durable hiking boots designed for challenging terrain and all-day comfort on the trail.',
            features: [
                'Gore-Tex waterproof membrane keeps feet dry',
                'Vibram rubber outsole for superior traction',
                'Nubuck leather upper for durability and protection',
                'Cushioned EVA midsole for comfort on long hikes',
                'Ankle support and protection from rocks and roots'
            ],
            color: '#f39c12'
        },
        'hiking-2': {
            title: 'Tent',
            description: 'Lightweight, weatherproof tent designed for backpacking and wilderness camping in various conditions.',
            features: [
                'Trail weight: only 3 lbs 2 oz for easy carrying',
                'Freestanding design sets up quickly on any terrain',
                'Waterproof rainfly with 1500mm coating',
                'Two doors with vestibules for gear storage',
                'Mesh canopy for ventilation and stargazing'
            ],
            color: '#d35400'
        },
        'hiking-3': {
            title: 'Navigation Equipment',
            description: 'GPS device and compass with preloaded topographic maps for confident wilderness navigation and route planning.',
            features: [
                '3" sunlight-readable color display',
                '20-hour battery life for weekend adventures',
                'Preloaded topographic maps with free updates',
                'Barometric altimeter and 3-axis compass',
                'Bluetooth connectivity for wireless data sharing'
            ],
            color: '#f1c40f'
        }
    };
    
    // Open modal when view button is clicked
    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const imageId = button.getAttribute('data-image');
            const itemData = galleryData[imageId];
            
            if (itemData) {
                // Update modal content
                modalTitle.textContent = itemData.title;
                modalDescription.textContent = itemData.description;
                
                // Create feature list items
                modalFeatures.innerHTML = '';
                itemData.features.forEach(feature => {
                    const li = document.createElement('li');
                    li.textContent = feature;
                    modalFeatures.appendChild(li);
                });
                
                // Set background color for image placeholder
                modalImage.innerHTML = `<i class="fas fa-spinner fa-spin fa-3x"></i>`;
                modalImage.style.backgroundColor = itemData.color;
                
                // Simulate image loading
                setTimeout(() => {
                    modalImage.innerHTML = `<i class="fas ${getCategoryIcon(imageId)} fa-5x"></i>`;
                }, 500);
                
                // Show modal
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            }
        });
    });
    
    // Close modal when close button is clicked
    closeBtn.addEventListener('click', () => {
        closeModal();
    });
    
    // Close modal when clicking outside of modal content
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            closeModal();
        }
    });
    
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    }
    
    // Get appropriate icon based on category
    function getCategoryIcon(imageId) {
        if (imageId.startsWith('cycling')) {
            if (imageId === 'cycling-1') return 'fa-bicycle';
            if (imageId === 'cycling-2') return 'fa-helmet-safety';
            return 'fa-person-biking';
        } else if (imageId.startsWith('winter')) {
            if (imageId === 'winter-1') return 'fa-snowflake';
            if (imageId === 'winter-2') return 'fa-person-skiing';
            return 'fa-person-snowboarding';
        } else if (imageId.startsWith('water')) {
            if (imageId === 'water-1') return 'fa-water';
            if (imageId === 'water-2') return 'fa-ship';
            return 'fa-person-swimming';
        } else if (imageId.startsWith('hiking')) {
            if (imageId === 'hiking-1') return 'fa-hiking';
            if (imageId === 'hiking-2') return 'fa-campground';
            return 'fa-compass';
        }
        return 'fa-image';
    }
}
