// Effetto fade-in automatico sulle card
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    cards.forEach(card => card.classList.add("fade-in"));
});

// Messaggio di conferma per eliminazione nota
function confermaEliminazione() {
    return confirm("Sei sicuro di voler eliminare questa nota?");
}
