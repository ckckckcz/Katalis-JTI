document.addEventListener("DOMContentLoaded", function () {
    const submitButton = document.getElementById("submit-button-upload-prestasi");
    const popupModal = document.getElementById("popup-modal");
    const closeModal = document.getElementById("close-modal");
    const confirmUpload = document.getElementById("confirm-upload");
    const cancelUpload = document.getElementById("cancel-upload");

    submitButton.addEventListener("click", () => {
        popupModal.classList.remove("hidden");
    });

    confirmUpload.addEventListener("click", () => {
        popupModal.classList.add("hidden");
    });

    cancelUpload.addEventListener("click", () => {
        popupModal.classList.add("hidden");
    });
    closeModal.addEventListener("click", () => {
        popupModal.classList.add("hidden");
    });
});
