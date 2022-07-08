import './bootstrap';

// disable import file trix text editor
document.addEventListener("trix-file-accept", e => {
	e.preventDefault();
});