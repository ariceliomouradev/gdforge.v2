'use strict';
document.documentElement.classList.add('js');
const toggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('#navigation');
const mobile = window.matchMedia('(max-width: 1050px)');
if (toggle && navigation) {
  toggle.hidden = false;
  const background = document.querySelectorAll('main, footer, .site-header .logo, .skip');
  const setOpen = open => {
    toggle.setAttribute('aria-expanded', String(open));
    toggle.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
    toggle.classList.toggle('active', open);
    navigation.toggleAttribute('data-collapsed', !open);
    document.body.classList.toggle('menu-open', open && mobile.matches);
    background.forEach(element => element.toggleAttribute('inert', open && mobile.matches));
  };
  setOpen(false);
  toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));
  navigation.addEventListener('click', event => {
    const link = event.target.closest('a');
    if (!link) return;
    setOpen(false);
    const href = link.getAttribute('href');
    if (href && href.startsWith('#')) {
      const destination = document.getElementById(href.slice(1));
      if (destination) {
        destination.setAttribute('tabindex', '-1');
        destination.focus({ preventScroll: true });
      }
    }
  });
  mobile.addEventListener('change', () => setOpen(false));
  document.addEventListener('keydown', event => {
    if (!mobile.matches || toggle.getAttribute('aria-expanded') !== 'true') return;
    if (event.key === 'Escape') {
      setOpen(false);
      toggle.focus();
    }
    if (event.key === 'Tab') {
      const controls = [toggle, ...navigation.querySelectorAll('a')];
      const first = controls[0];
      const last = controls[controls.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault(); last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault(); first.focus();
      }
    }
  });
}
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
if (!reducedMotion.matches && 'IntersectionObserver' in window) {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-revealed');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.gs-up').forEach(element => observer.observe(element));
}
const cursor = document.querySelector('#cursor');
const finePointer = window.matchMedia('(pointer: fine)');
if (cursor) {
  document.addEventListener('pointermove', event => {
    const enabled = finePointer.matches && !reducedMotion.matches && event.pointerType === 'mouse';
    document.documentElement.classList.toggle('cursor-ready', enabled);
    if (!enabled) return;
    cursor.style.left = `${event.clientX}px`;
    cursor.style.top = `${event.clientY}px`;
    cursor.classList.toggle('hover', Boolean(event.target.closest('a, button')));
  });
  document.addEventListener('pointerleave', () => document.documentElement.classList.remove('cursor-ready'));
  reducedMotion.addEventListener('change', () => document.documentElement.classList.remove('cursor-ready'));
}
