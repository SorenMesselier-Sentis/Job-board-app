const contractFilter = document.getElementById("contractType");
const jobFilter = document.getElementById("jobType");
const offers = document.querySelectorAll(".offers");

function applyFilters() {
    const contractValue = contractFilter.value;
    const jobValue = jobFilter.value;
    const selectedOfferJob = document.querySelectorAll("[data-job='" + jobValue + "']");
    const selectedOfferContract = document.querySelectorAll("[data-contract='" + contractValue + "']");

    console.log(jobValue, selectedOfferJob);

    offers.forEach((offer) => {
        if (selectedOfferJob.length === 0 && selectedOfferContract.length === 0) {
            offer.style.display = "block";
            return;
        }
        offer.style.display = "none";
    });

    if (selectedOfferContract.length === 0) {
        selectedOfferJob.forEach((offer) => {
            offer.style.display = "block";
        });
    } else if (selectedOfferJob.length === 0) {
        selectedOfferContract.forEach((offer) => {
            offer.style.display = "block";
        });
    } else if (selectedOfferContract.length > 0 && selectedOfferJob.length > 0) {
        const filtredOffer = document.querySelectorAll("[data-job='" + jobValue + "'][data-contract='" + contractValue + "']")
        filtredOffer.forEach(element => {
            element.style.display = "block";
        });
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (contractValue === "-Contrat-") {
        urlParams.delete("contract");
    } else {
        urlParams.set("contract", contractValue);
    }

    if (jobValue === "-Type de travail-") {
        urlParams.delete("job");
    } else {
        urlParams.set("job", jobValue);
    }

    const newUrl = window.location.pathname + "?" + urlParams.toString();
    window.history.replaceState({}, "", newUrl);
}

contractFilter.addEventListener("change", applyFilters);
jobFilter.addEventListener("change", applyFilters);
