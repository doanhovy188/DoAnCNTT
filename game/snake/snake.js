class Snake {
    constructor(game) {
        this.game=game;
        this.x=200;
        this.y=200;
        this.thick=this.game.res;
        this.speed=1;
        this.x_=this.speed*this.thick;
        this.y_=0;
        this.dir=2;
        this.length=2;
        this.tail=[[200-this.thick, 200], [200-2*this.thick, 200]];
        this.headimg=new Image();
        this.headimg.src="./images/1601752.png"
        this.load();
        this.move();
    }

    load() {
        this.game.context.fillStyle='green';
        this.game.context.fillRect(this.x, this.y, this.thick, this.thick);
        for(let i=0; i<this.length; i++) {
            this.game.context.fillStyle='green';
            this.game.context.fillRect(this.tail[i][0]+1, this.tail[i][1]+1, this.thick-2, this.thick-2);
        }
    }

    update() {
        this.tail.splice(0, 0, [this.x, this.y]);
        this.tail.splice(this.length, 1);
        if(this.y+this.thick==this.game.canvas.height && this.dir==3) {
            this.y=-this.thick;
        }
        else{
            if(this.y==0 && this.dir==1){
                this.y=this.game.canvas.height;
            }
        }
        if(this.x+this.thick==this.game.canvas.width && this.dir==2) {
            this.x=-this.thick;
        }
        else{
            if(this.x==0 && this.dir==4){
                this.x=this.game.canvas.width;
            }
        }
        this.y+=this.y_;
        this.x+=this.x_;
    }

    move() {
        document.addEventListener('keydown',(e) => {
            if(e.key=='ArrowUp'){
                if(this.dir!=3){
                    this.y_=-this.speed*this.thick;
                    this.x_=0;
                    this.dir=1;
                }
            }
            if(e.key=='ArrowRight'){
                if(this.dir!=4){
                    this.x_=this.speed*this.thick;
                    this.y_=0;
                    this.dir=2;
                }
            }
            if(e.key=='ArrowDown'){
                if(this.dir!=1){
                    this.y_=this.speed*this.thick;
                    this.x_=0;
                    this.dir=3;
                }
            }
            if(e.key=='ArrowLeft'){
                if(this.dir!=2){
                    this.x_=-this.speed*this.thick;
                    this.y_=0;
                    this.dir=4;
                }
            }
        })
    }
}