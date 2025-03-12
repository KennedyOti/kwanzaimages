// Select Gallery Row
const galleryRow = document.getElementById("gallery-row");

// Fullscreen Image Container
const fullscreenContainer = document.createElement("div");
fullscreenContainer.classList.add("fullscreen-img");
document.body.appendChild(fullscreenContainer);

// Select Loader
const loader = document.querySelector(".loader-container");

// Image Array (Non-Dynamic)
const imageSets = [
    [
        { src: "assets/images/p3.jpg", alt: "Gallery Image 1" },
        { src: "assets/images/p4.jpg", alt: "Gallery Image 2" },
        { src: "assets/images/p5.jpg", alt: "Gallery Image 3" },
        { src: "assets/images/p6.jpg", alt: "Gallery Image 4" },
        { src: "assets/images/p19.jpg", alt: "Gallery Image 5" },
        { src: "assets/images/p23.jpg", alt: "Gallery Image 6" },
    ],
    [
        { src: "assets/images/p7.jpg", alt: "Gallery Image 7" },
        { src: "assets/images/p8.jpg", alt: "Gallery Image 8" },
        { src: "assets/images/p9.jpg", alt: "Gallery Image 9" },
        { src: "assets/images/p10.jpg", alt: "Gallery Image 10" },
        { src: "assets/images/p19.jpg", alt: "Gallery Image 11" },
        { src: "assets/images/p12.jpg", alt: "Gallery Image 12" },
    ],
    [
        { src: "assets/images/p13.jpg", alt: "Gallery Image 13" },
        { src: "assets/images/p14.jpg", alt: "Gallery Image 14" },
        { src: "assets/images/p15.jpg", alt: "Gallery Image 15" },
        { src: "assets/images/p16.jpg", alt: "Gallery Image 16" },
        { src: "assets/images/p17.jpg", alt: "Gallery Image 17" },
        { src: "assets/images/p18.jpg", alt: "Gallery Image 18" },
    ],
];

let currentSet = 0; // Index of the current image set

// Function to load images with loader effect
function loadImages(index) {
    showLoader(); // Show loader before loading images

    const selectedSet = imageSets[index];
    galleryRow.innerHTML = ""; // Clear existing images

    selectedSet.forEach((imgData) => {
        const imgContainer = document.createElement("div");
        imgContainer.classList.add("gallery-item");

        const img = document.createElement("img");
        img.dataset.src = imgData.src; // Set data-src for lazy loading
        img.alt = imgData.alt;
        img.classList.add("gallery-img");
        img.loading = "lazy"; // Native lazy loading

        // Lazy load images when they appear in viewport
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        img.src = img.dataset.src; // Load image
                        img.removeAttribute("data-src");
                        observer.unobserve(img);
                    }
                });
            },
            { rootMargin: "100px", threshold: 0.1 }
        );
        observer.observe(img);

        // Click to Open in Fullscreen Mode
        img.addEventListener("click", () => {
            fullscreenContainer.innerHTML = `<img src="${imgData.src}" alt="${imgData.alt}">`;
            fullscreenContainer.classList.add("active");
        });

        imgContainer.appendChild(img);
        galleryRow.appendChild(imgContainer);
    });

    // **Force hide loader after 3 seconds, regardless of images loaded**
    setTimeout(hideLoader, 3000);
}

// Show Loader
function showLoader() {
    if (!loader) return;
    loader.style.opacity = "1";
    loader.style.visibility = "visible";
}

// Hide Loader Immediately After 3 Seconds
function hideLoader() {
    if (!loader) return;
    loader.style.opacity = "0";
    loader.style.visibility = "hidden";
}

// Close Fullscreen Mode on Click
fullscreenContainer.addEventListener("click", () => {
    fullscreenContainer.classList.remove("active");
});

// Event listeners for gallery navigation
document.getElementById("prev-btn")?.addEventListener("click", () => {
    currentSet = (currentSet - 1 + imageSets.length) % imageSets.length;
    loadImages(currentSet);
});

document.getElementById("next-btn")?.addEventListener("click", () => {
    currentSet = (currentSet + 1) % imageSets.length;
    loadImages(currentSet);
});

// Ensure loader disappears when all page resources are fully loaded OR after 3 seconds
window.addEventListener("load", () => {
    loadImages(currentSet);
    setTimeout(hideLoader, 3000); // **Force hide loader within 3 seconds**
});

// 🔥 Fix Infinite Loader on Login & Register Pages
document.addEventListener("DOMContentLoaded", function () {
    // Exclude loader when navigating to login/register
    const links = document.querySelectorAll("a.nav-link");
    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");
            if (href.includes("login") || href.includes("register")) {
                e.preventDefault();
                hideLoader();
                window.location.href = href; // Redirect normally
            } else {
                showLoader();
            }
        });
    });

    // Exclude loader from login/register form submissions
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        form.addEventListener("submit", () => {
            hideLoader(); // Ensure loader doesn't interfere with form submission
        });
    });
});
