const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

// Toggle menu principal
menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
});

// Toggle sous-menus en mobile
document.querySelectorAll(".has-dropdown > a").forEach((link) => {
    link.addEventListener("click", function (e) {
        if (window.innerWidth <= 900) {
            e.preventDefault();
            this.parentElement.classList.toggle("active");
        }
    });
});

// WhatsApp Floating Button Behavior
const waBtn = document.querySelector(".whatsapp-float");

window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
        waBtn.style.opacity = "1";
        waBtn.style.transform = "scale(1)";
    } else {
        waBtn.style.opacity = "0";
        waBtn.style.transform = "scale(0.8)";
    }
});

// Recherche de domaine AJAX
document.addEventListener("DOMContentLoaded", function () {
    const searchForm = document.getElementById("domainSearchForm");
    const searchInput = document.getElementById("domainName");
    const tldSelect = document.getElementById("domainTLD");
    const searchResult = document.getElementById("domainResult");

    searchForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const domain = searchInput.value.trim();
        const tld = tldSelect.value;

        if (domain === "") {
            searchResult.style.display = "block";
            searchResult.innerHTML =
                '<i class="fa fa-info-circle"></i> Veuillez entrer un nom de domaine';
            searchResult.style.borderColor = "#ffc107";
            return;
        }

        const fullDomain = domain + tld;

        fetch("{{ route('domaine.ajax.search') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ domain: fullDomain }),
        })
            .then((res) => res.json())
            .then((data) => {
                searchResult.style.display = "block";
                searchResult.innerHTML = data.message;
                searchResult.style.borderColor = data.available
                    ? "#28a745"
                    : "#dc3545";
            })
            .catch((err) => console.error(err));
    });
});

// Transfert de domaine AJAX
document.addEventListener("DOMContentLoaded", function () {
    const transferForm = document.getElementById("domainTransferForm");
    const domainInput = document.getElementById("transferDomain");
    const codeInput = document.getElementById("transferCode");
    const transferResult = document.getElementById("transferResult");

    transferForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const domain = domainInput.value.trim();
        const eppCode = codeInput.value.trim();

        if (domain === "" || eppCode === "") {
            transferResult.style.display = "block";
            transferResult.innerHTML =
                '<i class="fa fa-info-circle"></i> Veuillez remplir tous les champs';
            transferResult.style.borderColor = "#ffc107";
            return;
        }

        fetch("{{ route('domaine.ajax.transfer') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ domain, epp_code: eppCode }),
        })
            .then((res) => res.json())
            .then((data) => {
                transferResult.style.display = "block";
                transferResult.innerHTML = data.message;
                transferResult.style.borderColor = "#28a745";
            })
            .catch((err) => console.error(err));
    });
});

// Renouvellement de domaine AJAX
document.addEventListener("DOMContentLoaded", function () {
    const renewForm = document.getElementById("domainRenewForm");
    const domainInput = document.getElementById("renewDomain");
    const yearsSelect = document.getElementById("renewYears");
    const renewResult = document.getElementById("renewResult");

    renewForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const domain = domainInput.value.trim();
        const years = yearsSelect.value;

        if (domain === "") {
            renewResult.style.display = "block";
            renewResult.innerHTML =
                '<i class="fa fa-info-circle"></i> Veuillez entrer le nom de domaine';
            renewResult.style.borderColor = "#ffc107";
            return;
        }

        fetch("{{ route('domaine.ajax.renew') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({ domain, years }),
        })
            .then((res) => res.json())
            .then((data) => {
                renewResult.style.display = "block";
                renewResult.innerHTML = data.message;
                renewResult.style.borderColor = "#28a745";
            })
            .catch((err) => console.error(err));
    });
});

// Animation des étapes de commande

const steps = document.querySelectorAll(".ux-step");
const nextBtns = document.querySelectorAll(".next-step");
const prevBtns = document.querySelectorAll(".prev-step");
const progress = document.getElementById("progressBar");
let current = 0;

function updateStep(index) {
    steps.forEach((step, i) => step.classList.toggle("active", i === index));
    progress.style.width = ((index + 1) / steps.length) * 100 + "%";
}

nextBtns.forEach((btn) =>
    btn.addEventListener("click", () => {
        if (current < steps.length - 1) current++;
        updateStep(current);
    })
);

prevBtns.forEach((btn) =>
    btn.addEventListener("click", () => {
        if (current > 0) current--;
        updateStep(current);
    })
);

updateStep(current);
