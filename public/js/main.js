import deleteProduct from './modules/deleteProduct.js';
import Attribute from './modules/attribute.js';
import liveErrorHandler from './modules/liveErrorHandler.js';


window.addEventListener('DOMContentLoaded', () => {


// !!-------

  

// !!-------

  try {
    new deleteProduct().init();
  } catch (e) {}
  try {
    new Attribute('#productType', '.form-group').init();
  } catch (e) {}
  try {
    new liveErrorHandler().init();
  } catch (e) {}

  window.addEventListener("keyup", function (e) {
    if (e.key === 13) {
      e.preventDefault();
      document.getElementById("submit").click();
    }
  });
});