class Pipe{
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
        this.upimg=new Image;
        this.upimg.src=('./images/up.png');
        this.downimg=new Image;
        this.downimg.src=('./images/down.png');
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