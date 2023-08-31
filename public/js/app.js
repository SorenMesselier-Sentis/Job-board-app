const contractFilter = document.getElementById("contractType");
const jobFilter = document.getElementById("jobType");
const offers = document.querySelectorAll(".offers");
const urlParams = new URLSearchParams(window.location.search);

let contractValue = contractFilter.value;
let jobValue = jobFilter.value;

function applyFilters() {

    if (localStorage.getItem("contract") !== null && localStorage.getItem("contract") !== contractValue) {
        contractValue = localStorage.getItem("contract");
        contractFilter.value = contractValue;
        localStorage.removeItem("contract");
    }

    if (localStorage.getItem("job") !== null && localStorage.getItem("job") !== jobValue) {
        jobValue = localStorage.getItem("job");
        jobFilter.value = jobValue;
        localStorage.removeItem("job");
    }

    contractValue = contractFilter.value;
    jobValue = jobFilter.value;

    const selectedOfferJob = document.querySelectorAll("[data-job='" + jobValue + "']");
    const selectedOfferContract = document.querySelectorAll("[data-contract='" + contractValue + "']");

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

    if (contractValue === "-Contrat-") {
        localStorage.removeItem("contract");
        urlParams.delete("contract");
    } else {
        localStorage.setItem("contract", contractValue);
        urlParams.set("contract", contractValue);
    }

    if (jobValue === "-Type de travail-") {
        localStorage.removeItem("job");
        urlParams.delete("job");
    } else {
        localStorage.setItem("job", jobValue);
        urlParams.set("job", jobValue);
    }

    const newUrl = window.location.pathname + "?" + urlParams.toString();
    window.history.replaceState({}, "", newUrl);
}

contractFilter.addEventListener("change", applyFilters);
jobFilter.addEventListener("change", applyFilters);

if (localStorage.getItem("contract") !== null) {
    urlParams.set("contract", localStorage.getItem("contract"));
}

if (localStorage.getItem("job") !== null) {
    urlParams.set("job", localStorage.getItem("job"));
}

    const newUrl = window.location.pathname + "?" + urlParams.toString();
    window.history.replaceState({}, "", newUrl);

if (localStorage.getItem("contract") !== null || localStorage.getItem("job") !== null) {
    applyFilters();
}
