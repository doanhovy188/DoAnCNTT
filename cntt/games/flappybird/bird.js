class Bird {
    constructor(game) {
        this.game=game;
        this.x=100;
        this.y=150;
        this.img=null;
        this.img1=null;
        this.g=0.3;
        this.y_=null;
        this.h=60;
        this.w=80;
        this.load();
        this.handle(this.game.islose);
    }
    load() {
        this.img=new Image;
        this.img.src='./images/paperPlane1.png';
        this.img1=new Image;
        this.img1.src='./images/paperPlane.png';
    }

    update() {
        if(this.y_-this.y>60) this.g=0.5;
        if(this.y<500) {
            this.y+=this.g;
            this.g*=1.01;
        }
    }

    draw() {
        if(this.g>0.7) this.changeimg(90*this.g/4);
        else this.changeimg(-20);
    }

    handle(t) {
        document.addEventListener('keyup', () => {
            this.y_=this.y;
            if(t>0) this.g=0.3;
            else this.g=-0.8;
        });
        document.addEventListener('click', () => {
            this.y_=this.y;
            if(t>0) this.g=0.3;
            else this.g=-0.8;
        });
    }

    changeimg(x) {
        let goc=x*Math.PI/180;
        this.game.context.translate(this.x+this.w/2, this.y+this.h/2);
        this.game.context.rotate(goc);
        if(x==-20) this.game.context.drawImage(this.img, -this.w/2, -this.h/2, this.w, this.h);
        else this.game.context.drawImage(this.img1, -this.w/2, -this.h/2, this.w, this.h);
        //chuyển góc quay về
        this.game.context.rotate(-goc);
        this.game.context.translate(-(this.x+this.w/2), -(this.y+this.h/2));
    }
}
