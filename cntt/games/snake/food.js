class Food {
    constructor(game, snake) {
        this.game = game;
        this.snake = snake;
        this.x=200;
        this.y=200;
        this.thick=this.game.res;
        this.load();
    }
    TaoSoNgauNhien(min, max){
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    load() {
        this.game.context.fillStyle='red';
        this.game.context.fillRect(this.x+1, this.y+1, this.thick-2, this.thick-2);
    }
    ran() {
        let x=this.TaoSoNgauNhien(0, this.game.canvas.width/this.game.res-1)*this.thick;
        let y=this.TaoSoNgauNhien(0, this.game.canvas.height/this.game.res-1)*this.thick;
        if(x==this.snake.x && y==this.snake.y) {
            this.ran();
        }
        for(let i=0; i<this.snake.length; i++){
            if(x==this.snake.tail[i][0] && y==this.snake.tail[i][1]){
                this.ran();
            }
        }
        this.x=x;
        this.y=y;
    }
}