function handleScrollAnimation() {
  const fadeElements = document.querySelectorAll('.fade-in');
  fadeElements.forEach((element) => {
    const elementTop = element.getBoundingClientRect().top;
    const elementBottom = element.getBoundingClientRect().bottom;
    const isVisible = elementTop < window.innerHeight && elementBottom >= 0;
    if (isVisible) {
      element.classList.add('fade-in-show');
    } else {
      element.classList.remove('fade-in-show');
    }
  });
}

window.addEventListener('scroll', handleScrollAnimation);
handleScrollAnimation();