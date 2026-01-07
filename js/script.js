// Minimal script to restore menu toggle and basic behaviour
document.addEventListener('DOMContentLoaded', function () {
  const menuBtn = document.getElementById('menu-btn');
  const menu = document.querySelector('.menu');
  if (menuBtn && menu) {
    menuBtn.addEventListener('click', () => {
      menu.classList.toggle('active');
      menu.style.display = menu.classList.contains('active') ? 'block' : '';
    });
  }

  // Simple progressive enhancement: hide menu on link click (mobile)
  document.querySelectorAll('.menu a').forEach(a => {
    a.addEventListener('click', () => {
      if (menu.classList.contains('active')) {
        menu.classList.remove('active');
        menu.style.display = '';
      }
    })
  })
});
