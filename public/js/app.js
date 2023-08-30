const contractFilter = document.getElementById("contractType");

contractFilter.addEventListener("change", function () {
    const contractValue = contractFilter.value;
    const offers = document.querySelectorAll(".offers");

    offers.forEach(function (offer) {
        if (
            contractValue === "-Contrat-" ||
            offer.dataset.contract === contractValue
        ) {
            offer.style.display = "block";
        } else {
            offer.style.display = "none";
        }
    });

    const urlParams = new URLSearchParams(window.location.search);
    if (contractValue === "-Contrat-") {
        urlParams.delete("contract");
    } else {
        urlParams.set("contract", contractValue);
    }

    const newUrl = window.location.pathname + "?" + urlParams.toString();
    window.history.replaceState({}, "", newUrl);
});
