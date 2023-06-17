const statusSelect = document.getElementById("status");

statusSelect.addEventListener("change", () => {
  const selectedOption = statusSelect.options[statusSelect.selectedIndex].value;
  const confirmed = confirm(
    `Are you sure you want to change the status to '${selectedOption}'?`
  );

  if (!confirmed) {
    const previousOption = "<?php echo $status; ?>";
    statusSelect.value = previousOption;
  }
});
