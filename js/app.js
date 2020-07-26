
// AOS // 

AOS.init({
  duration: 1600,
});

// TopAppBar //
import { MDCTopAppBar } from '@material/top-app-bar/index';
const mTopAppBar = new MDCTopAppBar(document.querySelector('.mdc-top-app-bar'));
mTopAppBar.listen('MDCTopAppBar:nav', () => {
  mDrawer.open = !mDrawer.open;
});

// Drawer //
import { MDCDrawer } from '@material/drawer/index';
const mDrawer = new MDCDrawer(document.querySelector('.mdc-drawer'));

// Toggle icons/buttons //
import { MDCIconButtonToggle } from '@material/icon-button';

// Text Fields //
const textFields = '.mdc-text-field';
import { MDCTextField } from '@material/textfield';
const mTextFields = [].map.call(document.querySelectorAll(textFields), function (el) {
  return new MDCTextField(el);
});

// Lists //
const lists = '.mdc-list';
import { MDCList } from '@material/list';
const mLists = [].map.call(document.querySelectorAll(lists), function (el) {
  return new MDCList(el);
})

// Ripple //
import { MDCRipple } from '@material/ripple/index';
const selector = '.mdc-button, .mdc-card__primary-action, .mdc-text-field, .mdc-checkbox, .mdc-list-item, .mdc-icon-button';
const ripples = [].map.call(document.querySelectorAll(selector), function (el) {
  return new MDCRipple(el);
});

const toggleSelector = '.mdc-icon-button';
const toggleRipples = [].map.call(document.querySelectorAll(toggleSelector), function (el) {
  return new MDCIconButtonToggle(el);
});
toggleRipples.unbounded = true;

import { MDCMenu } from '@material/menu'
const menuSelector = ".mdc-menu";
const menuButton = Array.from(document.querySelectorAll('.mdc-menu-surface--anchor'));
const menuArray = Array.from(document.querySelectorAll(menuSelector));
menuArray.forEach(el => {
  const menu = new MDCMenu(el);
  const surfaceAnchor = el.parentElement;
  surfaceAnchor.addEventListener('click', () => {
    menu.open = !menu.open;
  });
  return menu;
});

import { MDCMenuSurface } from '@material/menu-surface';

const menuSurfaceSelector = ".mdc-menu-surface";
const menuSurface = [].map.call(document.querySelectorAll(menuSurfaceSelector), function (el) {
  return new MDCMenuSurface(el);
});



const shareButtonSelector = '.share-button';
const shareButton = [].map.call(document.querySelectorAll(shareButtonSelector), function (el) {
  return el;
});
if (navigator.share === undefined) {
  for (var i = 0; i < shareButton.length; i++) {
    shareButton[i].style.display = 'none';
  }
};
for (var i = 0; i < shareButton.length; i++) {
  shareButton[i].addEventListener('click', async () => {
    try {
      await navigator.share({ title: "Example Page", url: "" });
      console.log("Data was shared successfully");
    } catch (err) {
      console.error("Share failed:", err.message);
    }
  })
};

import { MDCFormField } from '@material/form-field';
import { MDCCheckbox } from '@material/checkbox';

if (document.querySelector('.mdc-checkbox') === null) { console.log("No checkboxes on page.") } else {
  const checkbox = new MDCCheckbox(document.querySelector('.mdc-checkbox'));
  if (checkbox === undefined) { } else {
    const formField = new MDCFormField(document.querySelector('.mdc-form-field'));
    formField.input = checkbox;
  }
}

// Progress Bar //

import {MDCLinearProgress} from '@material/linear-progress';
const progress = new MDCLinearProgress(document.querySelector('.progress'));

// Anime.js //
import anime from 'animejs/lib/anime.es.js';

const logoClass = document.querySelector('.cls-1');
const logoTextClass = document.querySelectorAll('.cls-2');

const logoAnim = anime({
  targets: logoClass,
  strokeDashoffset: [anime.setDashoffset, 0],
  easing: 'easeInOutSine',
  duration: 6500,
  delay: function(el, i) { return i * 250 },
  direction: 'alternate',
  loop: false
});

const logoTextAnim = anime({
  targets: logoTextClass,
  strokeDashoffset: [anime.setDashoffset, 0],
  easing: 'easeInOutSine',
  duration: 2000,
  delay: function(el, i) { return i * 250 },
  direction: 'alternate',
  delay: anime.stagger(500),
  loop: false
});

const logoTextAnim2 = anime({
  targets: logoTextClass,
  fill: ['rgba(0,0,0,0)', '#8a130c'],
  easing: 'linear',
  delay: function(el, i) { return i * 250 },
  duration: 4000,
  loop: false
});