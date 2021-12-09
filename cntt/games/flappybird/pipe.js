class Pipe{
    // static pipes = ["pink","orange","red","blue","green","yellow","gray"];
    constructor(game, x, y) {
        this.game=game;
        this.x=x;
        this.y=y;
        this.upimg=null;
        this.downimg=null;
        this.w=120;
        this.h=460;
        this.dist=600;
        this.speed=1;
        this.load();
    }

    load() {
        let pipes = ["pink","orange","red","blue","green","yellow","gray"];
        this.upimg=new Image;
        let upPipe = pipes[Math.floor(Math.random() * 7)];
        this.upimg.src=("./images/" + upPipe + "up.png");
        this.downimg=new Image;
        let downPipe = pipes[Math.floor(Math.random() * 7)];
        this.downimg.src=("./images/" + downPipe + "down.png");
        console.log(upPipe,downPipe);
    }

    update(t) {
        if(t==0)
        this.x-=this.speed;
    }

    draw() {
        this.game.context.drawImage(this.upimg, this.x, this.y, this.w, this.h);
        this.game.context.drawImage(this.downimg, this.x, this.y+this.dist, this.w, this.h);
    }
}