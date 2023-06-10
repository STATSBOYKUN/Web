function validateForm() {
  var attachedFileInput = document.querySelector(
    '.file__items input[type="file"]'
  );
  var attachedFile = attachedFileInput.files[0];

  var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
  if (!allowedExtensions.exec(attachedFile.name)) {
    alert("Please attach an image file (jpg, jpeg, png, or gif).");
    attachedFileInput.focus();
    return false;
  }

  var maxSizeInBytes = 300000; // 300 KB
  if (attachedFile.size > maxSizeInBytes) {
    alert("Attached file size exceeds the limit of 300 KB.");
    attachedFileInput.focus();
    return false;
  }

  return true;
}

document.querySelector("form").addEventListener("submit", validateForm);
