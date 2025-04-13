// JavaScript Slider Implementation
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevButton = document.querySelector('.prev-btn');
const nextButton = document.querySelector('.next-btn');

let currentIndex = 0; // Track the current visible slide
const slidesToShow = 3; // Number of slides to display at a time
const slideWidth = slides[0].offsetWidth + 50; // Width of each slide including margin

// Function to update the slider position
const updateSliderPosition = () => {
    slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
};

// Event Listener for Next Button
nextButton.addEventListener('click', () => {
    if (currentIndex < slides.length - slidesToShow) {
        currentIndex += 1;
    } else {
        currentIndex = 0; // Loop back to the start
    }
    updateSliderPosition();
});

// Event Listener for Prev Button
prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex -= 1;
    } else {
        currentIndex = slides.length - slidesToShow; // Loop to the last visible set
    }
    updateSliderPosition();
});

// Initialize slider position
updateSliderPosition();


//-------------------------events--------------------------
// JavaScript Slider Implementation
const slider2 = document.querySelector('.slider2');
const slides2 = document.querySelectorAll('.slide2');
const prevButton2 = document.querySelector('.prev-btn2');
const nextButton2 = document.querySelector('.next-btn2');

let currentIndex2 = 0; // Track the current visible slide
const slidesToShow2 = 4; // Number of slides to display at a time
const slideWidth2 = slides2[0].offsetWidth; // Width of each slide including margin

// Function to update the slider position
const updateSliderPosition2 = () => {
    slider2.style.transform = `translateX(-${currentIndex2 * slideWidth2}px)`;
};

// Event Listener for Next Button
nextButton2.addEventListener('click', () => {
    if (currentIndex2 < slides2.length - slidesToShow2) {
        currentIndex2 += 1;
    } else {
        currentIndex2 = 0; // Loop back to the start
    }
    updateSliderPosition2();
});

// Event Listener for Prev Button
prevButton2.addEventListener('click', () => {
    if (currentIndex2 > 0) {
        currentIndex2 -= 1;
    } else {
        currentIndex2 = slides2.length - slidesToShow; // Loop to the last visible set
    }
    updateSliderPosition2();
});

// Initialize slider position
updateSliderPosition2();
 
 