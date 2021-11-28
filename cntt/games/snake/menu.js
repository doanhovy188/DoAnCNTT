class Menu {
    constructor(game) {
        this.game = game;
    }
    openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
}