require('./bootstrap');

// =================================
// Close alert
// =================================

const closeAlertBtn = document.getElementById('closeAlertBtn');
const alertWrapper = document.getElementById('alert');

function hideAlert() {
  const alert = document.getElementById('alert');
  alert.classList.add('hideAlert');
}

function autoHideAlert() {
  setTimeout(hideAlert, 11000);
}

if (closeAlertBtn) {
  closeAlertBtn.addEventListener('click', hideAlert);
  autoHideAlert();
}

if (alertWrapper) {
  alertWrapper.addEventListener('click', hideAlert);
  autoHideAlert();
}
