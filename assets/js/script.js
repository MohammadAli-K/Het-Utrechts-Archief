const openModalButtons = document.querySelectorAll('[data-modal-target]');
const closeModalButtons = document.querySelectorAll('[data-close-button]');
const overlay = document.getElementById('overlay');

openModalButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget);
    openModal(modal);
  });
});

closeModalButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal');
    closeModal(modal);
  });
});

function openModal(modal) {
  if (modal == null) return;
  modal.classList.add('active');
  overlay.classList.add('active');
}

function closeModal(modal) {
  if (modal == null) return;
  modal.classList.remove('active');
  overlay.classList.remove('active');
}

// /////////////////////////////////////////////////////////////////////

const sidebar = document.querySelector('.sidebar');
const blockDom = document.querySelector('.sidebar .block-dom');
const closeSideBar = document.querySelector(
  '.sidebar .sidebar-content .close-sidebar'
);
const showSideBar = document.querySelector('.show-sidebar');

showSideBar.addEventListener('click', () => sidebar.classList.add('show'));

closeSideBar.addEventListener('click', () => sidebar.classList.remove('show'));

blockDom.addEventListener('click', () => sidebar.classList.remove('show'));
