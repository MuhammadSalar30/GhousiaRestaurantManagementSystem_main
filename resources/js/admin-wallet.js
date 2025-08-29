import Swiper from "swiper";
import { FreeMode, Navigation } from "swiper/modules";

var swiper = new Swiper(".card-wallet", {
    modules: [FreeMode, Navigation],
    freeMode: false,
    loop: true,
    navigation: {
        nextEl: ".card-button-next",
        prevEl: ".card-button-prev",
    },
});


