class Game {
    constructor() {
        this.canvas=document.getElementById('gamezone');
        this.context=this.canvas.getContext('2d');
        this.load();
        this.run();
    }

    load() {
        this.islose=false;
        this.bird=new Bird(this);
        this.pipe=[];
        this.pipe[0]=new Pipe(this, 900, -300);
        this.menu=new Menu(this);
        this.islose=0;
    }

    birding() {
        this.bird.update();
        this.bird.draw();
    }

    piping(i) {
        this.pipe[i].update(this.islose);
        this.pipe[i].draw();
    }

    rannum(min, max){
        return Math.floor(Math.random()*(max-min))+min;
    }

    run() {
        if(this.bird.y>470) {
            if(this.islose==0) {
                document.getElementById('gamezone').style.backgroundImage='none';
                setTimeout(() => document.getElementById('gamezone').style.backgroundImage='url("../images/bg.png")', 10);
            }
            this.menu.openForm();
            document.getElementById('score').style.top='200px';
            return;
        }
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.birding();
        for(var i=0; i<this.pipe.length; i++) {
            this.piping(i);
            if(this.pipe[i].x==400) {
                this.pipe.push(new Pipe(this, 900, -this.rannum(150, 450)));
            }
            if(this.pipe[i].x==-200) this.pipe.splice(0, 1);
            if((this.bird.x+this.bird.w>=this.pipe[i].x+20 && this.bird.x<=this.pipe[i].x+this.pipe[i].w-20 && this.bird.y<=this.pipe[i].y+this.pipe[i].h-10)
            || (this.bird.x+this.bird.w>=this.pipe[i].x+20 && this.bird.x<=this.pipe[i].x+this.pipe[i].w-20 && this.bird.y+this.bird.h>=this.pipe[i].y+this.pipe[i].dist+10)) {
                this.islose++;
                this.bird.handle(this.islose);
                if(this.islose==1) {
                    document.getElementById('gamezone').style.backgroundImage='none';
                    setTimeout(() => document.getElementById('gamezone').style.backgroundImage='url("./images/bg.png")', 10);
                }
            }
            if(this.bird.x==this.pipe[i].x+this.pipe[i].w-20) {
                score++;
                document.getElementById('score').innerHTML='Score: ' + score;
            }
        }
        //requestAnimationFrame(this.run);
        setTimeout(() => {
            this.run()
        }, 1);
    }
}
var score = 0;
var g=new Game();