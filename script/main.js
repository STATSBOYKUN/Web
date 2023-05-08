const toggleMenu = document.querySelector('.toggle-menu');
	const nav = document.querySelector('nav');

	toggleMenu.addEventListener('click', () => {
		nav.classList.toggle('show');
	});