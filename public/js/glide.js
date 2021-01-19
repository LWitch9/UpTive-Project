const config = {
    type: 'slider',
    perView:4,
    breakpoints:{
        1024:{
            perView: 1
        },
        600:1
    }
}
 let g = new Glide('.glide', config);
g.mount();