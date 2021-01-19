const config = {
    type: 'slider',
    perView:3,
    breakpoints:{
        1024:{
            perView: 1
        },
        600:1
    }
}
let g2 = new Glide('.glide', config);
g2.mount();