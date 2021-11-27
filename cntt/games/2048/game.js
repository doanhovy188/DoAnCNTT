class Game {
    constructor() {
        this.canvas = document.getElementById('game');
        this.context = this.canvas.getContext('2d');
        this.run();
    }
    updateScore() {
        document.getElementById('score').innerHTML='Score: <br>' + score;
    }

    run() {
        this.mtr = new Mtr(this);
    }

}
// function myMove() {
//     let id = null;
//     const elem = document.getElementById("animate");
//     let pos = 0;
//     clearInterval(id);
//     id = setInterval(frame, 5);
//     function frame() {
//         if (pos == 350) {
//         clearInterval(id);
//         } else {
//         pos++;
//         elem.style.top = pos + 'px';
//         elem.style.left = pos + 'px';
//         }
//     }
// }
function tai_lai_trang(){
    location.reload();
}

var score = 0;
var g = new Game();
document.getElementById('reset').addEventListener('click', () => {
    // score=0;
    // document.getElementById('score').innerHTML='score: ' + score;
    // document.getElementById('result').innerHTML='';
    // g = undefined;
    // g=new Game();
    tai_lai_trang();
})
