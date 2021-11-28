class Mtr {
    constructor(game) {
        this.game = game;
        this.n = 4;
        this.mtr =[
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0]
        ];
        this.create();
        this.load();
        this.handle();
    }

    create() {
        for(var i=0; i<2; i++) {
            let x = this.TaoSoNgauNhien(0, 3);
            let y = this.TaoSoNgauNhien(0, 3);
            let t = this.TaoSoNgauNhien(1, 2);
            this.mtr[x][y] = t*2;
        }
    }

    load() {
        this.game.context.clearRect(0, 0, 400, 400);
        this.game.updateScore();
        //this.game.load();
        for (var i = 0; i < this.n; i++) {
            for (var j = 0; j < this.n; j++) {
                if (this.mtr[i][j] == 0) {
                    this.game.context.fillStyle = '#ccc0b3';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 2) {
                    this.game.context.fillStyle = '#eee4da';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 4) {
                    this.game.context.fillStyle = '#eedfc8';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 8) {
                    this.game.context.fillStyle = '#f3b079';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 16) {
                    this.game.context.fillStyle = '#ed8c55';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 32) {
                    this.game.context.fillStyle = '#f57c5f';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 64) {
                    this.game.context.fillStyle = '#ea5a38';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 128) {
                    this.game.context.fillStyle = '#f4d86b';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 256) {
                    this.game.context.fillStyle = '#f2d04b';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 512) {
                    this.game.context.fillStyle = '#e5c12b';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 1024) {
                    this.game.context.fillStyle = '#e3ba14';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] == 2048) {
                    this.game.context.fillStyle = '#edc22e';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] > 2048) {
                    this.game.context.fillStyle = '#3e3933';
                    this.game.context.fillRect(j * 100 + 4, i * 100 + 4, 92, 92);
                }
                if (this.mtr[i][j] != 0) {
                    if (this.mtr[i][j] < 8) {
                        this.game.context.textAlign = 'center';
                        this.game.context.font = '50px Tahoma';
                        this.game.context.fillStyle = '#776e65';
                        this.game.context.fillText(this.mtr[i][j], j * 100 + 50, i * 100 + 65);
                    }
                    else {
                        this.game.context.textAlign = 'center';
                        this.game.context.font = '40px Tahoma';
                        this.game.context.fillStyle = '#f9f6f2';
                        this.game.context.fillText(this.mtr[i][j], j * 100 + 50, i * 100 + 65);
                    }
                }
            }
        }
    }

    TaoSoNgauNhien(min, max){
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    rannum() {
        let x = this.TaoSoNgauNhien(0, 3);
        let y = this.TaoSoNgauNhien(0, 3);
        let t = this.TaoSoNgauNhien(1, 2);
        if (this.mtr[x][y] == 0) {
            this.mtr[x][y] = t*2;
            return
        }
        else {
            this.rannum();
        }
    }

    left() {
        this.slideleft();
        this.addleft();
        this.slideleft();
    }
    slideleft() {
        for(let i = 0; i < this.n; i++) {
            for(let j = 0; j < this.n-1; j++) {
                if(this.mtr[i][j] != this.mtr[i][j+1] && this.mtr[i][j] == 0) {
                    this.mtr[i][j] = this.mtr[i][j+1];
                    this.mtr[i][j+1] = 0;
                    j = -1;
                }
            }
        }
    }
    addleft(){
        for(let i = 0; i < this.n; i++) {
            for(let j = 0; j < this.n-1; j++) {
                if(this.mtr[i][j] == this.mtr[i][j+1] && this.mtr[i][j] != 0) {
                    this.mtr[i][j] *=2;
                    this.mtr[i][j+1] =0;
                    score += this.mtr[i][j];
                }
            }
        }
    }

    right() {
        this.slideright();
        this.addright();
        this.slideright();
    }
    slideright() {
        for(let i = 0; i < this.n; i++) {
            for(let j = this.n-1; j > 0; j--) {
                if(this.mtr[i][j] != this.mtr[i][j-1] && this.mtr[i][j] == 0) {
                    this.mtr[i][j] = this.mtr[i][j-1];
                    this.mtr[i][j-1] = 0;
                    j = this.n;
                }
            }
        }
    }
    addright(){
        for(let i = 0; i < this.n; i++) {
            for(let j = this.n-1; j > 0; j--) {
                if(this.mtr[i][j] == this.mtr[i][j-1] && this.mtr[i][j] != 0) {
                    this.mtr[i][j] *=2;
                    this.mtr[i][j-1] =0;
                    score += this.mtr[i][j];
                }
            }
        }
    }

    up() {
        this.slideup();
        this.addup();
        this.slideup();
    }
    slideup() {
        for(let j = 0; j < this.n; j++) {
            for(let i = 0; i < this.n-1; i++) {
                if(this.mtr[i][j] != this.mtr[i+1][j] && this.mtr[i][j] == 0) {
                    this.mtr[i][j] = this.mtr[i+1][j];
                    this.mtr[i+1][j] = 0;
                    i = -1;
                }
            }
        }
    }
    addup(){
        for(let j = 0; j < this.n; j++) {
            for(let i = 0; i < this.n-1; i++) {
                if(this.mtr[i][j] == this.mtr[i+1][j] && this.mtr[i][j] != 0) {
                    this.mtr[i][j] *=2;
                    this.mtr[i+1][j] =0;
                    score += this.mtr[i][j];
                }
            }
        }
    }

    down() {
        this.slidedown();
        this.adddown();
        this.slidedown();
    }
    slidedown() {
        for(let j = 0; j < this.n; j++) {
            for(let i = this.n-1; i > 0; i--) {
                if(this.mtr[i][j] != this.mtr[i-1][j] && this.mtr[i][j] == 0) {
                    this.mtr[i][j] = this.mtr[i-1][j];
                    this.mtr[i-1][j] = 0;
                    i = this.n;
                }
            }
        }
    }
    adddown(){
        for(let j = 0; j < this.n; j++) {
            for(let i = this.n-1; i > 0; i--) {
                if(this.mtr[i][j] == this.mtr[i-1][j] && this.mtr[i][j] != 0) {
                    this.mtr[i][j] *=2;
                    this.mtr[i-1][j] =0;
                    score += this.mtr[i][j];
                }
            }
        }
    }

    // up() {
    //     for (var j = 0; j < this.n; j++) {
    //         for (var i = 0; i < this.n - 1; i++) {
    //             if (this.mtr[i][j] != this.mtr[i + 1][j]) {
    //                 if (this.mtr[i][j] == 0) {
    //                     this.mtr[i][j] = this.mtr[i + 1][j];
    //                     this.mtr[i + 1][j] = 0;
    //                     if(i!=0) i -= 2;
    //                 }
    //             }
    //             else {
    //                 if (this.mtr[i][j] == this.mtr[i + 1][j]) {
    //                     if (this.mtr[i][j] != 0) {
    //                         this.mtr[i][j] = this.mtr[i][j] * 2;
    //                         this.mtr[i + 1][j] = 0;
    //                         if(this.mtr[i][j] == 2048) {
    //                             document.getElementById('result').innerHTML='you win';
    //                         }
    //                         score += this.mtr[i][j];
    //                         this.game.updateScore();
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

    // down() {
    //     for (var j = 0; j < this.n; j++) {
    //         for (var i = this.n - 1; i > 0; i--) {
    //             if (this.mtr[i][j] != this.mtr[i - 1][j]) {
    //                 if (this.mtr[i][j] == 0) {
    //                     this.mtr[i][j] = this.mtr[i - 1][j];
    //                     this.mtr[i - 1][j] = 0;
    //                     if(i!=this.n-1) i += 2;
    //                 }
    //             }
    //             else {
    //                 if (this.mtr[i][j] == this.mtr[i - 1][j]) {
    //                     if (this.mtr[i][j] != 0) {
    //                         this.mtr[i][j] = this.mtr[i][j] * 2;
    //                         this.mtr[i - 1][j] = 0;
    //                         if(this.mtr[i][j] == 2048) {
    //                             document.getElementById('result').innerHTML='you win';
    //                         }
    //                         score += this.mtr[i][j];
    //                         this.game.updateScore();
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

    // left() {
    //     for (var i = 0; i < this.n; i++) {
    //         for (var j = 0; j < this.n - 1; j++) {
    //             if (this.mtr[i][j] != this.mtr[i][j + 1]) {
    //                 if (this.mtr[i][j] == 0) {
    //                     this.mtr[i][j] = this.mtr[i][j + 1];
    //                     this.mtr[i][j + 1] = 0;
    //                     if(j!=0) j -= 2;
    //                 }
    //             }
    //             else {
    //                 if (this.mtr[i][j] == this.mtr[i][j + 1]) {
    //                     if (this.mtr[i][j] != 0) {
    //                         this.mtr[i][j] = this.mtr[i][j] * 2;
    //                         this.mtr[i][j + 1] = 0;
    //                         if(this.mtr[i][j] == 2048) {
    //                             document.getElementById('result').innerHTML='you win';
    //                         }
    //                         score += this.mtr[i][j];
    //                         this.game.updateScore();
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }

    // right() {
    //     for (var i = 0; i < this.n; i++) {
    //         for (var j = this.n - 1; j > 0; j--) {
    //             if (this.mtr[i][j] != this.mtr[i][j - 1]) {
    //                 if (this.mtr[i][j] == 0) {
    //                     this.mtr[i][j] = this.mtr[i][j - 1];
    //                     this.mtr[i][j - 1] = 0;
    //                     if(j!=this.n-1) j += 2;
    //                 }
    //             }
    //             else {
    //                 if (this.mtr[i][j] == this.mtr[i][j - 1]) {
    //                     if (this.mtr[i][j] != 0) {
    //                         this.mtr[i][j] = this.mtr[i][j] * 2;
    //                         this.mtr[i][j - 1] = 0;
    //                         if(this.mtr[i][j] == 2048) {
    //                             document.getElementById('result').innerHTML='you win';
    //                         }
    //                         score += this.mtr[i][j];
    //                         this.game.updateScore();
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }
    haschanged(mtr_) {
        for (var i = 0; i < this.n; i++) {
            for (var j = 0; j < this.n; j++) {
                if(mtr_[i][j] != this.mtr[i][j]){
                    return true;
                } 
            }
        }
        return false;
    }

    copy() {
        let mtr_ = [
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0],
            [0, 0, 0, 0]
        ];
        for (var i = 0; i < this.n; i++) {
            for (var j = 0; j < this.n; j++) {
                mtr_[i][j]=this.mtr[i][j];
            }
        }
        return mtr_;
    }
    checklose(){
        for (var i = 0; i < this.n; i++) {
            for (var j = 1; j < this.n-1; j++) {
                if(this.mtr[i][j]==0 || this.mtr[i][j-1]==0 || this.mtr[i][j+1]==0 || this.mtr[i][j]==this.mtr[i][j-1] || this.mtr[i][j]==this.mtr[i][j+1])
                return false;
            }
        }
        for (var j = 0; j < this.n; j++) {
            for (var i = 1; i < this.n-1; i++) {
                if(this.mtr[i][j]==0 || this.mtr[i-1][j]==0 || this.mtr[i+1][j]==0 || this.mtr[i][j]==this.mtr[i-1][j] || this.mtr[i][j]==this.mtr[i+1][j])
                return false;
            }
        }
        let data = [2, score];
        parent.postMessage(data, "*");
        return true;
    }
    handle() {
        var mtr_=null;
        var score_ = null;
        document.addEventListener('keydown', (event) => {
            //const mtr_ = this.copy();
            if (event.key == 'ArrowUp') {
                mtr_ = this.copy();
                score_ =score;
                this.up();
                if (this.haschanged(mtr_)==true) {
                    this.rannum();
                }
                this.load();
            }
            if (event.key == 'ArrowLeft') {
                mtr_ = this.copy();
                score_ =score;
                this.left();
                if (this.haschanged(mtr_)==true) {
                    this.rannum();
                }
                this.load();
            }
            if (event.key == 'ArrowDown') {
                mtr_ = this.copy();
                score_ =score;
                this.down();
                if (this.haschanged(mtr_)==true) {
                    this.rannum();
                }
                this.load();
            }
            if (event.key == 'ArrowRight') {
                mtr_ = this.copy();
                score_ =score;
                this.right();
                if (this.haschanged(mtr_)==true) {
                    this.rannum();
                }
                this.load();
            }
            if(this.checklose()==true) {
                document.getElementById('result').innerHTML='YOU LOSE!!!';
            }
            document.getElementById('back').addEventListener('click',() => {
                for (var i = 0; i < this.n; i++) {
                    for (var j = 0; j < this.n; j++) {
                        this.mtr[i][j]=mtr_[i][j];
                    }
                }
                score = score_;
                this.load();
            })
        })
    }
}