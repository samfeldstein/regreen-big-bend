document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('disclaimerModal');
  const agreeCheckbox = document.getElementById('agreeCheckbox');
  const proceedButton = document.getElementById('proceedButton');

  // Check if disclaimer was accepted before
  if (!localStorage.getItem("disclaimerAccepted")) {
    modal.style.display = 'block';
  }

  // Enable the button when checkbox is checked
  agreeCheckbox.addEventListener('change', () => {
    proceedButton.disabled = !agreeCheckbox.checked;
  });

  // When the user clicks proceed, hide the modal and store the flag
  proceedButton.addEventListener('click', () => {
    localStorage.setItem("disclaimerAccepted", "true");
    modal.style.display = 'none';
  });
});