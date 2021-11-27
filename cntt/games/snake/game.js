class Game {
    constructor() {
        this.canvas = document.getElementById('canvas');
        this.context = this.canvas.getContext('2d');
        this.res=50;
        this.load();
        this.run();
    }
    load() {
        this.snake=new Snake(this);
        this.food=new Food(this, this.snake);
    }
    fooding() {
        this.food.load();
    }
    snaking() {
        if(this.islosed()==false) {
            this.eating();
            this.snake.update();
            this.snake.load();
        }
        else {
            this.snake.load();
        }
    }
    eating() {
        if(this.snake.x==this.food.x && this.snake.y==this.food.y) {
            this.food.ran();
            this.snake.length++;
        }
    }
    islosed() {
        for(let i=0; i<this.snake.length; i++) {
            if(this.snake.x==this.snake.tail[i][0] && this.snake.y==this.snake.tail[i][1]) {
                this.snake.y_=0;
                this.snake.x_=0;
                this.snake.speed=0;
                return true;
            }
        }
        return false;
    }
    run() {
        this.context.clearRect(0, 0, 900, 600)
        this.fooding();
        this.snaking();
        setTimeout(() => this.run(), 100);
    }
}

var g = new Game();