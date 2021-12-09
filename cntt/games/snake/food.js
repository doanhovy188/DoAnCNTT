class Food {
    constructor(game, snake) {
        this.game = game;
        this.snake = snake;
        this.x=200;
        this.y=200;
        this.thick=this.game.res;
        this.load();
        this.setColors = [`rgb(101, 228, 230)`,`rgb(255, 208, 241)`,`rgb(255, 200, 169)`,`rgb(255, 250, 140)`,`rgb(255, 170, 165)`,`rgb(212, 255, 144)`];
        this.colors = [...this.setColors];
        let num = Math.floor(Math.random() * this.colors.length);
        this.foodColor = this.colors[num];
        this.colors.splice(num,1);
    }
    TaoSoNgauNhien(min, max){
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    load() {
        this.game.context.fillStyle=this.foodColor;
        this.game.context.fillRect(this.x+1, this.y+1, this.thick-2, this.thick-2);
    }
    ran() {
        console.log(this.colors);
        let x=this.TaoSoNgauNhien(0, this.game.canvas.width/this.game.res-1)*this.thick;
        let y=this.TaoSoNgauNhien(0, this.game.canvas.height/this.game.res-1)*this.thick;
        let num = Math.floor(Math.random() * this.colors.length);
        this.foodColor = this.colors[num];
        this.colors.splice(num,1);        
        if (this.colors.length==0) this.colors = [...this.setColors];
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